<?php
if (isset($_COOKIE['PHPSESSID'])) {
  unset($_COOKIE['PHPSESSID']); 
  setcookie('PHPSESSID', null, -1, '/'); 
}

// Checa se o usuário está logado, se logado ele envia para a tela inicial
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: FrontOffice/MainPage.php");
  exit;
}

// Include no codigo de configuração
require_once "FrontOffice/config.php";

// Define as variaveis vazias
$username = $password = "";
$username_err = $password_err = $login_err = "";

// Processar os dados se o formulário for dado submit
if($_SERVER["REQUEST_METHOD"] == "POST"){

  // Checa se o nome de usuário está vazio
  if(empty(trim($_POST["username"]))){
      $username_err = "Por favor, preencha o usuário.";
  } else{
      $username = trim($_POST["username"]);
  }
  
  // Checa se a senha está vazia
  if(empty(trim($_POST["password"]))){
      $password_err = "Por favor, preencha a senha.";
  } else{
      $password = trim($_POST["password"]);
  }
  
  // Valida as credenciais
  if(empty($username_err) && empty($password_err)){
      // Prepara o sql
      $sql = "SELECT id, email, senha, perfil FROM usuarios WHERE email = ?";
      
      if($stmt = mysqli_prepare($link, $sql)){
          // Atribui os valores a variavel no sql
          mysqli_stmt_bind_param($stmt, "s", $param_username);
          
          // Cria os parametros
          $param_username = $username;
          
          // Tenta executar o sql
          if(mysqli_stmt_execute($stmt)){
              // Guarda o resultado
              mysqli_stmt_store_result($stmt);
              
              // Checa se o nome de usuário existe
              if(mysqli_stmt_num_rows($stmt) == 1){                    
                  // Bind result variables
                  mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $perfil);
                  if(mysqli_stmt_fetch($stmt)){
                      if(password_verify($password, $hashed_password)){
                          // A senha está certa, criando o login

                          $sql2 = "INSERT into log_usuarios( id_usuario, email, tipo )VALUES( ?, ? ,?)";
      
                            $stmt2 = mysqli_prepare($link, $sql2);
                              // Atribui os valores a variavel no sql
                              mysqli_stmt_bind_param($stmt2, "sss", $param_id,$param_email,$param_tipo);
                              
                              // Cria os parametros
                              $param_id = $id;
                              $param_email = $username;



                              if($perfil == 1){
                                $param_tipo = "Cliente";
                              }else if($perfil == 2){
                                $param_tipo = "Funcionário";
                              }
                              
                              // Tenta executar o sql
                              mysqli_stmt_execute($stmt2);


                          if(isset($_POST['manterLog'])){
                          ini_set('session.cookie_lifetime', 60 * 60 * 24 * 365);
                          ini_set('session.gc-maxlifetime', 60 * 60 * 24 * 365);
                          }
                          session_start();
                          
                          // guarda os dados em variaveis de sessão
                          if(isset($_POST['manterLog'])){
                          $_SESSION["manter"] = true;
                          }else{
                          $_SESSION["manter"] = false;
                          }
                          $_SESSION["loggedin"] = true;
                          $_SESSION["id"] = $id;
                          $_SESSION["username"] = $username;                            
                          
                          // Redireciona o usuário para a página inicial

                          if($perfil == 1){
                            $_SESSION["permissao"] = false;
                            header("location: FrontOffice/MainPage.php");
                          }else if($perfil == 2){
                            $_SESSION["permissao"] = true;
                            header("location: BackOffice/MainPage.php");
                          }
                      }else{
                        $login_err = "Nome de usuário ou senha inválido.";
                      } 
                   }

              }else{
                $login_err = "Nome de usuário ou senha inválido.";
              } 
          } else{
              echo "Ops, algo deu errado, tente novamente ou volte depois!";
          }

          // Close statement
          mysqli_stmt_close($stmt);
      }



  mysqli_close($link);
      
     
  }
}
  
  // Close connection


?>


<!doctype html>
<html lang="en" style="height:100%">

<style>
  .control:hover input:not([disabled]):checked~.control__indicator,
  .control input:checked:focus~.control__indicator {
    background: black !important;
  }

  .control input:checked~.control__indicator {
    background: #292d33 !important;
  }

  .btn-primary {
    color: #fff;
    background-color: #292d33 !important;
    border-color: #292d33 !important;
  }

  .btn-primary:hover {
    color: #fff;
    background-color: black !important;
    border-color: black !important;
  }

</style>


<head>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="FrontOffice/Content/fonts/icomoon/style.css">

  <link rel="stylesheet" href="FrontOffice/Content/css/owl.carousel.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="FrontOffice/Content/css/bootstrap.min.css">

  <!-- Style -->
  <link rel="stylesheet" href="FrontOffice/Content/css/style.css">


  <title>Virtual Hotel Tech</title>
<link rel="icon" href="/VHT/FrontOffice/images/estrela.png"> 
  
</head>

<body style="height:100%">

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="height:100%">
  <div class="d-lg-flex half" style="height:100%;min-height:auto">
    <div class="bg order-2 order-md-1" style="background-image: url('FrontOffice/images/FundoLogin.png');"></div>
    <div class="contents order-1 order-md-2">

      <div class="container" style="height:100%">
        <div class="row align-items-center justify-content-center" style="height:100%;min-height:0">
          <div class="col-md-7">
            <br><br>
            <h3>Fazer login no <strong>VHT</strong></h3>
            <p class="mb-4">Bem vindo de volta! faça login para continuar.</p>
            <?php 
            
            if(!empty($login_err)){
                echo '<div class="alert alert-danger">' . $login_err . '</div>';
            }        
            ?>
            <form action="#" method="post">
              <div class="form-group first">
                <label for="username">E-mail</label>
                <input type="text" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" placeholder="Seu nome de usuário" name="username" id="username"  style="background-color: transparent !Important;border:all !Important">
                <div class="invalid-feedback"><?php echo $username_err; ?></div>
              </div>
              <div class="form-group last mb-3">
                <label for="password">Senha</label>
                <input type="password"  class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" placeholder="Sua senha" name="password" id="password" style="background-color: transparent !Important;border:all !Important">
                <div class="invalid-feedback"><?php echo $password_err; ?></div>
              </div>
              <div class="d-flex mb-5 align-items-center" style="margin-bottom: 2rem !important;">
                <label class="control control--checkbox mb-0"><span class="caption">Mantenha-me logado</span>
                  <input type="checkbox" checked="checked" name="manterLog" id="manterLog" />
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="FrontOffice/TelaSenha2.php" class="forgot-pass">Esqueceu a senha</a></span>
              </div>
              <p class="mb-4">Não possui uma conta? <a href="FrontOffice/telaCadastro.php" >Clique aqui</a>.</p>

              <input type="submit" value="Fazer login" class="btn btn-block btn-primary">

            </form>
          </div>
        </div>
      </div>
    </div>


  </div>
</form>

<script>
  <?php 
    if(isset($_GET['success']) && $_GET['success'] == '1'){
      echo "alert(`Usuário cadastrado com sucesso!\n\nRealize o login com as informações cadastradas`);";
    }
  ?>
</script>



  <script src="Content/js/jquery-3.3.1.min.js"></script>
  <script src="Content/js/popper.min.js"></script>
  <script src="Content/js/bootstrap.min.js"></script>
  <script src="Content/js/main.js"></script>
</body>

</html>