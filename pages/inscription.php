<?php
require '../includes/db_connect.php';
require '../includes/header.php';

$errors = [];
$success = false;

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom'] ?? '');
    $prenom = trim($_POST['prenom'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $date_naissance = $_POST['date_naissance'] ?? null;

    if(!$nom || !$prenom) $errors[] = "Nom et prénom requis.";
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Email invalide.";
    if(strlen($password) < 6) $errors[] = "Mot de passe au moins 6 caractères.";

    if(empty($errors)) {
        // vérifier si email existe
        $stmt = $pdo->prepare("SELECT id FROM membres WHERE email = ?");
        $stmt->execute([$email]);
        if($stmt->fetch()) {
            $errors[] = "Email déjà utilisé.";
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO membres (nom,prenom,email,password,date_naissance) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$nom, $prenom, $email, $hash, $date_naissance]);
            $success = true;
        }
    }
}
?>

<h2>Inscription</h2>

<?php if($success): ?>
  <div class="alert alert-success">Inscription réussie. <a href="/pages/connexion.php">Connectez-vous</a></div>
<?php else: ?>
  <?php foreach($errors as $err) echo "<div class='alert alert-danger'>".htmlspecialchars($err)."</div>"; ?>
  <form method="post">
    <div class="mb-3"><label>Prénom</label><input class="form-control" name="prenom" required></div>
    <div class="mb-3"><label>Nom</label><input class="form-control" name="nom" required></div>
    <div class="mb-3"><label>Email</label><input class="form-control" name="email" type="email" required></div>
    <div class="mb-3"><label>Mot de passe</label><input class="form-control" name="password" type="password" required></div>
    <div class="mb-3"><label>Date de naissance</label><input class="form-control" name="date_naissance" type="date"></div>
    <button class="btn btn-primary">S'inscrire</button>
  </form>
<?php endif; ?>

<?php require '../includes/footer.php'; ?>
