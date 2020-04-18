<?php $this->titre = "Liste des livres"; ?>

<table>
    <tr>
        <th>Titre</th>
        <th>Auteur</th>
        <th>Année</th>
    </tr>

<?php // foreach ($donnees['livres'] as $livre): // utilisation directe de $donnees ?>

<?php foreach ($livres as $livre): // variable $livres provenant de la fonction extract($donnees) ?>
    <tr>
        <?php // "affichage en utilisant le résultat de la fonction extract($donnees)" ?>
        <td><?php echo $livre['titre'] ?></td>
        <td><?php echo $livre['auteur'] ?></td>
        <td><?php echo $livre['annee'] ?></td>
    </tr>
<?php endforeach; ?>
</table>