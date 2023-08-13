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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente_id = $_POST['cliente_id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $codigo = $_POST['codigo'];
    $data_expiracao = $_POST['data_expiracao'];

    $sql = "UPDATE Registros SET nome='$nome', email='$email', telefone='$telefone', codigo='$codigo', data_expiracao='$data_expiracao' WHERE id=$cliente_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: lista_clientes.php"); // Redirecionar para a lista de clientes após a atualização
        exit;
    } else {
        echo "Erro ao atualizar os dados do cliente: " . $conn->error;
    }
}

// Fechar a conexão
$conn->close();
?>
