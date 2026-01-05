<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titrePage; ?></title>
</head>

<body>
    <div id="global">
        <nav>
            <img src="<?= base_url('uploads/general/' . $general['image']); ?>" alt="logo du club" />
            <h2><?= $general['nomClub']; ?></h2>
            <ul>
                <li><?= anchor('/','Accueil');?></li>
                <li><?= anchor('/boutique','Boutique');?></li>
                <li><?= anchor('/contact','Contact / inscriptions');?></li>
                <li><?= anchor('/calendriers','Calendriers');?></li>
                <li><?= anchor('/actualites','Actualités');?></li>
        </nav>
        <?= $this->renderSection('contenu') ?>
        <footer id="piedBlog">
            Blog réalisé avec PHP, HTML5 et CSS.
        </footer>
    </div>
</body>

</html>