<?= $this->extend('l-connexion') ?>
<?= $this->Section('contenu') ?>

<div id="contenu">
    <section class="hero-home">
        <div class="hero-text">
            <h1>Accès au Gestionnaire AMFS</h1>
            <p>Veuillez vous identifier pour accéder à votre collection personnelle de contenus multimédias.</p>
        </div>
    </section>

    <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-error">
        <?= session()->getFlashdata('error') ?>
    </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
    <?php endif; ?>

    <div class="form-container">
        <form action="<?= base_url('login') ?>" method="post" class="dark-form">
            <?= csrf_field() ?>

            <div class="form-group">
                <label for="login">Nom d'utilisateur</label>
                <input type="text" name="login" id="login" required>
            </div>

            <div class="form-group">
                <label for="motDePasse">Mot de passe</label>
                <input type="password" name="motDePasse" id="motDePasse" required>
            </div>

            <div>
                <?= anchor('/register', 'Créer un compte'); ?>
            </div>

            <div class="form-actions" style="margin-top: 20px;">
                <button type="submit" class="btn-submit">Se connecter</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>