<?php
  session_start();
  if (empty($_SESSION["login"])) {
    header('location: LoginCadastro.php');
    session_destroy();
  }



  include('../Dao/Client.php');
  require_once('../Controllers/clientsController.php');
  require_once('../Conection/Conn.php');

  $controller = new clientsController();

  $action = !empty($_GET['a']) ? $_GET['a'] : 'getAll';

  $controller->{$action}();

  $resultData = $_SESSION['var'];

?>

<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> Scilink - Plataforma de Cientistas</title>
  <link rel="stylesheet" href="./style/styleDash.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/jpg" href="../View/img/logo.png" />
</head>

<body>
  <div class="sidebar">
    <div class="logo-details">
      <img src="./img/logopb.png" alt="">
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
        <a href="FomularioPubli.php">
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
        <input type="text" placeholder="Filtrar" id="searchbar">
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

      
    <div class="espaco-table">

    </div>
    <?php while($data = $resultData->fetch(PDO::FETCH_ASSOC)){  ?>   
      <a href="Pub.php" class="btn-publicacao" style="text-decoration: none;">
      <div id="resposta" class="box-resposta">
        <table border="0" class="pub">
        <tr>
          <td class="info">
            <h3 style="text-decoration: none; color: #000000;"><?= $data['tit_projeto'] ?></h3>
            <p><b></b> Autor: Gabriel Lamarca</p>
            <p>• Biólogo Marinho</p>
          </td>
          <td class="espaco"></td>
          <td class="data">
            <p>Início do Projeto: <?= $data ['dti_projeto'] ?></p>
            <p>Término do Projeto: <?= $data ['dtt_projeto'] ?></p>

          </td>
        </tr>
      </table>
      </div>
    </a>
      <?php }?>

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


</body>

</html>

<script>
 $(document).ready(function(){
   $("#resposta").find("input[type='hidden']").click(function(){
    console.log($(this).attr("id"));
   });
});
  
</script>

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
<script>
  // JavaScript code
  function search_animal() {
    let input = document.getElementById('searchbar').value
    input = input.toLowerCase();
    let x = document.getElementsByClassName('pub');

    for (i = 0; i < x.length; i++) {
      if (!x[i].innerHTML.toLowerCase().includes(input)) {
        x[i].style.display = "none";
      } else {
        x[i].style.display = "table";
      }
    }
  }
</script>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="./bootstrap/app/Views/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
<script src="./bootstrap/app/Views/bootstrap/js/jquery-3.5.1.js"></script>
<script src="./bootstrap/app/Views/bootstrap/js/jquery.dataTables.min.js"></script>
<script src="./bootstrap/app/Views/bootstrap/js/dataTables.bootstrap5.min.js"></script>
<script src="./bootstrap/app/Views/bootstrap/js/script.js"></script>
</body>
</php>