<?php
// includes/db_connect.php
// Connexion PDO - change les credentials selon ton XAMPP
$host = 'localhost';
$db   = 'club_natation';
$user = 'root';
$pass = ''; // sous XAMPP typiquement vide
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // Pour la prod, log et message général
    exit('Erreur connexion BDD : '.$e->getMessage());
}
