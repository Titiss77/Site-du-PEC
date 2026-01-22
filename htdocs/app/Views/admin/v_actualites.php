<?= $this->extend('l_global') ?>

<?= $this->section('contenu') ?>
<div class="deconnexion-section">
    <a href="<?= base_url('admin') ?>" class="admin-nav-link logout-btn"
        onclick="return confirm('Voulez-vous vraiment vous déconnecter ?')">
        <i class="bi bi-box-arrow-right"></i> <span>Déconnexion</span>
    </a>
</div>
<div class="site-container">
    <h3 class="title-section">Administration de l'actualités</h3>
</div>
<?= $this->endSection() ?>