<?php


class ControleurAdmin
{

    private $action;
    private $id;
    private $item;
    private $messageRetourAction = "";

    public function __construct()
    {

        // coder pour stocker les variable $_GET si elles existent dans les propriétés $action et $id

        if (isset($_GET["item"])) $this->item = $_GET["item"];
        if (isset($_GET["id"])) $this->id = $_GET["id"];
        if (isset($_GET["action"])) $this->action = $_GET["action"];

        if ($this->item == "livre" && $this->action == "ajouter") {
            $this->ajouterLivre();
            return;
        }

        if ($this->item == "livre" && $this->action == "modifier") {
            $this->modifierLivre();
            return;
        }

        if ($this->item == "livre" && $this->action == "supprimer") {
            $this->supprimerLivre();
            return;
        }

        if ($this->item == "auteur" && $this->action == "ajouter") {
            $this->ajouterAuteur();
            return;
        }

        if ($this->item == "auteur" && $this->action == "modifier") {
            $this->modifierAuteur();
            return;
        }

        if ($this->item == "auteur" && $this->action == "supprimer") {
            $this->supprimerAuteur();
            return;
        }

        if ($this->item == "auteur") {
            $this->getAuteurs();
            return;
        }

        if ($this->item == "livre") {
            $this->getLivres();
            return;
        }

        $this->getLivres();
    }

    /**
     * Affiche la page de liste des livres
     *
     */
    private function getLivres()
    {
        $reqPDO = new RequetesPDO();
        $livres = $reqPDO->getLivres();
        $auteurs = $reqPDO->getAuteurs();

        $messageRetourAction = $this->messageRetourAction;
        $this->messageRetourAction = "";
        $vue = new Vue(
            "AdminListeLivres",
            array('livres' => $livres, 'auteurs' => $auteurs, 'messageRetourAction' => $messageRetourAction),
            "gabaritAdmin"
        );
    }


    /**
     * Affiche la page de liste des auteurs
     *
     */
    private function getAuteurs()
    {

        $reqPDO = new RequetesPDO();
        $auteurs = $reqPDO->getAuteurs();
        $messageRetourAction = $this->messageRetourAction;
        $this->messageRetourAction = "";
        $vue = new Vue(
            "AdminListeAuteurs",
            array('auteurs' => $auteurs, 'messageRetourAction' => $messageRetourAction),
            "gabaritAdmin"
        );
    }

    /**
     * Ajout d'un auteur
     *
     */
    private function ajouterAuteur()
    {

        $reqPDO = new RequetesPDO();

        $auteurs = $reqPDO->getAuteurs();

        if (count($_POST) !== 0) {

            $oAuteur = new Auteur(...array_values($_POST));
            $erreurs = $oAuteur->erreurs;
            if (count($erreurs) === 0) {
                $lastInsertId = $reqPDO->ajouterAuteur($oAuteur->nom, $oAuteur->prenom);
                $this->messageRetourAction = "Ajout du auteur numéro $lastInsertId effectué.";
                $this->getAuteurs();
                exit;
            }
        } else {
            $erreurs = [];
            $oAuteur = new Auteur();
        }

        $vue = new Vue(
            "AdminAjoutAuteur",
            array('prenom' => $oAuteur->prenom, 'nom' => $oAuteur->nom, 'erreurs' => $erreurs),
            "gabaritAdmin"
        );
    }

    /**
     * Ajout d'un livre
     *
     */
    private function ajouterLivre()
    {

        $reqPDO = new RequetesPDO();

        $auteurs = $reqPDO->getAuteurs();

        if (count($_POST) !== 0) {

            $oLivre = new Livre(...array_values($_POST));
            $erreurs = $oLivre->erreurs;
            if (count($erreurs) === 0) {
                $lastInsertId = $reqPDO->ajouterLivre($oLivre->titre, $oLivre->id_auteur, $oLivre->annee);
                $this->messageRetourAction = "Ajout du livre numéro $lastInsertId effectué.";
                $this->getLivres();
                exit;
            }
        } else {
            $erreurs = [];
            $oLivre = new Livre();
        }

        $vue = new Vue(
            "AdminAjoutLivre",
            array('titre' => $oLivre->titre, 'auteurs' => $auteurs, 'auteur' => $oLivre->id_auteur, 'annee' => $oLivre->annee, 'erreurs' => $erreurs),
            "gabaritAdmin"
        );
    }

    /**
     * Modification d'un auteur
     *
     */
    private function modifierAuteur()
    {

        $reqPDO = new RequetesPDO();

        if (count($_POST) !== 0) {
            $oAuteur = new Auteur($_POST['nom'], $_POST['prenom']);
            $erreurs = $oAuteur->erreurs;
            if (count($erreurs) === 0) {
                $reqPDO->modifierAuteur($oAuteur->nom, $oAuteur->prenom, $this->id);
                $this->messageRetourAction = "Modification de l'auteur numéro $this->id effectuée.";
                $this->getAuteurs();
                exit;
            }
        } else {
            $erreurs = [];
            $auteur = $reqPDO->getAuteur($this->id);
            $oAuteur = new Auteur($auteur['nom'], $auteur['prenom']);
        }

        $vue = new Vue(
            "AdminModificationAuteur",
            array('id_auteur' => $this->id, 'nom' => $oAuteur->nom, 'prenom' => $oAuteur->prenom, 'erreurs' => $erreurs),
            "gabaritAdmin"
        );
    }

    /**
     * Modification d'un livre
     *
     */
    private function modifierLivre()
    {

        $reqPDO = new RequetesPDO();

        $auteurs = $reqPDO->getAuteurs();

        if (count($_POST) !== 0) {
            $oLivre = new Livre(...array_values($_POST));
            $erreurs = $oLivre->erreurs;
            if (count($erreurs) === 0) {
                $reqPDO->modifierLivre($oLivre->titre, $oLivre->id_auteur, $oLivre->annee, $this->id);
                $this->messageRetourAction = "Modification du livre numéro $this->id effectuée.";
                $this->getLivres();
                exit;
            }
        } else {
            $erreurs = [];
            $Livre = $reqPDO->getLivre($this->id);
            $oLivre = new Livre($Livre['titre'], $Livre['id_auteur'], $Livre['annee'], $Livre['id_livre']);
        }

        $vue = new Vue(
            "AdminModificationLivre",
            array('id_livre' => $this->id, 'titre' => $oLivre->titre, 'auteurs' => $auteurs, 'id_auteur' => $oLivre->id_auteur, 'annee' => $oLivre->annee, 'erreurs' => $erreurs),
            "gabaritAdmin"
        );
    }

    /**
     * Suppression d'un auteur
     *
     */
    private function supprimerAuteur()
    {

        $reqPDO = new RequetesPDO();
        $reqPDO->supprimerAuteur($this->id);
        $this->messageRetourAction = "Suppression de l'auteur numéro $this->id effectuée.";
        $this->getAuteurs();
    }

    /**
     * Suppression d'un livre
     *
     */
    private function supprimerLivre()
    {
        $reqPDO = new RequetesPDO();
        $reqPDO->supprimerLivre($this->id);
        $this->messageRetourAction = "Suppression du livre numéro $this->id effectuée.";
        $this->getLivres();
    }
}
