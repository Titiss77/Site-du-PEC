<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <!-- Section pour les styles CSS -->
    <title><?= $titrePage; ?></title>
    <?= view('css/dynamic_root', ['root' => $root]); ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/global.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/' . $cssPage); ?>">
    <!-- Fin de section -->
</head>

<body>
    <!-- Section pour le menu de navigation -->
    <nav>
        <img src="<?= base_url('' . $general['image']); ?>" alt="logo du club" />
        <h2><?= $general['nomClub']; ?></h2>
        <ul>
            <li><?= anchor('/', 'Accueil'); ?></li>
            <li><?= anchor('/boutique', 'Boutique'); ?></li>
            <li><?= anchor('/contact', 'Contact / inscriptions'); ?></li>
            <li><?= anchor('/calendriers', 'Calendriers'); ?></li>
        </ul>
    </nav>
    <!-- Fin de section -->
    <?php if (session()->get('isLoggedIn')): ?>
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

    <!-- Section pour le pied de page -->
    <footer id="piedBlog">
        <nav>
            <ul>
                <li><?= anchor('/', 'Accueil'); ?></li>
                <li><?= anchor('/boutique', 'Boutique'); ?></li>
                <li><?= anchor('/contact', 'Contact / inscriptions'); ?></li>
                <li><?= anchor('/calendriers', 'Calendriers'); ?></li>
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
        <!--<p class="admin-link"><?= anchor('/login', '(Administration)'); ?></p>-->
    </footer>
    <!-- Fin de section -->
</body>

</html>