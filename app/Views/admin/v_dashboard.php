<?= $this->extend('l_global') ?>
<?php
/**
 * --------------------------------------------------------------------------
 * Section : Contenu Principal
 * --------------------------------------------------------------------------
 * Cette section injecte le contenu spécifique de la page dans le layout global.
 */
?>
<?= $this->section('contenu') ?>

<?php
/**
 * ==========================================================================
 * 1. CONFIGURATION DES DONNÉES (Pattern "Data-Driven")
 * ==========================================================================
 * Plutôt que d'écrire le code HTML plusieurs fois pour chaque carte,
 * nous définissons la structure des données dans un tableau PHP ($sections).
 * * AVANTAGES :
 * - Maintenance : Ajouter un menu se fait en une seule ligne.
 * - Lisibilité : On sépare la logique (données) de l'affichage (HTML).
 * - Scalabilité : Facile à modifier si on veut ajouter des permissions par rôle plus tard.
 */
$sections = [
    // --- SECTION 1 : COMMUNICATION ---
    [
        'titre' => 'Communication & Contenu',  // Titre affiché au-dessus du groupe de cartes
        'icon' => 'bi-megaphone',  // Classe de l'icône Bootstrap (<i>) pour le titre
        'cards' => [  // Liste des cartes de ce groupe
            [
                // 'count' : Variable dynamique passée par le Controller (ex: nombre d'articles).
                //           Si absente, rien ne s'affiche.
                'count' => $count['actualites'],
                'label' => 'Actualités',  // Titre principal de la carte
                'desc' => 'Articles',  // Petite description sous le titre
                'icon' => 'bi-newspaper',  // Icône illustrant la carte
                'url' => 'admin/actualites',  // Route pour le lien (sera traité par base_url())
                'btn' => 'Gérer les contenus'  // Texte du bouton d'action
            ],
            [
                'count' => $count['boutique'],
                'label' => 'Boutique',
                'desc' => 'Articles & Commandes HelloAsso',
                'icon' => 'bi-cart4',
                'url' => 'admin/boutique',
                'btn' => 'Gérer la boutique'
            ]
        ]
    ],
    // --- SECTION 2 : SPORTIF ---
    [
        'titre' => 'Sportif & Logistique',
        'icon' => 'bi-water',
        'cards' => [
            [
                'count' => $count['membres'],
                'label' => 'Personnel',
                'desc' => 'Bureau, Coachs & Fonctions',
                'icon' => 'bi-people',
                'url' => 'admin/membres',
                'btn' => "Gérer l'équipe"
            ],
            [
                // Note : Pas de clé 'count' ici, car ce n'est pas nécessaire pour les calendriers.
                'label' => 'Calendriers',
                'desc' => 'Entraînements & Compétitions',
                'icon' => 'bi-calendar-range',
                'url' => 'admin/plannings',
                'btn' => 'Modifier horaires'
            ],
            [
                'label' => 'Lieux',
                'desc' => "Piscines & Bassins d'entraînement",
                'icon' => 'bi-geo-alt',
                'url' => 'admin/piscines',
                'btn' => 'Gérer les sites'
            ]
        ]
    ],
    // --- SECTION 3 : ADMIN SYSTÈME ---
    [
        'titre' => 'Administration Système',
        'icon' => 'bi-gear',
        'cards' => [
            [
                'label' => 'Tarifs',
                'desc' => 'Adhésions & Cotisations 2026',
                'icon' => 'bi-currency-euro',
                'url' => 'admin/tarifs',
                'btn' => 'Éditer les prix'
            ],
            [
                'label' => 'Matériel',
                'desc' => 'Inventaire & Prêts de palmes',
                'icon' => 'bi-tools',
                'url' => 'admin/materiel',
                'btn' => 'Gérer le stock'
            ],
            [
                'label' => 'Identité',
                'desc' => 'Configuration générale du club',
                'icon' => 'bi-sliders',
                'url' => 'admin/general',
                'btn' => 'Modifier les infos'
            ]
        ]
    ]
];
?>

<div class="site-container">

    <?php
    // BOUCLE PRINCIPALE : Parcourt chaque grande section (Communication, Sportif, etc.)
    foreach ($sections as $section):
        ?>

    <h3 class="admin-subtitle">
        <i class="bi <?= esc($section['icon']) ?>"></i> <?= esc($section['titre']) ?>
    </h3>

    <div class="grid-3 mb-5">

        <?php
        // SOUS-BOUCLE : Parcourt chaque carte à l'intérieur de la section actuelle
        foreach ($section['cards'] as $card):
            ?>

        <div class="card-item admin-nav-card">
            <div class="card-icon">
                <i class="bi <?= $card['icon'] ?>"></i>
            </div>

            <div class="card-info">
                <h4>
                    <?php
                    // LOGIQUE CONDITIONNELLE :
                    // On vérifie si la clé 'count' existe et n'est pas nulle via isset().
                    // Si oui : on l'affiche suivi d'un espace.
                    // Si non : on n'affiche rien ('').
                    ?>
                    <?= isset($card['count']) ? esc($card['count']) . ' ' : '' ?>
                    <?= esc($card['label']) ?>
                </h4>
                <p><?= esc($card['desc']) ?></p>
            </div>

            <a href="<?= base_url($card['url']) ?>" class="btn-admin-nav">
                <?= esc($card['btn']) ?> <i class="bi bi-chevron-right"></i>
            </a>
        </div>
        <?php endforeach; // Fin de la boucle des cartes ?>

    </div>
    <?php endforeach; // Fin de la boucle des sections ?>

</div>

<?= $this->endSection() ?>