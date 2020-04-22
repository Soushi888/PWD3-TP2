<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/styles.css">
    <title><?= $titre ?></title>
</head>

<body>
    <div id="global">
        <header>
            <h1>Administration de la bibliothèque</h1>
            <ul>
                <li><a <?= isset($_GET["item"]) && $_GET["item"] == "auteur" ? 'class="active"' : "" ?>  href="admin?item=auteur">Auteurs</a></li>
                <li><a <?= !isset($_GET["item"]) || $_GET["item"] == "livre" ? 'class="active"' : "" ?>  href="admin?item=livre">Livres</a></li>
            </ul>
        </header>
        <div id="contenu">
            <?= $contenu ?>
            <!-- contenu d'une vue spécifique -->
        </div>
        <footer>
        </footer>
    </div>
</body>

</html>