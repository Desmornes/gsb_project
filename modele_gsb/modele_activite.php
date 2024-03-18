<?php
include("db_connect_gsb.php");
//connexion à la BD
function connexionBD(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    try{
        $conn = new PDO("mysql:host=$servername; dbname=gsb_bd", $username, $password);    
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        die("Erreur : ". $e->getMessage());
    }
    return $conn;
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
    return $response;
}

//récupérer une activité avec un id donné
function getActivity($id=0){
    global $conn;
    $query = 'SELECT * FROM activites';
    if($id!=0){
        $query .= ' WHERE id='.$id." LIMIT 1";
    }
    $conn->query("SET NAMES utf8");
    $result= $conn -> query($query);
    while($row = $result -> fetch()){
        $response[] = $row;
    }
    header('Content-Type: application/json');
    return $response;
}

//ajouter un utilisateur à une activité
function addUserToActivity(){
    global $conn;
    $user_id = $_POST["id_user"];
    $activity_id = $_POST["id_activity"];
    $query = 'INSERT INTO est_inscrit(_id_utilisateur, _id_activite) VALUES("'.$user_id.'", "'.$activity_id.'")';
    $conn -> query("SET NAMES utf8");
    if($conn->query($query)){
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

//voir si on va ajouter d'autres fonctionnalités plus tard

?>