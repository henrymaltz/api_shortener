Exemplo de API com RESTful, feito com php.


------------------------------
Users Insert
------------------------------
url: http://localhost/redevistorias/view/Users/users_insert.php
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

