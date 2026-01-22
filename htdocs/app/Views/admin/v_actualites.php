<?= $this->extend('l_global') ?>

<?= $this->section('contenu') ?>
<div class="deconnexion-section">
    <a href="<?= base_url('admin') ?>" class="admin-nav-link logout-btn">
        <i class="bi bi-box-arrow-right"></i> <span>Tableau de bord</span>
    </a>
</div>
<div class="site-container">
    <h3 class="title-section">Administration de l'actualités</h3>
</div>
<?= $this->endSection() ?>