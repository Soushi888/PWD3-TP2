<?php

class ControleurLivres
{

    public function __construct()
    {

        if (isset($_GET["trie"])) {
            $trie = $_GET["trie"];
        } else {
            $trie = "annee";
        }

        if (isset($_GET["ordre"])) {
            $ordre = $_GET["ordre"];
        } else {
            $ordre = "ASC";
        }

        $this->getLivres($trie, $ordre);
    }

    /**
     * Affiche la page de liste des livres
     *
     */
    private function getLivres($trie, $ordre)
    {
        $reqPDO = new RequetesPDO();
        
        $livres = $reqPDO->getLivres($trie, $ordre);
        $auteurs = $reqPDO->getAuteurs();

        $donnees = [
            'livres' => $livres,
            'auteurs' => $auteurs
        ];
        
        $vue = new Vue("Livres", $donnees);
    }
}