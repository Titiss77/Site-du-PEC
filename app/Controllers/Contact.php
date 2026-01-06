<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Donnees;
use App\Models\InscriptionModel;

class Contact extends BaseController
{
    /**
     * Affiche la page Contact avec les tarifs et le matériel
     */
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

    /**
     * ÉTAPE 1 : Reçoit le formulaire et envoie le mail de confirmation à l'utilisateur
     */
    public function envoyer()
    {
        // 1. Sécurité anti-robot (Honeypot)
        if (!empty($this->request->getPost('honeypot'))) {
            return redirect()->back()->with('error', 'Spam détecté.');
        }

        // 2. Validation stricte
        $validation = $this->validate([
            'email' => [
                'rules'  => 'required|valid_email',
                'errors' => ['valid_email' => 'Veuillez entrer une adresse email valide.']
            ],
            'message' => [
                'rules'  => 'required|min_length[10]|max_length[2000]',
                'errors' => [
                    'min_length' => 'Votre message est trop court (10 min).',
                    'max_length' => 'Votre message est trop long.'
                ]
            ],
            'destinataire' => 'required|in_list[president,tresorier,secretaire,coach]'
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('error', 'Erreur dans le formulaire.');
        }

        // 3. Préparation des données
        $token = bin2hex(random_bytes(32));
        $db = \Config\Database::connect();
        $emailUser = esc($this->request->getPost('email'));

        // Sauvegarde temporaire en BDD
        $db->table('pending_contacts')->insert([
            'email_user'   => $emailUser,
            'destinataire' => $this->request->getPost('destinataire'),
            'message'      => $this->request->getPost('message'),
            'token'        => $token,
            'created_at'   => date('Y-m-d H:i:s')
        ]);

        // 4. Envoi du mail de confirmation (Double Opt-In)
        $email = \Config\Services::email();
        $email->SMTPPort = 465; // Correction bug fsockopen (int)

        $email->setTo($emailUser);
        $email->setSubject('Confirmation de votre message - Palmes en Cornouailles');

        $lien = base_url("contact/confirmer/$token");
        $domainName = parse_url(base_url(), PHP_URL_HOST);

        $messageHtml = "
        <div style=\"font-family: 'Segoe UI', Arial, sans-serif; color: #1a1a1a; max-width: 600px; margin: 0 auto; border: 1px solid #e4e4e4; padding: 25px; border-radius: 12px;\">
            <div style=\"text-align: center; margin-bottom: 25px;\">
                <h2 style=\"color: #002d5a; margin: 0; text-transform: uppercase;\">Palmes en Cornouailles</h2>
                <p style=\"font-size: 13px; color: #CA258B; font-weight: bold;\">Club de Nage avec Palmes — Quimper</p>
            </div>
            <p>Bonjour,</p>
            <p>Pour confirmer votre identité et transmettre votre message au club, merci de cliquer sur le bouton ci-dessous :</p>
            <div style=\"text-align: center; margin: 35px 0;\">
                <a href=\"$lien\" style=\"background-color: #CA258B; color: #ffffff; padding: 16px 30px; text-decoration: none; border-radius: 50px; font-weight: bold; display: inline-block; text-transform: uppercase;\">Confirmer l'envoi de mon message</a>
            </div>
            <p style=\"font-size: 12px; color: #666; background: #f8fbff; padding: 15px; border-radius: 8px; border-left: 3px solid #002d5a;\">
                Si vous n'êtes pas à l'origine de cette demande, vous pouvez ignorer ce mail.
            </p>
            <hr style=\"border: 0; border-top: 1px solid #eee; margin: 30px 0;\">
            <div style=\"font-size: 12px; color: #999; text-align: center;\">
                <strong>PEC Quimper</strong> — <a href=\"" . base_url() . "\" style=\"color: #002d5a; text-decoration: none;\">$domainName</a>
            </div>
        </div>";

        $email->setMessage($messageHtml);

        if ($email->send()) {
            return redirect()->back()->with('success', 'Un mail de confirmation vient de vous être envoyé. Merci de cliquer sur le bouton à l\'intérieur pour valider l\'envoi.');
        } else {
            return redirect()->back()->with('error', 'Erreur lors de l\'envoi du mail de confirmation.');
        }
    }

    /**
     * ÉTAPE 2 : L'utilisateur a cliqué sur le lien, on envoie le mail final au club
     */
    public function confirmer($token)
    {
        $db = \Config\Database::connect();
        $inscrModel = new InscriptionModel();

        // Chercher le message
        $pending = $db->table('pending_contacts')->where('token', $token)->get()->getRowArray();

        if (!$pending) {
            return redirect()->to('/contact')->with('error', 'Lien de confirmation invalide ou expiré.');
        }

        // Récupérer le mail du destinataire via le modèle
        $destEmail = $inscrModel->getMail($pending['destinataire']);

        $email = \Config\Services::email();
        $email->SMTPPort = 465;

        $email->setTo($destEmail);
        $email->setReplyTo($pending['email_user']);
        $email->setSubject('Contact Site : ' . $pending['email_user']);

        // Mail formaté pour le bureau du club
        $messageClub = "
        <div style=\"font-family: Arial, sans-serif; color: #1a1a1a; max-width: 600px; margin: 0 auto; border: 1px solid #002d5a; padding: 20px; border-radius: 12px;\">
            <div style=\"background-color: #002d5a; color: #ffffff; padding: 15px; border-radius: 8px; text-align: center; margin-bottom: 20px; border-bottom: 4px solid #CA258B;\">
                <h2 style=\"margin: 0; font-size: 18px;\">Nouveau message vérifié</h2>
            </div>
            <p><strong>De :</strong> <a href=\"mailto:{$pending['email_user']}\" style=\"color: #CA258B;\">{$pending['email_user']}</a></p>
            <p><strong>Destinataire :</strong> " . ucfirst($pending['destinataire']) . "</p>
            <div style=\"background-color: #f8fbff; border-left: 4px solid #CA258B; padding: 20px; margin: 25px 0; font-style: italic;\">
                " . nl2br(esc($pending['message'])) . "
            </div>
            <p style=\"font-size: 11px; color: #999; text-align: center;\">Envoi automatique — Site Officiel Palmes en Cornouailles</p>
        </div>";

        $email->setMessage($messageClub);

        if ($email->send()) {
            // Nettoyage de la table temporaire
            $db->table('pending_contacts')->where('id', $pending['id'])->delete();
            return redirect()->to('/contact')->with('success', 'Votre message a bien été transmis au club !');
        } else {
            echo $email->printDebugger(); die(); // Debug si échec final
        }
    }
}