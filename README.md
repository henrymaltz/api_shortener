
API desenvolvida para teste de uma vaga, desenvolvida conforme as regras da empresa. O objetivo principal dela é ser uma encurtadora de URL. Abaixo seguem os Endpoints que pediram no enunciando.

------------------------------
URL Redirect
Redireciona a URL encurtada para a URL original
------------------------------
Url Postman: http://localhost/api_shortener/view/Url/UrlRedirect.php 
Exemplo de body:{"id":"47"}
Positivo: 301 redirect
Negativo: 404 Not Found

------------------------------
User Insert
Cadastra um novo usuário no sistema.
------------------------------
url: http://localhost/api_shortener/view/User/UserInsert.php
Exemplo de chamada:{"id":"teste1"}
Positivo: 201 Created
Negativo: 409 Conflict

------------------------------
Users Delete
------------------------------
url: http://localhost/redevistorias/view/Users/users_delete.php
Exemplo de chamada:{"id":"teste1"}
Positivo: 204 No Content
Negativo: 409 Null

------------------------------
Url Delete
------------------------------
url: http://localhost/redevistorias/view/Url/UrlDelete.php
Exemplo de chamada:{"id":"2"}
Positivo: 204 No Content
Negativo: 409 Null

