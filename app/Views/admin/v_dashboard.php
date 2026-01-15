<?= $this->extend('l_global') ?>
<?= $this->section('contenu') ?>

<?php
// 1. Configuration des données : On centralise tout ici
// Cela rend l'ajout ou la modification de menus très rapide.
$sections = [
    [
        'titre' => 'Communication & Contenu',
        'icon'  => 'bi-megaphone',
        'cards' => [
            [
                'count' => $count['actualites'], // Variable dynamique
                'label' => 'Actualités',
                'desc'  => 'Articles',
                'icon'  => 'bi-newspaper',
                'url'   => 'admin/actualites',
                'btn'   => 'Gérer les contenus'
            ],
            [
                'count' => $count['boutique'],
                'label' => 'Boutique',
                'desc'  => 'Articles & Commandes HelloAsso',
                'icon'  => 'bi-cart4',
                'url'   => 'admin/boutique',
                'btn'   => 'Gérer la boutique'
            ]
        ]
    ],
    [
        'titre' => 'Sportif & Logistique',
        'icon'  => 'bi-water',
        'cards' => [
            [
                'count' => $count['membres'],
                'label' => 'Personnel',
                'desc'  => 'Bureau, Coachs & Fonctions',
                'icon'  => 'bi-people',
                'url'   => 'admin/membres',
                'btn'   => "Gérer l'équipe"
            ],
            [
                'label' => 'Calendriers', // Pas de count ici
                'desc'  => 'Entraînements & Compétitions',
                'icon'  => 'bi-calendar-range',
                'url'   => 'admin/plannings',
                'btn'   => 'Modifier horaires'
            ],
            [
                'label' => 'Lieux',
                'desc'  => "Piscines & Bassins d'entraînement",
                'icon'  => 'bi-geo-alt',
                'url'   => 'admin/piscines',
                'btn'   => 'Gérer les sites'
            ]
        ]
    ],
    [
        'titre' => 'Administration Système',
        'icon'  => 'bi-gear',
        'cards' => [
            [
                'label' => 'Tarifs',
                'desc'  => 'Adhésions & Cotisations 2026',
                'icon'  => 'bi-currency-euro',
                'url'   => 'admin/tarifs',
                'btn'   => 'Éditer les prix'
            ],
            [
                'label' => 'Matériel',
                'desc'  => 'Inventaire & Prêts de palmes',
                'icon'  => 'bi-tools',
                'url'   => 'admin/materiel',
                'btn'   => 'Gérer le stock'
            ],
            [
                'label' => 'Identité',
                'desc'  => 'Configuration générale du club',
                'icon'  => 'bi-sliders',
                'url'   => 'admin/general',
                'btn'   => 'Modifier les infos'
            ]
        ]
    ]
];
?>

<div class="site-container">

    <?php foreach ($sections as $section): ?>

    <h3 class="admin-subtitle">
        <i class="bi <?= $section['icon'] ?>"></i> <?= esc($section['titre']) ?>
    </h3>

    <div class="grid-3 mb-5">
        <?php foreach ($section['cards'] as $card): ?>
        <div class="card-item admin-nav-card">
            <div class="card-icon">
                <i class="bi <?= $card['icon'] ?>"></i>
            </div>

            <div class="card-info">
                <h4>
                    <?= isset($card['count']) ? esc($card['count']) . ' ' : '' ?>
                    <?= esc($card['label']) ?>
                </h4>
                <p><?= esc($card['desc']) ?></p>
            </div>

            <a href="<?= base_url($card['url']) ?>" class="btn-admin-nav">
                <?= esc($card['btn']) ?> <i class="bi bi-chevron-right"></i>
            </a>
        </div>
        <?php endforeach; ?>
    </div>

    <?php endforeach; ?>

</div>

<?= $this->endSection() ?>