<?php
$url = "http://127/0/0/1/gsp_projet/medicaments/1";

$options = array(
    'http' =>array(
        'header' => "Content-type: application/x-www-form-urlencoded\r\n",'method' =>'GET'
    )
    );
    $context = stream_context_create($options);
    $result = file_get_contents($url,false,$context);

    var_dump($result);

?>