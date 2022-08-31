



<?php 
	if(!(isset($_GET["token"]))) {
		$_GET["token"] = '';
	}

    require_once "config.php";

    $token = $_GET["token"];
    $sql = "select * from tb_redefinicao_senha where token = '" .$token ."'";
    
    $result = mysqli_query($link, $sql);

    $row = mysqli_fetch_array($result);


	if(!(isset($row["status"]))) {
		$row["status"] = '1';
	}
?>

<?php
// Inclui o arquivo de config
require_once "config.php";
 
// Define as variaveis com valores vazios
$username = $password = $confirm_password = $first_name = $firstname_err = $last_name = $lastname_err = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processar informação do form quando for submitado
if($_SERVER["REQUEST_METHOD"] == "POST"){
 

    if(empty(trim($_POST["new_password"]))){
        $password_err = "Por favor, preencha a senha.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $password_err = "A senha precisa ter pelo menos 6 caracteres.";
    } else{
        $password = trim($_POST["new_password"]);
    }

    if(empty(trim($_POST["confirm_password"]))){
      $confirm_password_err = "Por favor, confirme a senha.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "As senhas são diferentes.";
        }
    }

    if(empty($confirm_password_err) && empty($password_err)){
        
      // Prepara o sql de update
      $sql = "update users set password = ? where id = " .$row["id_user"];
         
      if($stmt = mysqli_prepare($link, $sql)){
          // Criar os parametros e adiciona elas ao sql
          mysqli_stmt_bind_param($stmt, "s", $param_password);
          
          // Adiciona os valores aos parametros
            $param_password = password_hash($password, PASSWORD_DEFAULT);


	      // Prepara o sql de update
	      $sql2 = "update tb_redefinicao_senha set status = 1 where id_user = " .$row["id_user"];

	      $stmt2 = mysqli_prepare($link, $sql2);

	      mysqli_stmt_execute($stmt2);
         
          // Tenta executar o sql
          if(mysqli_stmt_execute($stmt)){
              // Começa a animação de salvar
              echo "<script>window.onload = function() {checkmark();}</script>";
          } else{
              echo "Oops! Algo deu errado, tente novamente..";
          }

          // Fecha a variável de sql
          mysqli_stmt_close($stmt);
      }
    }


}
?>

<!-- Incluir o Menu da página -->


<!DOCTYPE html>

<!-- Inicio da Importação de todas as bibliotecas usadas -->

<html style="font-size: 16px;">
<head>
	<title>VHT</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="Content/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Content/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="Content/css/estiloPrincipal.css" media="screen">
	<link rel="stylesheet" href="Content/css/mainPage.css" media="screen">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">

</head>


<body class="u-body">


<?php include "topmenu.php" ?>

<style>
    #preloader2  {
     position: absolute;
     top: 0;

     right: 0;
     bottom: 0;
     background-color: #fefefe;
     z-index: 999999999;
    height: 100%;
     width:100%;
 }

.checkmark {
  width: 300px;
  margin: 0 auto;
  padding-top: 40px;
  margin-top: 9%;
}

.path {
  stroke-dasharray: 300;
  stroke-dashoffset: 0;
  -webkit-animation-name: load, spin;
  -webkit-animation-duration: 3s, 3s;
  -webkit-animation-timing-function: linear;
  -webkit-animation-iteration-count: infinite;
  animation-name: load, spin;
  animation-duration: 3s, 3s;
  animation-timing-function: linear;
  animation-iteration-count: infinite;
  -webkit-transform-origin: 50% 50%;
  -moz-transform-origin: 50px 50px;
}

.path-complete {
    -webkit-animation-play-state: paused;
    animation-play-state: paused;
}

.check
{
    stroke-dasharray: 110;
    stroke-dashoffset: -110;
    stroke-width: 0;
}

.check-complete
{
    -webkit-animation: check 1s ease-in forwards;
    animation: check 1s ease-in forwards;
    stroke-width: 15;
    stroke-dashoffset: 0;
}

.fill
{
    stroke-dasharray: 285;
    stroke-dashoffset: -257;
    -webkit-animation: spin-fill 3s cubic-bezier(0.700, 0.435, 0.120, 0.600) infinite forwards;
    animation: spin-fill 3s cubic-bezier(0.700, 0.465, 0.120, 0.600) infinite forwards;
    -webkit-transform-origin: 50% 50%;
  -moz-transform-origin: 50px 50px;
}

.fill-complete
{
    -webkit-animation: fill 1s ease-out forwards;
    animation: fill 1s ease-out forwards;
}

@-webkit-keyframes load {
 0% {
   stroke-dashoffset: 300;
   -webkit-animation-timing-function: cubic-bezier(0.550, 0.055, 0.675, 0.190);
 }
 50% {
     stroke-dashoffset: 0;
     -webkit-animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
 }
 100% {
   stroke-dashoffset: -300;
 }
}
@keyframes load {
 0% {
   stroke-dashoffset: 285;
   animation-timing-function: cubic-bezier(0.550, 0.055, 0.675, 0.190);
 }
 50% {
     stroke-dashoffset: 0;
     animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
 }
 100% {
   stroke-dashoffset: -285;
 }
}

@-webkit-keyframes check {
 0% {
   stroke-dashoffset: -110;
}
 100% {
   stroke-dashoffset: 0;
 }
}
@keyframes check {
 0% {
   stroke-dashoffset: -110;
}
 100% {
   stroke-dashoffset: 0;
 }
}

@-webkit-keyframes spin {
  0% {
    -webkit-transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
  }
}
@keyframes spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

@-webkit-keyframes spin-fill {
  0% {
    -webkit-transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(720deg);
  }
}
@keyframes spin-fill {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(720deg);
  }
}

@-webkit-keyframes fill {
  0% {
    stroke-dashoffset: 285;
  }
  100% {
    stroke-dashoffset: 0;
  }
}
@keyframes fill {
  0% {
    stroke-dashoffset: 285;
  }
  100% {
    stroke-dashoffset: 0;
  }
}

#status{
    margin: auto;
    width: fit-content;
}

.success
{
    stroke: #009900;
    transition: stroke .6s;
}

#btnAlterar{
  width: 100%;
  padding: 10px 20px;
  color: white;
  background-color: #2e2e2e;
  border-radius: 5px;
  -webkit-user-select: none;
  transition: all 0.5s;
}

#btnAlterar:hover{
  background-color:#050505;
}

body{
  padding-right:0px !important;
}

.modal{
  padding-right:0 !important;
}
</style>


  

<!-- Seção das informações da tabela -->
<div style="background-color:#dbdbdb;">
<form id="mainDiv" name="mainDiv" action="" method="POST">
<input type="hidden" id="hdnSalvar" name="hdnSalvar" value="0">
<div id="preloader2" style="display:none">
     <div class="checkmark">
    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" x="0px" y="0px"
        viewBox="0, 0, 100, 100" id="checkmark">
        <g transform="">
            <circle class="path" fill="none" stroke="#7DB0D5" stroke-width="4" stroke-miterlimit="10" cx="50" cy="50" r="44"/>
            <circle class="fill" fill="none" stroke="#7DB0D5" stroke-width="4" stroke-miterlimit="10" cx="50" cy="50" r="44"/>
            <polyline class="check" fill="none" stroke="#7DB0D5" stroke-width="8" stroke-linecap="round" stroke-miterlimit="10"
                points="70,35 45,65 30,52  "/>
        </g>
    </svg>

</div>
    <div id="status"><h2 id="status_text">Salvando...</h2></div>

</div>
<br>
<br>

  <section <?php echo ($row['status'] != '0') ? 'hidden' : ''; ?>>
    <div class="container" style="background-color:#e6e6e6;font-size:30px">
    <img src="https://icon-library.com/images/white-profile-icon/white-profile-icon-24.jpg" style="height: 40px;float: left;margin-right: 11px;margin-top: 10px;"><h3>Meu Perfil</h3>
    </div>
    <div class="container" style="background-color:#f5f5f5;">
            <?php 
            if(!empty($login_err)){
                echo '<br><div class="alert alert-danger">' . $login_err . '</div>';
            }        
            ?>
        <br><br>
        <div class="row">
            <div class="col-sm-3">
                <h4>Acesso</h4>
                <h5>Altere sua senha regularmente.</h5>
                <h5>Ela deve conter pelo menos 6 caracteres.</h5>
            </div>
            <div class="col-sm-9">
                <br>
                <div class="row" style="margin-top:7px">
                    <div class="col-sm-2">
                        <label for="new_password" style="font-size: 14px;">Nova Senha:</label>
                    </div>
                    <div class="col-sm-10">
                         <input type="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" id="new_password" name="new_password" readonly onfocus="this.removeAttribute('readonly');" style="background-color: #fff;"/>
                         <div class="invalid-feedback"><?php echo $password_err; ?></div>
                    </div>
                </div>
                <div class="row" style="margin-top:7px">
                    <div class="col-sm-2">
                        <label for="confirm_password" style="font-size: 14px;">Confirme sua Nova Senha:</label>
                    </div>
                    <div class="col-sm-10">
                         <input type="password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" id="confirm_password" name="confirm_password" readonly onfocus="this.removeAttribute('readonly');" style="background-color: #fff;"/>
                         <div class="invalid-feedback"><?php echo $confirm_password_err; ?></div>
                    </div>
                </div>
                <div class="row" style="margin-top:7px">
                    <div class="col-sm-3 col-sm-offset-9">
                         <input type="button" class="btn" value="Alterar Senha" id="btnAlterar" onclick="mudarSenha();">
                    </div>
                </div>
            </div>
        </div> 
        <br>
        <br>
    </div>
    
    <div class="modal fade" id="modalConfirmar" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document" style="margin-top: 15%;">
        <div class="modal-content">
          <div class="modal-body">
            <div style="font-size: 18px;">
                <h1 style="font-size: 2rem;text-align: center;">Confirmar Dados</h1>
                Por favor, confirme seu login abaixo.

                <br><br>

                <label for="email_apagar">E-mail</label>
                  <input type="text" class="form-control" id="email_apagar" name="email_apagar"><br>
                <!-- <label for="senha_apagar">Senha</label>
                  <input type="password" class="form-control" id="senha_apagar" name="senha_apagar"><br> -->
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="color:white">Fechar</button>
            <button type="button" class="btn btn-primary" id="btnAlterar" style="padding: 6px 12px;width:30%;background-color: #cc2929;border-color: #cc2929" onclick="deleteAccount()">Apagar Conta</button>
          </div>
        </div>
      </div>
    </div>



        </section>

  <section <?php echo (! ($row['status'] != '0')) ? 'hidden' : ''; ?>>
    <div class="container" style="background-color:#e6e6e6;font-size:30px">
    <img src="https://icon-library.com/images/white-profile-icon/white-profile-icon-24.jpg" style="height: 40px;float: left;margin-right: 11px;margin-top: 10px;"><h3>Meu Perfil</h3>
    </div>
    <div class="container" style="background-color:#f5f5f5;">
            <?php 
            if(!empty($login_err)){
                echo '<br><div class="alert alert-danger">' . $login_err . '</div>';
            }        
            ?>
        <br><br>
        <div class="row">
            <div class="col-sm-12">
                <h4>Ocorreu um erro ao iniciar redefinição de senha</h4>
                <h5>O token informado encontra-se expirado ou inexistente</h5>
                <h5>Favor iniciar novamente a redefinição de senha</h5>
            </div>
        </div> 
        <br>
        <br>
    </div>
    
    <div class="modal fade" id="modalConfirmar" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document" style="margin-top: 15%;">
        <div class="modal-content">
          <div class="modal-body">
            <div style="font-size: 18px;">
                <h1 style="font-size: 2rem;text-align: center;">Confirmar Dados</h1>
                Por favor, confirme seu login abaixo.

                <br><br>

                <label for="email_apagar">E-mail</label>
                  <input type="text" class="form-control" id="email_apagar" name="email_apagar"><br>
                <!-- <label for="senha_apagar">Senha</label>
                  <input type="password" class="form-control" id="senha_apagar" name="senha_apagar"><br> -->
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="color:white">Fechar</button>
            <button type="button" class="btn btn-primary" id="btnAlterar" style="padding: 6px 12px;width:30%;background-color: #cc2929;border-color: #cc2929" onclick="deleteAccount()">Apagar Conta</button>
          </div>
        </div>
      </div>
    </div>



        </section>
      <br>
      <br>
    </div>
</div>





<!-- Incluir o footer da página -->

<?php include "footer.php" ?>



</body>

</html>

<script>
    function checkmark(){
        jQuery("#preloader2").fadeIn();
        setTimeout(function () {
            $(".check").attr("class", "check check-complete");
            $(".fill").attr("class", "fill fill-complete");
            }, 1200);

            setTimeout(function () {
            $(".check").attr("class", "check check-complete success");
            $(".fill").attr("class", "fill fill-complete success");
            $(".path").attr("class", "path path-complete");
            document.getElementById('status_text').innerText = "Salvo!"
            }, 2100);

            setTimeout(function () {
            	window.location.href = '/VHT/telaLogin.php';
            }, 2500);

    }
    function salvarDados(){
        document.getElementById('hdnSalvar').value = '1';
        document.getElementById('mainDiv').submit();
    }
    function mudarSenha(){
        document.getElementById('hdnSalvar').value = '2';
        document.getElementById('mainDiv').submit();
    }
    function deleteAccount(){
        document.getElementById('hdnSalvar').value = '3';
        document.getElementById('mainDiv').submit();
    }
</script>
