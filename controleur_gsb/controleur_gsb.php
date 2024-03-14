<?php

// connexion avec la bd
include("db_connect_gsb.php");
$request_method = $_SERVER["REQUEST_METHOD"];

// if($request_method=='GET')
// {
//     if (!empty($_GET["id"]))
//     {
//         $id = intval($_GET["id"]);
//         getMedicament($id);
//         if($GET_["action"]=='S'){
//             get0ne_effet_secondaire($id);
//         }
//         else if($GET_['action']== 'T'){
//             get0ne_effet_therapeutique($id);
//         }
//     }
//     else
//     {
//         getMedicaments();
//     }
// }

if($request_method=='GET'){
    if($_GET['name']=='med'){
        if(!empty($_GET['id'])){
            $id = intval($_GET['id']);
            $data = getMedicament($id);
            $dataT = getEffetTherapeutique($id);
            $dataS = getEffetSecondaire($id);
            if($GET_["action"]=='S' && !empty($_GET['id_med'])){
                $id = intval($_GET['id_med']);
                $dataOneS = getOneEffetSecondaire($id);
            }
            else if($GET_['action']== 'T' && !empty($_GET['id_med'])){
                $id = intval($_GET['id_med']);
                $dataOneT = getOneEffetTherapeutique($id);
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