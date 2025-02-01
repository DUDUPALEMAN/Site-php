<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Cadastro</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <i class="bi bi-house-door"></i> Cadastro
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">
                <i class="bi bi-house-door"></i> Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?page=novo">
                <i class="bi bi-person-plus"></i> Novo Usuário
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?page=listar">
                <i class="bi bi-person-lines-fill"></i> Listar Usuários
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container mt-5">
      <div class="row">
        <div class="col">
          <?php 
            include("config.php");  

            if (isset($_GET['page'])) {
              
              switch ($_GET['page']) {
                case 'novo':
                  include("novo-usuario.php");
                  break;
                case 'listar':
                  include("listar-usuario.php");
                  break;
                case 'salvar':
                  include("salvar-usuario.php");
                  break;
                case 'editar':
                  include("editar-usuario.php");
                  break;
                default:
                  echo "<h1>Página não encontrada!</h1>";
              }
            } else {
              echo "<h1>Bem-vindo ao Sistema de Cadastro!</h1>";
            }
          ?>
        </div>
      </div>
    </div>  

    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>
