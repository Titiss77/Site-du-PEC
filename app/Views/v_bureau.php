<?= $this->extend('l_global') ?>
<?= $this->section('contenu') ?>
<section class="trombi-container">
    <h1 class="text-center">Le Bureau</h1>

    <div class="trombi-grid">
        <?php if (!empty($membres)): ?>
        <?php foreach ($membres as $m): ?>
        <div class="trombi-card">
            <div class="photo-container">
                <img src="<?= base_url('uploads/personnel/' . esc($m['photo'])); ?>" alt="<?= esc($m['nom']); ?>">
            </div>
            <div class="info">
                <h3><?= esc($m['nom']); ?></h3>
                <p class="badge-fonction"><?= esc($m['fonctions']); ?></p>

                <div class="contact-links">
                    <a href="tel:<?= $m['numTel']; ?>"><i class="bi bi-telephone"></i></a>
                    <a href="mailto:<?= $m['mail']; ?>"><i class="bi bi-envelope"></i></a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
        <p>Aucun membre n'est enregistré pour le moment.</p>
        <?php endif; ?>
    </div>
</section>
<?= $this->endSection() ?>