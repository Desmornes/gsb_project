<?php

include "modele_gsb\db_connect_gsb.php";
require_once "modele_gsb\modele_activite.php";

$request_method = $_SERVER["REQUEST_METHOD"];

switch($request_method){
    case 'GET':
        if(!empty($_GET["idAct"])){
            $id = intval($_GET["idAct"]);
            //récupérer une activité 
            getActivity($id);
        }
        else{
            //récupérer toutes les activités
            getActivities();
        }
        break;
    case "POST":
        //ajouter un utilisateur à une activité
        addUserToActivity();
        break;
    default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}