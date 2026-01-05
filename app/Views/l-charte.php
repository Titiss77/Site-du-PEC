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
        <nav>
            <ul>
                <li>
                    <?= anchor('/', 'Accueil'); ?>
                </li>
                <?php foreach ($lesHeaders as $header): ?>
                <li>
                    <?= anchor('/' . $header['id'], $header['libelle']); ?>
                </li>
                <?php endforeach; ?>

                <?php if (session()->get('isLoggedIn')): ?>
                <li class="nav-auth">
                    <?= anchor('/logout', 'Déconnexion (' . esc(session()->get('login')) . ')'); ?>
                </li>
                <?php else: ?>
                <li class="nav-auth">
                    <?= anchor('/login', 'Connexion'); ?>
                </li>
                <?php endif; ?>
            </ul>
        </nav>
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
                        <li><?= anchor('/gestion', 'Gestion des données'); ?></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h3>Développeur</h3>
                    <div class="dev-info">
                        <p><strong>Titiss_</strong></p>
                        <p>Développeur Web Passionné</p>
                        <div class="social-links">
                            <a href="https://github.com/Titiss77" target="_blank" title="GitHub">📁 GitHub</a>
                            <a href="mailto:mathisfrances11@gmail.com" title="Contact">✉️ Contact</a>
                            <a href="https://www.instagram.com/mathis_fcs/" title="Contact"> Instagram</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                &copy; <?= date('Y') ?> AMFS Blog - Tous droits réservés.
            </div>
        </footer>
    </div>
</body>

</html>