<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $telefone = $password = $confirm_password = $first_name = $firstname_err = $telefone_err = $last_name = $lastname_err = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor, preencha o E-mail.";
    }else if(strpos(trim($_POST["username"]), "@") == false){
      $username_err = "Por favor, insira um E-mail válido.";
    }else{
        // Prepare a select statement
        $sql = "SELECT id_func FROM user_funcionario WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Esse nome de usuário já existe.";
                } else{
                    $username = trim($_POST["username"]);
                    
                    
                }
            } else{
                echo "Oops! Algo deu errado, codigo de erro 1";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        } 
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor, preencha a senha.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "A senha precisa ter pelo menos 6 caracteres.";
    } else{
      
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Por favor, confirme a senha.";     
    } else{
       
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "As senhas são diferentes.";
        }
    }

    if(empty(trim($_POST["first_name"]))){
      $firstname_err = "Por favor, preencha o nome.";     
      }else{
       
          $first_name = trim($_POST["first_name"]);
      }
      if(empty(trim($_POST["telefone"]))){
        $telefone_err = "Por favor, preencha o seu telefone.";     
        }else{
         
            $telefone = trim($_POST["telefone"]);
        }

      
        
      
    if(empty(trim($_POST["last_name"]))){
      $lastname_err = "Por favor, preencha o sobrenome.";     
      }else{
      
          $last_name = trim($_POST["last_name"]);
      }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($firstname_err) && empty($lastname_err) && empty($telefone_err)){
         
        // Prepare an insert statement
        $sql = "INSERT INTO user_funcionario (email, senha, nome, sobrenome, telefone) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
         
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_username, $param_password, $param_first_name, $param_last_name, $param_telefone);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_first_name = $first_name;
            $param_last_name = $last_name;
            $param_telefone = $telefone;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
            
                // Redirect to login page
                header("location: ../TelaLogin.php");
            } else{
                echo "Oops! Algo deu errado, tente novamente..";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        
      }

    
  }

    
    // Close connection
    mysqli_close($link);
}
?>

<!doctype html>
<html lang="en">

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
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="Content/fonts/icomoon/style.css">

  <link rel="stylesheet" href="Content/css/owl.carousel.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="Content/css/bootstrap.min.css">

  <!-- Style -->
  <link rel="stylesheet" href="Content/css/style.css">

  <title>Virtual Hotel Tech</title>
<link rel="icon" href="/VHT/FrontOffice/images/estrela.png"> 
</head>

<body>

   <style>
       #imagem{
           height: 850px;
           width: 700px;
           background-image: url('images/imagemfuncionario.jpg');
           
       }

       #form{
          height: 850px;
          
      }
      
      #info{
        margin-top:40px;
      }

      
       
   </style>

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" id="imagem"></div>
    <div class="contents order-2 order-md-1" id="form">

      <div class="container" > 
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7" id="info">
            <h3>Fazer cadastro funcionario no <strong>VHT</strong></h3>
            <p class="mb-4">Bem vindo a família VHT! Preencha as informações para continuar.</p>
            <form action="#" method="post">
              <div class="form-group first">
                <label for="username">E-mail</label>
                <input type="text"  class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" placeholder="Seu E-mail" name="username" id="username">
                <div class="invalid-feedback"><?php echo $username_err; ?></div>
              </div>
              <div class="form-group first" style="width: 48%;float: left;">
                <label for="first_name">Nome</label>
                <input type="text"  class="form-control <?php echo (!empty($firstname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $first_name; ?>" placeholder="Seu Nome" name="first_name" id="first_name">
                <div class="invalid-feedback"><?php echo $firstname_err; ?></div>
              </div>
              <div class="form-group first" style="width: 48%;float: left;margin-left: 4%;">
                <label for="last_name">Sobrenome</label>
                <input type="text" class="form-control <?php echo (!empty($lastname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $last_name; ?>"  placeholder="Seu Sobrenome" name="last_name" id="last_name">
                <div class="invalid-feedback"><?php echo $lastname_err; ?></div>
              </div>
              <div class="form-group first">
                <label for="telefone">telefone</label>
                <input type="text"  class="form-control <?php echo (!empty($telefone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $telefone; ?>" placeholder="Seu telefone" name="telefone" id="telefone">
                <div class="invalid-feedback"><?php echo $telefone_err; ?></div>
              </div>
              <div class="form-group last mb-3">
                <label for="password">Senha</label>
                <input type="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>" placeholder="Sua senha" name="password" id="password">
                <div class="invalid-feedback"><?php echo $password_err; ?></div>
              </div>
              <div class="form-group last mb-3">
                <label for="password">Confirmar Senha</label>
                <input type="password"  class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>" placeholder="Repitir sua senha" name="confirm_password" id="password">
                <div class="invalid-feedback"><?php echo $confirm_password_err; ?></div>
              </div>
              <p class="mb-4">Já possui uma conta? <a href="../Telalogin.php" >Clique aqui</a>.</p>

              <input type="submit" value="Cadastrar" class="btn btn-block btn-primary">

            </form>
          </div>
        </div>
      </div>
    </div>


  </div>



  <script src="Content/js/jquery-3.3.1.min.js"></script>
  <script src="Content/js/popper.min.js"></script>
  <script src="Content/js/bootstrap.min.js"></script>
  <script src="Content/js/main.js"></script>
</body>

</html>