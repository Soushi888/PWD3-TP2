<?php

class RequetesPDO
{

    /**
     * Liste des livres dans la table livre
     *
     */
    public function getLivres()
    {
        $sPDO = SingletonPDO::getInstance();
        $sql = "SELECT * FROM livre ORDER  BY id_livre ASC";
        $oPDOStatement = $sPDO->prepare($sql);
        $oPDOStatement->execute();
        $livres = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
        return $livres;
    }

    /**
     * Liste des auteurs dans la table auteur
     *
     */
    public function getAuteurs()
    {
        $sPDO = SingletonPDO::getInstance();
        $oPDOStatement = $sPDO->prepare(
            "SELECT id_auteur,
             CONCAT(nom, ' ', prenom)  AS auteur
             FROM auteur ORDER  BY id_auteur DESC"
        );
        $oPDOStatement->execute();
        $auteurs = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
        return $auteurs;
    }

    /**
     * récupération d'un auteur dans la table auteur
     *
     */
    public function getAuteur($cle)
    {
        $sPDO = SingletonPDO::getInstance();
        $req = "SELECT id_auteur, nom, prenom FROM auteur WHERE id_auteur=:id_auteur";
        $oPDOStatement = $sPDO->prepare($req);
        $oPDOStatement->bindValue(":id_auteur", $cle);
        $oPDOStatement->execute();
        $auteur = $oPDOStatement->fetch(PDO::FETCH_ASSOC);
        return $auteur;
    }

    /**
     * Ajout d'un livre dans la table livre
     *
     */
    public function ajouterLivre($titre, $id_auteur, $annee)
    {
        $sPDO = SingletonPDO::getInstance();
        $req = "INSERT INTO livre SET titre=:titre, id_auteur=:id_auteur, annee=:annee";
        $oPDOStatement = $sPDO->prepare($req);
        $oPDOStatement->bindValue(":id_auteur", $id_auteur);
        $oPDOStatement->bindValue(":titre", $titre);
        $oPDOStatement->bindValue(":annee", $annee);
        $oPDOStatement->execute();
        return $sPDO->lastInsertId();
    }

    /**
     * Ajout d'un auteur dans la table auteur
     *
     */
    public function ajouterAuteur($nom, $prenom)
    {
        $sPDO = SingletonPDO::getInstance();
        $req = "INSERT INTO auteur SET nom=:nom, prenom=:prenom";
        $oPDOStatement = $sPDO->prepare($req);
        $oPDOStatement->bindValue(":nom", $nom);
        $oPDOStatement->bindValue(":prenom", $prenom);
        $oPDOStatement->execute();
        return $sPDO->lastInsertId();
    }

    /**
     * Modification d'un auteur dans la table auteur
     *
     */
    public function modifierAuteur($nom, $prenom, $cle)
    {
        $sPDO = SingletonPDO::getInstance();
        $req = "UPDATE auteur SET nom=:nom, prenom=:prenom WHERE id_auteur=:id_auteur";
        $oPDOStatement = $sPDO->prepare($req);
        $oPDOStatement->bindValue(":nom", $nom);
        $oPDOStatement->bindValue(":prenom", $prenom);
        $oPDOStatement->bindValue(":id_auteur", $cle);
        $oPDOStatement->execute();
    }

    /**
     * Suppression d'un auteur
     *
     */
    public function supprimerAuteur($cle)
    {
        $sPDO = SingletonPDO::getInstance();
        $req = "DELETE FROM auteur WHERE id_auteur=:id_auteur";
        $oPDOStatement = $sPDO->prepare($req);
        $oPDOStatement->bindValue(":id_auteur", $cle);
        $oPDOStatement->execute();
    }
}
