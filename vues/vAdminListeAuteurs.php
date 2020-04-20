<?php $this->titre = "Liste des auteurs"; ?>

<p class="messageRetourAction"><?= $messageRetourAction ?>&nbsp;</p>

<p><a href="admin?item=auteur&action=ajouter">Ajouter un auteur</a></p>

<table>
    <tr>
        <th>Id auteur</th>
        <th>Auteur</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($auteurs as $auteur): ?>
    <tr>
        <td><?= $auteur['id_auteur'] ?></td>
        <td><?= $auteur['auteur'] ?></td>
        <td>
            <a href="admin?item=auteur&id=<?= $auteur['id_auteur'] ?>&action=modifier">Modifier</a>
            <a href="admin?item=auteur&id=<?= $auteur['id_auteur'] ?>&action=supprimer">Supprimer</a>
        </td>
    </tr>
    <?php endforeach ?>
 
</table>