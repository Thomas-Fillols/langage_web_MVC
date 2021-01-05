<?php
    require 'Noyau/ChargementAuto.php';

    $conn = new PDO('mysql:host=localhost;dbname=test', 'root', '');

    $_urlADecortiquer = isset($_GET['url']) ? $_GET['url'] : null;
    $_postParams = isset($_POST) ? $_POST : null;


    Vue::ouvrirTampon();

    try {
        $O_controleur = new Controleur($_urlADecortiquer, $_postParams, $conn);
        $O_controleur->executer();

    }catch (ControleurException $e) {
        echo ("Une erreur s'est produite." . $e->getMessage());

    }

    $contenuPourAffichage = Vue::recupererContenuTampon();


    Vue::montrer('gabarit', array('body' => $contenuPourAffichage));