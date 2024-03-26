<?php

$servername = 'localhost';
$username = 'root';
$password ='';
$conn = new PDO("mysql:host=$servername;dbname=gsb_bd", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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
function getMedicament($id=0)
{
    global $conn;
    $query = "SELECT * FROM medicament";
    if($id !=0)
    {
        $query .= " WHERE id=".$id."LIMIT 1";
    } 
    $conn-> query("SET NAMES utf8");
    $result = $conn->query($query);
    while($row = $result->fetch())
    {
        $response[]= $row;
    }
    header('Content-Type: application/json');
    return $response;
}
// requete qui recupere tout les enregistrements de la table effet_therapeutique
function getEffetsTherapeutiques($id=0)
{
    global $conn;
    $query = "SELECT _nom_effet_therapeutique
    FROM effets_therapeutiques 
    JOIN procure ON effets_therapeutiques._id_effet_therapeutique = procure._id_effet_therapeutique
    WHERE effets_therapeutiques._id_effet_therapeutique =".$id.";";
    $response = array();

    $conn->query("SET NAMES utf8");
    $result = $conn->query($query);
    while($row =$result->fetch())
    {
        $response[]= $row;
    }
    $result->closeCursor();
    header('Content-Type:application/json');
    return $response;
}
// requete qui recupere un enregistrement de la table medicament et le renvoie en json au client
function getEffetTherapeutique($id=0)
{
    global $conn;
    $query = "SELECT * FROM effets_therapeutiques";
    if($id !=0)
    {
        $query .= " WHERE id=".$id."LIMIT 1";
    } 
    $conn-> query("SET NAMES utf8");
    $result = $conn->query($query);
    while($row = $result->fetch())
    {
        $response[]= $row;
    }
    header('Content-Type: application/json');
    return $response;
 
}

// requete qui recupere tout les enregistrements de la table effef_secondaire
function getEffetsSecondaires($id=0)
{
    global $conn;
    $query = "SELECT _nom_effet_secondaire
    FROM effets_secondaires 
    JOIN provoque ON effets_secondaires._id_effet_secondaire = provoque._id_effet_secondaire
    WHERE effets_secondaires._id_effet_secondaire = ".$id.";";
    $response = array();

    $conn->query("SET NAMES utf8");
    $result = $conn->query($query);
    while ($row =$result->fetch())
    {
        $response[] = $row;
    }
    $result-> closeCursor();
    header('Content-Type:application/json');
    return $response;
}
// requete qui recupere un enregistrement de la table effets_secondaires et le renvoie au client
function getEffetSecondaire($id=0)
{
    global $conn;
    $query = "SELECT * FROM effets_secondaires";
    if($id !=0)
    {
        $query .= " WHERE id=".$id."LIMIT 1";
    } 
    $conn-> query("SET NAMES utf8");
    $result = $conn->query($query);
    while($row = $result->fetch())
    {
        $response[]= $row;
    }
    header('Content-Type: application/json');
    return $response; 
}

?>
