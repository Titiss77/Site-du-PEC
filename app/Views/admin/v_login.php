<?= $this->extend('l_global') ?>
<?= $this->section('contenu') ?>
<div class="site-container" style="display:flex; justify-content:center; align-items:center; min-height:60vh;">
    <div class="card-item" style="width:100%; max-width:400px;">
        <h2 class="title-section">Connexion Admin</h2>

        <?php if(session()->getFlashdata('error')): ?>
        <div class="tag-status is-evenement" style="width:100%; margin-bottom:15px;">
            <?= session()->getFlashdata('error') ?>
        </div>
        <?php endif; ?>

        <form action="<?= base_url('login/auth') ?>" method="post">
            <div class="form-group">
                <input type="text" name="identifiant" placeholder="Identifiant" class="form-input" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Mot de passe" class="form-input" required>
            </div>
            <button type="submit" class="btn-home" style="width:100%">Se connecter</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>