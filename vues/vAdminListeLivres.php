<?php $this->titre = "Liste des livres"; ?>

<p class="messageRetourAction"><?= $messageRetourAction ?>&nbsp;</p>

<p><a href="admin?item=livre&action=ajouter">Ajouter un livre</a></p>

<table>
    <tr>
        <th>Id livre</th>
        <th>livre</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($livres as $livre): ?>
    <tr>
        <td><?= $livre['id_livre'] ?></td>
        <td><?= $livre['titre'] ?></td>
        <td>
            <a href="admin?item=livre&id=<?= $livre['id_livre'] ?>&action=modifier">Modifier</a>
            <a href="admin?item=livre&id=<?= $livre['id_livre'] ?>&action=supprimer">Supprimer</a>
        </td>
    </tr>
    <?php endforeach ?>
 
</table>