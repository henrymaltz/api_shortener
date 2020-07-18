<?php

include '../../control/UrlControl.php';
$UserControl = new UrlControl();

header('Content-Type: application/json');

$data = file_get_contents('php://input');
$obj =  json_decode($data);

if(!empty($data)){

    foreach($UserControl->UrlStatsId($obj) as $valor){
        echo json_encode($valor, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

}

?>