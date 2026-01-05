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

        <h3><i class="bi bi-trophy"></i> Calendrier des compétitions <?= $calendrierCompet['date'] ?></h3>
        <div class="calendar-img-box single">
            <img src="<?= base_url('uploads/calendriers/' . $calendrierCompet['image']) ?>"
                alt="Calendrier compétitions" class="img-fluid img-zoom">
        </div>
    </section>
    <!-- Fin de section -->
</div>

<?= $this->endSection() ?>