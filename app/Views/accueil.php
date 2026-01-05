<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Palmes Club</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active" href="#">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="#presentation">Le Club</a></li>
                    <li class="nav-item"><a class="nav-link" href="#coachs">Nos Coachs</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <section id="presentation" class="mb-5">
            <h1>Bienvenue au Club</h1>
            <p>Nous comptons <strong><?= $stats['total'] ?> nageurs</strong> (<?= $stats['hommes'] ?> H /
                <?= $stats['femmes'] ?> F).</p>
            <p><strong>Philosophie :</strong> <?= $stats['projets'] ?></p>
            <div class="alert alert-info">Initiation dès le plus jeune âge avec nos groupes Tritons et Sirènes !</div>
        </section>

        <section id="coachs">
            <h2>Nos Entraîneurs</h2>
            <div class="row">
                <?php foreach ($coaches as $coach): ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $coach['nom'] ?></h5>
                            <p class="card-text"><?= $coach['description'] ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>
    </div>



</body>

</html>