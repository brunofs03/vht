
<?php 
    require_once "config.php";

    if(!empty($logado)){
    $id = $_SESSION["id"];
    $sql = "SELECT  * FROM  users where id = " .$id;
    
    $result = mysqli_query($link, $sql);

    $row = mysqli_fetch_array($result);

};
            
  ?>


  <style>
    .sair{
      background-color:#c22525;color:white;padding-top: 6px;padding-bottom: 6px;transition:0.2s all;
    }
    .sair:hover{
      background-color:#961414;color:white;padding-top: 6px;padding-bottom: 6px;transition:0.2s all;
    }

  </style>

<header style="position: sticky;top: 0;background-color: white!important;z-index: 99999999;">



<nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin: auto;background-color: white!important;height: 100px;">
      <a style="margin-top:0px">
        <img src="images/logo4.png" style="max-width: 85px;margin-right: 50px;">
      </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarPequeno" aria-controls="navbarPequeno" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarPequeno">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active" style="background-color:white;">
      <a class="nav-link" href="mainPage.php">Página Inicial</a>
      </li>
      <li class="nav-item" style="background-color:white;">
        <a class="nav-link" href="TelaResultadoExplorar.php">Explorar</a>
      </li>
      <li class="nav-item" style="background-color:white;display: <?php echo (!empty($logado)) ? 'none' : ''; ?>"><a class="nav-link" 
      href="../TelaLogin.php">Fazer Login</a>
      </li>
      <li class="nav-item" style="background-color:white;display: <?php echo (!empty($logado)) ? '' : 'none'; ?>"><a class="nav-link" 
      href="TelaAgendamentos2.php">Agendamentos</a>
      </li>
      <li class="nav-item" style="background-color:white;display: <?php echo (!empty($logado)) ? 'none' : ''; ?>"><a class="nav-link"
          href="TelaCadastro.php">Cadastrar-se</a>
      </li>
      <li class="nav-item dropdown" style="background-color:white;display: <?php echo (!empty($logado)) ? '' : 'none'; ?>">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Minha conta
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="padding-bottom:0;">
          <a class="dropdown-item" href="TelaConfiguracao2.php">Configurações</a>
          <a class="dropdown-item sair" href="logout.php">Sair</a>
        </div>
      </li>
  </div>
</nav>
</header>