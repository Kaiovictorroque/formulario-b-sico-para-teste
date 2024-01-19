<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RecebeDados</title>
</head>

<body>
    
    <?php 

        // Usando PDO em vez de mysqli para uma conexão mais segura
        try {
            $conexao = new PDO('mysql:host=localhost;dbname=teste2', 'root', '');
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo " ✅ Conexão com banco de dados: OK!  >>>>>> ";
        } catch(PDOException $e) {
            echo 'NÃO CONECTADO! Erro: ' . $e->getMessage();
        }

        // Preparando a consulta SQL para evitar SQL Injection
        $stmt = $conexao->prepare("SELECT cpf FROM dados WHERE cpf = :cpf");
        $stmt->bindParam(':cpf', $_POST['cpf']);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            echo "CPF já cadastrado! <br>";
        } else {
            $stmt = $conexao->prepare("INSERT INTO dados (cpf, idade, nome) VALUES (:cpf, :idade, :nome)");
            $stmt->bindParam(':cpf', $_POST['cpf']);
            $stmt->bindParam(':idade', $_POST['idade']);
            $stmt->bindParam(':nome', $_POST['nome']);
            $stmt->execute();
            echo " >>>> CADASTRADO COM SUCESSO! <BR>";
        }
    ?>

</body>

</html>
