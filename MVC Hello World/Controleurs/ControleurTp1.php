<?php

final class ControleurTp1
{
    public function defautAction($pdo, $nbNombreMax) {

        if ($nbNombreMax) {

            $S_tp1 = new ModeleTP1($pdo);
            $S_tp1->setNbPersonneMax($nbNombreMax["nombreMax"]);

            Vue::montrer('php_tp1/afficher', array('nbPersonneMax' => $S_tp1->getNbPersonneMax(), 'listeEtudiant' => $S_tp1->getListeEtudiant()));

        } else {

            Vue::montrer('php_tp1/formulaire', array());

        }
    }
}