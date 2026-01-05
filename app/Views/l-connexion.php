<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titrePage; ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/cartes.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/edit.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/root.css') ?>">
</head>

<body>
    <div id="global">
        <?= $this->renderSection('contenu') ?>
        <footer id="piedBlog">
            <div class="footer-container">
                <div class="footer-section">
                    <h3>À propos</h3>
                    <p>Gestionnaire personnel de contenus multimédias (AMFS). Suivez vos progrès en streaming, lectures
                        et outils préférés.</p>
                    <p class="tech-stack">Réalisé avec PHP (CodeIgniter 4), HTML5 & CSS3.</p>
                </div>

                <div class="footer-section">
                    <h3>Mentions Légales</h3>
                    <ul>
                        <li><?= anchor('/conditions', "Conditions d'utilisation"); ?></li>
                    </ul>
                </div>

            </div>

            <div class="footer-bottom">
                &copy; <?= date('Y') ?> AMFS Blog - Tous droits réservés.
            </div>
        </footer>
    </div>
</body>

</html>