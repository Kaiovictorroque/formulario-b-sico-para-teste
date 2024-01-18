<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RecebeDados<</title>
</head>

    <body>
    
        <?php 
        
            $conexao = mysqli_connect("localhost","root","","teste2");
            
    // Checar conexão
        
            if (!$conexao){
                echo "NÃO CONECTADO!";
            }

            echo " ✅ Conexão com banco de dados: OK!  >>>>>> ";


    // verificar se o cpf já foi cadastrado pois só cadastra cpf novo
    
            $cpf = $_POST['cpf'];
            $cpf = mysqli_real_escape_string($conexao, $cpf);
            $sql = "SELECT cpf FROM teste2.dados WHERE cpf='$cpf'";
            $retorno = mysqli_query($conexao,$sql);


            if(mysqli_num_rows($retorno)>0) {
                echo "CPF já cadastrado! <br>";
        
            } else {

                $cpf = $_POST['cpf'];
                $idade = $_POST['idade'];
                $nome = $_POST['nome'];


            $sql = "INSERT INTO  teste2.dados(cpf,idade,nome) values ('$cpf','$idade','$nome')";
            $resultado = mysqli_query($conexao, $sql);
            
            echo " >>>> CADASTRADO COM SUCESSO! <BR>";
        
            }
        ?>

    </body>

</html>

