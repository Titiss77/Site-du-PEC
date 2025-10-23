<?php
require '../includes/db_connect.php';
require '../includes/header.php';

// Requête pour lister résultats récents
$stmt = $pdo->prepare("
  SELECT r.*, e.titre AS event_title, m.nom, m.prenom
  FROM resultats r
  LEFT JOIN evenements e ON e.id = r.evenement_id
  LEFT JOIN membres m ON m.id = r.membre_id
  ORDER BY r.created_at DESC
  LIMIT 50
");
$stmt->execute();
$resultats = $stmt->fetchAll();
?>
<h2>Résultats</h2>
<table class="table table-striped">
  <thead><tr><th>Événement</th><th>Membre</th><th>Épreuve</th><th>Temps</th><th>Place</th><th>Ajouté le</th></tr></thead>
  <tbody>
    <?php foreach($resultats as $r): ?>
      <tr>
        <td><?= htmlspecialchars($r['event_title']) ?></td>
        <td><?= htmlspecialchars(($r['prenom'] ?? '') . ' ' . ($r['nom'] ?? '')) ?></td>
        <td><?= htmlspecialchars($r['epreuve']) ?></td>
        <td><?= htmlspecialchars($r['temps']) ?></td>
        <td><?= htmlspecialchars($r['place']) ?></td>
        <td><?= date('d/m/Y', strtotime($r['created_at'])) ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php require '../includes/footer.php'; ?>
