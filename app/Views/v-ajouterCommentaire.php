<?= $this->extend('v-charte') ?>
<?= $this->Section('contenu') ?>
<div id="confirmation">
    <h2>Merci <?= $auteur ?> pour votre commentaire, </h2>
    <p>Votre message: </p>
    <p id="message"><em><?= $message ?></em></p>
    <p>Votre message à été envoyé et est en attente de
        validation de la part des administrateurs.</p>
    <p><a href="<?= site_url('billet-'.$idBillet) ?>">Retourner au billet</a></p>
</div>
<?= $this->endSection() ?>