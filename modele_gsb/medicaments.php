<?php
// connexion avec la bd
include("db_connect_gsb.php");
$request_methode = $_SERVER["REQUEST_METHOD"];

if($request_methode=='GET')
{

    if (!empty($_GET["id"]))
    {
        $id =intval($_GET["id"]);
        getMedicament();
    }
    else
    {
        getMedicaments();
    }
 
}
    
    
    
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
    

?>