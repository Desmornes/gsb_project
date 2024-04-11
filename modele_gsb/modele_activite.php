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
    case "POST":
        addUserToActivity();
        break;
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
function addUserToActivity(){
    //TODO : le lier à l'activité si c'est pas déjà fait
    global $conn;
    // $user_id = $_POST["id_user"];
    $activity_id = $_GET["idAct"];
    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $mail = $_POST["email"];

    $checkUser = "SELECT * FROM utilisateurs WHERE _adresse_mail = '$mail'";
    $response = array();
    $conn->query("SET NAMES utf8");
    $result = $conn->query($checkUser);
    $numRows = 0;
    while ($row = $result->fetch()) {
        $numRows++;
    }
    if ($numRows===0) {
        //insertion de l'utilisateur s'il n'existe pas déjà
        $insertUser = 'INSERT INTO `utilisateurs` (`_id_utilisateur`, `prenom_utilisateur`, `_adresse_mail`, `_nom_utilisateur`) VALUES (NULL, "'.$prenom.'", "'.$mail.'", "'.$nom.'")';
        $conn->query("SET NAMES utf8");
        $conn->query($insertUser);

        $user_id = $conn->lastInsertId();
    } else {
        //si l'utilisateur existe on récupère son id dans $user_id
        $result->execute();
        $row = $result->fetch();
        $user_id = $row['_id_utilisateur'];
    }
    $result->closeCursor();
    //TODO : créer le user s'il existe pas déjà
    

    //TODO : récupérer l'id d'un user avec son email


    // $linkedUserToActivity = 'INSERT INTO est_inscrit(_id_utilisateur, _id_activite) VALUES("'.$user_id.'", "'.$activity_id.'")';
    // $conn -> query("SET NAMES utf8");
    // if($conn->query($linkedUserToActivity)){
    //     $response=array(
    //         "status"=> "success",
    //         "message"=> "User successfully added to activity.");
    // }
    // else{
    //     $response=array(
    //         "status" => 'error',
    //         "message" => 'Failed to add user to activity.');
    // }
    header("Content-Type: application/json");
    echo json_encode($response, JSON_PRETTY_PRINT);
}

?>