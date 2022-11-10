<?php 
  session_start();
  if (empty($_SESSION["login"])) {
    header('location: LoginCadastro.php');
    session_destroy();
  }
   include('../Dao/Perfil.php');
   include('../Controllers/PerfilController.php');
  // //include('../Conection/Conn.php');

  $controller = new ClientsController();

  $action = !empty($_GET['a']) ? $_GET['a'] : 'getAllPerfil';

  $controller->{$action}();

  $resultData = $_SESSION['perfil'];
?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> Scilink - Plataforma de Cientistas</title>
  <link rel="stylesheet" href="./style/stylepubli.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/jpg" href="../View/img/logo.png" />
</head>

<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">SciLink</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="Home.php" class="active">
          <i class='bx bx-message-square-dots'></i>
          <span class="links_name">Publicações</span>
        </a>
      </li>
      <li>
        <a href="FormularioPubli.php">
          <i class='bx bx-edit-alt'></i>
          <span class="links_name">Criar Publicação</span>
        </a>
      </li>
      <li>
        <a href="MinhasPublicacoes.php">
          <i class='bx bx-library'></i>
          <span class="links_name">Minhas Publicações</span>
        </a>
      </li>
      <li>
        <a href="PaginaPerfil.php">
          <i class='bx bx-group'></i>
          <span class="links_name">Meu Perfil</span>
        </a>
      </li>
      <li class="log_out">
        <a href="LoginCadastro.php">
          <i class='bx bx-door-open'></i>
          <span class="links_name">Sair</span>
        </a>
      </li>
    </ul>

  </div>

  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Perguntas</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Filtrar">
        <i class='bx bx-search' style="background-color: #546CB3; color: rgb(255, 255, 255);"></i>
      </div>


      <div class="profile-details">
        <img src="./img/iconCientista.png" alt="">

        <div class="dropdown">
          <span>Nome Usuário</span>
          <div class="dropdown-content">
            <div class="teste">
              <a href="CadastroPerfil.php" class="son">Editar Perfil</a><br>
              <a href="LoginCadastro.php" class="son">Sair</a>
            </div>
          </div>
        </div>

        <i class='bx bx-chevron-down'></i>
      </div>
    </nav>


    <?php foreach ($resultData as $data) : ?>
    <table border="0">
      <tr>
        <td class="titulo">
          <h3><?= $data['tit_projeto'] ?></h3>
        </td>
      </tr>
      <tr>
        <td class="info">
          <p>Início do Projeto: <?= $data['dti_projeto'] ?></p>
          <p>Início do Projeto: <?= $data['dtt_projeto'] ?></p>
        </td>
      </tr>
      <tr>
        <td class="resumo">
          <p><?= $data['res_projeto'] ?></p>
        </td>
      </tr>
      <tr>
        <td class="pessoa">

          <div class="info-pessoa">
            <p> <?= $data['nom_cientista'] ?> • Biólogo Marinho </p>
            <div class="redes">
              <div class="linkedin">
                <img src="./img/bxl-linkedin.svg" alt="Linkedin logo">
                <p> https://br.linkedin.com/ </p>
              </div>
              <div class="email">
                <img src="./img/bx-envelope.svg" alt="email logo">
                <p> <?= $data['email_cientista'] ?> </p>
              </div>
            </div>
          </div>
          <div class="botoesMinhasPubli">
            <a href="#" class="botaoEdit">Editar</a>
            <a href="#" class="botaoDel">Apagar</a>
          </div>

        </td>
      </tr>
    </table>
    <?php endforeach; ?>
  </section>


  <div class="botao__flutuante">
    <button class="botao__flutuante-cadastro btn-primario">
      <span>

      </span>
    </button>

    <ul class="botao__flutuante-opcoes">

      <li>
        <span>
          Criar Publicação
        </span>
        <a href="FormularioPubli.php">
          <button class="botao__flutuante-item btn-primario local"><span class="local"></span></button>
        </a>
      </li>
      <li>
        <span>
          Editar Perfil
        </span>
        <a href="CadastroPerfil.php">
          <button class="botao__flutuante-item btn-primario local"><span class="perfil"></span></button>
        </a>
      </li>

      <li>
        <span>
          Sair
        </span>
        <a href="LoginCadastro.php">
          <button class="botao__flutuante-item btn-primario"><span class="sair"></span></button>
        </a>
      </li>
    </ul>

  </div>



  <script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function() {
      sidebar.classList.toggle("active");
      if (sidebar.classList.contains("active")) {
        sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
      } else
        sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
  </script>

</body>

</html>