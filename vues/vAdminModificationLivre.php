<section id="ajout">
    <h1>Modification du livre <?= $titre ?></h1>
    <p><i>Pensez à ajouter ou modifier l'auteur au préalable.</i></p>
    <form method="POST" action="admin?item=livre&action=modifier&id=<?= $id_livre ?>">

        <label>Titre</label>
        <input type="text" name="titre" value="<?= $titre ?>">
        <p class="erreur"><?= isset($erreurs['titre']) ? $erreurs['titre'] : "&nbsp;" ?></p>

        <label>Auteur</label>
        <select name="id_auteur" id="auteur">
            <?php
            foreach ($auteurs as $auteur) : ?>
                <option value="<?= $auteur["id_auteur"] ?>" <?= $id_auteur == $auteur["id_auteur"] ? 'selected="selected"' : "" ?>><?= $auteur["auteur"] ?></option>
            <?php endforeach;
            ?>
        </select>
        <p class="erreur"><?= isset($erreurs['id_auteur']) ? $erreurs['id_auteur'] : "&nbsp" ?></p>

        <label>Année</label>
        <input type="number" name="annee" value="<?= $annee ?>">
        <p class="erreur"><?= isset($erreurs['annee']) ? $erreurs['annee'] : "&nbsp" ?></p>

        <input type="submit" name="Modifier" value="Modifier">

    </form>
</section>