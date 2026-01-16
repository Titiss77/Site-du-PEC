<?= $this->extend('l_global') ?>
<?= $this->section('contenu') ?>
<div class="site-container">
    <h3 class="title-section">Nos Groupes & Tarifs 2026</h3>

    <div class="grid-responsive mb-5">
        <?php foreach ($groupes as $g): ?>

        <div class="card-item group-card h-100 d-flex flex-column">

            <?php if (!empty($g['image'])): ?>
            <div class="group-img-container">
                <img src="<?= base_url('uploads/groupes/' . esc($g['image'])); ?>" alt="<?= esc($g['nom']) ?>">
            </div>
            <?php endif; ?>

            <div class="group-header">
                <h4 class="group-title"><?= esc($g['nom']) ?></h4>
                <span class="group-price"><?= esc($g['prix']) ?>€</span>
            </div>

            <p class="group-desc">
                <?= esc($g['description']) ?>
            </p>

            <div class="group-footer mt-auto">
                <?php if (!empty($g['tranche_age'])): ?>
                <span class="tag-bassin"><i class="bi bi-person"></i> <?= esc($g['tranche_age']) ?></span>
                <?php endif; ?>

                <?php if (!empty($g['horaire_resume'])): ?>
                <span class="tag-bassin"><i class="bi bi-clock"></i> <?= esc($g['horaire_resume']) ?></span>
                <?php endif; ?>
            </div>

        </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection() ?>