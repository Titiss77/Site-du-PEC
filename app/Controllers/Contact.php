<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Donnees;
use App\Models\InscriptionModel;

class Contact extends BaseController
{
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
        $inscrModel = new InscriptionModel();
        
        // 1. Vérification du Honeypot (Sécurité anti-robot)
        if (!empty($this->request->getPost('honeypot'))) {
            return redirect()->back()->with('error', 'Spam détecté.');
        }

        // 2. Validation des données
        $validation = $this->validate([
            'email' => [
                'rules'  => 'required|valid_email',
                'errors' => ['valid_email' => 'Veuillez entrer une adresse email valide.']
            ],
            'message' => [
                'rules'  => 'required|min_length[10]|max_length[2000]',
                'errors' => [
                    'min_length' => 'Votre message est trop court (10 caractères min).',
                    'max_length' => 'Votre message est trop long.'
                ]
            ],
            'destinataire' => 'required|in_list[president,tresorier,secretaire,coach]'
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('error', 'Erreur dans le formulaire.');
        }

        // 3. Récupération et nettoyage
        $emailUser     = esc($this->request->getPost('email'));
        $messageUser   = esc($this->request->getPost('message'));
        $destSelection = $this->request->getPost('destinataire');

        // Correspondance des postes avec ton modèle
        $emailsEquipe = [
            'president'  => $inscrModel->getMail('president'),
            'tresorier'  => $inscrModel->getMail('tresorier'),
            'secretaire' => $inscrModel->getMail('secretaire'),
            'coach'      => $inscrModel->getMail('coach') // Ajouté pour la cohérence
        ];

        $destFinal = $emailsEquipe[$destSelection] ?? $emailsEquipe['secretaire'];

        // 4. Préparation de l'email
        $email = \Config\Services::email();
        
        // On force le port AVANT ou APRES le paramétrage, mais on ne recrée pas l'objet
        $email->SMTPPort = 465; 

        $email->setTo($destFinal);
        $email->setReplyTo($emailUser);
        $email->setSubject("Contact Site PEC - De : $emailUser");

        $corps = '<h3>Nouveau message de contact</h3>';
        $corps .= '<p><strong>Poste visé :</strong> ' . ucfirst($destSelection) . '</p>';
        $corps .= "<p><strong>Email du demandeur :</strong> $emailUser</p>";
        $corps .= '<p><strong>Message :</strong><br>' . nl2br($messageUser) . '</p>';

        $email->setMessage($corps);

        // 5. Envoi
        if ($email->send()) {
            return redirect()->back()->with('success', 'Votre message a bien été transmis au ' . $destSelection . ' !');
        } else {
            // Log de l'erreur en mode dev, redirection avec message en prod
            log_message('error', $email->printDebugger());
            return redirect()->back()->withInput()->with('error', "Désolé, l'envoi a échoué. Veuillez réessayer plus tard.");
        }
    }
}