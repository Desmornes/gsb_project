<?php

// connexion avec la bd
include("db_connect_gsb.php");
$request_method = $_SERVER["REQUEST_METHOD"];


if($request_method=='GET')
{
    if (!empty($_GET["id"]))
    {
        $id = intval($_GET["id"]);
        getMedicament($id);
        if($GET_["action"]=='S'){
            getOne_effet_secondaire($id);
        }
        else if($GET_['action']== 'T'){
            getOne_effet_therapeutique($id);
        }
    }
    else
    {
        getMedicaments();
    }
 
}

?>