
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


<header class="u-clearfix u-header u-header" id="sec-8ae4" style="position: sticky;top: 0;background-color: white!important;z-index: 99999999;">



<nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin: auto;background-color: white!important;">
      <a class="u-image u-logo u-image-1" style="margin-top:0px">
        <img src="images/logo4.png" class="u-logo-image u-logo-image-1" style="max-width: 110px;margin-right: 50px;">
      </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarPequeno" aria-controls="navbarPequeno" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarPequeno">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
      <a class="nav-link" href="mainPage.php">Página Inicial</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="TelaResultadoExplorar.php">Explorar</a>
      </li>
      <li class="u-nav-item" style="display: <?php echo (!empty($logado)) ? 'none' : ''; ?>"><a class="nav-link" 
      href="../TelaLogin.php">Fazer Login</a>
      </li>
      <li class="u-nav-item" style="display: <?php echo (!empty($logado)) ? '' : 'none'; ?>"><a class="nav-link" 
      href="TelaAgendamentos2.php">Agendamentos</a>
      </li>
      <li class="u-nav-item" style="display: <?php echo (!empty($logado)) ? 'none' : ''; ?>"><a class="nav-link"
          href="TelaCadastro.php">Cadastrar-se</a>
      </li>
      <li class="nav-item dropdown" style="display: <?php echo (!empty($logado)) ? '' : 'none'; ?>">
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

























<!-- 



    <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
      <a class="u-image u-logo u-image-1">
        <img src="images/logo4.png" class="u-logo-image u-logo-image-1">
      </a>
      <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
      <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="u-nav-container">
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="u-nav u-unstyled u-nav-1">
            <li class="u-nav-item"><a
                class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base"
                href="mainPage.php" style="padding: 10px 20px;">Página Inicial</a>
            </li>
            <li class="u-nav-item"><a
                class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base"
                href="TelaResultadoExplorar.php" style="padding: 10px 20px;">Explorar</a>
            </li>
            <li class="u-nav-item" style="display: <?php echo (!empty($logado)) ? 'none' : ''; ?>"><a
                class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base"
                href="TelaLogin.php" style="padding: 10px 20px;">Fazer Login</a>
            </li>
            <li class="u-nav-item" style="display: <?php echo (!empty($logado)) ? '' : 'none'; ?>"><a
                class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base"
                href="TelaAgendamentos2.php" style="padding: 10px 20px;">Agendamentos</a>
            </li>
            <li class="u-nav-item" style="display: <?php echo (!empty($logado)) ? 'none' : ''; ?>"><a
                class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base"
                href="TelaCadastro.php"
                style="padding: 10px 20px;color: white;background-color: #2e2e2e;border-radius: 5px;">Cadastrar-se</a>
            </li>
            <li class="u-nav-item" style="display: <?php echo (!empty($logado)) ? '' : 'none'; ?>"><a
                class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base"
                data-toggle="collapse"data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
                aria-expanded="false" aria-label="Toggle navigation" id="menubutton"
                style="padding: 10px 20px;color: white;background-color: #2e2e2e;border-radius: 5px; -webkit-user-select: none;-ms-user-select: none;/user-select: none;">Minha conta</a>
            </li>
          </ul>
        </div>

        <div class="u-nav-container-collapse">
          <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
            <div class="u-sidenav-overflow">
              <div class="u-menu-close"></div>
              <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="mainPage.php">Página
                    Inicial</a>
                </li>
                <li class="u-nav-item"><a class="u-button-style u-nav-link" href="TelaResultadoExplorar.php">Explorar</a>
                </li>
                <li class="u-nav-item" style="display: <?php echo (!empty($logado)) ? 'none' : ''; ?>"><a class="u-button-style u-nav-link" href="../TelaLogin.php">Fazer Login</a>
                </li>
                <li class="u-nav-item" style="display: <?php echo (!empty($logado)) ? '' : 'none'; ?>"><a class="u-button-style u-nav-link" href="TelaAgendamentos2.php">Agendamentos</a>
                </li>
                <li class="u-nav-item" style="color: white;background-color: #2e2e2e; -webkit-user-select: none;-ms-user-select: none;/user-select: none;display: <?php echo (!empty($logado)) ? '' : 'none'; ?>"><a
                    class="u-button-style u-nav-link" href="">Minha conta</a>
                </li>
                <li class="u-nav-item" style="color: white;background-color: #2e2e2e;display: <?php echo (!empty($logado)) ? 'none' : ''; ?>"><a
                    class="u-button-style u-nav-link" href="TelaCadastro.php">Cadastrar-se</a>
                </li>
              </ul>
            </div>
          </div>
        </div>

        


        <div style="width:33%;float:right" id="menuButtonThing; -webkit-user-select: none;-ms-user-select: none;/user-select: none;">
            <div class="collapse" id="navbarToggleExternalContent"
                style="position:absolute; z-index: +5;border-radius: 10px;">
                <div class="bg-dark p-5" style="border-radius: 10px;background-color:#2e2e2e !important">
                    <center>
                        <h5 class=" text-white h4">Olá, <?php if(!empty($logado)){echo($row["first_name"]);};?></h5>
                    </center>
                    <br>
                    <a href="#" onclick="window.location.href = 'TelaConfiguracao2.php';" class="btn btn-light" style="width: 100%;<?php echo (!empty($logado)) ? '' : 'pointer-events: none;background: #999999;'; ?>">
                        <i class="fas fa-cog"></i> Configurações
                    </a>
                    <br>
                    <br>
                    <a href="#" class="btn"
                        style="width: 50%;margin-left:25%;background-color:#d43b3b;color:white;border-color:#f00000;display:<?php echo (!empty($logado)) ? '' : 'none'; ?>"
                        onclick="window.location.href = 'logout.php';">
                        Sair
                    </a>
                </div>
            </div>
        </div>
        </div>
      </nav>
    </div> -->
  </header>