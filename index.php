<?php
//SISTEMINHA C.E.R.A 
/*aqui vamos conectar 
com o banco 
de dados*/
$servername = "localhost";
//você deu nome ao banco de dados
$database = "func2d"; //func2c ou func2d
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
$pesquisa = $_POST["pesquisa"];

//aqui controla os botões
if(empty($botao)){

}else if($botao == "Cadastrar"){
    $sql = "INSERT INTO funcionarios 
    (id, nome, cpf) VALUES('','$nome', '$cpf')";
}else if($botao == "Excluir"){
    $sql = "DELETE FROM funcionarios WHERE id = '$id'";
}else if($botao == "Recuperar"){
    $sql_mostra_cad = "SELECT * FROM funcionarios WHERE nome like '%$pesquisa%'";
}

//aqui vou tratar erros nas operações C.E.R.A
if(!empty($sql)){
    if(mysqli_query($conexao, $sql)){
        echo "Operação realizada com sucesso";
    }else{
        echo "Houve um erro na operação: <br />";
        echo  mysqli_error($conexao);
    }
}

$selecionado = $_GET["id"];

if(!empty($selecionado)){
    $sql_selecionado = "SELECT * FROM funcionarios
                        WHERE id = $selecionado";
    $resultado = mysqli_query($conexao, $sql_selecionado); 
         
    while($linha = mysqli_fetch_assoc($resultado)){
        $id = $linha["id"];
        $nome = $linha["nome"];
        $cpf = $linha["cpf"];
    }                      
}



?>
<html>
    <body>
    <form name = "func" method = "post" >
        <label>ID</label>
        <input type ="text" name = "id" value="<?php echo $id; ?>"/><br />
        <label>Nome</label>
        <input type ="text" name = "nome" value="<?php echo $nome; ?>"/><br />
        <label>CPF</label>
        <input type ="text" name = "cpf" value="<?php echo $cpf; ?>"/><br />
        <input type ="submit" name = "botao" value = "Cadastrar" />
        <input type ="submit" name = "botao" value = "Excluir" />
        <br />
        <input type="text" name = "pesquisa" />
        <input type="submit" name = "botao" value = "Recuperar" />
    </form>
    <table>
        <tr>
            <td>-</td>
            <td>ID</td>
            <td>Nome</td>
            <td>CPF</td>
        </tr>
        <?php
        if(empty($pesquisa)){
            $sql_mostra_cad = "SELECT * FROM funcionarios
            ORDER BY id desc limit 0,10";
        }
         
         $resultado = mysqli_query($conexao, $sql_mostra_cad); 
         
         while($linha = mysqli_fetch_assoc($resultado)){
            echo "
            <tr>
                <td>
                <a href='?id=".$linha["id"]."'>Selecionar</a>
                </td>
                <td>".$linha["id"]."</td>
                <td>".$linha["nome"]."</td>
                <td>".$linha["cpf"]."</td>
            </tr>
            ";
         }
        ?>
    </table>
    </body>
</html>
