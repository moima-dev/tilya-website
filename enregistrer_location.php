<?php
require_once 'db_config.php';
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

$nom_prenom = $data['name'];
$telephone = $data['phone'];
$email = $data['email'];
$date_depart = $data['startDate'];
$date_retour = $data['endDate'];
$heure_depart = $data['startTime'];
$point_depart = $data['startPoint'];
$destination = $data['destination'];
$ip = $_SERVER['REMOTE_ADDR'];
$date_soumission = date('Y-m-d H:i:s');

$sql = "INSERT INTO location (nom_prenom, telephone, email, date_depart, date_retour, heure_depart, point_depart, destination, date_soumission, ip_address) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$nom_prenom, $telephone, $email, $date_depart, $date_retour, $heure_depart, $point_depart, $destination, $date_soumission, $ip]);

echo json_encode(['success' => true]);
?>