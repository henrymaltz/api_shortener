<?php
include '../../model/UrlModel.php';

class UrlControl{

    function UrlRedirect($obj, $id){
        $conteudo = new UrlModel();
        return $conteudo->UrlRedirect($obj, $id);
    }

    function UrlInsert($obj){
        $conteudo = new UrlModel();
        return $conteudo->UrlInsert($obj);
    }

    function UrlDelete($obj,$id){
        $conteudo = new UrlModel();
        return $conteudo->UrlDelete($obj, $id);
    }

    function UrlStats1($obj){
        $conteudo = new UrlModel();
        return $conteudo->UrlStats1($obj);
    }

    function UrlStats2($obj){
        $conteudo = new UrlModel();
        return $conteudo->UrlStats2($obj);
    }

    function UrlStatsId($obj){
        $conteudo = new UrlModel();
        return $conteudo->UrlStatsId($obj);
    }

    function find($id = null){

    }

    function UrlList(){
        $conteudo = new UrlModel();
        return $conteudo->UrlList();
    }
}

?>