<?php


class Livre
{

    private $titre = NULL;
    private $id_auteur = NULL;
    private $annee = NULL;

    private $erreurs = array();

    /**
     * __construct
     *
     * @param  mixed $nom
     * @param  mixed $id_auteur
     * @return void
     */
    public function __construct($titre = NULL, $id_auteur = NULL, $annee = NULL)
    {
        $this->setTitre($titre);
        $this->setId_auteur($id_auteur);
        $this->setAnnee($annee);
    }

    /**
     * Accesseur magique d'une propriété de l'objet
     *
     * @return <type de la propriété>
     */
    public function __get($prop)
    {
        return $this->$prop;
    }

    /**
     * Mutateur magique qui exécute le mutateur de la propriété en paramètre 
     *
     */
    public function __set($prop, $val)
    {
        $setProperty = 'set' . ucfirst($prop);
        $this->$setProperty($val);
    }

    /**
     *   Setter titre
     */
    public function setTitre($titre = NULL)
    {
        unset($this->erreurs['titre']);
        $titre = trim($titre);
        $this->titre = ucwords($titre);
        $regExp =
            '/^[a-zA-ZéèêëïôÉ0-9 -\']{2,}$/';
        if (!preg_match($regExp, $titre)) {
            $this->erreurs['titre'] =
                "Au moins 2 caractères alphabétiques";
        }
        return $this;
    }

    /**
     *   Setter id_auteur
     */
    public function setId_auteur($id_auteur = NULL)
    {
        unset($this->erreurs['id_auteur']);
        $id_auteur = trim($id_auteur);
        $this->id_auteur = $id_auteur;
        if (!is_numeric($id_auteur)) {
            $this->erreurs['id_auteur'] =
                "L'id de l'id_auteur doit être numérique";
        }
        return $this;
    }

    /**
     *   Setter annee
     */
    public function setAnnee($annee = NULL)
    {
        unset($this->erreurs['annee']);
        $annee = trim($annee);
        $this->annee = ucwords(strtolower($annee));
        if (!is_numeric($annee) && mb_strlen($annee) == 4) {
            $this->erreurs['annee'] =
                "L'année doit comporter 4 chiffres";
        }
        return $this;
    }
}
