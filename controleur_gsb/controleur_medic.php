<?php

if(!empty($_GET["idMed"])){
    $id = intval($_GET["idMed"]);
    $url = "http://localhost/gsb_projet/modele_gsb/modele_gsb.php?idMed='$id'";
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
    $url = "http://localhost/gsb_projet/modele_gsb/modele_gsb.php";
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

 ?>