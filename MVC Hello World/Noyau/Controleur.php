<?php

final class Controleur
{
    private $_A_urlDecortique;
    private $_P_post;
    private $pdo;

    public function __construct ($S_controleur, $S_action, $pdo)
    {
        $this->pdo = $pdo;

        if (empty($S_controleur)) {
            $this->_A_urlDecortique['controleur'] = 'ControleurDefaut';
        } else {
            $this->_A_urlDecortique['controleur'] = 'Controleur' . ucfirst($S_controleur);
        }

        if (empty($S_action)) {
            $this->_A_urlDecortique['action'] = 'defautAction';
        } else {
            $this->_A_urlDecortique['action']  = $S_action['path'] . 'Action';
        }

        if (isset($S_action)) {
            $this->_P_post = $S_action;
        }
    }

    public function executer()
    {
        if (!class_exists($this->_A_urlDecortique["controleur"])) {
            throw new ControleurException($this->_A_urlDecortique["controleur"] . " n'est pas un controleur valide.");
        }

        if (!method_exists($this->_A_urlDecortique["controleur"], $this->_A_urlDecortique["action"])) {
            throw new ControleurException($this->_A_urlDecortique["action"] . " du controleur " . $this->_A_urlDecortique["controleur"] . " n'est pas une action valide.");
        }

        try {
            call_user_func_array(array(new $this->_A_urlDecortique['controleur'],
                $this->_A_urlDecortique['action']), array($this->pdo, $this->_P_post));
        } catch (ControleurException $e) {
            echo $e->getMessage();
        }

    }
}