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

  
</head>
<body>
  <div class="container">
    <main class="content">
    <main class="content">
    <?php
      // Carregar o conteúdo da página selecionada
      if(isset($_GET['page'])) {
        $page = $_GET['page'];
        switch($page) {
          
          case 'page2':
            echo '<h4>Inicio/Clientes</h4>';
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
      width: 90%;
      background-color: #fff;
      padding: 20px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    form {
      text-align: left;
      width: 100%;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    label, input {
      display: block;
      margin-bottom: 10px;
    }

    input {
      width: 94%;
      padding: 9px;
      border: 2px solid #ccc;
      border-radius: 8px;
    }

    input[type="submit"] {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 4px;
      cursor: pointer;
    }

    h1 {
      text-align: center;
      margin-bottom: 20px;
    }
  </style>
      <form action="processar_registro.php" method="POST">
        <h1>Registro de Cliente</h1>
        <label for="nome">Nome do Cliente:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>

        <label for="telefone">Telefone:</label>
        <input type="tel" id="telefone" name="telefone" required>

        <label for="codigo">Código do Cliente:</label>
        <input type="text" id="codigo" name="codigo" required>

        <label for="data_expiracao">Data para Expirar:</label>
        <input type="date" id="data_expiracao" name="data_expiracao" required>

        <input type="submit" value="Registrar Cliente">
      </form>
    </main>
  <script src="script.js"></script>
</body>
</html>
