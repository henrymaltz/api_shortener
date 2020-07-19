# API encurtadora de URL


## Descrição do Projeto
<p align="justify"> API desenvolvida para teste de uma vaga, desenvolvida conforme as regras da empresa. O objetivo principal dela é ser uma encurtadora de URL.</p>

## Linguagens e libs utilizadas
<p align="justify">PHP e Mysql utilizando padrão MVC.</p>

### Lista dos Endpoints que compõe a API.

------------------------------
1. URL Redirect
Redireciona a URL encurtada para a URL original
------------------------------
Url Postman: http://localhost/api_shortener/view/Url/UrlRedirect.php 
Exemplo de body:{"id":"47"}
Positivo: 301 redirect
Negativo: 404 Not Found

------------------------------
2. User Insert
Cadastra um novo usuário no sistema
------------------------------
url: http://localhost/api_shortener/view/User/UserInsert.php
Exemplo de chamada:{"id":"teste1"}
Positivo: 201 Created
Negativo: 409 Conflict

------------------------------
3. Url Insert
Cadastra uma nova Url no sistema
------------------------------
url: http://localhost/api_shortener/view/Url/UrlInsert.php
Exemplo de chamada:
{
 "userid": "teste5",
 "url": "http://www.example.com"
}
Positivo: "201""Created"
Negativo: 100 Usuário Inexistente

------------------------------
4. User Stats
Retorna todas urls de um determinado usuário
------------------------------
url: http://localhost/api_shortener/view/User/UserStats.php
Exemplo de chamada:{"id":"teste1"}
Positivo: {"id":"47","userid":"teste5","hits":"5","url":"http://www.example.com","shorturl":"http://localhost/SSOqStuPnF"}
Negativo: "404""Not Found"

------------------------------
5. Url Delete
Apaga uma url
------------------------------
url: http://localhost/api_shortener/view/User/UserStats.php
Exemplo de chamada:{"id":"teste1"}
Positivo: 204 No Content
Negativo: 409 Null

------------------------------
6. User Delete
Apaga um usuário e também todas urls relacionadas a este usuário
------------------------------
url: http://localhost/api_shortener/view/User/UserDelete.php
Exemplo de chamada:{"id":"teste1"}
Positivo: 204 No Content
Negativo: 409 Null

------------------------------
7. Url Stats
Retorna dados de uma determinada url
------------------------------
url: http://localhost/api_shortener/view/Url/UrlStatsId.php
Exemplo de chamada:{"id":"47"}
Positivo: {"id":"48","userid":"teste5","hits":"0","url":"http://www.a.com","shorturl":"http://localhost/lIm4MyICDU"}
Negativo: "404""Not Found"

------------------------------
8. Url Global Stats
Retorna dados de todas urls cadastradas
------------------------------
url: http://localhost/api_shortener/view/Url/UrlStats.php
Exemplo de chamada: Vazio
Positivo: 
{"hits":"1","urlCount":"4"}{"id":"50","userid":"teste5","hits":"1","url":"http://www.example.com","shorturl":"http://localhost/sJFwhPnBwB"}{"id":"48","userid":"teste5","hits":"0","url":"http://www.a.com","shorturl":"http://localhost/lIm4MyICDU"}{"id":"49","userid":"teste5","hits":"0","url":"http://www.example.com","shorturl":"http://localhost/e2nJkirQF5"}{"id":"51","userid":"teste5","hits":"0","url":"http://www.example.com","shorturl":"http://localhost/BlHFL23mx0"}
Negativo: {"hits":null,"urlCount":"0"}"000""Not Found"