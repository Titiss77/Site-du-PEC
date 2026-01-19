<?= $this->extend('l_global') ?>

<?php

/**
 * ============================================================================
 * VUE : CALENDRIERS & HORAIRES
 * ============================================================================
 * Cette vue affiche les documents relatifs à l'organisation temporelle du club.
 * Elle se divise en deux sections distinctes :
 * 1. Les Plannings d'entraînements (images/jpg) : Vacances, Scolaire, etc.
 * 2. Le Calendrier des compétitions (fichier/pdf) : Liste des rencontres à télécharger.
 *
 * Les données ($plannings, $calendrierCompet) sont injectées par le contrôleur 'Home'.
 */
?>

<?= $this->section('contenu') ?>

<div class="site-container">
    <h2 class="title-section">Calendriers & Horaires</h2>

    <section class="mb-5">
        <h3><i class="bi bi-calendar3"></i> Planning des Entraînements</h3>

        <?php if (!empty($plannings)): ?>
        <p class="txt-muted">Pendant les vacances :</p>

        <div class="calendar-grid">

            <?php foreach ($plannings as $planning): ?>
            <?php if ($planning['categorie'] == 'vacances'): ?>
            <div class="calendar-img-box">

                <p class="label-cal">
                    <strong><?= esc($planning['categorie']) ?></strong> : <?= esc($planning['date']) ?>
                </p>

                <img src="<?= base_url('uploads/calendriers/' . $planning['image']) ?>"
                    alt="Planning <?= esc($planning['categorie']) ?>" class="img-fluid img-zoom" loading="lazy">
            </div>
            <?php endif; ?>
            <?php endforeach; ?>

        </div>

        <p class="txt-muted">Périodes scolaires :</p>

        <div class="calendar-grid">

            <?php foreach ($plannings as $planning): ?>
            <?php if ($planning['categorie'] == 'scolaire'): ?>
            <div class="calendar-img-box">

                <p class="label-cal">
                    <strong><?= esc($planning['categorie']) ?></strong> : <?= esc($planning['date']) ?>
                </p>

                <img src="<?= base_url('uploads/calendriers/' . $planning['image']) ?>"
                    alt="Planning <?= esc($planning['categorie']) ?>" class="img-fluid img-zoom" loading="lazy">
            </div>
            <?php endif; ?>
            <?php endforeach; ?>

        </div>

        <?php else: // Si aucun planning n'est trouvé en base de données ?>

        <div class="alert-info-box">
            <i class="bi bi-info-circle"></i> Aucun planning disponible pour le moment.
        </div>

        <?php endif; ?>
    </section>

    <section class="mb-5">
        <h3 class="title-section"><i class="bi bi-trophy"></i> Calendrier des compétitions</h3>

        <?php
        // VÉRIFICATION : Y a-t-il un calendrier de compétition publié ?
        if (!empty($calendrierCompet)):
            ?>

        <?php foreach ($calendrierCompet as $item): ?>
        <div class="card-item stats-box download-card">

            <div class="d-flex align-items-center gap-3">

                <div class="download-icon">
                    <i class="bi bi-file-earmark-pdf-fill"></i>
                </div>

                <div>
                    <h5 class="mb-1 text-primary">Saison <?= esc($item['date']) ?></h5>
                    <p class="txt-small mb-0 text-muted">Consultez les dates et lieux (Format PDF)</p>
                </div>
            </div>

            <a href="<?= base_url('uploads/calendriers/' . $item['image']) ?>" target="_blank"
                class="btn-home d-inline-flex align-items-center gap-2 text-decoration-none">
                <i class="bi bi-download"></i> Télécharger le calendrier
            </a>

        </div>
        <?php endforeach; ?>

        <?php else: // Si le calendrier compétition n'est pas encore prêt ?>

        <p class="text-muted">Le calendrier des compétitions sera bientôt mis en ligne.</p>

        <?php endif; ?>

    </section>
</div>

<?= $this->endSection() ?>