<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <!-- Section pour les styles CSS -->
    <title>Page d'administration</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/root.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/global.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/' . $cssPage); ?>">
    <!-- Fin de section -->
</head>

<body>
    <div id="global">
        <!-- Section pour le menu de navigation -->
        <nav>
            <img src="<?= base_url('uploads/general/' . $general['image']); ?>" alt="logo du club" />
            <h2><?= $general['nomClub']; ?></h2>
            <ul>
                <li><?= anchor('/', 'Accueil'); ?></li>
                <li><?= anchor('/bureau', 'Bureau'); ?></li>
                <li><?= anchor('/boutique', 'Boutique'); ?></li>
                <li><?= anchor('/contact', 'Contact / inscriptions'); ?></li>
                <li><?= anchor('/calendriers', 'Calendriers'); ?></li>
                <li><?= anchor('/actualites', 'Actualités'); ?></li>
        </nav>
        <!-- Fin de section -->

        <?= $this->renderSection('admin_contenu') ?>

        <!-- Section pour le pied de page -->
        <footer id="piedBlog">
            <nav>
                <ul>
                    <li><?= anchor('/boutique', 'Boutique'); ?></li>
                    <li><?= anchor('/bureau', 'Bureau'); ?></li>
                    <li><?= anchor('/contact', 'Contact / inscriptions'); ?></li>
                    <li><?= anchor('/actualites', 'Actualités'); ?></li>
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
        </footer>
        <!-- Fin de section -->
    </div>
</body>

</html>