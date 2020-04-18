<?php

class ControleurLivres {

    public function __construct() {

        $this->getLivres();
    }

    /**
     * Affiche la page de liste des livres
     *
     */    
    private function getLivres() {
        
        $reqPDO = new RequetesPDO();
        $livres = $reqPDO->getLivres();
        $vue = new Vue("Livres", array('livres' => $livres));
    }
    
}