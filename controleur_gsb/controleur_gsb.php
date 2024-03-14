<?php

// connexion avec la bd
include("db_connect_gsb.php");
$request_method = $_SERVER["REQUEST_METHOD"];

if($request_method=='GET'){
    if($_GET['name']=='med'){
        if(!empty($_GET['id'])){
            $id = intval($_GET['id']);
            $data = getMedicament($id);
            $dataT = getEffetsTherapeutiques($id);
            $dataS = getEffetsSecondaires($id);
            if($GET_["action"]=='S' && !empty($_GET['id_med'])){
                $id = intval($_GET['id_med']);
                $dataOneS = getEffetSecondaire($id);
            }
            else if($GET_['action']== 'T' && !empty($_GET['id_med'])){
                $id = intval($_GET['id_med']);
                $dataOneT = getEffetTherapeutique($id);
            }
        }
        else{
            $data = getMedicaments();        
        }
    }
    else if($_GET['name']=='act'){
        if(!empty($_GET['id'])){
            $id = intval($_GET['id']);
            $data = getActivity($id);
        }
        else{
            $data = getActivities();
        }
    }
}
else{
    getActivities();
}


?>