<?= $this->extend('l_accueil') ?>
<?= $this->section('contenu') ?>

<div class="site-container">

    <section class="hero-banner">
        <img src="<?= base_url('uploads/general/groupe.jpg') ?>" alt="Photo de fin d'année du club de nage avec palmes"
            class="img-full-width img-rounded" />
        <div class="hero-overlay">
            <h1 class="hero-title">Palmes en Cornouailles</h1>
            <p class="hero-subtitle">La glisse à l'état pur à Quimper</p>
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
                    <p>Mixité : <?= esc($general['nombreHommes']); ?>H / <?= esc($general['nombreFemmes']); ?>F</p>
                    <hr>
                    <p class="txt-small">
                        <strong>Projet :</strong> <?= esc($general['projetSportif'] ?? 'Compétitions 2026'); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <h3 class="title-section">Nos Disciplines</h3>
    <div class="grid-3">
        <div class="card-item">
            <img src="<?= base_url('uploads/disciplines/monopalme.jpg') ?>" alt="Nageur en monopalme"
                class="img-card" />
            <i class="bi bi-water icon-main"></i>
            <h5>Monopalme</h5>
            <p>Vitesse et ondulations.</p>
        </div>
        <div class="card-item">
            <img src="<?= base_url('uploads/disciplines/bipalmes.jpg') ?>" alt="Nageur en bi-palmes" class="img-card" />
            <i class="bi bi-person-arms-up icon-main"></i>
            <h5>Bi-palmes</h5>
            <p>Technique et cardio.</p>
        </div>
        <div class="card-item">
            <img src="<?= base_url('uploads/disciplines/monopalme.jpg') ?>" alt="Apnéiste sous l'eau"
                class="img-card" />
            <i class="bi bi-wind icon-main"></i>
            <h5>Apnée</h5>
            <p>Maîtrise et relaxation.</p>
        </div>
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
            <p>Accueil dès 8 ans pour découvrir l'aisance aquatique avec palmes.</p>
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