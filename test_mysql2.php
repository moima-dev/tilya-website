<?php
// Activer l'affichage des erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Informations de connexion (à ajuster si besoin)
$host = 'localhost';
$user = 'tilya-co.com_admin';
$pass = '#TiZ000Qyw';

// Tentative de connexion
$conn = new mysqli($host, $user, $pass);
if ($conn->connect_error) {
    die("Échec de connexion : " . $conn->connect_error);
} else {
    echo "Connexion MySQL réussie !";
}
$conn->close();
?>