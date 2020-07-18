<?php

include '../../control/UrlControl.php';

header('Content-Type: application/json');

$data = file_get_contents('php://input');
$obj =  json_decode($data, true);
$id = $obj["id"];

if(!empty($data)){

    $conteudoControl = new UrlControl();
    $response = $conteudoControl->UrlDelete($obj, $id);
    echo $response['status_code_header'] . ' ' . $response['body'];

}

?>