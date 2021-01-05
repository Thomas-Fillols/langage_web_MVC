<?php


class ControleurPdo
{
    public function defautAction() {
        Vue::montrer('pdo/formulaire', array());
    }

    public function affichageAction($pdo, $nbPersonne) {

        $S_pdo = new ModelePdo($pdo);
        $S_pdo->setNbPersonne($nbPersonne);
        $nbPersonne = $S_pdo->getNbPersonne();
        $conn = $S_pdo->getConn();

        $result = $nbPersonne['nbPersonne'];

        $pre = $conn->prepare("insert into NbPersonne(nbpersonne) values ($result)");
        $pre->execute();

        foreach ($conn->query("select * from NbPersonne") as $row) {
            Vue::montrer('pdo/afficher', array('pdo' => $row['nbpersonne']));
        }

    }
}