<?= $this->extend('l_global') ?>
<?= $this->section('contenu') ?>

<?php
// 1. CONFIGURATION DES BLOCS "BOURSE & PARTENARIATS"
// On définit ici le contenu spécifique de chaque carte.
// Si vous devez ajouter un partenaire, il suffit d'ajouter une entrée ici.
$partenariats = [
    [
        'titre' => 'Bourse aux matériels',
        'icon'  => 'bi-recycle',
        'html'  => '<p>Plateforme d\'échange de matériel d\'occasion (palmes, tubas...).</p>
                    <p class="txt-small"><em>Réservé aux adhérents.</em></p>',
        'btn'   => [
            'text'  => 'Consulter le listing',
            'url'   => base_url('uploads/docs/bourse_materiel.pdf'),
            'icon'  => 'bi-file-earmark-pdf',
            'class' => 'tag-bassin text-decoration-none' // Style bouton gris arrondi
        ]
    ],
    [
        'titre' => 'Decathlon Pro Club',
        'icon'  => 'bi-shop',
        'html'  => '<p>Profitez de notre partenariat équipement neuf.</p>
                    <ul class="list-check">
                        <li>Tarifs préférentiels club</li>
                        <li>Cumul de points fidélité</li>
                    </ul>',
        'btn'   => [
            'text'  => 'Accéder à la boutique Pro',
            'url'   => 'https://partnership.decathlonpro.fr/invitation/e09bce41-329d-4072-b8df-e591fc24e1a2',
            'icon'  => 'bi-box-arrow-up-right',
            'class' => 'color-blue fw-bold small' // Style lien bleu simple
        ]
    ]
];
?>

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
                <h5><?= esc($item['nom']) ?></h5>
                <p class="txt-small"><?= esc($item['description']) ?></p>
                <div class="price-box">
                    <span class="price-value"><?= esc($item['tranchePrix']) ?></span>
                </div>
            </div>
            <a href="<?= esc($item['url']) ?>" target="_blank" class="btn-shop-link">
                Commander sur HelloAsso <i class="bi bi-arrow-right"></i>
            </a>
        </div>
        <?php endforeach; ?>
    </div>

    <h3 class="title-section">Bourse & Partenariats</h3>
    <div class="grid-2">
        <?php foreach ($partenariats as $p): ?>
        <div class="card-item text-left h-100">
            <h3><i class="bi <?= esc($p['icon']) ?>"></i> <?= esc($p['titre']) ?></h3>

            <div class="mb-3">
                <?= $p['html'] ?>
            </div>

            <div class="mt-auto"> <a href="<?= $p['btn']['url'] ?>" target="_blank"
                    class="<?= esc($p['btn']['class']) ?>">
                    <?php if (strpos($p['btn']['icon'], 'arrow-right') === false): ?>
                    <i class="bi <?= esc($p['btn']['icon']) ?>"></i>
                    <?php endif; ?>

                    <?= esc($p['btn']['text']) ?>

                    <?php if (strpos($p['btn']['icon'], 'arrow-right') !== false): ?>
                    <i class="bi <?= esc($p['btn']['icon']) ?>"></i>
                    <?php endif; ?>
                </a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

</div>

<?= $this->endSection() ?>