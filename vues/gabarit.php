<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo str_replace("\\", "", Controleur::$base_uri) ?>/styles/styles.css">
    <title><?php echo $titre ?></title>
</head>

<body>
    <div id="global">
        <header>
            <h1>Bibliothèque</h1>
            <nav>
                <ul>
                    <li><a class="<?php echo $this->vue === "Accueil" ? "active" : ""; ?>" href=".">Accueil</a></li>
                    <li><a class="<?php echo $this->vue === "Livres" ? "active" : ""; ?>" href="livres">Liste des livres</a></li>
                </ul>
            </nav>
        </header>
        <div id="contenu">
            <?php echo $contenu ?>
            <!-- contenu d'une vue spécifique -->
        </div>
        <footer>
        </footer>
    </div>
</body>

</html>