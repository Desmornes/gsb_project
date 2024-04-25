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
        // Si un ID de médicament est fourni dans la requête GET, récupérer ce médicament
        if(!empty($_GET["idMed"])){
            getMedicament($_GET["idMed"]);
        }
        // Sinon, récupérer tous les médicaments
        else{
            getMedicaments();
        }
        break;
    default:
        // Retourner une erreur si la méthode n'est pas autorisée
        header("HTTP/1.0 405 Method Not Allowed");
        break;
    }

// Fonction pour récupérer tous les médicaments
function getMedicaments()
{
    global $conn;
    // Requête SQL pour sélectionner tous les médicaments
    $query = "SELECT * FROM medicaments";
    $response = array();

    // Exécution de la requête SQL
    $conn->query("SET NAMES utf8");
    $result = $conn->query($query);
    // Parcours des résultats et ajout dans le tableau de réponse
    while( $row = $result->fetch())
    {
        $response[] = $row;
    }
    $result->closeCursor();
    // Envoi de la réponse au format JSON
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
}

// Fonction pour récupérer un seul médicament par son ID
function getMedicament($id = 0)
{
    global $conn;
    // Requête SQL pour sélectionner un médicament par son ID
    $query = "SELECT * FROM medicaments";
    // Si un ID est fourni, ajouter une condition WHERE à la requête
    if ($id != 0)
    {
        $query .= " WHERE _id_medicament=" . $id . " LIMIT 1";
    } 
    // Exécution de la requête SQL
    $conn->query("SET NAMES utf8");
    $result = $conn->query($query);
    
    $response = array();
    // Parcours des résultats et ajout dans le tableau de réponse
    while ($row = $result->fetch())
    {
        $response[] = $row;
        // Si un ID est fourni, récupérer les effets thérapeutiques, les effets secondaires et les interactions
        if ($id != 0) {
            // Récupération des effets thérapeutiques
            $effetsTherapeutiques = getEffetsTherapeutiques($id);
            $response[0]["effets_therapeutiques"] = $effetsTherapeutiques;
            
            // Récupération des effets secondaires
            $effetsSecondaires = getEffetsSecondaires($id);
            $response[0]["effets_secondaires"] = $effetsSecondaires;

            // Récupération des interactions
            $interactions = getInteractions($id);
            $response[0]["interactions"] = $interactions;
        }
    }
    
    // Envoi de la réponse au format JSON
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
}

// Fonction pour récupérer les effets thérapeutiques d'un médicament
function getEffetsTherapeutiques($id = 0)
{
    global $conn;
    // Requête SQL pour récupérer les effets thérapeutiques d'un médicament
    $query = "SELECT effets_therapeutiques._nom_effet_therapeutique
                FROM effets_therapeutiques 
                JOIN procure ON effets_therapeutiques._id_effet_therapeutique = procure._id_effet_therapeutique
                WHERE procure._id_medicament=" . $id . ";";
    $response = array();
    
    // Exécution de la requête SQL
    $conn->query("SET NAMES utf8");
    $result = $conn->query($query);
    // Parcours des résultats et ajout dans le tableau de réponse
    while ($row = $result->fetch())
    {
        $response[] = $row;
    }
    $result->closeCursor();
    return $response;
}

// Fonction pour récupérer les effets secondaires d'un médicament
function getEffetsSecondaires($id = 0)
{
    global $conn;
    // Requête SQL pour récupérer les effets secondaires d'un médicament
    $query = "SELECT effets_secondaires._nom_effet_secondaire
                FROM effets_secondaires
                JOIN provoque ON effets_secondaires._id_effet_secondaire = provoque._id_effet_secondaire
                WHERE provoque._id_medicament =" . $id . ";";
    $response = array();
    
    // Exécution de la requête SQL
    $conn->query("SET NAMES utf8");
    $result = $conn->query($query);
    // Parcours des résultats et ajout dans le tableau de réponse
    while ($row = $result->fetch())
    {
        $response[] = $row;
    }
    $result->closeCursor();
    return $response;
}

// Fonction pour récupérer les interactions d'un médicament
function getInteractions($id = 0)
{
    global $conn;
    // Requête SQL pour récupérer les interactions d'un médicament
    $query = "SELECT medicaments._nom
                FROM est_compatible 
                JOIN medicaments ON medicaments._id_medicament = est_compatible._id_medicament_1
                WHERE est_compatible._id_medicament =" . $id . ";";
    $response = array();
    
    // Exécution de la requête SQL
    $conn->query("SET NAMES utf8");
    $result = $conn->query($query);
    // Parcours des résultats et ajout dans le tableau de réponse
    while ($row = $result->fetch())
    {
        $response[] = $row;
    }
    $result->closeCursor();
    return $response;
}
