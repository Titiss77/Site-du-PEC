<?= $this->extend('admin/l_admin') ?>
<?= $this->section('admin_contenu') ?>

<div class="site-container">
    <h2 class="title-section" style="margin-top: 0;">Bienvenue, <?= session()->get('nom') ?></h2>
    <div class="grid-3">
        <div class="card-item stats-box">
            <h4 class="color-blue"><?= $count['actualites'] ?></h4>
            <p>Actualités publiées</p>
            <a href="<?= base_url('admin/actualites') ?>" class="tag-bassin">Gérer</a>
        </div>

        <div class="card-item stats-box">
            <h4 class="color-blue"><?= $count['boutique'] ?></h4>
            <p>Articles en boutique</p>
            <a href="<?= base_url('admin/boutique') ?>" class="tag-bassin">Gérer</a>
        </div>

        <div class="card-item stats-box">
            <h4 class="color-blue"><?= $count['membres'] ?></h4>
            <p>Membres du Bureau</p>
            <a href="<?= base_url('admin/membres') ?>" class="tag-bassin">Gérer</a>
        </div>
    </div>

    <div class="card-item mt-4" style="text-align: left; margin-top:30px;">
        <h3><i class="bi bi-info-circle"></i> État du site</h3>
        <p>Le site <strong><?= esc($general['nomClub']) ?></strong> est actuellement en ligne. <br>Dernière
            synchronisation : <?= date('d/m/Y à H:i') ?></p>
    </div>
</div>

<?= $this->endSection() ?>