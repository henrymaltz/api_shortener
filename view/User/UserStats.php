<?php

include '../../control/UserControl.php';
$UserControl = new UserControl();

header('Content-Type: application/json');

$data = file_get_contents('php://input');
$obj =  json_decode($data);

if(!empty($data)){

    foreach($UserControl->UserStats($obj) as $valor){
        echo json_encode($valor, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

}

?>