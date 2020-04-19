<?php $this->titre = "Liste des livres"; ?>

<!-- <pre><?= print_r($auteurs) ?></pre> -->

<div>
    <form action="" method="GET">
        <fieldset>
            <legend>Trier par : </legend>
            <label for="titre"><input name="trie" id="titre" value="titre" type="radio" <?= isset($_GET["trie"]) && $_GET["trie"] == "titre" ? "checked" : "" ?>> Titre</label>
            <label for="auteur"><input name="trie" id="auteur" value="id_auteur" type="radio" <?= isset($_GET["trie"]) && $_GET["trie"] == "id_auteur" ? "checked" : "" ?>> Auteur</label>
            <label for="annee"><input name="trie" id="annee" value="annee" type="radio" <?= isset($_GET["trie"]) && $_GET["trie"] == "annee" ? "checked" : "" ?>> Année</label>
            </label>
        </fieldset>
        <fieldset>
            <legend>Ordre : </legend>
            <label for="ASC"><input name="ordre" id="ASC" value="ASC" type="radio" <?= isset($_GET["ordre"]) && $_GET["ordre"] == "ASC"  ? "checked" : "" ?>> ASC</label>
            <label for="DESC"><input name="ordre" id="DESC" value="DESC" type="radio" <?= isset($_GET["ordre"]) && $_GET["ordre"] == "DESC" ? "checked" : "" ?>> DESC</label>
        </fieldset>
        <button type="submit">Rechercher !</button>
    </form>
</div>

<table>
    <tr>
        <th>Titre</th>
        <th>Auteur</th>
        <th>Année</th>
    </tr>

    <?php // foreach ($donnees['livres'] as $livre): // utilisation directe de $donnees 
    ?>

    <?php foreach ($livres as $livre) : // variable $livres provenant de la fonction extract($donnees) 
    ?>
        <tr>
            <?php // "affichage en utilisant le résultat de la fonction extract($donnees)" 
            ?>
            <td><?php echo $livre['titre'] ?></td>
            <?php foreach ($auteurs as $auteur) :
                if ($auteur['id_auteur'] == $livre['id_auteur']) : ?>
                    <td><?php echo $auteur["prenom"] . " " . $auteur["nom"] ?></td>
            <?php endif;
            endforeach; ?>
            <td><?php echo $livre['annee'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>