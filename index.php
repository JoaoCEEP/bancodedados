<?php

/*aqui vamos conectar 
com o banco 
de dados*/
$servername = "localhost";
//você deu nome ao banco de dados
$database = "func2d";
$username = "root";
$password = "";

$conexao = mysqli_connect(
    $servername, $username, 
    $password,$database
);

if (!$conexao){
    die("Falha na conexão".mysqli_connect_error());
}
//echo "conectado com sucesso";

$id = $_POST["id"];
$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$botao = $_POST["botao"];

echo $id." ".$nome." ".$botao;

$sql_cadastrar = "INSERT INTO funcionarios (id, nome, cpf) VALUES('','$nome', '$cpf')";
?>
<html>
    <body>
        <form name = "func" method = "post" >
        <label>ID</label>
        <input type ="text" name = "id" /><br />
        <label>Nome</label>
        <input type ="text" name = "nome" /><br />
        <label>CPF</label>
        <input type ="text" name = "cpf" /><br />
        <input type ="submit" name = "botao" value = "cadastrar" />
        <input type ="reset" name = "botao" value = "cancelar" />
        </form>
    </body>
</html>