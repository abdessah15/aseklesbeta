<?php
session_start();
include 'config.php';  // Inclure la connexion à la base de données

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Récupérer l'utilisateur de la base de données
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            // Stocker le nom d'utilisateur dans la session
            $_SESSION['username'] = $username;
            header("Location: index.php");  // Rediriger vers la page d'accueil
            exit();
        } else {
            $message = "Mot de passe incorrect.";
        }
    } else {
        $message = "Nom d'utilisateur non trouvé.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #1c1c1c; color: #fff; }
        .container { width: 300px; margin: 100px auto; }
        input[type="text"], input[type="password"] { width: 100%; padding: 10px; margin: 10px 0; }
        input[type="submit"] { background-color: #e50914; color: white; padding: 10px; border: none; cursor: pointer; width: 100%; }
        input[type="submit"]:hover { background-color: #a10000; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Connexion</h2>
        <form method="POST" action="login.php">
            <input type="text" name="username" placeholder="Nom d'utilisateur" required>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <input type="submit" value="Se connecter">
        </form>
        <p><?php echo $message; ?></p>
    </div>
</body>
</html>
