<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
      margin: 0;
      padding: 0;
    }

    .container {
      width: 80%;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }

    h1 {
      text-align: center;
      margin-bottom: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ccc;
    }

    th {
      background-color: #f2f2f2;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    a {
      color: #007bff;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
  <title>Lista de Clientes</title>
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

    // Selecionar todos os registros da tabela clientes
    $selecionar_query = "SELECT * FROM registros";
    $resultados = $conn->query($selecionar_query);
    ?>

    <h1>Lista de Clientes</h1>
    <table>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Telefone</th>
        <th>Código</th>
        <th>Data de Expiração</th>
        <th>Ação</th>
      </tr>
      <?php
      if ($resultados->num_rows > 0) {
        while ($linha = $resultados->fetch_assoc()) {
          echo "<tr>
                  <td>".$linha['id']."</td>
                  <td>".$linha['nome']."</td>
                  <td>".$linha['email']."</td>
                  <td>".$linha['telefone']."</td>
                  <td>".$linha['codigo']."</td>
                  <td>".$linha['data_expiracao']."</td>
                  <td><a href='editar_cliente.php?edit=".$linha['id']."'>Editar</a></td>
                </tr>";
        }
      } else {
        echo "<tr><td colspan='7'>Nenhum cliente cadastrado.</td></tr>";
      }
      ?>
    </table>

    <?php
    // Fechar a conexão
    $conn->close();
    ?>
  </div>
</body>
</html>
