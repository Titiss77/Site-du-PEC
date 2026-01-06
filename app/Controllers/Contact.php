<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Donnees;
use App\Models\InscriptionModel;

class Contact extends BaseController
{
    /**
     * Initialise la configuration de l'email
     *
     * @return \CodeIgniter\Email\Email
     */
    private function _initEmail()
    {
        $email = \Config\Services::email();
        $email->initialize([
            'protocol' => 'smtp',
            'SMTPHost' => 'smtp.gmail.com',
            'SMTPUser' => 'pec.jetable@gmail.com',
            'SMTPPass' => 'etdn grvt ecbq zwfo',
            'SMTPPort' => 465,
            'SMTPCrypto' => 'ssl',
            'mailType' => 'html',
            'newline' => "\r\n",
            'CRLF' => "\r\n"
        ]);
        return $email;
    }

    /**
     * Affiche la page de contact avec les tarifs et le matériel
     *
     * @return \CodeIgniter\HTTP\Response
     */
    public function index()
    {
        $donneesModel = new Donnees();
        $inscrModel = new InscriptionModel();

        $data = [
            'titrePage' => 'Inscriptions & Contact',
            'cssPage' => 'contact.css',
            'general' => $donneesModel->getGeneral(),
            'tarifs' => $inscrModel->getTarifs(),
            'materiel' => $inscrModel->getMateriel(),
        ];

        return view('v_contact', $data);
    }

    /**
     * Traite l'envoi du formulaire de contact
     *
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function envoyer()
    {
        if (!empty($this->request->getPost('honeypot'))) {
            return redirect()->back()->with('error', 'Spam détecté.');
        }

        if (!$this->validate([
            'email' => 'required|valid_email',
            'message' => 'required|min_length[10]',
            'destinataire' => 'required'
        ])) {
            return redirect()->back()->withInput()->with('error', 'Veuillez vérifier vos informations.');
        }

        $token = bin2hex(random_bytes(32));
        $db = \Config\Database::connect();
        $emailUser = esc($this->request->getPost('email'));

        $db->table('pending_contacts')->insert([
            'email_user' => $emailUser,
            'destinataire' => $this->request->getPost('destinataire'),
            'message' => $this->request->getPost('message'),
            'token' => $token,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        $email = $this->_initEmail();
        $email->setTo($emailUser);
        $email->setSubject('Confirmation de votre message - PEC');

        $lien = base_url("contact/confirmer/$token");
        $domainName = parse_url(base_url(), PHP_URL_HOST);

        $urlAccueil = base_url();
        $nomClub = $infosGeneral['nomClub'] ?? 'Palmes en Cornouailles';

        $messageHtml = <<<HTML
            <div style="font-family: 'Segoe UI', Helvetica, Arial, sans-serif; line-height: 1.6; color: #1a1a1a; max-width: 600px; margin: 0 auto; border: 1px solid #e4e4e4; padding: 0; border-radius: 12px; overflow: hidden; background-color: #ffffff;">
                
                <div style="background-color: #002d5a; padding: 30px 20px; text-align: center;">
                    <h1 style="color: #ffffff; margin: 0; font-size: 22px; text-transform: uppercase; letter-spacing: 2px;">{$nomClub}</h1>
                    <p style="color: #CA258B; margin: 5px 0 0; font-weight: bold; font-size: 14px; text-transform: uppercase;">Club de Nage avec Palmes — Quimper</p>
                </div>

                <div style="padding: 30px;">
                    <p style="font-size: 16px; font-weight: bold; color: #002d5a;">Bonjour,</p>
                    
                    <p>Vous venez d'envoyer un message au secrétariat du club via notre formulaire de contact en ligne.</p>
                    
                    <p>Afin de lutter contre les courriers indésirables (spams) et de garantir que votre adresse email est correcte pour recevoir notre réponse, nous vous demandons de <strong>valider votre demande</strong> en cliquant sur le bouton ci-dessous :</p>
                    
                    <div style="text-align: center; margin: 40px 0;">
                        <a href="{$lien}" style="background-color: #CA258B; color: #ffffff; padding: 18px 35px; text-decoration: none; border-radius: 50px; font-weight: bold; display: inline-block; box-shadow: 0 4px 15px rgba(202, 37, 139, 0.4); font-size: 14px; text-transform: uppercase;">
                            Confirmer l'envoi de mon message
                        </a>
                    </div>

                    <div style="background-color: #f8fbff; border-left: 4px solid #002d5a; padding: 15px; border-radius: 4px; font-size: 13px; color: #555;">
                        <strong>Note de sécurité :</strong> Si vous n'êtes pas à l'origine de cette demande ou si vous avez reçu cet email par erreur, vous pouvez simplement l'ignorer. Sans action de votre part, votre message sera automatiquement supprimé sous 48h.
                    </div>
                </div>

                <div style="background-color: #f4f4f4; padding: 20px; text-align: center; font-size: 12px; color: #888;">
                    <p style="margin: 0;"><strong>Association Sportive {$nomClub}</strong></p>
                    <p style="margin: 5px 0;">Affiliée à la FFESSM — Quimper, Finistère</p>
                    <p style="margin: 10px 0 0;">
                        <a href="{$urlAccueil}" style="color: #002d5a; text-decoration: none; font-weight: bold;">{$domainName}</a>
                    </p>
                </div>
            </div>
            HTML;

        $email->setMessage($messageHtml);

        if ($email->send()) {
            return redirect()->back()->with('success', 'Mail de confirmation envoyé ! Vérifiez vos spams.');
        } else {
            echo $email->printDebugger();
            die();
        }
    }

    /**
     * Confirme et envoie le message au destinataire visé
     *
     * @param string $token
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function confirmer($token)
    {
        $db = \Config\Database::connect();
        $inscrModel = new InscriptionModel();

        $pending = $db->table('pending_contacts')->where('token', $token)->get()->getRowArray();

        if (!$pending) {
            return redirect()->to('/contact')->with('error', 'Lien expiré.');
        }

        $destEmail = $inscrModel->getMail($pending['destinataire']);

        $email = $this->_initEmail();
        $email->setTo($destEmail);
        $email->setReplyTo($pending['email_user']);
        $email->setSubject('Contact Site : ' . $pending['email_user']);

        $dateEnvoi = date('d/m/Y à H:i');
        $messageContenu = nl2br(esc($pending['message']));
        $destinataireNom = ucfirst($pending['destinataire']);

        $messageClub = <<<HTML
            <div style="font-family: 'Segoe UI', Arial, sans-serif; line-height: 1.6; color: #1a1a1a; max-width: 600px; margin: 0 auto; border: 1px solid #002d5a; padding: 0; border-radius: 12px; overflow: hidden; background-color: #ffffff;">
                
                <div style="background-color: #002d5a; padding: 20px; text-align: center; border-bottom: 4px solid #CA258B;">
                    <h2 style="color: #ffffff; margin: 0; font-size: 18px; text-transform: uppercase; letter-spacing: 1px;">Nouveau Message Site Web</h2>
                </div>

                <div style="padding: 30px;">
                    <table style="width: 100%; border-collapse: collapse; margin-bottom: 25px;">
                        <tr>
                            <td style="padding: 10px; background-color: #f8fbff; border-radius: 8px;">
                                <p style="margin: 0; font-size: 13px; color: #666; text-transform: uppercase;">Expéditeur</p>
                                <p style="margin: 5px 0 0; font-size: 16px; font-weight: bold; color: #002d5a;">{$pending['email_user']}</p>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 10px; padding-top: 20px;">
                                <p style="margin: 0; font-size: 13px; color: #666; text-transform: uppercase;">Destinataire visé</p>
                                <p style="margin: 5px 0 0; font-size: 16px; font-weight: bold; color: #CA258B;">{$destinataireNom} (PEC Quimper)</p>
                            </td>
                        </tr>
                    </table>

                    <p style="margin: 0 0 10px; font-size: 13px; color: #666; text-transform: uppercase;">Contenu du message :</p>
                    <div style="background-color: #fcfcfc; border: 1px solid #eee; border-left: 5px solid #002d5a; padding: 20px; border-radius: 4px; font-size: 15px; color: #1a1a1a; white-space: pre-wrap;">
                        {$messageContenu}
                    </div>

                    <div style="margin-top: 30px; padding: 15px; background-color: #fff9e6; border: 1px solid #ffcc00; border-radius: 8px; text-align: center;">
                        <p style="margin: 0; font-size: 14px; color: #856404;">
                            <strong>Conseil :</strong> Pour répondre, cliquez simplement sur le bouton "Répondre" de votre messagerie. L'adresse a été vérifiée par le site.
                        </p>
                    </div>
                </div>

                <div style="background-color: #f4f4f4; padding: 15px; text-align: center; font-size: 11px; color: #999;">
                    <p style="margin: 0;">Message envoyé le {$dateEnvoi}</p>
                    <p style="margin: 5px 0 0;">Identifiant de sécurité : {$pending['token']}</p>
                </div>
            </div>
            HTML;

        $email->setMessage($messageClub);

        if ($email->send()) {
            $db->table('pending_contacts')->where('id', $pending['id'])->delete();
            return redirect()->to('/contact')->with('success', 'Message transmis au club !');
        } else {
            echo $email->printDebugger();
            die();
        }
    }
}
