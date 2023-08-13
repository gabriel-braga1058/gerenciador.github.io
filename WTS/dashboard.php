<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Dashboard</title>
  
</head>
<body>
  <nav class="sidebar">
    <ul>
      <li>Menu</li>
      <li><a href="dashboard.php">Inicio</a></li>
      <li><a href="page2.php">Registrar Cliente</a></li>
      <li><a href="page3.php">Atualizações</a></li>
      <li><a href="?page=page5">Sair</a></li>
    </ul>
  </nav>

  <header class="header">
    <?php
      // Mostrar o indicador de localização
      if(isset($_GET['page'])) {
        $pageTitle = '';
        switch($_GET['page']) {
          case 'page1':
            $pageTitle = 'Menu';
            break;
          case 'page2':
            $pageTitle = 'Inicio';
            break;
          case 'page3':
            $pageTitle = 'Registrar Cliente';
            break;
          case 'page4':
            $pageTitle = 'Atualizações';
            break;
          case 'page5':
            $pageTitle = 'Sair';
            break;
        }
        echo '<p>Você está em: ' . $pageTitle . '</p>';
      }
    ?>
  </header>

  <main class="content">
  
    <?php
      // Carregar o conteúdo da página selecionada
      if(isset($_GET['page'])) {
        $page = $_GET['page'];
        switch($page) {
          
          case 'page2':
            echo '<h1>Inicio/Clientes</h1>';
            break;
          case 'page3':
            echo '<h1>Registrar Clientes</h1>';
            break;
          case 'page4':
            echo '<h1>Atualização</h1>';
            break;
          case 'page5':
            echo '<h1>Conteúdo da Página 5</h1>';
            break;
          default:
            echo '<h1>Página não encontrada</h1>';
        }
      }
    ?>
  </main>
  <style> /* css onde mostra os crientes  */
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
  </style>
  
</head>
<body>
<div class="container">
    <h1>Clientes Cadastrados</h1>
    <?php
    // Conectar ao banco de dados
    $conexao = new mysqli('localhost', 'root', '', 'clientes');

    // Verificar a conexão
    if ($conexao->connect_error) {
      die("Conexão falhou: " . $conexao->connect_error);
    }

    // Selecionar todos os registros da tabela
    
    $selecionar_query = "SELECT * FROM registros";
    $resultados = $conexao->query($selecionar_query);

    if ($resultados->num_rows > 0) {
      echo "<table>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Email</th>
              <th>Telefone</th>
              <th>Código</th>
              <th>Data de Expiração</th>
            </tr>";

      while ($linha = $resultados->fetch_assoc()) {
        echo "<tr>
                <td>".$linha['id']."</td>
                <td>".$linha['nome']."</td>
                <td>".$linha['email']."</td>
                <td>".$linha['telefone']."</td>
                <td>".$linha['codigo']."</td>
                <td>".$linha['data_expiracao']."</td>
              </tr>";
      }
      echo "</table>";
    } else {
      echo "Nenhum cliente cadastrado.";
    }

    // Fechar a conexão
    $conexao->close();
    ?>
  </div>
  
  <script src="script.js"></script>
</body>
</html>
