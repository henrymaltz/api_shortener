<?php
include '../../control/UserControl.php';

header('Content-Type: application/json');

$data = file_get_contents('php://input');
$obj =  json_decode($data, true);
$id = $obj["id"];

if(!empty($data)){

    $conteudoControl = new UserControl();
    $response = $conteudoControl->UserDelete($obj,$id);
    echo $response['status_code_header'] . ' ' . $response['body'];

}

?>