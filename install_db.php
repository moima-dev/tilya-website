<?php
// Informations de connexion – à remplacer par les identifiants de TA base
$host = 'localhost'; // ou l'hôte indiqué dans Plesk
$dbname = 'tilya_co_db'; // le nom exact de ta base
$user = 'tilya_user';
$pass = 'aAmO9Jzt@iv&ks48';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connexion échouée : " . $e->getMessage());
}

$tables = [
    "preinscriptions_abidjan",
    "preinscriptions_yamoussoukro",
    "location",
    "devis_carrosserie"
];

// Vérifier si les tables existent déjà
$existingTables = [];
$result = $pdo->query("SHOW TABLES");
while ($row = $result->fetch(PDO::FETCH_NUM)) {
    $existingTables[] = $row[0];
}

// Créer les tables manquantes
if (!in_array('preinscriptions_abidjan', $existingTables)) {
    $sql = "CREATE TABLE preinscriptions_abidjan (
        id INT AUTO_INCREMENT PRIMARY KEY,
        eleve_nom VARCHAR(100) NOT NULL,
        eleve_prenom VARCHAR(100) NOT NULL,
        parent_nom VARCHAR(100) NOT NULL,
        parent_prenom VARCHAR(100) NOT NULL,
        parent_phone VARCHAR(20) NOT NULL,
        parent_email VARCHAR(255),
        lieu_habitation VARCHAR(255) NOT NULL,
        ecole VARCHAR(255) NOT NULL,
        date_soumission DATETIME NOT NULL,
        ip_address VARCHAR(45)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    $pdo->exec($sql);
    echo "✅ Table preinscriptions_abidjan créée.<br>";
} else {
    echo "⏩ Table preinscriptions_abidjan existe déjà.<br>";
}

if (!in_array('preinscriptions_yamoussoukro', $existingTables)) {
    $sql = "CREATE TABLE preinscriptions_yamoussoukro (
        id INT AUTO_INCREMENT PRIMARY KEY,
        eleve_nom VARCHAR(100) NOT NULL,
        eleve_prenom VARCHAR(100) NOT NULL,
        parent_nom VARCHAR(100) NOT NULL,
        parent_prenom VARCHAR(100) NOT NULL,
        parent_phone VARCHAR(20) NOT NULL,
        parent_email VARCHAR(255),
        lieu_habitation VARCHAR(255) NOT NULL,
        ecole VARCHAR(255) NOT NULL,
        date_soumission DATETIME NOT NULL,
        ip_address VARCHAR(45)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    $pdo->exec($sql);
    echo "✅ Table preinscriptions_yamoussoukro créée.<br>";
} else {
    echo "⏩ Table preinscriptions_yamoussoukro existe déjà.<br>";
}

if (!in_array('location', $existingTables)) {
    $sql = "CREATE TABLE location (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nom_prenom VARCHAR(255) NOT NULL,
        telephone VARCHAR(20) NOT NULL,
        email VARCHAR(255) NOT NULL,
        date_depart DATE NOT NULL,
        date_retour DATE NOT NULL,
        heure_depart TIME NOT NULL,
        point_depart VARCHAR(255) NOT NULL,
        destination VARCHAR(255) NOT NULL,
        date_soumission DATETIME NOT NULL,
        ip_address VARCHAR(45)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    $pdo->exec($sql);
    echo "✅ Table location créée.<br>";
} else {
    echo "⏩ Table location existe déjà.<br>";
}

if (!in_array('devis_carrosserie', $existingTables)) {
    $sql = "CREATE TABLE devis_carrosserie (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nom VARCHAR(100) NOT NULL,
        prenom VARCHAR(100) NOT NULL,
        telephone VARCHAR(20) NOT NULL,
        email VARCHAR(255) NOT NULL,
        prestation VARCHAR(255) NOT NULL,
        message TEXT NOT NULL,
        date_soumission DATETIME NOT NULL,
        ip_address VARCHAR(45)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    $pdo->exec($sql);
    echo "✅ Table devis_carrosserie créée.<br>";
} else {
    echo "⏩ Table devis_carrosserie existe déjà.<br>";
}

echo "<br>🎉 Installation terminée !";
?>