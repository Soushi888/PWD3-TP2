<?php


class ControleurAdmin
{

    private $action;
    private $id;
    private $messageRetourAction = "";

    public function __construct()
    {

        // coder pour stocker les variable $_GET si elles existent dans les propriétés $action et $id
        if (isset($_GET["item"]) && $_GET['item'] = "auteur") {
            $this->getAuteurs();
            return;
        }


        // coder pour exécuter la méthode associée à la propriété $action (provenant du query string)


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
        $messageRetourAction = $this->messageRetourAction;
        $this->messageRetourAction = "";
        $vue = new Vue(
            "AdminListeLivres",
            array('livres' => $livres, 'messageRetourAction' => $messageRetourAction),
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

        if (count($_POST) !== 0) {
            // DEBUG var_dump($_POST); exit;
            // $oAuteur = new Auteur($_POST['nom'], $_POST['prenom']);
            $oAuteur = new Auteur(...array_values($_POST));
            $erreurs = $oAuteur->erreurs;
            if (count($erreurs) === 0) {
                $lastInsertId = $reqPDO->ajouterAuteur($oAuteur->nom, $oAuteur->prenom);
                $this->messageRetourAction = "Ajout de l'auteur numéro $lastInsertId effectué.";
                $this->getAuteurs();
                exit;
            }
        } else {
            $erreurs = [];
            $oAuteur = new Auteur();
        }

        $vue = new Vue(
            "AdminAjoutAuteur",
            array('nom' => $oAuteur->nom, 'prenom' => $oAuteur->prenom, 'erreurs' => $erreurs),
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
}
