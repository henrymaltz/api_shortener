<?php

include '../../control/UrlControl.php';
$UserControl = new UrlControl();

header('Content-Type: application/json');

$data = file_get_contents('php://input');
$obj =  json_decode($data);

//if(!empty($data)){

    foreach($UserControl->UrlStats1($obj) as $valor){
        echo json_encode($valor);
    }

    foreach($UserControl->UrlStats2($obj) as $valor){
        echo json_encode($valor, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

//}

?>