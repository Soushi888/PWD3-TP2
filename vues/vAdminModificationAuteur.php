<section id="modification"> 

    <h1>Modifier un auteur</h1>

    <form method="POST" action="admin?item=auteur&action=modifier&id=<?= $id_auteur ?>">

        <p>Id auteur : <?= $id_auteur ?></p>
        
        <label>Nom</label>
        <input name="nom" value="<?= $nom ?>">
        <p class="erreur"><?= isset($erreurs['nom']) ? $erreurs['nom'] : "&nbsp;" ?></p>

        <label>Prénom</label>
        <input name="prenom" value="<?= $prenom ?>">
        <p class="erreur"><?= isset($erreurs['prenom']) ? $erreurs['prenom'] : "&nbsp" ?></p>
        <input type="submit" name="Envoyer" value="Envoyer">

    </form>
</section>