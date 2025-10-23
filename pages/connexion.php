<?php
require '../includes/db_connect.php';
require '../includes/header.php';

if(isset($_GET['logout']) && $_GET['logout']==1) {
    session_destroy();
    header('Location: /index.php');
    exit;
}

$errors = [];
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM membres WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if($user && password_verify($password, $user['password'])) {
        // Creation session membre
        session_regenerate_id(true);
        $_SESSION['membre_id'] = $user['id'];
        $_SESSION['membre_nom'] = $user['prenom'] . ' ' . $user['nom'];
        header('Location: /index.php');
        exit;
    } else {
        $errors[] = "Identifiants incorrects.";
    }
}
?>

<h2>Connexion</h2>
<?php foreach($errors as $e) echo "<div class='alert alert-danger'>".htmlspecialchars($e)."</div>"; ?>

<form method="post">
  <div class="mb-3"><label>Email</label><input class="form-control" name="email" type="email" required></div>
  <div class="mb-3"><label>Mot de passe</label><input class="form-control" name="password" type="password" required></div>
  <button class="btn btn-primary">Se connecter</button>
</form>

<?php require '../includes/footer.php'; ?>
