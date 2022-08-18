<?php 

session_start();

?>


<?php include "topmenu.php" ?>

<!doctype html>


<html lang="en">
  
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="keywords"
    content="Extraordinary Hotels For The Curious Traveller, Inspiration, New Boutique Hotels, Can't Keep Your Eyes Away? Follow Us!, Find Out What Makes Us The Best Hotel, Empire State Building, Follow Us On Instagram">
  <meta name="description" content="">
  <meta name="page_type" content="np-template-header-footer-from-plugin">
  <title>VHT</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="Content/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="Content/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="Content/css/estiloPrincipal.css" media="screen">
  <link rel="stylesheet" href="Content/css/mainPage.css" media="screen">
  <script class="u-script" type="text/javascript" src="Content/js/javascriptPrincipal.js" defer=""></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
  <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
  <link rel="stylesheet" href="content/css/style.css">
  <link rel="stylesheet" href="content/css/styleSenha.css">
  
  <meta property="og:title" content="Página Inicial">
  <meta property="og:type" content="website">
  <meta name="theme-color" content="#478ac9">

</head>

  <body>
  

  <div class="half">
    <div class="bg order-1 order-md-2" style="background-image: url('images/bg_1.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center" style="padding-top:10px;padding-bottom:10px;margin-top: -35px;">
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
              <p class="mb-4">Fazer login? <a href="../Telalogin.php" >Clique aqui</a>.</p>
              <br>

                <button type="button" class="btn btn-block btn-primary" id="btnEnviar" onclick="resetSenha()"><div id="apareceCarrega2" style="display:none;float:left;    padding-top: 2px;"><i style="font-size:15px;margin-right:5px" class="fas fa-spin fa-spinner"></i>     </div>Enviar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    
  </div>

    
   <script>
      function carregaBotao(tipo){
         if(tipo == 1){
            document.getElementById('apareceCarrega2').style.display = ''
            document.getElementById('btnEnviar').disabled = 'disabled'
         }else{
            document.getElementById('apareceCarrega2').style.display = 'none'
            document.getElementById('btnEnviar').disabled = ''
         }
         
      }
   </script>
    


    <script>
        function resetSenha(){
            var email = document.getElementById('username').value;

            if(email == ''){
              alert('Preencha o email antes de prosseguir!')
            }else{

              carregaBotao(1);

              $.ajax({
                  type:"POST",
                  url:"redefinirSenha.php",
                  data:{
                      email : email
                  },
                  success: function(html){
                    alert('Informações de redefinição enviadas ao email informado');
                    document.getElementById('username').value = '';
                    carregaBotao(2);
                  },
                  error:function(){
                    alert('O Email informado não existe!');
                    document.getElementById('username').value = '';
                    carregaBotao(2);
                  }
              })
            }
        }
    </script>
  </body>
</html>