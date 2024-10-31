<?php
$host = "localhost";  // Nom de l'hôte (peut être "127.0.0.1" ou "localhost")
$user = "root";       // Nom d'utilisateur de la base de données (généralement "root" lors du développement local)
$pass = "";           // Mot de passe de la base de données (laisser vide si vous utilisez XAMPP ou WAMP)
$dbname = "asekles";  // Nom de la base de données que vous allez utiliser

// Créer la connexion
$conn = new mysqli($host, $user, $pass, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}
?>
