<?php
// Informations de connexion MySQL
$host = 'localhost'; // souvent localhost, parfois un nom différent
$user = 'tilya-co.com_admin'; // ton utilisateur FTP (à essayer)
$pass = '#TiZ000Qyw'; // ton mot de passe FTP
$dbname = ''; // on ne sélectionne pas de base pour l'instant

$conn = new mysqli($host, $user, $pass);
if ($conn->connect_error) {
    die("Échec de connexion : " . $conn->connect_error);
} else {
    echo "Connexion MySQL réussie avec les identifiants FTP !";
}
$conn->close();
?>