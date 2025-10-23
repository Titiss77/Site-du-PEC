<?php
require '../includes/db_connect.php';
require '../includes/header.php';

$success = null;
$errors = [];

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $sujet = trim($_POST['sujet'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if(!$nom) $errors[] = "Nom requis.";
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email invalide.";
    if(!$message) $errors[] = "Message requis.";

    if(empty($errors)) {
        $stmt = $pdo->prepare("INSERT INTO contacts (nom,email,sujet,message) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nom, $email, $sujet, $message]);

        // Optionnel : envoi d'email (config à adapter)
        // mail('club@example.com', $sujet, $message, "From: $nom <$email>");

        $success = "Message envoyé, merci !";
    }
}
?>

<h2>Contact</h2>

<?php if($success) echo "<div class='alert alert-success'>$success</div>"; ?>
<?php foreach($errors as $err) echo "<div class='alert alert-danger'>".htmlspecialchars($err)."</div>"; ?>

<form method="post" novalidate>
  <div class="mb-3">
    <label>Nom</label>
    <input type="text" name="nom" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Sujet</label>
    <input type="text" name="sujet" class="form-control">
  </div>
  <div class="mb-3">
    <label>Message</label>
    <textarea name="message" class="form-control" rows="5" required></textarea>
  </div>
  <button class="btn btn-primary">Envoyer</button>
</form>

<?php require '../includes/footer.php'; ?>
