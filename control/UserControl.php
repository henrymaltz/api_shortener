<?php
include '../../model/UserModel.php';

class UserControl{
    function UserInsert($obj){
        $conteudo = new UserModel();
        return $conteudo->UserInsert($obj);
    }

    function UserDelete($obj,$id){
        $conteudo = new UserModel();
        return $conteudo->UserDelete($obj,$id);
    }

    function find($id = null){

    }

    function UserStats($obj){
        $conteudo = new UserModel();
        return $conteudo->UserStats($obj);
    }
}

?>