<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Donnees;
use App\Models\InscriptionModel;

class Contact extends BaseController
{
    /**
     * Charge les paramètres SMTP Gmail pour chaque envoi
     */
    private function _initEmail()
    {
        $email = \Config\Services::email();
        $email->initialize([
            'protocol'   => 'smtp',
            'SMTPHost'   => 'smtp.gmail.com',
            'SMTPUser'   => 'mathisfrances11@gmail.com',
            'SMTPPass'   => 'zbsi mshq adqd xvgc',
            'SMTPPort'   => 465,
            'SMTPCrypto' => 'ssl',
            'mailType'   => 'html',
            'newline'    => "\r\n",
            'CRLF'       => "\r\n"
        ]);
        return $email;
    }

    public function index()
    {
        $donneesModel = new Donnees();
        $inscrModel = new InscriptionModel();

        $data = [
            'titrePage' => 'Inscriptions & Contact',
            'cssPage'   => 'contact.css',
            'general'   => $donneesModel->getGeneral(),
            'tarifs'    => $inscrModel->getTarifs(),
            'materiel'  => $inscrModel->getMateriel(),
        ];

        return view('v_contact', $data);
    }

    public function envoyer()
    {
        if (!empty($this->request->getPost('honeypot'))) {
            return redirect()->back()->with('error', 'Spam détecté.');
        }

        if (!$this->validate([
            'email'        => 'required|valid_email',
            'message'      => 'required|min_length[10]',
            'destinataire' => 'required'
        ])) {
            return redirect()->back()->withInput()->with('error', 'Veuillez vérifier vos informations.');
        }

        $token = bin2hex(random_bytes(32));
        $db    = \Config\Database::connect();
        $emailUser = esc($this->request->getPost('email'));

        $db->table('pending_contacts')->insert([
            'email_user'   => $emailUser,
            'destinataire' => $this->request->getPost('destinataire'),
            'message'      => $this->request->getPost('message'),
            'token'        => $token,
            'created_at'   => date('Y-m-d H:i:s')
        ]);

        $email = $this->_initEmail();
        $email->setTo($emailUser);
        $email->setSubject('Confirmation de votre message - PEC');

        $lien = base_url("contact/confirmer/$token");
        $domainName = parse_url(base_url(), PHP_URL_HOST);

        $messageHtml = "
        <div style=\"font-family: Arial; color: #1a1a1a; max-width: 600px; margin: 0 auto; border: 1px solid #e4e4e4; padding: 25px; border-radius: 12px;\">
            <h2 style=\"color: #002d5a; text-align: center;\">PALMES EN CORNOUAILLES</h2>
            <p>Bonjour, merci de confirmer l'envoi de votre message en cliquant ici :</p>
            <div style=\"text-align: center; margin: 30px;\">
                <a href=\"$lien\" style=\"background-color: #CA258B; color: #fff; padding: 15px 25px; text-decoration: none; border-radius: 50px; font-weight: bold;\">CONFIRMER MON MESSAGE</a>
            </div>
            <p style=\"font-size: 11px; text-align: center;\">Site officiel : $domainName</p>
        </div>";

        $email->setMessage($messageHtml);

        if ($email->send()) {
            return redirect()->back()->with('success', 'Mail de confirmation envoyé ! Vérifiez vos spams.');
        } else {
            echo $email->printDebugger(); die();
        }
    }

    public function confirmer($token)
    {
        $db = \Config\Database::connect();
        $inscrModel = new InscriptionModel();

        $pending = $db->table('pending_contacts')->where('token', $token)->get()->getRowArray();

        if (!$pending) {
            return redirect()->to('/contact')->with('error', 'Lien expiré.');
        }

        // IMPORTANT : S'assurer que getMail() renvoie bien une chaîne (le mail seul)
        $destEmail = $inscrModel->getMail($pending['destinataire']);
        
        // Si ton modèle renvoie un tableau, décommente la ligne suivante :
        // if(is_array($destEmail)) { $destEmail = $destEmail['mail']; }

        $email = $this->_initEmail();
        $email->setTo($destEmail);
        $email->setReplyTo($pending['email_user']);
        $email->setSubject('Contact Site : ' . $pending['email_user']);

        $messageClub = "
        <div style=\"font-family: Arial; border: 1px solid #002d5a; padding: 20px; border-radius: 12px;\">
            <h2 style=\"background: #002d5a; color: #fff; padding: 10px;\">Nouveau message reçu</h2>
            <p><strong>De :</strong> {$pending['email_user']}</p>
            <p><strong>Pour :</strong> {$pending['destinataire']}</p>
            <div style=\"background: #f8fbff; padding: 15px; border-left: 4px solid #CA258B;\">
                " . nl2br(esc($pending['message'])) . "
            </div>
        </div>";

        $email->setMessage($messageClub);

        if ($email->send()) {
            $db->table('pending_contacts')->where('id', $pending['id'])->delete();
            return redirect()->to('/contact')->with('success', 'Message transmis au club !');
        } else {
            echo $email->printDebugger(); die();
        }
    }
}