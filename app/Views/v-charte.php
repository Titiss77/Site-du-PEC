<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titrePage; ?></title>
</head>

<body>
    <div id="global">
        <header>
            <h1 id="titreBlog"><?= $titreHeader; ?></h1>
            <p>Je vous suhaite la bienvenue sur ce modeste blog.</p>
        </header>
        <nav>
            <ul>
                <li><?= anchor('/','Accueil');?></li>
                <li><?= anchor('/apropos','A propos');?></li>
            </ul>
        </nav>
        <?= $this->renderSection('contenu') ?>
        <footer id="piedBlog">
            Blog réalisé avec PHP, HTML5 et CSS.
        </footer>
    </div>
</body>

</html>