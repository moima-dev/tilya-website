<?php
$host = 'localhost'; // ou l'hôte indiqué
$dbname = 'tilya_co_db'; // le nom exact de ta base
$user = 'tilya_user';
$pass = 'aAmO9Jzt@iv&ks48';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Connexion échouée : ' . $e->getMessage()]);
    exit;
}
?>