<?php
include '../../conexao/Conexao.php';

class UserModel extends Conexao{
    private $id;

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    public function UserInsert($obj){
        $sql = "INSERT INTO user(id) VALUES (:id)";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('id',  $obj->id);
        try {
            $consulta->execute();
            $response['status_code_header'] = '201';
            $response['body'] = 'Created';
        } catch (Exception $e) {
            $response['status_code_header'] = '409';
            $response['body'] = 'Conflict';
        }
        return $response;

    }

    public function UserDelete($obj,$id = null){
        $sql =  "DELETE FROM user WHERE id = :id";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('id',$id);
        try {
            $consulta->execute();
        } catch (Exception $e) {
        }
        if ($consulta->rowCount() > 0){
            $response['status_code_header'] = '204';
            $response['body'] = 'No Content';
        }else{
            $response['status_code_header'] = '409';
            $response['body'] = 'Null';
        }
        return $response;
    }

    public function find($id = null){

    }

    public function UserStats($obj){
        if (isset($obj->userid) && strlen($obj->userid) > 0){

            $sql_user = "SELECT * FROM user WHERE id = :id";
            $user = Conexao::prepare($sql_user);
            $user->bindValue('id', $obj->userid);
            $user->execute();

            if ($user->rowCount() > 0) {
                $sql = "SELECT * FROM url where userid = :userid";
                $consulta = Conexao::prepare($sql);
                $consulta->bindValue('userid', $obj->userid);
                $consulta->execute();
                return $consulta->fetchAll();
            }else{
                $response['status_code_header'] = '404';
                $response['body'] = 'Not Found';
                return $response;
            }

        }

    }

}

?>