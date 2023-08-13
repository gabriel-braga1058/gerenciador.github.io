<?php
$servername = "localhost";
$username = "root"; // Substitua pelo seu nome de usuário
$password = "";   // Substitua pela sua senha
$dbname = "clientes";      // Substitua pelo nome do seu banco de dados

// Criação da conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar os dados do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $codigo = $_POST["codigo"];
    $dataExpiracao = $_POST["data_expiracao"];

    // Inserir os dados na tabela de registros
    $inserir_query = "INSERT INTO registros (nome, email, telefone, codigo, data_expiracao) VALUES ('$nome', '$email', '$telefone', '$codigo', '$dataExpiracao')";

    if ($conn->query($inserir_query) === TRUE) {
        // Redirecionar para dashboard.php após o registro bem-sucedido
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Erro ao registrar o cliente: " . $conn->error;
    }
}

// Fechar a conexão
$conn->close();
?>
