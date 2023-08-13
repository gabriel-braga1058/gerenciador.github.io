<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Clientes</title>
</head>
<body>
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

  // Atualizar os dados do cliente se o formulário for enviado
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $cliente_id = $_POST['cliente_id'];
      $nome = $_POST['nome'];
      $email = $_POST['email'];
      $telefone = $_POST['telefone'];
      $codigo = $_POST['codigo'];
      $data_expiracao = $_POST['data_expiracao'];

      $sql = "UPDATE clientes SET nome='$nome', email='$email', telefone='$telefone', codigo='$codigo', data_expiracao='$data_expiracao' WHERE id=$cliente_id";

      if ($conn->query($sql) === TRUE) {
          echo "Dados do cliente atualizados com sucesso!";
      } else {
          echo "Erro ao atualizar os dados do cliente: " . $conn->error;
      }
  }

  // Selecionar todos os registros da tabela clientes
  $selecionar_query = "SELECT * FROM clientes";
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
</body>
</html>
