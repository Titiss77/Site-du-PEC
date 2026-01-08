<?= $this->extend('admin/l_admin') ?>
<?= $this->section('admin_contenu') ?>

<div class="site-container">
    <div class="admin-header">
        <h2 class="title-section" style="margin-top: 0;">Tableau de Bord : <?= session()->get('nom') ?></h2>
        <div class="admin-user-pill">
            <i class="bi bi-person-circle"></i>
            <span>Administrateur</span>
        </div>
    </div>

    <h3 class="admin-subtitle"><i class="bi bi-megaphone"></i> Communication & Contenu</h3>
    <div class="grid-3 mb-5">
        <div class="card-item admin-nav-card">
            <div class="card-icon"><i class="bi bi-newspaper"></i></div>
            <div class="card-info">
                <h4><?= $count['actualites'] ?> Actualités</h4>
                <p>Articles, Événements & Annonces</p>
            </div>
            <a href="<?= base_url('admin/actualites') ?>" class="btn-admin-nav">Gérer les contenus <i
                    class="bi bi-chevron-right"></i></a>
        </div>

        <div class="card-item admin-nav-card">
            <div class="card-icon"><i class="bi bi-cart4"></i></div>
            <div class="card-info">
                <h4><?= $count['boutique'] ?> Boutique</h4>
                <p>Articles & Commandes HelloAsso</p>
            </div>
            <a href="<?= base_url('admin/boutique') ?>" class="btn-admin-nav">Gérer la boutique <i
                    class="bi bi-chevron-right"></i></a>
        </div>

        <div class="card-item admin-nav-card">
            <div class="card-icon"><i class="bi bi-envelope-check"></i></div>
            <div class="card-info">
                <h4>Messages</h4>
                <p>Historique des contacts vérifiés</p>
            </div>
            <a href="<?= base_url('admin/contacts') ?>" class="btn-admin-nav">Voir les messages <i
                    class="bi bi-chevron-right"></i></a>
        </div>
    </div>

    <h3 class="admin-subtitle"><i class="bi bi-water"></i> Sportif & Logistique</h3>
    <div class="grid-3 mb-5">
        <div class="card-item admin-nav-card">
            <div class="card-icon"><i class="bi bi-people"></i></div>
            <div class="card-info">
                <h4><?= $count['membres'] ?> Personnel</h4>
                <p>Bureau, Coachs & Fonctions</p>
            </div>
            <a href="<?= base_url('admin/membres') ?>" class="btn-admin-nav">Gérer l'équipe <i
                    class="bi bi-chevron-right"></i></a>
        </div>

        <div class="card-item admin-nav-card">
            <div class="card-icon"><i class="bi bi-calendar-range"></i></div>
            <div class="card-info">
                <h4>Calendriers</h4>
                <p>Entraînements & Compétitions</p>
            </div>
            <a href="<?= base_url('admin/plannings') ?>" class="btn-admin-nav">Modifier horaires <i
                    class="bi bi-chevron-right"></i></a>
        </div>

        <div class="card-item admin-nav-card">
            <div class="card-icon"><i class="bi bi-geo-alt"></i></div>
            <div class="card-info">
                <h4>Lieux</h4>
                <p>Piscines & Bassins d'entraînement</p>
            </div>
            <a href="<?= base_url('admin/piscines') ?>" class="btn-admin-nav">Gérer les sites <i
                    class="bi bi-chevron-right"></i></a>
        </div>
    </div>

    <h3 class="admin-subtitle"><i class="bi bi-gear"></i> Administration Système</h3>
    <div class="grid-3 mb-5">
        <div class="card-item admin-nav-card">
            <div class="card-icon"><i class="bi bi-currency-euro"></i></div>
            <div class="card-info">
                <h4>Tarifs</h4>
                <p>Adhésions & Cotisations 2026</p>
            </div>
            <a href="<?= base_url('admin/tarifs') ?>" class="btn-admin-nav">Éditer les prix <i
                    class="bi bi-chevron-right"></i></a>
        </div>

        <div class="card-item admin-nav-card">
            <div class="card-icon"><i class="bi bi-tools"></i></div>
            <div class="card-info">
                <h4>Matériel</h4>
                <p>Inventaire & Prêts de palmes</p>
            </div>
            <a href="<?= base_url('admin/materiel') ?>" class="btn-admin-nav">Gérer le stock <i
                    class="bi bi-chevron-right"></i></a>
        </div>

        <div class="card-item admin-nav-card">
            <div class="card-icon"><i class="bi bi-sliders"></i></div>
            <div class="card-info">
                <h4>Identité</h4>
                <p>Configuration générale du club</p>
            </div>
            <a href="<?= base_url('admin/general') ?>" class="btn-admin-nav">Modifier les infos <i
                    class="bi bi-chevron-right"></i></a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>