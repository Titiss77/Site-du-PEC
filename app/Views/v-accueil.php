<?= $this->extend('l-charte') ?>
<?= $this->Section('contenu') ?>

<div id="contenu">
    <section class="hero-home">
        <div class="hero-text">
            <h1>Bienvenue sur votre Gestionnaire AMFS</h1>
            <p>Aujourd'hui, nous sommes le <strong><?= date('d/m/Y') ?></strong>. Vous avez du pain sur la planche !</p>
        </div>
        <div class="hero-actions">
            <a href="<?= base_url('1') ?>" class="btn-primary">Commencer à regarder</a>
        </div>
    </section>

    <div class="stats-grid">
        <div class="stat-card">
            <span class="stat-icon">🎬</span>
            <div class="stat-info">
                <h3>Séries & Films</h3>
                <p>Retrouvez vos sorties préférées</p>
            </div>
        </div>
        <div class="stat-card">
            <span class="stat-icon">📖</span>
            <div class="stat-info">
                <h3>Mangas & Scans</h3>
                <p>Suivez vos lectures en cours</p>
            </div>
        </div>
        <div class="stat-card">
            <span class="stat-icon">🎮</span>
            <div class="stat-info">
                <h3>Outils</h3>
                <p>Vos liens utiles au quotidien</p>
            </div>
        </div>
    </div>

    <div class="shortcuts-section">
        <h2>Accès rapide par section</h2>
        <div class="shortcuts-container">
            <?php foreach ($lesHeaders as $header): ?>
            <a href="<?= base_url($header['id']) ?>" class="shortcut-link">
                <?= esc($header['libelle']) ?>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>