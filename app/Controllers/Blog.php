<?php

namespace App\Controllers;

use App\Models\Billet;
use App\Models\Commentaire;

class Blog extends BaseController
{
    private function header(): array {
        return [
            'titreHeader' => 'Bienvenue sur mon blog',
            'description' => "Ceci est la page d'accueil de mon blog."
        ];
    }
    
    public function index()
    {
        $data = $this->header();
        $data['titrePage'] = 'Accueil';
        
        $modelBillet = new Billet();
        $data['lesBillets'] = $modelBillet->getLesBillets();
        return view('v-accueil', $data);
    }

    public function apropos(): string
    {
        $data = $this->header();
        $data['titrePage'] = 'A propos';
        
        return view('v-apropos', $data);
    }

    public function billet($id)
    {
        $data = $this->header();
        
        $modelBillet = new Billet();
        $modelCommentaire = new Commentaire();

        $data['billet'] = $modelBillet->getUnBillet($id);
        $data['titrePage'] = $data['billet']['titre'];
        $data['commentaires'] = $modelCommentaire->getLesCommentaires($id);

        return view('v-billet', $data);
    }

    public function ajoutCommentaire()
    {
        $data = $this->header();
        $data['titrePage'] = "Merci pour votre commentaire";
        

        $idBillet = $this->request->getPost('idBillet');
        $auteurCommentaire = $this->request->getPost('auteurCommentaire');
        $contenuCommentaire = $this->request->getPost('contenuCommentaire');

        $modelCommentaire = new Commentaire();
        $modelCommentaire->ajoutCommentaire($auteurCommentaire, $contenuCommentaire, $idBillet);

        $data['auteur'] = $auteurCommentaire;
        $data['message'] = $contenuCommentaire;
        $data['idBillet'] = $idBillet;
        return view('v-ajouterCommentaire', $data);
    }


}