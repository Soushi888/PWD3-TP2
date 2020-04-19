<?php

class RequetesPDO {
    
    public function getLivres() {
        try {
            $sPDO = SingletonPDO::getInstance();
            $sql = "SELECT * FROM livre ORDER  BY annee ASC";
            $oPDOStatement = $sPDO->prepare($sql);
            $oPDOStatement->execute();
            $livres = $oPDOStatement->fetchAll(PDO::FETCH_ASSOC);
            return $livres;
        } catch(PDOException $e) {
            throw $e;
        }
    }
}