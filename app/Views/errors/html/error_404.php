<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Page non trouvée - PEC</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/root.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/err404.css'); ?>">

</head>

<body>
    <div class="wrap">
        <h1>404</h1>
        <h2>Oups ! Mauvaise ligne de nage...</h2>

        <p>
            <strong>Cette page n'existe pas ou est en cours de production.</strong>
        </p>

        <?php if (ENVIRONMENT !== 'production') : ?>
        <code><?= nl2br(esc($message)) ?></code>
        <?php endif; ?>

        <br>
        <a href="<?= base_url() ?>" class="btn-home">Retourner à l'accueil</a>
    </div>
</body>

</html>