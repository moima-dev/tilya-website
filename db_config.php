<?php
$host = 'localhost';
$dbname = 'tilya_db';
$user = 'root';      // Utilisateur par défaut de XAMPP
$pass = '';          // Mot de passe vide par défaut

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Connexion échouée : ' . $e->getMessage()]);
    exit;
}
?>