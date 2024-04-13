<?php

$servername = 'localhost';
$username = 'root';
$password ='';
$conn = new PDO("mysql:host=$servername;dbname=gsb_bd", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$request_method = $_SERVER["REQUEST_METHOD"];

switch($request_method){
    case 'GET':
        if(!empty($_GET["idMed"])){
            getMedicament($_GET["idMed"]);
        }
        else{
            getMedicaments();
        }
        break;
    default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
    }

// requete qui recupere tout les enregistrements de la table medicament
function getMedicaments()
    {
    global $conn;
    $query = "SELECT * FROM medicaments";
    $response = array();

    $conn->query("SET NAMES utf8");
    $result = $conn->query($query);
    while( $row = $result->fetch())
    {
        $response[] = $row;
    }
    $result->closeCursor();
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
}
// requete qui recupere un enregistrement de la table medicament et le renvoie en json au client
function getMedicament($id = 0)
{
    global $conn;
    $query = "SELECT * FROM medicaments";
    if ($id != 0)
    {
        $query .= " WHERE _id_medicament=" . $id . " LIMIT 1";
    } 
    $conn->query("SET NAMES utf8");
    $result = $conn->query($query);
    
    $response = array();
    while ($row = $result->fetch())
    {
        $response[] = $row;
        if ($id != 0) {
            // Récupération des effets thérapeutiques
            $effetsTherapeutiques = getEffetsTherapeutiques($id);
            $response[0]["effets_therapeutiques"] = $effetsTherapeutiques;
            
            // Récupération des effets secondaires
            $effetsSecondaires = getEffetsSecondaires($id);
            $response[0]["effets_secondaires"] = $effetsSecondaires;

            $interactions = getInteractions($id);
            $response[0]["interactions"] = $interactions;
        }
    }
    
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
}

function getEffetsTherapeutiques($id = 0)
{
    global $conn;
    $query = "SELECT effets_therapeutiques._nom_effet_therapeutique
                FROM effets_therapeutiques 
                JOIN procure ON effets_therapeutiques._id_effet_therapeutique = procure._id_effet_therapeutique
                WHERE procure._id_medicament=" . $id . ";";
    $response = array();
    
    $conn->query("SET NAMES utf8");
    $result = $conn->query($query);
    while ($row = $result->fetch())
    {
        $response[] = $row;
    }
    $result->closeCursor();
    return $response;
}

function getEffetsSecondaires($id = 0)
{
    global $conn;
    $query = "SELECT effets_secondaires._nom_effet_secondaire
                FROM effets_secondaires
                JOIN provoque ON effets_secondaires._id_effet_secondaire = provoque._id_effet_secondaire
                WHERE provoque._id_medicament =" . $id . ";";
    $response = array();
    
    $conn->query("SET NAMES utf8");
    $result = $conn->query($query);
    while ($row = $result->fetch())
    {
        $response[] = $row;
    }
    $result->closeCursor();
    return $response;
}

function getInteractions($id = 0)
{
    global $conn;
    $query = "SELECT medicaments._nom
                FROM est_compatible 
                JOIN medicaments ON medicaments._id_medicament = est_compatible._id_medicament_1
                WHERE est_compatible._id_medicament =" . $id . ";";
    $response = array();
    
    $conn->query("SET NAMES utf8");
    $result = $conn->query($query);
    while ($row = $result->fetch())
    {
        $response[] = $row;
    }
    $result->closeCursor();
    return $response;
}
