<?php

$request_method = $_SERVER["REQUEST_METHOD"];

if(!empty($_GET["idAct"])){
    $id = intval($_GET["idAct"]);
    $url = "http://localhost/gsb_projet/modele_gsb/modele_activite.php?idAct='$id'";
    $options = array(
        "http"=> array(
            "header"=> "Content-Type: application/json/x-www-form-urlencoded\r\n",
            "method"=> "GET",
        ),
    );
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    require_once "../vue_gsb/activite.php";
}
else{
    $url = "http://localhost/gsb_projet/modele_gsb/modele_activite.php";
    $options = array(
        "http"=> array(
            "header"=> "Content-Type: application/json/x-www-form-urlencoded\r\n",
            "method"=> "GET",
        ),
    );
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    require_once "../vue_gsb/activites.php";
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_GET['action']) && $_GET['action'] === "ADD") {
    $id = $_POST["idAct"];
    $url = "http://localhost/gsb_projet/modele_gsb/modele_activite.php?action=ADD";

    $data = array(
        'nomU' => $_POST["nom"],
        'prenomU' => $_POST["prenom"],
        'emailU' => $_POST["email"],
        'idActivity' => $id,
    );

    $data_query = http_build_query($data);

    $options = array(
        'http' => array(
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
            'method' => "POST",
            'content' => $data_query,
        )
    );

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
}

        
   