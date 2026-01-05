<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Section pour les styles CSS -->
    <title><?= $titrePage; ?></title>
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
                <li><?= anchor('/boutique', 'Boutique'); ?></li>
                <li><?= anchor('/contact', 'Contact / inscriptions'); ?></li>
                <li><?= anchor('/calendriers', 'Calendriers'); ?></li>
                <li><?= anchor('/actualites', 'Actualités'); ?></li>
        </nav>
        <!-- Fin de section -->

        <?= $this->renderSection('contenu') ?>

        <!-- Section pour le pied de page -->
        <footer id="piedBlog">
            Blog réalisé avec PHP, HTML5 et CSS.
        </footer>
        <!-- Fin de section -->
    </div>
</body>

</html>