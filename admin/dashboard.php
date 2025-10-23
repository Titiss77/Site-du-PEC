<?php
require '../includes/db_connect.php';
session_start();
if(!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}
require '../includes/header.php';

// statistiques simples
$counts = [];
foreach(['membres','evenements','resultats','contacts','photos'] as $t){
    $c = $pdo->query("SELECT COUNT(*) as cnt FROM $t")->fetchColumn();
    $counts[$t] = $c;
}
?>

<h2>Tableau de bord</h2>
<div class="row">
  <div class="col-md-3"><div class="card p-3">Membres: <?= $counts['membres'] ?></div></div>
  <div class="col-md-3"><div class="card p-3">Événements: <?= $counts['evenements'] ?></div></div>
  <div class="col-md-3"><div class="card p-3">Résultats: <?= $counts['resultats'] ?></div></div>
  <div class="col-md-3"><div class="card p-3">Messages: <?= $counts['contacts'] ?></div></div>
</div>

<hr>
<div class="list-group">
  <a href="manage_membres.php" class="list-group-item list-group-item-action">Gérer les membres</a>
  <a href="manage_events.php" class="list-group-item list-group-item-action">Gérer les événements</a>
  <a href="manage_resultats.php" class="list-group-item list-group-item-action">Gérer les résultats</a>
  <a href="manage_photos.php" class="list-group-item list-group-item-action">Gérer la galerie</a>
  <a href="manage_contacts.php" class="list-group-item list-group-item-action">Messages contact</a>
  <a href="logout.php" class="list-group-item list-group-item-action text-danger">Se déconnecter</a>
</div>

<?php require '../includes/footer.php'; ?>
