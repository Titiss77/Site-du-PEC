<?= $this->extend('l_global') ?>
<?= $this->section('contenu') ?>

<div class="site-container">

    <section class="hero-banner">
        <img src="<?= base_url('uploads/general/groupe.jpg') ?>" alt="Photo du club"
            class="img-full-width img-rounded" />
        <div class="hero-overlay">
            <h1 class="hero-title"><?= esc($general['nomClub']); ?></h1>
        </div>
    </section>

    <div class="main-layout-with-sidebar mt-5">

        <div class="main-content">
            <section class="block-club">
                <div class="info">
                    <h2>Bienvenue au <?= esc($general['nomClub']); ?></h2>
                    <p class="txt-intro"><?= esc($general['description']); ?></p>
                    <p><strong>Philosophie :</strong> <?= esc($general['philosophie']); ?></p>
                </div>

                <div class="stats-card mt-3">
                    <div class="stats-box">
                        <h4 class="color-blue"><?= esc($general['nombreNageurs']); ?> Nageurs</h4>
                        <p>Mixité : <?= esc($general['pourcentH']); ?>% H / <?= esc($general['pourcentF']); ?>% F</p>
                        <hr>
                        <p class="small"><strong>Projet Sportif :</strong>
                            <?= esc($general['projetSportif'] ?? 'Compétition & Loisir'); ?></p>
                    </div>
                </div>
            </section>
        </div>

        <h3 class="title-section">Actualités</h3>
        <div class="card-item news-card">
            <?php foreach ($actualites as $item): ?>
            <?php if (!empty($item['image'])): ?>
            <img src="<?= base_url('uploads/actualites/' . $item['image']); ?>" alt="<?= esc($item['titre']) ?>"
                class="img-card" />
            <?php endif; ?>

            <div class="news-content">

                <h5><?= esc($item['titre']); ?></h5>

                <p class="small text-muted">
                    <i class="bi bi-calendar3"></i> Publié le <?= date('d/m/Y', strtotime($item['created_at'])); ?>
                </p>

                <?php if ($item['type'] === 'evenement' && !empty($item['date_evenement'])): ?>
                <p class="event-date">
                    <strong><i class="bi bi-geo-alt"></i> Événement le :
                        <?= date('d/m/Y', strtotime($item['date_evenement'])); ?></strong>
                </p>
                <?php endif; ?>

                <p><?= esc($item['description']); ?></p>
            </div>
            <?php endforeach; ?>
        </div>

        <h3 class="title-section">Nos Disciplines</h3>
        <div class="grid-dynamic"
            style="display: grid; grid-template-columns: repeat(<?= count($disciplines) ?>, 1fr); gap: 30px;">
            <?php foreach ($disciplines as $discipline): ?>
            <div class="card-item">
                <img src="<?= base_url('uploads/disciplines/' . $discipline['image']); ?>"
                    alt="<?= $discipline['nom'] ?>" class="img-card" />
                <h5><?= esc($discipline['nom']); ?></h5>
                <p><?= esc($discipline['description']); ?></p>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="banner-info mt-5">
            <div class="banner-content">
                <h4>Initiation : Tritons & Sirènes</h4>
                <p>Accueil dès 7 ans pour découvrir l'aisance aquatique avec palmes.</p>
            </div>
        </div>

        <h3 class="title-section">Nos Coachs</h3>
        <div class="grid-dynamic"
            style="display: grid; grid-template-columns: repeat(<?= count($coaches) ?>, 1fr); gap: 30px;">
            <?php foreach ($coaches as $coach): ?>
            <div class="coach-item">
                <img src="<?= base_url('uploads/personnel/' . $coach['photo']); ?>"
                    alt="Coach <?= esc($coach['nom']); ?>" class="img-circle" />
                <div class="coach-info">
                    <h4><?= esc($coach['nom']); ?></h4>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <h3 class="title-section">Lieux d'entraînement</h3>
        <div class="grid-dynamic"
            style="display: grid; grid-template-columns: repeat(<?= count($piscines) ?>, 1fr); gap: 30px;">
            <?php foreach ($piscines as $p): ?>
            <div class="piscine-card">
                <img src="<?= base_url('uploads/piscines/' . ($p['photo'] ?? 'default_piscine.jpg')) ?>"
                    class="img-card" />
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