<?= $this->extend('l_global') ?>
<?= $this->section('contenu') ?>

<div class="site-container">
    <h2 class="title-section">Calendriers & Horaires</h2>

    <section class="mb-5">
        <h3><i class="bi bi-calendar3"></i> Planning des Entraînements</h3>
        <p class="txt-muted">Périodes scolaires et vacances.</p>


        <div class="grid-2">

            <?php foreach ($plannings as $planning): ?>
            <div class="calendar-img-box">
                <p class="label-cal">Planning <?= $planning['categorie'] ?></p>
                <img src="<?= base_url('uploads/calendriers/' . $planning['image']) ?>"
                    alt="Planning <?= $planning['categorie'] ?>" class="img-fluid img-zoom">
                <a href="<?= base_url('uploads/calendriers/' . $planning['image']) ?>" download class="btn-download">
                    <i class="bi bi-download"></i> Télécharger
                </a>
            </div>
            <?php endforeach; ?>


        </div>
    </section>

    <section class="mb-5">

        <h3><i class="bi bi-trophy"></i> Calendrier des compétitions</h3>
        <div class="calendar-img-box single">
            <img src="<?= base_url('uploads/calendriers/' . $calendrierCompet['image']) ?>"
                alt="Calendrier compétitions" class="img-fluid img-zoom">
            <a href="<?= base_url('uploads/calendriers/' . $calendrierCompet['image']) ?>" download
                class="btn-download">
                <i class="bi bi-download"></i> Télécharger le calendrier complet
            </a>
        </div>
    </section>
</div>

<?= $this->endSection() ?>