<?php

include "modele_gsb/db_connect_gsb.php";
require_once "modele_gsb/modele_gsb.php";
$request_method = $_SERVER["REQUEST_METHOD"];

switch($request_method){
    case 'GET':
        if(!empty($_GET["idMed"])){
            $id = intval($_GET["idMed"]);
            //récupérer un médicament
            getMedicament($id);
            getEffetsTherapeutiques($id);
            getEffetsSecondaires($id);
        }
        else if(!empty($_GET["idEff"])){
            $id = intval($_GET["idEff"]);
            //récupérer un effet
            getEffetTherapeutique($id);
            getEffetSecondaire($id);
        }
        else{
            //récupérer tous les médicaments
            getMedicaments();
        }
        break;
    default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}