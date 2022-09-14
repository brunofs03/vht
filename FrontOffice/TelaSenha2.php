<?php include "sessionStart.php"?>


<?php include "topmenu.php" ?>

<!doctype html>


<html lang="en">
  
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">

  <title>Virtual Hotel Tech</title>
<link rel="icon" href="/VHT/FrontOffice/images/estrela.png"> 
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!--- Importação CSS --->
  <link rel="stylesheet" type="text/css" href="/VHT/FrontOffice/Content/library/BootstrapFirst.min.css">
  <link rel="stylesheet" type="text/css" href="/VHT/FrontOffice/Content/library/BootstrapSecond.min.css">


  <!--- Importação Fontes --->
  <link rel="stylesheet" href="/VHT/FrontOffice/Content/fonts/FontAwesomeMain.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
  <link rel="stylesheet" href="/VHT/FrontOffice/Content/fonts/FontFamilyRoboto.css">

  <!--- Importação Javascript --->
  <script src="/VHT/FrontOffice/Content/library/jquery.min.js"></script>
  <script src="/VHT/FrontOffice/Content/library/bootstrap.min.js"></script>

  <link rel="stylesheet" href="content/css/style.css">
  <link rel="stylesheet" href="content/css/styleSenha.css">
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