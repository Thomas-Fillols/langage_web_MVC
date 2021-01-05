<?php

final class ModeleTP1
{
    private $nbPersonneMax;
    private $liste;

    public function __construct(PDO $pdo)
    {
        $file = 'json/etudiant.json';
        $data = file_get_contents($file);
        $obj = json_decode($data);
        foreach ($obj->etudiant as $etudiant) {
            $this->liste[] = $etudiant;
        }
        shuffle($this->liste);
    }


    public function getListeEtudiant() {
        return $this->liste;
    }

    public function getNbPersonneMax() {
        return $this->nbPersonneMax;
    }

    public function setNbPersonneMax($nbPersonneMax)
    {
        $this->nbPersonneMax = $nbPersonneMax;
    }
}