<?php
require '../includes/db_connect.php';
require '../includes/header.php';

// Gestion simple d'ajout commentaire ou filtre si nécessaire
$stmt = $pdo->prepare("SELECT * FROM evenements ORDER BY date_event DESC");
$stmt->execute();
$events = $stmt->fetchAll();
?>
<h2>Événements</h2>

<?php if($events): ?>
  <div class="accordion" id="eventsAccordion">
  <?php foreach($events as $e): ?>
    <div class="accordion-item" id="event-<?= $e['id'] ?>">
      <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $e['id'] ?>">
          <?= htmlspecialchars($e['titre']) ?> — <?= date('d/m/Y H:i', strtotime($e['date_event'])) ?>
        </button>
      </h2>
      <div id="collapse<?= $e['id'] ?>" class="accordion-collapse collapse">
        <div class="accordion-body">
          <p><strong>Lieu :</strong> <?= htmlspecialchars($e['lieu']) ?></p>
          <p><?= nl2br(htmlspecialchars($e['description'])) ?></p>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  </div>
<?php else: ?>
  <p>Aucun événement</p>
<?php endif; ?>

<?php require '../includes/footer.php'; ?>
