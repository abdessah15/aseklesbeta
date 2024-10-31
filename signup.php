<?php
session_start();
include 'config.php';  // Inclure la connexion à la base de données

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Vérifier si le nom d'utilisateur existe déjà
    $check_query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($result) > 0) {
        $message = "Le nom d'utilisateur existe déjà. Choisissez un autre nom.";
    } else {
        // Insérer le nouvel utilisateur dans la base de données
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
        if (mysqli_query($conn, $sql)) {
            $message = "Compte créé avec succès ! Vous pouvez maintenant vous connecter.";
        } else {
            $message = "Une erreur s'est produite lors de la création du compte : " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
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
        <h2>Créer un compte</h2>
        <form method="POST" action="signup.php">
            <input type="text" name="username" placeholder="Nom d'utilisateur" required>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <input type="submit" value="S'inscrire">
        </form>
        <p><?php echo $message; ?></p>
    </div>
</body>
</html>
