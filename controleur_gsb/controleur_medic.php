<?php

require_once "../modele_gsb/modele_gsb.php";

$request_method = $_SERVER["REQUEST_METHOD"];

switch($request_method){
    case 'GET':
        if(!empty($_GET["idMed"])){
            $id = intval($_GET["idMed"]);
            //récupérer un médicament
            getMedicament($id);
            getEffetsTherapeutiques($id);
            getEffetsSecondaires($id);
            $url = "http://localhost/gsb_projet/vue_gsb/test.php?idMed='$id'";
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
        else if(!empty($_GET["idEff"])){
            $id = intval($_GET["idEff"]);
            //récupérer un effet
            getEffetTherapeutique($id);
            getEffetSecondaire($id);
            $url = "http://localhost/gsb_projet/vue_gsb/test.php?idEff='$id'";
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
            //récupérer tous les médicaments
            getMedicaments();
            $url = "http://localhost/gsb_projet/vue_gsb/test.php";
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
        break;
    default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}