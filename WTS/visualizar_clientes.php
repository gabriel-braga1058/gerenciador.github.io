<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Visualizar e Editar Clientes</title>
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
      width: 80%;
      background-color: #fff;
      padding: 20px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
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

    h1 {
      text-align: center;
    }

    a {
      text-decoration: none;
      color: #007bff;
    }
  </style>
</head>
<body>
<div class="container">
    <h1>Clientes Cadastrados</h1>
    <?php
      // Conectar ao banco de dados
      $servername = "localhost";
      $username = "root";  // Substitua pelo seu nome de usuário
      $password = "";    // Substitua pela sua senha
      $dbname = "clientes";       // Substitua pelo nome do seu banco de dados

      $conn = new mysqli($servername, $username, $password, $dbname);

      // Verificar a conexão
      if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
      }

      // Selecionar todos os registros da tabela
      $selecionar_query = "SELECT * FROM Registros";
      $resultados = $conn->query($selecionar_query);
      

      if ($resultados->num_rows > 0) {
        echo "<table>
              <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Código</th>
                <th>Data de Expiração</th>
                <th>Ações</th>
              </tr>";

        while ($linha = $resultados->fetch_assoc()) {
          echo "<tr>
                  <td>".$linha['id']."</td>
                  <td>".$linha['nome']."</td>
                  <td>".$linha['email']."</td>
                  <td>".$linha['telefone']."</td>
                  <td>".$linha['codigo']."</td>
                  <td>".$linha['data_expiracao']."</td>
                  <td><a href='editar_cliente.php?cliente_id=".$linha['id']."'>Editar</a></td>
                </tr>";
        }
        echo "</table>";
      } else {
        echo "Nenhum cliente cadastrado.";
      }

      // Fechar a conexão
      $conn->close();
    ?>
  </div>
</body>
</html>
