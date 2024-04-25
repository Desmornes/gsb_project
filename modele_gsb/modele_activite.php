<?php

// Connexion à la base de données
$servername = 'localhost';
$username = 'root';
$password ='';
$conn = new PDO("mysql:host=$servername;dbname=gsb_bd", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Récupération de la méthode de requête HTTP
$request_method = $_SERVER["REQUEST_METHOD"];

// Traitement des différentes méthodes HTTP
switch($request_method){
    case 'GET':
        // Si un ID d'activité est fourni dans la requête GET, récupérer cette activité
        if(!empty($_GET["idAct"])){
            getActivity($_GET["idAct"]);
        }
        // Sinon, récupérer toutes les activités
        else{
            getActivities();
        }
        break;
    case 'POST':
        // Si la méthode est POST et l'action est "ADD", ajouter un utilisateur à une activité
        if (isset($_GET['action']) && $_GET['action'] === "ADD") {
            // Récupération des données du formulaire
            $data_query = file_get_contents('php://input');
            parse_str($data_query, $data);
            $nom = $data['nomU'];
            $prenom = $data['prenomU'];
            $email = $data['emailU'];
            $idActivity = $data['idActivity'];
            // Appel de la fonction pour ajouter l'utilisateur à l'activité
            addUserToActivity($nom, $prenom, $email, $idActivity);
            break;
        }
    default:
        // Retourner une erreur si la méthode n'est pas autorisée
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}

// Fonction pour récupérer toutes les activités
function getActivities(){
    global $conn;
    $query = "SELECT * FROM activites";
    $response = array();
    $conn -> query("SET NAMES utf8");
    $result= $conn -> query($query);
    while($row = $result->fetch()){
        $response[] = $row;
    }
    $result->closeCursor();
    // Envoi de la réponse au format JSON
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
}

// Fonction pour récupérer une activité par son ID
function getActivity($id=0){
    global $conn;
    $query = 'SELECT * FROM activites';
    if($id!=0){
        $query .= ' WHERE _id_activite='.$id." LIMIT 1";
    }
    $conn->query("SET NAMES utf8");
    $result= $conn -> query($query);
    while($row = $result -> fetch()){
        $response[] = $row;
    }
    // Envoi de la réponse au format JSON
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
}

// Fonction pour ajouter un utilisateur à une activité
function addUserToActivity($un_nom, $un_prenom, $un_email, $un_idAct){
    // Connexion à la base de données
    global $conn;

    // Vérification si l'utilisateur existe déjà dans la base de données
    $checkUser = "SELECT * FROM utilisateurs WHERE _adresse_mail = '$un_email'";
    $response = array();
    $conn->query("SET NAMES utf8");
    $result = $conn->query($checkUser);
    $numRows = 0;
    while ($row = $result->fetch()) {
        $numRows++;
    }
    // Si l'utilisateur n'existe pas, l'insérer dans la base de données
    if ($numRows===0) {
        $insertUser = 'INSERT INTO `utilisateurs` (`_id_utilisateur`, `prenom_utilisateur`, `_adresse_mail`, `_nom_utilisateur`) VALUES (NULL, "'.$un_prenom.'", "'.$un_email.'", "'.$un_nom.'")';
        $conn->query("SET NAMES utf8");
        $conn->query($insertUser);
        $user_id = $conn->lastInsertId();
    } else {
        // Si l'utilisateur existe, récupérer son ID
        $result->execute();
        $row = $result->fetch();
        $user_id = $row['_id_utilisateur'];
    }
    $result->closeCursor();

    // Lier l'utilisateur à l'activité dans la table est_inscrit
    $linkedUserToActivity = 'INSERT INTO est_inscrit(_id_utilisateur, _id_activite) VALUES("'.$user_id.'", "'.$un_idAct.'")';
    $conn -> query("SET NAMES utf8");
    if($conn->query($linkedUserToActivity)){
        $response=array(
            "status"=> "success",
            "message"=> "User successfully added to activity.");
    }
    else{
        $response=array(
            "status" => 'error',
            "message" => 'Failed to add user to activity.');
    }
    // Envoi de la réponse au format JSON
    header("Content-Type: application/json");
    echo json_encode($response, JSON_PRETTY_PRINT);
}

?>
