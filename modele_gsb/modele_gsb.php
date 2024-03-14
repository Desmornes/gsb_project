<?php 

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
    return $response;

    }

?>