<?php
    // Correspondance entre le code technique et le texte à afficher
    $labels = [
        'actualite' => 'Actualité',
        'evenement' => 'Événement à venir',
        'annonce'   => 'Annonce officielle'
    ];
    
    // On récupère le label ou on affiche le type par défaut si non trouvé
    $labelText = $labels[$item['type']] ?? ucfirst($item['type']);
?>

<div class="card-item news-card">
    <?php if (!empty($item['image'])): ?>
    <img src="<?= base_url('uploads/actualites/' . $item['image']); ?>" alt="<?= esc($item['titre']) ?>"
        class="img-card" />
    <?php endif; ?>

    <div class="news-content">
        <span class="tag-status is-<?= $item['type']; ?>">
            <?= $labelText; ?>
        </span>

        <h5><?= esc($item['titre']); ?></h5>

        <p class="small text-muted">
            <i class="bi bi-calendar3"></i> Publié le <?= date('d/m/Y', strtotime($item['created_at'])); ?>
        </p>

        <?php if ($item['type'] === 'evenement' && !empty($item['date_evenement'])): ?>
        <p class="event-date">
            <strong><i class="bi bi-geo-alt"></i> Événement le :
                <?= date('d/m/Y', strtotime($item['date_evenement'])); ?></strong>
        </p>
        <?php endif; ?>

        <p><?= esc($item['description']); ?></p>

        <a href="<?= base_url('actualites/' . $item['slug']); ?>" class="btn-shop-link">
            Lire la suite <i class="bi bi-arrow-right"></i>
        </a>
    </div>
</div>