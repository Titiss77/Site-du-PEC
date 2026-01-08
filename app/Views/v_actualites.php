<?= $this->extend('l_global') ?>
<?= $this->section('contenu') ?>

<div class="site-container">

    <?= view('actualites/_section_news', [
        'title' => 'Actualités du Club',
        'items' => $actualites,
        'empty_msg' => 'Aucune actualité pour le moment.'
    ]) ?>

    <?= view('actualites/_section_news', [
        'title' => 'Événements du Club',
        'items' => $evenements,
        'empty_msg' => 'Aucun événement prévu prochainement.'
    ]) ?>

    <?= view('actualites/_section_news', [
        'title' => 'Annonces du Club',
        'items' => $annonces,
        'empty_msg' => 'Aucune annonce officielle.'
    ]) ?>

</div>

<?= $this->endSection() ?>