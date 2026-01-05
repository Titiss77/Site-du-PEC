<?= $this->extend('l_global') ?>
<?= $this->section('contenu') ?>

<div class="site-container">

    <section class="hero-banner">
        <img src="<?= base_url('uploads/general/groupe.jpg') ?>" alt="Photo de fin d'année du club de nage avec palmes"
            class="img-full-width img-rounded" />
        <div class="hero-overlay">
            <h1 class="hero-title">Palmes en Cornouailles</h1>
        </div>
    </section>

    <section class="block-club">
        <div class="grid-2">
            <div class="info">
                <h2>Bienvenue au <?= esc($general['nomClub']); ?></h2>
                <p class="txt-intro"><?= esc($general['description']); ?></p>
                <p><strong>Philosophie :</strong> <?= esc($general['philosophie']); ?></p>
            </div>
            <div class="stats-card">
                <div class="stats-box">
                    <h4 class="color-blue"><?= esc($general['nombreNageurs']); ?> Nageurs</h4>
                    <p>Mixité : <br><?= esc($general['pourcentH']); ?>% d'Hommes,
                        <br><?= esc($general['pourcentF']); ?>%
                        de Femmes, <br>
                        de 7 à 77 ans.
                    </p>
                    <hr>
                    <p class="small">
                        <strong>Projet Sportif :</strong>
                        <?= esc($general['projetSportif'] ?? 'Compétitions régionales et nationales'); ?>
                        (Saison <?= date('Y'); ?>)
                    </p>
                </div>
            </div>
        </div>
    </section>

    <h3 class="title-section">Nos Disciplines</h3>
    <div class="grid-3">
        <?php foreach ($disciplines as $discipline): ?>
        <div class="card-item">
            <img src="<?= base_url('uploads/disciplines/' . $discipline['image']); ?>" alt="<?= $discipline['nom'] ?>"
                class="img-card" />
            <i class="bi bi-water icon-main"></i>
            <h5><?= esc($discipline['nom']); ?></h5>
            <p><?= esc($discipline['description']); ?></p>
        </div>
        <?php endforeach; ?>
    </div>

    <h3 class="title-section">L'Équipe</h3>
    <div class="grid-2">
        <?php foreach ($coaches as $coach): ?>
        <div class="coach-item">
            <img src="<?= base_url('uploads/coaches/' . $coach['photo']); ?>" alt="Coach <?= esc($coach['nom']); ?>"
                class="img-circle" />
            <div class="coach-info">
                <h4><?= esc($coach['nom']); ?></h4>
                <p><?= esc($coach['description']); ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="banner-info">
        <div class="banner-content">
            <h4>Initiation : Tritons & Sirènes</h4>
            <p>Accueil dès 7 ans pour découvrir l'aisance aquatique avec palmes.</p>
        </div>
    </div>

    <h3 class="title-section">Lieux d'entraînement</h3>
    <div class="grid-2">
        <?php foreach ($piscines as $p) : ?>
        <div class="piscine-card">
            <img src="<?= base_url('uploads/piscines/' . ($p['photo'] ?? 'default_piscine.jpg')) ?>"
                alt="Piscine <?= esc($p['nom']); ?>" class="img-card" />
            <div class="piscine-info">
                <h5><?= esc($p['nom']); ?></h5>
                <p><i class="bi bi-geo-alt"></i> <?= esc($p['adresse']); ?></p>
                <span class="tag-bassin">Bassin <?= esc($p['type_bassin'] ?? '25m'); ?></span>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

</div>

<?= $this->endSection() ?>