<?= $this->extend('l_global') ?>
<?= $this->section('contenu') ?>

<div class="site-container">

    <section class="hero-banner">
        <div class="hero-overlay">
            <h1 class="hero-title">Boutique & Matériel</h1>
        </div>
    </section>

    <h3 class="title-section">Boutiques du club</h3>

    <div class="grid-2">
        <?php foreach ($boutique as $item): ?>
        <div class="card-item shop-card-clean">
            <div class="shop-card-content">
                <h5><?= $item['nom'] ?></h5>
                <p class="txt-small"><?= $item['description'] ?></p>
                <div class="price-box">
                    <span class="price-value"><?= $item['tranchePrix'] ?></span>
                </div>
            </div>
            <a href="<?= $item['url'] ?>" target="_blank" class="btn-shop-link">
                Commander sur HelloAsso <i class="bi bi-arrow-right"></i>
            </a>
        </div>
        <?php endforeach; ?>
    </div>

    <h3 class="title-section">Bourse & Partenariats</h3>

    <div class="grid-2">
        <div class="card-item stats-box text-left">
            <h3><i class="bi bi-recycle"></i> Bourse aux matériels</h3>
            <p>Plateforme d'échange de matériel d'occasion entre les familles du club (palmes, tubas, masques).</p>
            <p class="txt-small"><em>L'accès est réservé aux adhérents du club.</em></p>
            <div class="mt-2">
                <a href="<?= base_url('uploads/docs/bourse_materiel.pdf') ?>" target="_blank" class="tag-bassin"
                    style="text-decoration:none;">
                    <i class="bi bi-file-earmark-pdf"></i> Consulter le listing
                </a>
            </div>
        </div>

        <div class="card-item text-left">
            <h3><i class="bi bi-shop"></i> Decathlon Pro Club</h3>
            <p>Profitez de notre partenariat pour vos achats d'équipement neuf.</p>
            <ul class="list-check">
                <li>Tarifs préférentiels club</li>
                <li>Cumul de points fidélité</li>
            </ul>
            <a href="https://partnership.decathlonpro.fr/invitation/e09bce41-329d-4072-b8df-e591fc24e1a2"
                target="_blank" class="color-blue" style="font-weight: bold; font-size: 0.9rem;">
                Accéder à la boutique Pro <i class="bi bi-box-arrow-up-right"></i>
            </a>
        </div>
    </div>

</div>

<?= $this->endSection() ?>