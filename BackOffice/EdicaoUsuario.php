
<?php include "sessionStart.php"?>


<?php
// Inclui o arquivo de config
require_once "config.php";
 
// Define as variaveis com valores vazios
$username = $password = $confirm_password = $first_name = $firstname_err = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processar informação do form quando for submitado
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
  if(trim($_POST["hdnSalvar"]) == '1'){
    // Valida o nome de usuário
    if(empty(trim($_POST["username"]))){
        $username_err = "O E-mail não pode ser vazio.";
    }else if(strpos(trim($_POST["username"]), "@") == false){
      $username_err = "Por favor, insira um E-mail válido.";
    }else{
        // Prepara o sql de select
        $sql12 = "SELECT id FROM usuarios WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql12)){
            // Criar os parametros e adiciona elas ao sql
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Adiciona os valores aos parametros
            $param_username = trim($_POST["username"]);
            
            // Tenta executar o sql
            if(mysqli_stmt_execute($stmt)){
                /* Guarda o resultado */
                mysqli_stmt_store_result($stmt);
                
              if(mysqli_stmt_num_rows($stmt) == 1){
                  $username = trim($_POST["username"]);
              } else{
                  $username = trim($_POST["username"]);
              }
            } else{
                echo "Oops! Algo deu errado, tente novamente depois.";
            }

            // Fecha o sql
            mysqli_stmt_close($stmt);
        }
    }
    
   

    if(empty(trim($_POST["first_name"]))){
      $firstname_err = "O nome não pode ser vazio.";     
    }else{
          $first_name = trim($_POST["first_name"]);
    }
   
    $phone = trim($_POST["phone"]);

    
    // Checa pra ver se tem algum erro
    if(empty($username_err) && empty($firstname_err)){
        
      // Prepara o sql de update
      $sql = "update usuarios set email = ?, nome = ?, telefone = ? where id = " .$_GET["id"];
         
      if($stmt = mysqli_prepare($link, $sql)){
          // Criar os parametros e adiciona elas ao sql
          mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_first_name, $param_phone);
          
          // Adiciona os valores aos parametros
          $param_username = $username;
          $param_first_name = $first_name;
          $param_phone = $phone;
          
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
  }else if(trim($_POST["hdnSalvar"]) == '2'){

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
      $sql = "update users set senha = ? where id = " .$_GET["id"];
         
      if($stmt = mysqli_prepare($link, $sql)){
          // Criar os parametros e adiciona elas ao sql
          mysqli_stmt_bind_param($stmt, "s", $param_password);
          
          // Adiciona os valores aos parametros
            $param_password = password_hash($password, PASSWORD_DEFAULT);


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

  }else if(trim($_POST["hdnSalvar"]) == '3'){





    if(empty(trim($_POST["email_apagar"]))){
      $username_err = "Por favor, preencha o usuário.";
  } else{
      $username = trim($_POST["email_apagar"]);
  }
  
  // Check if password is empty
  if(empty(trim($_POST["senha_apagar"]))){
      $password_err = "Por favor, preencha a senha.";
  } else{
      $password = trim($_POST["senha_apagar"]);
  }
  
  // Validate credentials
  if(empty($username_err) && empty($password_err)){
      // Prepare a select statement
      $sql = "SELECT id, email, senha FROM users WHERE email = ?";
      
      if($stmt = mysqli_prepare($link, $sql)){
          // Bind variables to the prepared statement as parameters
          mysqli_stmt_bind_param($stmt, "s", $param_username);
          
          // Set parameters
          $param_username = $username;
          
          // Attempt to execute the prepared statement
          if(mysqli_stmt_execute($stmt)){
              // Store result
              mysqli_stmt_store_result($stmt);
              
              // Check if username exists, if yes then verify password
              if(mysqli_stmt_num_rows($stmt) == 1){                    
                  // Bind result variables
                  mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                  if(mysqli_stmt_fetch($stmt)){
                      if(password_verify($password, $hashed_password)){
                        if($_GET["id"] == $id){
                          $id = $_GET["id"];
                          $sql = "DELETE FROM users WHERE id = " .$id;
                          $stmt = mysqli_prepare($link, $sql);
                          mysqli_stmt_execute($stmt);
                          
                          header("location: mainPage.php");
                        }else{
                            $login_err = "Nome de usuário ou senha inválido.";
                        }
                      } else{
                          $login_err = "Nome de usuário ou senha inválido.";
                      }
                  }
              } else{
                  // Username doesn't exist, display a generic error message
                  $login_err = "Nome de usuário ou senha inválido.";
              }
          } else{
              echo "Ops, algo deu errado, tente novamente ou volte depois!";
          }

          // Close statement
          mysqli_stmt_close($stmt);
      }
  }





  }
}
?>

<!-- Incluir o Menu da página -->


<!DOCTYPE html>

<!-- Inicio da Importação de todas as bibliotecas usadas -->

<html style="font-size: 16px;">
<head>
  

  <!--- Importação CSS --->
  <link rel="stylesheet" type="text/css" href="/VHT/FrontOffice/Content/library/BootstrapFirst.min.css">
  <link rel="stylesheet" type="text/css" href="/VHT/FrontOffice/Content/library/BootstrapSecond.min.css">


  <!--- Importação Fontes --->
  <link rel="stylesheet" href="/VHT/FrontOffice/Content/fonts/FontAwesomeMain.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
  <link rel="stylesheet" href="/VHT/FrontOffice/Content/fonts/FontFamilyRoboto.css">

  <!--- Importação Javascript --->
  <script src="/VHT/FrontOffice/Content/library/jquery.min.js"></script>
  <script src="/VHT/FrontOffice/Content/library/bootstrap.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <title>Virtual Hotel Tech</title>
<link rel="icon" href="/VHT/FrontOffice/images/estrela.png"> 
</head>


<body style="font-family: 'Open Sans',sans-serif;font-size:15px;line-height:1.6">


<?php include "topmenu.php" ?>

<?php 
    require_once "config.php";

    $id = $_GET["id"];
    $sql = "SELECT  * FROM  usuarios where id = " .$id;
    
    $result = mysqli_query($link, $sql);

    $row = mysqli_fetch_array($result);

?>

<style>
    #preloader2  {
     position: fixed;
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
  <section>
    <div class="container" style="background-color:#e6e6e6;font-size:30px">
    <img src="https://icon-library.com/images/white-profile-icon/white-profile-icon-24.jpg" style="height: 40px;float: left;margin-right: 11px;margin-top: 10px;"><h3>Edição de usuário</h3>
    </div>
    <div class="container" style="background-color:#f5f5f5;">
            <?php 
            if(!empty($login_err)){
                echo '<br><div class="alert alert-danger">' . $login_err . '</div>';
            }        

            ?>
        <div class="row">
            <div class="col-sm-3">
                <h4>Dados pessoais</h4>
                <h5>Informações do usuário</h5>
            </div>
            <div class="col-sm-9">
                <br>
                <div class="row" style="margin-top:7px">
                    <div class="col-sm-2">
                        <label for="first_name" style="font-size: 14px;">Nome:</label>
                    </div>
                    <div class="col-sm-10">
                         <input type="text" class="form-control <?php echo (!empty($firstname_err)) ? 'is-invalid' : ''; ?>" id="first_name" name="first_name" value="<?php if(!empty($row)){echo($row["nome"]);};?>">
                        <div class="invalid-feedback"><?php echo $firstname_err; ?></div>
                    </div>
                </div>
                <div class="row" style="margin-top:7px">
                    <div class="col-sm-2">
                        <label for="username" style="font-size: 14px;">E-mail:</label>
                    </div>
                    <div class="col-sm-10">	
                         <input type="text" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" id="username" name="username" value="<?php if(!empty($row)){echo($row["email"]);};?>">
                        <div class="invalid-feedback"><?php echo $username_err; ?></div>
                    </div>
                </div>
                <div class="row" style="margin-top:7px">
                    <div class="col-sm-2">
                        <label for="phone" style="font-size: 14px;">Telefone:</label>
                    </div>
                    <div class="col-sm-10">	
                         <input type="text" class="form-control <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>" id="phone" name="phone" value="<?php if(!empty($row)){echo($row["telefone"]);};?>">
                        <div class="invalid-feedback"><?php echo $phone_err; ?></div>
                    </div>
                </div>

				<script>
				   $(document).ready(function (){
						$("#phone").mask("(99) 99999-9999");			 
					});
				</script>

                <div class="row" style="margin-top:7px">
                    <div class="col-sm-3 col-sm-offset-9">
                         <input type="button" class="btn" value="Salvar" id="btnAlterar" style="width: 100%;padding: 10px 20px;color: white;background-color: #2e2e2e;border-radius: 5px;-webkit-user-select: none;" onclick="salvarDados();">
                    </div>
                </div>
            </div>
        </div>  
        <br><br>
        <div class="row">
            <div class="col-sm-3">
                <h4>Acesso</h4>
                <h5>A senha deve conter pelo menos 6 caracteres.</h5>
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
                    <div class="col-sm-3 col-sm-offset-6">
                         <input type="button" class="btn" value="Apagar Conta" id="btnAlterar" style="background-color: #cc2929;" data-toggle="modal" data-target="#modalApagar">
                    </div>
                    <div class="col-sm-3">
                         <input type="button" class="btn" value="Alterar Senha" id="btnAlterar" onclick="mudarSenha();">
                    </div>
                </div>
            </div>
        </div> 
        <br>
        <br>
    </div>
    
    <div class="modal fade" id="modalApagar" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document" style="margin-top: 15%;">
        <div class="modal-content">
          <div class="modal-body">
            <div style="font-size: 18px;">
                <h1 style="font-size: 2rem;text-align: center;">Apagar Conta</h1>
                Você tem certeza que quer apagar sua conta?<br>
                Você perderá os dados para sempre (Muito tempo!)
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="color:white">Fechar</button>
            <button type="button" class="btn btn-primary" id="btnAlterar" style="padding: 6px 12px;width:20%" onclick="$('#modalApagar').modal('hide');$('#modalConfirmar').modal('show');">Confirmar</button>
          </div>
        </div>
      </div>
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
                <label for="senha_apagar">Senha</label>
                  <input type="password" class="form-control" id="senha_apagar" name="senha_apagar"><br>
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

            jQuery("#preloader2").delay(2500).fadeOut();

            setTimeout(function () {
            $(".path").removeAttr("class", "path path-complete");
            $(".fill").removeAttr("class", "fill fill-complete success");
            $(".check").removeAttr("class", "check check-complete success");
            $(".fill").removeAttr("class", "fill fill-complete");
            $(".check").removeAttr("class", "check check-complete");
            document.getElementById('status_text').innerText = "Salvando..."
                $(".checkmark").empty();
                $(".checkmark").append("<svg version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' xml:space='preserve' x='0px' y='0px' viewBox='0, 0, 100, 100' id='checkmark'><g transform=''><circle class='path' fill='none' stroke='#7DB0D5' stroke-width='4' stroke-miterlimit='10' cx='50' cy='50' r='44'/><circle class='fill' fill='none' stroke='#7DB0D5' stroke-width='4' stroke-miterlimit='10' cx='50' cy='50' r='44'/><polyline class='check' fill='none' stroke='#7DB0D5' stroke-width='8' stroke-linecap='round' stroke-miterlimit='10' points='70,35 45,65 30,52  '/></g></svg>");
            }, 5000);

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
