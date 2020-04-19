<?php

class RequetesPDO {
    
    public function getLivres($trie, $ordre) {
        try {
            $sPDO = SingletonPDO::getInstance();
            $sql = "SELECT * FROM livre ORDER BY $trie $ordre";
            $oPDOStatement = $sPDO->prepare($sql);
            $oPDOStatement->execute();
            $livres = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
            return $livres;
        } catch(PDOException $e) {
            throw $e;
        }
    }

    public function getAuteurs()
    {
        try {
            $sPDO = SingletonPDO::getInstance();
            $sql = "SELECT * FROM auteur";
            $oPDOStatement = $sPDO->prepare($sql);
            $oPDOStatement->execute();
            $auteurs = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
            return $auteurs;
        } catch(PDOException $e) {
            throw $e;
        }
    }
}