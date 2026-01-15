<?php
// --- CONFIGURATION CENTRALE ---
// 1. On récupère l'état de connexion une seule fois pour toute la page
$isLogged = session()->get('isLoggedIn');

// 2. On définit les liens du menu ici (URL => Label)
// Cela permet de générer automatiquement le menu en haut et en bas sans recopier le code
$menuItems = [
    '/'            => 'Accueil',
    '/boutique'    => 'Boutique',
    '/contact'     => 'Contact / inscriptions',
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