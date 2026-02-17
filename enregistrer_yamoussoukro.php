<?php
require_once 'db_config.php';
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

$eleve_nom = $data['eleveNom'];
$eleve_prenom = $data['elevePrenom'];
$parent_nom = $data['parentNom'];
$parent_prenom = $data['parentPrenom'];
$parent_phone = $data['parentPhone'];
$parent_email = $data['parentEmail'] ?: null;
$lieu = $data['lieu'];
$ecole = $data['ecole'];
$ip = $_SERVER['REMOTE_ADDR'];
$date = date('Y-m-d H:i:s');

$sql = "INSERT INTO preinscriptions_yamoussoukro (eleve_nom, eleve_prenom, parent_nom, parent_prenom, parent_phone, parent_email, lieu_habitation, ecole, date_soumission, ip_address) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$eleve_nom, $eleve_prenom, $parent_nom, $parent_prenom, $parent_phone, $parent_email, $lieu, $ecole, $date, $ip]);

echo json_encode(['success' => true]);
?>