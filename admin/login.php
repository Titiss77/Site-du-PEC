<?php
require '../includes/db_connect.php';
session_start();
if(isset($_SESSION['admin_id'])) {
    header('Location: dashboard.php');
    exit;
}
$errors = [];
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ?");
    $stmt->execute([$username]);
    $admin = $stmt->fetch();

    if($admin && password_verify($password, $admin['password'])) {
        session_regenerate_id(true);
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_username'] = $admin['username'];
        header('Location: dashboard.php');
        exit;
    } else {
        $errors[] = "Identifiants incorrects.";
    }
}
?>
<!doctype html><html lang="fr"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head><body class="bg-light">
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-6">
      <h3>Admin Login</h3>
      <?php foreach($errors as $e) echo "<div class='alert alert-danger'>$e</div>"; ?>
      <form method="post">
        <div class="mb-3"><input class="form-control" name="username" placeholder="Nom d'utilisateur" required></div>
        <div class="mb-3"><input class="form-control" name="password" type="password" placeholder="Mot de passe" required></div>
        <button class="btn btn-primary">Se connecter</button>
      </form>
    </div>
  </div>
</div>
</body></html>
