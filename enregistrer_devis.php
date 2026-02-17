<?php
require_once 'db_config.php';
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

$nom = $data['nom'];
$prenom = $data['prenom'];
$telephone = $data['phone'];
$email = $data['email'];
$prestation = $data['service'];
$message = $data['message'];
$ip = $_SERVER['REMOTE_ADDR'];
$date = date('Y-m-d H:i:s');

$sql = "INSERT INTO devis_carrosserie (nom, prenom, telephone, email, prestation, message, date_soumission, ip_address) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$nom, $prenom, $telephone, $email, $prestation, $message, $date, $ip]);

echo json_encode(['success' => true]);
?>