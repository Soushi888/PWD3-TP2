<section id="ajout">
    <h1>Ajouter un livre</h1>
    <p><i>*Pensez à ajouter l'auteur en premier ! :)</i></p>
    <form method="POST" action="admin?item=livre&action=ajouter">

        <label>Titre</label>
        <input type="text" name="titre" value="<?= $titre ?>">
        <p class="erreur"><?= isset($erreurs['titre']) ? $erreurs['titre'] : "&nbsp;" ?></p>

        <label>Auteur</label>
        <!-- <input type="number" name="id_auteur" value="<?= $id_auteur ?>"> -->
        <select name="id_auteur" id="auteur">
            <?php 
                foreach ($auteurs as $auteur) : ?>
                    <option value="<?= $auteur["id_auteur"]?>"><?= $auteur["auteur"] ?></option>
               <?php endforeach;
            ?>
        </select>
        <p class="erreur"><?= isset($erreurs['id_auteur']) ? $erreurs['id_auteur'] : "&nbsp" ?></p>

        <label>Annee</label>
        <input type="number" name="annee" value="<?= $annee ?>">
        <p class="erreur"><?= isset($erreurs['annee']) ? $erreurs['annee'] : "&nbsp" ?></p>
        
        <input type="submit" name="Envoyer" value="Envoyer">

    </form>
</section>