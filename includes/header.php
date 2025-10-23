<?php
// includes/header.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// petit helper pour afficher si admin connecté
function isAdmin() {
    return isset($_SESSION['admin_id']);
}
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Club de Natation</title>
  <!-- Bootstrap 5 CDN (ou copie locale si tu préfères) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/Site-du-PEC/assets/css/style.css">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
  <div class="container">
    <a class="navbar-brand text-primary" href="/Site-du-PEC/index.php">ClubNatation</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="/Site-du-PEC/index.php">Accueil</a></li>
        <li class="nav-item"><a class="nav-link" href="/Site-du-PEC/pages/evenements.php">Événements</a></li>
        <li class="nav-item"><a class="nav-link" href="/Site-du-PEC/pages/resultats.php">Résultats</a></li>
        <li class="nav-item"><a class="nav-link" href="/Site-du-PEC/pages/contact.php">Contact</a></li>
        <li class="nav-item"><a class="nav-link" href="/Site-du-PEC/assets/images/gallery.php">Galerie</a></li>
      </ul>
      <ul class="navbar-nav">
        <?php if(isset($_SESSION['membre_id'])): ?>
          <li class="nav-item"><a class="nav-link" href="/Site-du-PEC/pages/connexion.php?logout=1">Déconnexion</a></li>
        <?php else: ?>
          <li class="nav-item"><a class="nav-link" href="/Site-du-PEC/pages/inscription.php">Inscription</a></li>
          <li class="nav-item"><a class="nav-link" href="/Site-du-PEC/pages/connexion.php">Connexion</a></li>
        <?php endif; ?>
        <?php if(isAdmin()): ?>
          <li class="nav-item"><a class="nav-link btn btn-sm btn-primary text-white ms-2" href="/Site-du-PEC/admin/dashboard.php">Admin</a></li>
        <?php else: ?>
          <li class="nav-item"><a class="nav-link" href="/Site-du-PEC/admin/login.php">Admin</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<div class="container my-4">
