<?php
require '../includes/db_connect.php';
session_start();
if(!isset($_SESSION['admin_id'])) { header('Location: login.php'); exit; }
require '../includes/header.php';

// suppression
if(isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM membres WHERE id = ?");
    $stmt->execute([$id]);
    echo "<div class='alert alert-success'>Membre supprimé</div>";
}

// liste
$stmt = $pdo->query("SELECT * FROM membres ORDER BY created_at DESC");
$membres = $stmt->fetchAll();
?>

<h2>Gérer les membres</h2>
<a class="btn btn-sm btn-primary mb-3" href="manage_membres.php?action=add">Ajouter un membre</a>

<?php if(isset($_GET['action']) && $_GET['action']=='add'): 
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $nom = $_POST['nom']; $prenom = $_POST['prenom']; $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $role = $_POST['role'];
        $pdo->prepare("INSERT INTO membres (nom,prenom,email,password,role) VALUES (?,?,?,?,?)")
            ->execute([$nom,$prenom,$email,$password,$role]);
        echo "<div class='alert alert-success'>Membre ajouté</div>";
    }
?>
  <form method="post">
    <div class="mb-3"><input name="prenom" class="form-control" placeholder="Prénom" required></div>
    <div class="mb-3"><input name="nom" class="form-control" placeholder="Nom" required></div>
    <div class="mb-3"><input name="email" class="form-control" placeholder="Email" required></div>
    <div class="mb-3"><input name="password" class="form-control" placeholder="Mot de passe" required></div>
    <div class="mb-3">
      <select name="role" class="form-select">
        <option value="membre">Membre</option>
        <option value="coach">Coach</option>
      </select>
    </div>
    <button class="btn btn-success">Ajouter</button>
  </form>
<?php else: ?>
  <table class="table">
    <thead><tr><th>Nom</th><th>Email</th><th>Role</th><th>Actions</th></tr></thead>
    <tbody>
    <?php foreach($membres as $m): ?>
      <tr>
        <td><?= htmlspecialchars($m['prenom'].' '.$m['nom']) ?></td>
        <td><?= htmlspecialchars($m['email']) ?></td>
        <td><?= $m['role'] ?></td>
        <td>
          <a class="btn btn-sm btn-warning" href="manage_membres.php?action=edit&id=<?= $m['id'] ?>">Éditer</a>
          <a class="btn btn-sm btn-danger" href="?delete=<?= $m['id'] ?>" onclick="return confirm('Supprimer?')">Supprimer</a>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
<?php endif; ?>

<?php require '../includes/footer.php'; ?>
