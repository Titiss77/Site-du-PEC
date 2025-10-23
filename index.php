<?php
require 'includes/db_connect.php';
require 'includes/header.php';

// récupérer les prochains événements
$stmt = $pdo->prepare("SELECT * FROM evenements WHERE date_event >= NOW() ORDER BY date_event ASC LIMIT 3");
$stmt->execute();
$evenements = $stmt->fetchAll();

// récupérer entraîneurs (role = coach)
$stmt2 = $pdo->prepare("SELECT id, nom, prenom FROM membres WHERE role = 'coach' LIMIT 4");
$stmt2->execute();
$coachs = $stmt2->fetchAll();
?>

<div class="jumbotron p-5 rounded bg-primary text-white">
  <h1>Bienvenue au ClubNatation</h1>
  <p class="lead">Passion, rigueur et convivialité — rejoignez-nous !</p>
  <a href="pages/inscription.php" class="btn btn-light">Rejoindre le club</a>
</div>

<div class="row">
  <div class="col-md-8">
    <h3>À venir</h3>
    <?php if($evenements): ?>
      <div class="list-group">
        <?php foreach($evenements as $e): ?>
          <a class="list-group-item list-group-item-action" href="pages/evenements.php#event-<?= $e['id'] ?>">
            <strong><?= htmlspecialchars($e['titre']) ?></strong>
            <div><?= date('d/m/Y H:i', strtotime($e['date_event'])) ?> — <?= htmlspecialchars($e['lieu']) ?></div>
          </a>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <p>Aucun événement programmé pour l'instant.</p>
    <?php endif; ?>
  </div>

  <div class="col-md-4">
    <h5>Nos entraîneurs</h5>
    <ul class="list-group">
      <?php foreach($coachs as $c): ?>
        <li class="list-group-item"><?= htmlspecialchars($c['prenom'] . ' ' . $c['nom']) ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>

<?php require 'includes/footer.php'; ?>
