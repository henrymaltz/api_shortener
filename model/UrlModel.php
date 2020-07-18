<?php
include '../../conexao/Conexao.php';

class UrlModel extends Conexao{

    private $id;
    private $userid;
    private $hits;
    private $url;
    private $shorturl;

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getUserId() {
        return $this->userid;
    }

    function setUserId($userid) {
        $this->userid = $userid;
    }

    function getHits() {
        return $this->hits;
    }

    function setHits($hits) {
        $this->hits = $hits;
    }

    function getUrl() {
        return $this->url;
    }

    function setUrl($url) {
        $this->url = $url;
    }

    function getShortUrl() {
        return $this->shorturl;
    }

    function setShortUrl($shorturl) {
        $this->shorturl = $shorturl;
    }

    public function UrlRedirect($obj, $id = null){

        if (isset($id) && strlen($id) > 0){

            $sql_url = "SELECT * FROM url where id = :id";
            $url = Conexao::prepare($sql_url);
            $url->bindValue('id', $id);
            $url->execute();

            while ($linha = $url->fetch(PDO::FETCH_ASSOC)) {
                $url_ret = $linha['url'];
            }

            if ($url->rowCount() > 0) {
                $response = array(
                    'status_code_header' => '301',
                    'body' => 'Redirect',
                    'url' => $url_ret
                );
            }else{
                $response['status_code_header'] = '404';
                $response['body'] = 'Not Found';
            }
            return $response;

        }

    }

    public function UrlInsert($obj){

        function RandomStr() {
            $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
            $palavra = array();
            $alphaLength = strlen($alphabet) - 1;
            for ($i = 0; $i < 10; $i++) {// aqui você escolhe o tamanho da string
                $n = rand(0, $alphaLength);
                $palavra [] = $alphabet[$n];
            }
            return implode($palavra); //transforma o array numa string
        }


        $sql = "INSERT INTO url(userid, hits, url, shorturl) 
                VALUES (:userid, :hits, :url, :shorturl)";
        $consulta = Conexao::prepare($sql);

        if (isset($obj->userid) && strlen($obj->userid) > 0){
            $sql_user = "SELECT * FROM user WHERE id = :id";
            $user = Conexao::prepare($sql_user);
            $user->bindValue('id', $obj->userid);

            $user->execute();
            if ($user->rowCount() > 0) {
                $consulta->bindValue('userid', $obj->userid);
            }else{
                $response['status_code_header'] = '100';
                $response['body'] = 'Usuário Inexistente';
                return $response;
            }
        }
        $consulta->bindValue('hits', 0);
        if (isset($obj->url) && strlen($obj->url) > 0) {
            $consulta->bindValue('url', $obj->url);
        }
        do {
            $rand    = RandomStr();
            $sql_url = "SELECT * FROM url WHERE shorturl = :rand";
            $url = Conexao::prepare($sql_url);
            $url->bindValue('rand', $rand);
            $url->execute();
        } while ($url->rowCount() >  0);
        $short = 'http://localhost/'.$rand;

        $consulta->bindValue('shorturl', $short);
        try {
            $result = $consulta->execute();

            $sql_new = "SELECT hits, id, url, shorturl FROM url WHERE id = LAST_INSERT_ID()";
            $new = Conexao::prepare($sql_new);
            $new->execute();
            $response = array(
                'status_code_header' => '201',
                'body' => 'Created',
                $new->fetchAll(PDO::FETCH_ASSOC)
            );
        } catch (Exception $e) {
            $response['status_code_header'] = '409';
            $response['body'] = 'Conflict';
        }
        return $response;

    }

    public function UrlDelete($obj, $id = null){

        $sql =  "DELETE FROM url WHERE id = :id";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('id', $id);
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

    public function UrlStats1($obj){

        $sql_stats1 = "select sum(hits), count(id) FROM url";
        $stats1 = Conexao::prepare($sql_stats1);
        $stats1->execute();

        if ($stats1->rowCount() > 0) {
            return $stats1->fetchAll();
        }else{
            $response['status_code_header'] = '000';
            $response['body'] = 'Not Found';
            return $response;
        }

    }

    public function UrlStats2($obj){

        $sql_stats2 = "select * from url order by hits desc limit 10";
        $stats2 = Conexao::prepare($sql_stats2);
        $stats2->execute();

        if ($stats2->rowCount() > 0) {
            return $stats2->fetchAll(PDO::FETCH_ASSOC);
        }else{
            $response['status_code_header'] = '000';
            $response['body'] = 'Not Found';
            return $response;
        }

    }

    public function UrlStatsId($obj){

        if (isset($obj->id) && strlen($obj->id) > 0){

            $sql_url = "SELECT * FROM url where id = :id";
            $url = Conexao::prepare($sql_url);
            $url->bindValue('id', $obj->id);
            $url->execute();

            if ($url->rowCount() > 0) {
                return $url->fetchAll();
            }else{
                $response['status_code_header'] = '404';
                $response['body'] = 'Not Found';
                return $response;
            }

        }

    }

    public function find($id = null){

    }

    public function UrlList(){

        $sql = "SELECT * FROM url";
        $consulta = Conexao::prepare($sql);
        $consulta->execute();
        return $consulta->fetchAll();

    }

}

?>