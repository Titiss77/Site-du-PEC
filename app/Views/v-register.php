<?= $this->extend('l-connexion') ?>
<?= $this->Section('contenu') ?>

<div id="contenu">
    <section class="hero-home">
        <div class="hero-text">
            <h1>Créer votre Compte AMFS</h1>
            <p>Rejoignez la communauté et commencez à gérer votre collection personnelle !</p>
        </div>
    </section>

    <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-error">
        <?= session()->getFlashdata('error') ?>
    </div>
    <?php endif; ?>

    <div class="form-container">
        <form action="<?= base_url('register') ?>" method="post" class="dark-form">
            <?= csrf_field() ?>

            <div class="form-grid">
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" name="prenom" id="prenom" value="<?= old('prenom') ?>" required>
                </div>

                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" id="nom" value="<?= old('nom') ?>" required>
                </div>
            </div>

            <div class="form-group">
                <label for="login">Nom d'utilisateur (Login)</label>
                <input type="text" name="login" id="login" value="<?= old('login') ?>" required>
            </div>

            <div class="form-group">
                <label for="motDePasse">Mot de passe</label>
                <input type="password" name="motDePasse" id="motDePasse" required>
            </div>

            <div class="form-group">
                <label for="confirm_motDePasse">Confirmer le mot de passe</label>
                <input type="password" name="confirm_motDePasse" id="confirm_motDePasse" required>
            </div>

            <div>
                <?= anchor('/login', 'J\'ai déjà un compte'); ?>
            </div>

            <div class="form-actions" style="margin-top: 20px;">
                <button type="submit" class="btn-submit">S'inscrire</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>