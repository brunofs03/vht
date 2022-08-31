

<?php 
    require_once "config.php";

    if(!empty($logado)){
    $id = $_SESSION["id"];
    $sql = "SELECT  * FROM  user_funcionario where id_func = " .$id;
    
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
    .dropdown-item{
      color: black !important;
    }
    .dropdown-item{
      color: black !important;
    }
    .dropdown-menu{
      background-color: white !important;
    }
    .nav-link{
      color: white !important;
       border-radius: 10px;
       transition:background-color 0.3s !important;
    }
    .nav-link:hover{
       background-color: #474747;
       transition:background-color 0.3s !important;
    }


  </style>


<header class="u-clearfix u-header u-header" id="sec-8ae4" style="position: sticky;top: 0;background-color: #292d33 !important;z-index: 99999999;">



<nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin: auto;background-image: linear-gradient(#494a4a,#292d33);">
      <a class="u-image u-logo u-image-1" style="margin-top:0px">
        <img src="images/logo3.png" class="u-logo-image u-logo-image-1" style="border-right: 1px solid white;max-width: 100px;margin-right: 20px;padding-right: 20px;;">
      </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarPequeno" aria-controls="navbarPequeno" aria-expanded="false" aria-label="Toggle navigation" style="color:white;border-color: white !important;background-color:white">
    <span class="navbar-toggler-icon"  style="color:white;border-color: white !important;"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarPequeno">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
      <a class="nav-link" href="mainPage.php">Página Inicial</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Quartos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="CriacaoQuarto.php">Criar Quarto</a>
          <a class="dropdown-item" href="CockpitQuartos.php">Editar Quarto</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Administrador
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Criar usuário</a>
          <a class="dropdown-item" href="#">Editar usuário</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="GestaoDeLogins.php">Cockpit de logins</a>
        </div>
      </li>
      <li class="nav-item" style="padding-left: 6px;">
      <img src="images/powerButton.png" style="height:25px;cursor:pointer;margin-top:12px" onclick="window.location.href='logout.php'">
      </li>
  </div>
</nav>
  <header class="u-clearfix u-header u-header" id="sec-8ae4" style="background: #c4c229;color:white;padding:5px">
      Olá <?php if(!empty($logado)){echo($row["nome"]);};?>, bem vindo ao Portal Back-Office
  </header>
  </header>


<!-- <header class="u-clearfix u-header u-header" id="sec-8ae4" style="position: sticky;top: 0;background: #292d33;z-index: 99999999;">
    <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
      <a class="u-image u-logo u-image-1">
        <img src="images/logo3.png" class="u-logo-image u-logo-image-1">
      </a>
      <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
        <div class="u-nav-container">
        <ul class="u-nav u-unstyled u-nav-1">
            <li class="u-nav-item"><a
                class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base"
                href="mainPage.php" style="padding: 10px 20px;color:white">Página Inicial</a>
            </li>
            <li class="u-nav-item dropdown">
              <a class="u-nav-link dropdown-toggle" style="padding: 10px 20px;color:white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Quartos
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Criar Quarto</a>
                <a class="dropdown-item" href="#">Editar Quarto</a>
                <div class="dropdown-divider"></div>
              </div>
            </li>
            <li class="u-nav-item dropdown">
              <a class="u-nav-link dropdown-toggle" style="padding: 10px 20px;color:white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Administrador
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Criar usuário</a>
                <a class="dropdown-item" href="#">Editar usuário</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Cockpit de logins</a>
              </div>
            </li>
          </ul>
          <img src="https://lh3.googleusercontent.com/proxy/F2To8MMPRVEohFvMeVhD3-mlzuo6FPYq-Kwah1sDoNWNFR5_OFem-22PR0C6CE8ecRTBUubNHtUf14w2GCHJVFMppsix0B_35sb5SybOmhH29U8KOhH7ly54H9LHVD2eQ9POOs9VMQ" style="height:35px;cursor:pointer" onclick="window.location.href='logout.php'">
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
      </nav>
    </div>
  </header> -->
