<?php

class Controleur {

    public static $base_uri = "\/PWD3-TP2\/";
    
    private $controleurs = array(
    //  uri         => "classe du contrôleur"
        ""          => "ControleurAccueil",
        "livres"    => "ControleurLivres",
        "admin"     => "ControleurAdmin"
    ); 

    /**
     * Constructeur qui valide l'URI et instancie le controleur correspondant
     *
     */
    public function __construct() {
        try {
            // expression régulière pour analyser et récupérer
            // la partie variable de l'uri $_SERVER["REQUEST_URI"] sans le query string
            // et pour ensuite chercher dans le tableau $controleurs le contrôleur associé à cette uri 
            // par exemple:
            //   $_SERVER["REQUEST_URI"] contient /p41/tp2/livres?action=tri
            //   l'expression régulière va permettre d'extraire par preg_match
            //   dans $result[0] l'uri complète
            //   dans $result[1] "livres", soit la partie à droite de $base_uri et avant le query string
            //   dans $result[2]  le query string qui n'est pas exploité ici
            $regExp = '/^'.self::$base_uri.'([^\?]*)(\?.*)?$/';
            $requestUri = strtolower($_SERVER["REQUEST_URI"]);
            if (preg_match($regExp, $requestUri, $result)) {
                // var_dump($result); exit; // DEBUG P41
                foreach ($this->controleurs as $uri => $controleur) {
                    if ($uri == $result[1]) {
                        new $controleur;
                        exit;
                    }
                }
            }
            throw new exception ('URL non valide.');
        }
        catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    /**
     * Méthode qui affiche une page d'erreur
     *
     */
    private function erreur($msgErreur) {
        $vue = new Vue("Erreur", array('msgErreur' => $msgErreur), 'gabaritErreur');
    }
}