<?= $this->extend('v-charte') ?>
<?= $this->Section('contenu') ?>
<div id="contenu">
    <?php foreach ($lesBillets as $billet) : ?>
    <div id="billet">
        <h2><?php echo anchor('/billet-'.$billet['id'], $billet['titre']);?></h2>
        <p><?= $billet['contenu']; ?></p>
        <time> <?= $billet['date']; ?></time>
    </div>
    <?php endforeach; ?>
</div><?= $this->endSection() ?>