<?php

include '../../control/UrlControl.php';
$UserControl = new UrlControl();

header('Content-Type: application/json');

$data = file_get_contents('php://input');
$obj =  json_decode($data, true);

if (isset($obj["id"]) && (int)$obj["id"] > 0) {
    $id = $obj["id"];
}

if(!empty($data)){

    $conteudoControl = new UrlControl();
    $response = $conteudoControl->UrlRedirect($obj, $id);
    echo $response['status_code_header'] . ' ' . $response['body'];
    if (isset($response['url']) && strlen($response['url']) > 0) {
        header('Location:'.$response['url']);
    }

}

?>