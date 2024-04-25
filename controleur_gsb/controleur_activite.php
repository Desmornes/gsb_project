<?php

// Récupération de la méthode de requête HTTP
$request_method = $_SERVER["REQUEST_METHOD"];

// Vérification s'il y a un ID d'activité fourni dans la requête GET
if(!empty($_GET["idAct"])){
    // Conversion de l'ID en entier
    $id = intval($_GET["idAct"]);

    // Construction de l'URL pour récupérer une activité par son ID
    $url = "http://localhost/gsb_projet/modele_gsb/modele_activite.php?idAct='$id'";

    // Options de la requête HTTP
    $options = array(
        "http"=> array(
            "header"=> "Content-Type: application/json/x-www-form-urlencoded\r\n",
            "method"=> "GET",
        ),
    );

    // Création du contexte de la requête
    $context = stream_context_create($options);

    // Envoi de la requête pour récupérer les données de l'activité
    $result = file_get_contents($url, false, $context);

    // Inclusion de la vue pour afficher les détails de l'activité
    require_once "../vue_gsb/activite.php";
}
else{
    // Si aucun ID d'activité n'est fourni, récupérer toutes les activités

    // Construction de l'URL pour récupérer toutes les activités
    $url = "http://localhost/gsb_projet/modele_gsb/modele_activite.php";

    // Options de la requête HTTP
    $options = array(
        "http"=> array(
            "header"=> "Content-Type: application/json/x-www-form-urlencoded\r\n",
            "method"=> "GET",
        ),
    );

    // Création du contexte de la requête
    $context = stream_context_create($options);

    // Envoi de la requête pour récupérer toutes les activités
    $result = file_get_contents($url, false, $context);

    // Inclusion de la vue pour afficher la liste de toutes les activités
    require_once "../vue_gsb/activites.php";
}

// Vérification de la méthode de requête HTTP POST et de l'action "ADD"
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_GET['action']) && $_GET['action'] === "ADD") {
    // Récupération de l'ID de l'activité depuis les données POST
    $id = $_POST["idAct"];

    // Construction de l'URL pour ajouter un utilisateur à une activité
    $url = "http://localhost/gsb_projet/modele_gsb/modele_activite.php?action=ADD";

    // Données à envoyer dans la requête POST
    $data = array(
        'nomU' => $_POST["nom"],
        'prenomU' => $_POST["prenom"],
        'emailU' => $_POST["email"],
        'idActivity' => $id,
    );

    // Conversion des données en chaîne de requête
    $data_query = http_build_query($data);

    // Options de la requête HTTP
    $options = array(
        'http' => array(
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
            'method' => "POST",
            'content' => $data_query,
        )
    );

    // Création du contexte de la requête
    $context = stream_context_create($options);

    // Envoi de la requête pour ajouter un utilisateur à une activité
    $result = file_get_contents($url, false, $context);
}

?>
