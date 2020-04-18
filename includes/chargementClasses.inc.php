<?php

function chargerClasse($classe)
{
    $dossiers = array('lib/', 'modeles/', 'vues/', 'controleurs/');
    foreach ($dossiers as $dossier) {
        $fichier = './' . $dossier . $classe . '.class.php';
        if (file_exists($fichier)) {
            require_once($fichier);
        }
    }
}

spl_autoload_register('chargerClasse');
