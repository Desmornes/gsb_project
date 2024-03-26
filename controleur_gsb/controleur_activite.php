<?php

require_once "../modele_gsb/modele_activite.php";

$request_method = $_SERVER["REQUEST_METHOD"];

switch($request_method){
    case 'GET':
        if(!empty($_GET["idAct"])){
            $id = intval($_GET["idAct"]);
            //récupérer une activité 
            getActivity($id);
            $url = "http://localhost/gsb_projet/vue_gsb/test.php?idAct='$id'";
            $options = array(
                "http"=> array(
                    "header"=> "Content-Type: application/json/x-www-form-urlencoded\r\n",
                    "method"=> "GET",
                ),
            );
            $context = stream_context_create($options);
            $result = file_get_contents($url, false, $context);
            require_once "../vue_gsb/test.php";
        }
        else{
            getActivities();
            $url = "http://localhost/gsb_projet/vue_gsb/test.php";
            $options = array(
                "http"=> array(
                    "header"=> "Content-Type: application/json/x-www-form-urlencoded\r\n",
                    "method"=> "GET",
                ),
            );
            $context = stream_context_create($options);
            $result = file_get_contents($url, false, $context);
            $string = substr($result, 1);
            $string_decode = json_decode($string, true);
            require_once "../vue_gsb/test.php";
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