<?php

namespace App\Controllers;

use App\Models\Donnees; // Ton modèle général
use App\Models\InscriptionModel;
use App\Controllers\BaseController;

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

    // Fonction pour envoyer le mail depuis le formulaire
    public function envoyer()
    {
        $destinataire = $this->request->getPost('destinataire'); // président, trésorier...
        $message = $this->request->getPost('message');
        
        // Ici, tu intégreras la logique d'envoi d'email de CodeIgniter
        return redirect()->back()->with('success', 'Votre message a bien été envoyé !');
    }
}