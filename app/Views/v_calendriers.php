<?= $this->extend('l_global') ?>
<?= $this->section('contenu') ?>

<div class="site-container">
    <h2 class="title-section">Calendriers & Horaires</h2>

    <!-- Section pour l'affichage des plannings d'entraînements -->
    <section class="mb-5">
        <h3><i class="bi bi-calendar3"></i> Planning des Entraînements</h3>
        <p class="txt-muted">Périodes scolaires et vacances.</p>


        <div class="grid-2">
            <?php foreach ($plannings as $planning): ?>
            <div class="calendar-img-box">
                <p class="label-cal"><?= $planning['categorie'] ?> <?= $planning['date'] ?></p>
                <img src="<?= base_url('uploads/calendriers/' . $planning['image']) ?>"
                    alt="Planning <?= $planning['categorie'] ?>" class="img-fluid img-zoom">
            </div>
            <?php endforeach; ?>


        </div>
    </section>
    <!-- Fin de section -->

    <!-- Section pour l'affichage du calendrier des compétitions -->
    <section class="mb-5">
        <h3 class="title-section"><i class="bi bi-trophy"></i> Calendrier des compétitions</h3>

        <?php foreach ($calendrierCompet as $item): ?>
        <div class="card-item stats-box d-flex align-items-center justify-content-between p-4">
            <div class="d-flex align-items-center gap-3">
                <div class="icon-circle bg-light"
                    style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; border-radius: 50%; background: #f0f4f8;">
                    <i class="bi bi-file-earmark-pdf-fill" style="font-size: 2rem; color: #dc3545;"></i>
                </div>
                <div>
                    <h5 class="mb-1" style="color: var(--primary);">Saison <?= $item['date'] ?></h5>
                    <p class="txt-small mb-0">Consultez les dates et lieux des prochaines rencontres (Format PDF)</p>
                </div>
            </div>

            <a href="<?= base_url('uploads/calendriers/' . $item['image']) ?>" target="_blank" class="btn-home"
                style="text-decoration:none; display: inline-flex; align-items:center; gap:8px;">
                <i class="bi bi-download"></i> Télécharger le calendrier
            </a>
        </div>
        <?php endforeach; ?>

    </section>
    <!-- Fin de section -->
</div>

<?= $this->endSection() ?>