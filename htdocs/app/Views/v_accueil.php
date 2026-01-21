<?= $this->extend('l_global') ?>

<?= $this->section('contenu') ?>

<div class="site-container">

    <section class="hero-banner full-bleed">
        <img src="<?= base_url('uploads/general/groupe.jpg') ?>" alt="Photo du club" loading="lazy" />

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
                        <p class="small">
                            <strong>Projet Sportif :</strong>
                            <?= esc($general['projetSportif'] ?? 'Compétition & Loisir'); ?>
                        </p>
                    </div>
                </div>
            </section>
        </div>

        <h3 class="title-section">Nos Groupes</h3>
        <div class="grid-responsive">
            <?php foreach ($groupes as $d): ?>
            <div class="card-item hover-effect" style="background:<?= esc($d['codeCouleur']) ?>;">
                <img src="<?= base_url('uploads/groupes/' . $d['image']); ?>" alt="<?= esc($d['nom']) ?>"
                    class="img-card" />
                <div class="p-3">
                    <h5><?= esc($d['nom']); ?></h5>
                    <p><?= esc($d['tranche_age']); ?></p>
                </div>
                <a href="<?= base_url('/groupes'); ?>" class="btn-shop-link">
                    Plus d'infos <i class="bi bi-arrow-right"></i>
                </a>
            </div>
            <?php endforeach; ?>
        </div>

        <h3 class="title-section">Actualités</h3>
        <div class="card-item news-card">
            <?php foreach ($actualites as $item): ?>

            <div class="news-item mb-4 border-bottom pb-3">

                <?php if (!empty($item['image'])): ?>

                <?php if (str_starts_with($item['image'], 'https://')): ?>
                <img src="<?= $item['image']; ?>" alt="<?= esc($item['titre']) ?>" class="img-card mb-3" />

                <?php else: ?>
                <img src="<?= base_url('uploads/actualites/' . $item['image']); ?>" alt="<?= esc($item['titre']) ?>"
                    class="img-card mb-3" />
                <?php endif; ?>
                <?php endif; ?>

                <div class="news-content">
                    <h5><?= esc($item['titre']); ?></h5>

                    <?php
                    $dateRef = $item['date_evenement'] ?? $item['created_at'];
                    $dateLabel = $item['date_evenement'] ? 'Le' : 'Publié le';
                    ?>

                    <p class="small text-muted">
                        <i class="bi bi-calendar3"></i> <?= $dateLabel ?> <?= date('d/m/Y', strtotime($dateRef)); ?>
                    </p>

                    <?php if ($item['type'] === 'evenement' && !empty($item['date_evenement'])): ?>
                    <p class="event-date text-primary">
                        <strong><i class="bi bi-geo-alt"></i> Événement à venir</strong>
                    </p>
                    <?php endif; ?>

                    <p><?= esc($item['description']); ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <h3 class="title-section">Nos Disciplines</h3>
        <div class="grid-responsive">
            <?php foreach ($disciplines as $d): ?>
            <div class="card-item hover-effect">
                <img src="<?= base_url('uploads/disciplines/' . $d['image']); ?>" alt="<?= esc($d['nom']) ?>"
                    class="img-card" />
                <div class="p-3">
                    <h5><?= esc($d['nom']); ?></h5>
                    <p><?= esc($d['description']); ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <h3 class="title-section">Nos Coachs</h3>
        <div class="grid-responsive">
            <?php foreach ($coaches as $c): ?>
            <div class="coach-item text-center p-3">
                <img src="<?= base_url('uploads/personnel/' . $c['photo']); ?>" alt="<?= esc($c['nom']); ?>"
                    class="img-circle mb-3" />
                <h4><?= esc($c['nom']); ?></h4>
            </div>
            <?php endforeach; ?>
        </div>

        <h3 class="title-section">Nos Coachs en formation</h3>
        <div class="grid-responsive">
            <?php foreach ($coachesForm as $c): ?>
            <div class="coach-item text-center p-3">
                <img src="<?= base_url('uploads/personnel/' . $c['photo']); ?>" alt="<?= esc($c['nom']); ?>"
                    class="img-circle mb-3" />
                <h4><?= esc($c['nom']); ?></h4>
            </div>
            <?php endforeach; ?>
        </div>

        <h3 class="title-section">Lieux d'entraînement</h3>
        <div class="grid-responsive">
            <?php foreach ($piscines as $p): ?>
            <div class="piscine-card card-item h-100 d-flex flex-column"> <img
                    src="<?= base_url('uploads/piscines/' . ($p['photo'] ?? 'default_piscine.jpg')) ?>"
                    alt="<?= esc($p['nom']) ?>" class="img-card" style="height: 200px; object-fit: cover;" />

                <div class="piscine-info p-3 d-flex flex-column flex-grow-1">
                    <h5><?= esc($p['nom']); ?></h5>

                    <?php
                    $adresseUrl = urlencode($p['adresse']);
                    $lienMaps = "https://www.google.com/maps/search/?api=1&query={$adresseUrl}";
                    ?>

                    <p class="mb-3">
                        <a href="<?= $lienMaps ?>" target="_blank" class="maps-link" title="Ouvrir dans Google Maps">
                            <i class="bi bi-geo-alt-fill"></i> <?= esc($p['adresse']); ?>
                        </a>
                    </p>

                    <div class="mt-auto">
                        <span class="tag-bassin">Bassin <?= esc($p['type_bassin'] ?? '25m'); ?></span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
    <!--
    <div class="partenaires">
        <h2 class="titre_section">Nos Partenaires</h2>

        <?php foreach ($partenaires as $partenaire): ?>
        <?php if (str_starts_with($partenaire['image_url'], 'https://')): ?>
        <a href="<?= $partenaire['site_web'] ?>" target="_blank">
            <img src="<?= $partenaire['image_url'] ?>" alt="<?= esc($partenaire['nom']) ?>">
        </a>

        <?php else: ?>
        <a href="<?= $partenaire['site_web'] ?>" target="_blank">
            <img src="<?= base_url('uploads/partenaires/' . $partenaire['image_url']); ?>"
                alt="<?= esc($partenaire['nom']) ?>">
        </a>
        <?php endif; ?>

        <?php endforeach; ?>
    </div>
        -->

</div>

<?= $this->endSection() ?>