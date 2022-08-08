<?php 

session_start();

?>

<!doctype html>


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

  html{
    overflow: hidden;
  }
</style>



<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>VHT</title>
  </head>
  <body>
  

  <div class="half">
    <div class="bg order-1 order-md-2" style="background-image: url('images/bg_1.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6">
            <div class="form-block">
              <div class="text-center mb-5">
              <h3>Alterar senha</h3>
              <p class="mb-4">Lhe Enviaremos um Email com mais informações sobre como redefinir a senha.</p>
              </div>
              <form action="#" method="post">
                <div class="form-group first">
                <label for="username">Email</label>
                <input type="text" class="form-control" placeholder="Seuemail@gmail.com" name="username" id="username">
                </div>
              <p class="mb-4">Fazer login? <a href="../../Telalogin.php" >Clique aqui</a>.</p>
              <br>

                <input type="submit" value="Enviar" class="btn btn-block btn-primary">

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    
  </div>
    
    

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>