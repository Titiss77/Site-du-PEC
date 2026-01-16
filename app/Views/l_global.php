<?php

/**
 * ============================================================================
 * LAYOUT GLOBAL (Gabarit Principal)
 * ============================================================================
 * Ce fichier sert de structure de base pour toutes les pages du site.
 * Il contient l'en-tête (HTML Head), la navigation (Menu), le pied de page (Footer)
 * et définit la zone où le contenu spécifique de chaque page sera injecté.
 */

// ----------------------------------------------------------------------------
// 1. CONFIGURATION ET DONNÉES GLOBALES
// ----------------------------------------------------------------------------

// Récupération de l'état de connexion (Admin ou Visiteur)
// Cette variable est utilisée plus bas pour modifier le comportement des liens.
$isLogged = session()->get('isLoggedIn');

// Définition centralisée du menu de navigation.
// Format : 'URL' => 'Libellé affiché'.
// AVANTAGE : Modifier le menu ici le met à jour automatiquement dans le Header ET le Footer.
$menuItems = [
    '/' => 'Accueil',
    '/groupes' => 'Nos Groupes',
    '/boutique' => 'Boutique',
    '/contact' => 'Contact / inscriptions',
    '/calendriers' => 'Calendriers',
];
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <title><?= $titrePage; ?></title>
    <?= view('css/dynamic_root', ['root' => $root]); ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/global.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/' . $cssPage); ?>">
</head>

<body>
    <nav>
        <img src="<?= base_url('' . $general['image']); ?>" alt="logo du club" />
        <h2><?= $general['nomClub']; ?></h2>
        <ul>
            <?php foreach ($menuItems as $url => $label): ?>
            <li>
                <?php
                /**
                 * LOGIQUE DES LIENS :
                 * Si l'utilisateur est CONNECTÉ (Admin), cliquer sur un lien du menu
                 * le déconnecte d'abord ('logout?return=...') pour qu'il voie la page
                 * comme un visiteur lambda.
                 * Si NON CONNECTÉ, le lien est normal.
                 */
                ?>
                <?= anchor($isLogged ? 'logout?return=' . $url : $url, $label); ?>
            </li>
            <?php endforeach; ?>
        </ul>
    </nav>

    <?php if ($isLogged): ?>

    <div class="deconnexion-section">
        <a href="<?= base_url('logout') ?>" class="admin-nav-link logout-btn"
            onclick="return confirm('Voulez-vous vraiment vous déconnecter ?')">
            <i class="bi bi-box-arrow-right"></i> <span>Déconnexion</span>
        </a>
    </div>

    <div class="admin-header">
        <h2 class="title-section" style="margin-top: 0;">Tableau de Bord : <?= session()->get('nom') ?></h2>
        <div class="admin-user-pill">
            <i class="bi bi-person-circle"></i>
            <span>Administrateur</span>
        </div>
    </div>
    <?php endif; ?>

    <?= $this->renderSection('contenu') ?>

    <footer id="piedBlog">

        <nav>
            <ul>
                <?php foreach ($menuItems as $url => $label): ?>
                <li>
                    <?= anchor($isLogged ? 'logout?return=' . $url : $url, $label); ?>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <div class="social-links">
            <a href="<?= $general['lienFacebook']; ?>" target="_blank" aria-label="Facebook">
                <i class="bi bi-facebook"></i>
            </a>
            <a href="<?= $general['lienInstagram']; ?>" target="_blank" aria-label="Instagram">
                <i class="bi bi-instagram"></i>
            </a>
        </div>

        <p>&copy; <?= date('Y'); ?> <?= esc($general['nomClub']); ?>. Tous droits réservés.</p>

        <p class="admin-link"><?= anchor('/login', '(Administration)'); ?></p>
    </footer>

</body>

</html>