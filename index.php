<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asekles</title>

    <!-- Favicon -->
    <link rel="icon" href="temp_segment_66d5163aa9dbf.png" type="image/png">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #1c1c1c; /* Fond sombre */
            color: #f1f1f1; /* Texte clair */
            padding-bottom: 60px; /* Espace réservé pour le pied de page */
        }

        header {
            background-color: #e50914; /* Rouge vif */
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }

        header h1 {
            margin: 0;
            font-size: 2.5em;
            color: #fff;
        }

        nav {
            display: flex;
            justify-content: center;
            padding: 10px;
            background-color: #333; /* Gris foncé */
        }

        nav a {
            color: #fff;
            margin: 0 15px;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .content {
            padding: 20px;
        }

        .movie-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .movie-item {
            background-color: #2a2a2a; /* Gris très foncé */
            padding: 15px;
            border-radius: 10px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .movie-item:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.6);
        }

        .movie-item img {
            width: 100%;
            border-radius: 10px;
        }

        .movie-item h3 {
            margin-top: 10px;
            font-size: 1.2em;
            color: #e50914; /* Rouge vif pour le titre */
            cursor: pointer;
        }

        .movie-item h3:hover {
            text-decoration: underline;
        }

        .download-button {
            display: inline-block;
            background-color: #e50914; /* Rouge vif */
            color: #fff; /* Couleur du texte */
            padding: 15px 30px; /* Taille du bouton */
            border-radius: 10px; /* Coins arrondis */
            text-decoration: none; /* Pas de soulignement */
            font-weight: bold; /* Texte en gras */
            text-align: center; /* Centrer le texte */
            font-size: 1.2em; /* Taille du texte */
            transition: background-color 0.3s ease; /* Transition pour le survol */
            margin: 20px 0; /* Marge au-dessus et en-dessous */
        }

        .download-button:hover {
            background-color: #a10000; /* Couleur au survol */
        }

        footer {
            background-color: #333; /* Gris foncé */
            color: #f1f1f1;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.5);
        }

        /* Ajoute un espace pour le pied de page */
        .footer-space {
            height: 60px;
        }
    </style>
</head>
<body>
    <?php
    session_start();
    if (isset($_SESSION['username'])) {
        echo "<p style='text-align: right; padding-right: 20px;'>Bienvenue, " . $_SESSION['username'] . " | <a href='logout.php' style='color: #fff;'>Déconnexion</a></p>";
    }
    ?>

    <header>
        <h1>ⵣ Asekles ⵣ</h1>
    </header>

    <nav>
        <a href="index.php">Accueil</a>
        <a href="films.php">Films</a>
        <a href="series.php">Séries</a>
        <a href="new.php">Nouveautés</a>   
        <?php
        if (!isset($_SESSION['username'])) {
            echo '<a href="login.php">Connexion</a>';
            echo '<a href="signup.php">S\'inscrire</a>';
        }
        ?>
    </nav>

    <div class="content">
        <h2>Recommandé pour vous</h2>
        <div class="movie-grid" id="movie-grid">
            <!-- Film 1 -->
            <div class="movie-item">
                <a href="film1.php">
                    <img src="Sans titre2.jpg" alt="Film 1">
                    <h3>Cirta</h3>
                </a>
            </div>
            <!-- Film 2 -->
            <div class="movie-item">
                <a href="film2.php">
                    <img src="Sans titre.jpg" alt="Film 2">
                    <h3>Amezruy n tmurt</h3>
                </a>
            </div>
            <!-- Film 3 -->
            <div class="movie-item">
                <a href="film3.php">
                    <img src="Sans titre3.jpg" alt="Film 3">
                    <h3>Tamacahut n Wakli</h3>
                </a>
            </div>
            <!-- Film 4 -->
            <div class="movie-item">
                <a href="film4.php">
                    <img src="Sans titre4.jpg" alt="Film 4">
                    <h3>Waɛli ak d tzizwit</h3>
                </a>
            </div>
            <!-- Film 5 -->
            <div class="movie-item">
                <a href="film5.php">
                    <img src="Sans titre5.jpg" alt="Film 5">
                    <h3>Zorro</h3>
                </a>
            </div>
        </div>

        <!-- Bouton de téléchargement de l'application -->
        <a class="download-button" href="https://drive.google.com/file/d/1xWQIGj-tCtTueZAnauw1717PzvE_uj8R/view?usp=sharing">Téléchargez l'application</a>
    </div>

    <!-- Ajoute un espace pour le pied de page -->
    <div class="footer-space"></div>

    <footer>
        <p>&copy; 2024 Asekles.com. Tous droits réservés.</p>
    </footer>

    <script>
        // Fonction pour mélanger les éléments de la grille
        function shuffleMovies() {
            const grid = document.getElementById('movie-grid');
            const movies = Array.from(grid.children);
            // Mélanger les films
            movies.sort(() => Math.random() - 0.5);
            // Vider la grille
            grid.innerHTML = '';
            // Ajouter les films dans le nouvel ordre
            movies.forEach(movie => grid.appendChild(movie));
        }

        // Mélanger les films au chargement de la page
        window.onload = shuffleMovies;
    </script>

</body>
</html>
