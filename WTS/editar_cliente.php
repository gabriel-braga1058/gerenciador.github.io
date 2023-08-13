<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Cliente</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
      margin: 0;
      padding: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
    }

    .container {
      width: 400px;
      background-color: #fff;
      padding: 20px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }

    label {
      font-weight: bold;
    }

    input {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    input[type="date"] {
      padding: 5px;
    }

    button {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
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

    if (isset($_GET['edit'])) {
      $cliente_id = $_GET['edit'];

      // Selecionar o cliente pelo ID
      $selecionar_query = "SELECT * FROM registros WHERE id = $cliente_id";
      $resultado = $conn->query($selecionar_query);

      if ($resultado->num_rows > 0) {
        $cliente = $resultado->fetch_assoc();
      } else {
        echo "Cliente não encontrado.";
        exit;
      }
    }
    ?>
  
    <h1>Editar Cliente</h1>
    <form action="processar_atualizacao.php" method="POST">
      <input type="hidden" name="cliente_id" value="<?php echo $cliente['id']; ?>">
      <label for="nome">Nome do Cliente:</label>
      <input type="text" id="nome" name="nome" value="<?php echo $cliente['nome']; ?>" required>

      <label for="email">E-mail:</label>
      <input type="email" id="email" name="email" value="<?php echo $cliente['email']; ?>" required>

      <label for="telefone">Telefone:</label>
      <input type="tel" id="telefone" name="telefone" value="<?php echo $cliente['telefone']; ?>" required>

      <label for="codigo">Código do Cliente:</label>
      <input type="text" id="codigo" name="codigo" value="<?php echo $cliente['codigo']; ?>" required>

      <label for="data_expiracao">Data para Expirar:</label>
      <input type="date" id="data_expiracao" name="data_expiracao" value="<?php echo $cliente['data_expiracao']; ?>" required>

      <button type="submit">Atualizar Cliente</button>
    </form>
  
    <?php
    // Fechar a conexão
    $conn->close();
    ?>
  </div>
</body>
</html>
