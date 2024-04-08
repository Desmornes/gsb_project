<?php

$request_method = $_SERVER["REQUEST_METHOD"];

if(!empty($_GET["idAct"])){
    if(isset($_POST['action']) && $_POST['action'] === "ADD"){
        $url = "http://localhost/gsb_projet/modele_gsb/modele_activite.php?idAct='$id'";
        $data = array(
            "prenom_utilisateur"=> $_POST["prenom"],
            "_nom_utilisateur"=> $_POST["nom"],
            "_adresse_mail"=> $_POST["email"],
        );
        $options = array(
            'header' => "Content-Type: application/json/x-www-form-urlencoded\r\n",
            "method"=> "POST",
            "content"=> http_build_query($data),
        );
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        if($result === FALSE){
            echo "Error on : ". $url .". Couldn't add user to activity.";
        }
        return $result;
    }
    else{
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
    require_once "../vue_gsb/une_activite.php";
    }
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
    require_once "../vue_gsb/activites2.php";
}
        
   