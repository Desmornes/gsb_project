<?php

require_once "controleur_gsb/controleur_activite.php";
require_once "controleur_gsb/controleur_medic.php";

$actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$url = "http://localhost/gsb_projet/controleur_gsb/controleur_medic.php";
if($actual_link==$url){
            $options = array(
                "http"=> array(
                    "header"=> "Content-Type: application/json/x-www-form-urlencoded\r\n",
                    "method"=> "GET",
                ),
            );
            $context = stream_context_create($options);
            $result = file_get_contents($url, false, $context);
}

?>  