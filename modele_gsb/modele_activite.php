<?php

$servername = 'localhost';
$username = 'root';
$password ='';
$conn = new PDO("mysql:host=$servername;dbname=gsb_bd", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$request_method = $_SERVER["REQUEST_METHOD"];

switch($request_method){
    case 'GET':
        if(!empty($_GET["idAct"])){
            getActivity($_GET["idAct"]);
        }
        else{
            getActivities();
        }
        break;
    case 'POST':
        if (isset($_GET['action']) && $_GET['action'] === "ADD") {
            $data_query = file_get_contents('php://input');
            parse_str($data_query, $data);
            $nom = $data['nomU'];
            $prenom = $data['prenomU'];
            $email = $data['emailU'];
            $idActivity = $data['idActivity'];
        addUserToActivity($nom, $prenom, $email, $idActivity);
        break;}
    default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}

//récupérer toutes les activités
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
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
}

//récupérer une activité avec un id donné
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
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
}

//ajouter un utilisateur à une activité
function addUserToActivity($un_nom, $un_prenom, $un_email, $un_idAct){
    //connexion à la DB
    global $conn;

    //récupération de tous les utilisateurs qui ont le même emeail que celui en paramètres
    $checkUser = "SELECT * FROM utilisateurs WHERE _adresse_mail = '$un_email'";
    $response = array();
    $conn->query("SET NAMES utf8");
    $result = $conn->query($checkUser);
    $numRows = 0;
    //boucle qui compte le nombre de lignes
    while ($row = $result->fetch()) {
        $numRows++;
    }
    //si le nombre de lignes vaut 0, c'est que l'utilisateur n'existe pas, on va donc l'insérer
    if ($numRows===0) {
        $insertUser = 'INSERT INTO `utilisateurs` (`_id_utilisateur`, `prenom_utilisateur`, `_adresse_mail`, `_nom_utilisateur`) VALUES (NULL, "'.$un_prenom.'", "'.$un_email.'", "'.$un_nom.'")';
        $conn->query("SET NAMES utf8");
        $conn->query($insertUser);

        //on récupère le dernier id inséré grâce à une commande de php (PDO)
        $user_id = $conn->lastInsertId();
    } else {
        //si l'utilisateur existe on récupère son id dans $user_id
        $result->execute();
        $row = $result->fetch();
        $user_id = $row['_id_utilisateur'];
    }
    $result->closeCursor();

    //finalement on lie notre utilisateur à l'activité
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
    header("Content-Type: application/json");
    echo json_encode($response, JSON_PRETTY_PRINT);
}

?>