<?php
include '../../control/UrlControl.php';

$data = file_get_contents('php://input');
$obj =  json_decode($data);

if(!empty($data)){

    $control = new UrlControl();
    $response = $control->UrlInsert($obj);

    foreach($response as $valor){
        echo json_encode($valor);
    }

}

?>