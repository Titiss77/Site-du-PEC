<?php
$isLogged = session()->get('isLoggedIn');

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
    <?php if (!empty($general['image'])): ?>
    <link rel="icon" type="image/png" href="<?= base_url($general['image']); ?>">
    <?php endif; ?>
    <?= view('css/dynamic_root', ['root' => $root]); ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/global.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/' . $cssPage); ?>">
</head>

<body>
    <nav>
        <img src="<?= base_url(''.$general['image']); ?>" alt="logo du club" />
        <h2><?= $general['nomClub']; ?></h2>
        <ul>
            <?php foreach ($menuItems as $url => $label): ?>
            <li>
                <?= anchor($isLogged ? 'logout?return=' . $url : $url, $label); ?>
            </li>
            <?php endforeach; ?>
        </ul>
    </nav>

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
            <a class="fede" href="<?= $general['lienffessm']; ?>" target="_blank" aria-label="FFESSM"
                title="Site officiel de la FFESSM">
                <img src="<?= base_url('uploads/' . $general['logoffessm']); ?>" alt="<?= $general['logoffessm']; ?>">
            </a>
        </div>



        <p>&copy; <?= date('Y'); ?> <?= esc($general['nomClub']); ?>. Tous droits réservés.</p>

        <p class="admin-link"><?= anchor('/login', '(Administration)'); ?></p>
    </footer>

</body>

</html>