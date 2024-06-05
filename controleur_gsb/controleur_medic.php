<?php

// Récupération de la méthode de requête HTTP
$request_method = $_SERVER["REQUEST_METHOD"];

// Si un ID de médicament est fourni dans la requête GET
if(!empty($_GET["idMed"])){
    // Conversion de l'ID en entier
    $id = intval($_GET["idMed"]);

    // Construction de l'URL pour récupérer un médicament par son ID
    $url = "http://localhost/gsb_project/modele_gsb/modele_medic.php?idMed='$id'";

    // Options de la requête HTTP
    $options = array(
        "http"=> array(
            "header"=> "Content-Type: application/json/x-www-form-urlencoded\r\n",
            "method"=> "GET",
        ),
    );

    // Création du contexte de la requête
    $context = stream_context_create($options);

    // Envoi de la requête pour récupérer les données du médicament
    $result = file_get_contents($url, false, $context);

    // Inclusion de la vue pour afficher les détails du médicament
    require_once "../vue_gsb/medicament.php";
}
else{
    // Si aucun ID de médicament n'est fourni, récupérer tous les médicaments

    // Construction de l'URL pour récupérer tous les médicaments
    $url = "http://localhost/gsb_project/modele_gsb/modele_medic.php";

    // Options de la requête HTTP
    $options = array(
        "http"=> array(
            "header"=> "Content-Type: application/json/x-www-form-urlencoded\r\n",
            "method"=> "GET",
        ),
    );

    // Création du contexte de la requête
    $context = stream_context_create($options);

    // Envoi de la requête pour récupérer tous les médicaments
    $result = file_get_contents($url, false, $context);

    // Inclusion de la vue pour afficher la liste de tous les médicaments
    require_once "../vue_gsb/medicaments.php";
}

?>
