<?php

class Auteur {

    private $nom       = NULL;
    private $prenom    = NULL;

    private $erreurs = array();
    
    /**
     * Constructeur
     *
     */
    public function __construct($nom = NULL, $prenom = NULL) {
        $this->setNom($nom);
        $this->setPrenom($prenom);
    }

    /**
     * Accesseur magique d'une propriété de l'objet
     *
     * @return <type de la propriété>
     */     
    public function __get($prop) {
        return $this->$prop;
    }

    /**
     * Mutateur magique qui exécute le mutateur de la propriété en paramètre 
     *
     */   
    public function __set($prop, $val) {
        $setProperty = 'set'.ucfirst($prop);
        $this->$setProperty($val);
    }
    
    /**
     *   Setter nom
     */    
    public function setNom($nom = NULL) {
        unset($this->erreurs['nom']);
        $nom = trim($nom);
        $this->nom = ucwords(strtolower($nom));
        $regExp =
        '/^[a-zA-ZéèêëïôÉ]{2,}([- ][a-zA-ZéèêëïôÉ]{2,})*$/'; 
        if (!preg_match($regExp, $nom)) {
            $this->erreurs['nom'] =
              "Au moins 2 caractères alphabétiques";
        }
        return $this;
    }
    
    /**
     *   Setter prenom
     */    
    public function setPrenom($prenom = NULL) {
        unset($this->erreurs['prenom']);
        $prenom = trim($prenom);
        $this->prenom = ucwords(strtolower($prenom));
        $regExp =
        '/^[a-zA-ZéèêëïôÉ]{2,}([- ][a-zA-ZéèêëïôÉ]{2,})*$/';
        if (!preg_match($regExp, $prenom)) {
            $this->erreurs['prenom'] =
              "Au moins 2 caractères alphabétiquesc";
        }
        return $this;
    }
}