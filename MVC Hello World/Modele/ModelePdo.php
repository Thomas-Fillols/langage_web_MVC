<?php


class ModelePdo
{
    private $nbPersonne;
    private $conn;

    public function __construct(PDO $conn) {
        $this->conn = $conn;
    }

    /**
     * @return PDO
     */
    public function getConn()
    {
        return $this->conn;
    }

    /**
     * @return mixed
     */
    public function getNbPersonne()
    {
        return $this->nbPersonne;
    }

    /**
     * @param mixed $nbPersonne
     */
    public function setNbPersonne($nbPersonne)
    {
        $this->nbPersonne = $nbPersonne;
    }
}