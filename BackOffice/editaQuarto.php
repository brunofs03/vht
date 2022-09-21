<?php include "sessionStart.php"?>


<!DOCTYPE html>

<!-- Inicio da Importação de todas as bibliotecas usadas -->

<html style="font-size: 16px;">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="page_type" content="np-template-header-footer-from-plugin">
  <title>Virtual Hotel Tech</title>
<link rel="icon" href="/VHT/FrontOffice/images/estrela.png"> 
  <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="Content/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Content/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="Content/css/estiloPrincipal.css" media="screen">
  <link rel="stylesheet" href="Content/css/mainPage.css" media="screen">
  <script class="u-script" type="text/javascript" src="Content/js/javascriptPrincipal.js" defer=""></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
  <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
  <script src="https://cdn.anychart.com/releases/8.10.0/js/anychart-base.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js"></script>
  <link href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css" type="text/css" rel="stylesheet">
  <link href="https://cdn.anychart.com/releases/v8/fonts/css/anychart-font.min.css" type="text/css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  
  <meta property="og:title" content="Página Inicial">
  <meta property="og:type" content="website">
  <meta name="theme-color" content="#478ac9">

  <style>
    .anychart-credits{
      display: none !important;
    }



    .upload-image input{
    cursor:pointer;
    display: none !important;
    opacity: 0 !important;
    overflow: hidden !important;
    
}
.upload-image {
  cursor:pointer;
  width: 500px;
  height: 300px;
  overflow:hidden;
  position:relative;
  display:inline-block;
  /*background-color:#fff;*/
  background-repeat: no-repeat;
  background-image:
    url('http://icons.iconarchive.com/icons/martz90/circle/512/camera-icon.png');
  background-size:20px 20px;
  transition: 0.5s;
}
.upload-image:hover {
  cursor:pointer;
  background-size:30px 30px;
  transition: 0.5s;
}
 .descricao{
 display: none;
 background-color: #1c1c1c;
 color: white;
 padding: 5px;
 border-radius: 5px;
 position: absolute;
 z-index: 999;
 }
 #Pdescricao:hover ~ p{
 display: block;
 }
 p:not(.u-text-variant) {
    margin:0 !important;
}
  </style>
</head>


<body class="u-body" style="background-color:#ebebeb">


<!-- Incluir o Menu da página -->

<?php include "topmenu.php" ?>

<?php 
    require_once "config.php";

    $id = $_GET['id'];
    $sql = "SELECT  * FROM  quartos where id = " .$id;
    
    $result = mysqli_query($link, $sql);

    $row = mysqli_fetch_array($result);

            
  ?>

<!-- Seção dos gráficos -->

  <form id="formCadastro" name="formCadastro" action="" method="POST" autocomplete="off">

  <section>

  <h1 style="text-align: center;background-color:white;margin: 0 !important;padding: 15px !important;font-size: 36px !important;border: 1px solid #d8d8d8;">Edição de quarto</h1>
  <br>
  <div class="row" style="margin:0">
    <div class="col-sm-5">
      
      <div style="background-color:#292d33;height:50px;width:511px;margin-left:2%;border:1px solid #ddd;padding:10px;font-size: 18px;text-align: center;color: white;border-top-left-radius: 20px;border-top-right-radius: 20px;">
        Imagem
      </div>
      <div style="background-color:white;height:311px;width:511px;margin-left:2%;border:1px solid #ddd;padding:5px">
        <div style="display:flex">
          <label class="upload-image" style="position:absolute;margin-left:5px;margin-top:5px;cursor:pointer" for="ImportImgQuarto">
              <input type='file' class="imgInp" data-id='img1' id="ImportImgQuarto" name="ImportImgQuarto" />
          </label>
          <br>
          <img id="img1" src="<?php echo $row['link'] ?>" alt="Imagem do quarto" height="300" width="500" style=" margin: auto;" />
                
        </div> 
                
      </div>
    </div>
    <div class="col-sm-7">
      
      <div style="background-color:#292d33;height:50px;width:100%;border:1px solid #ddd;padding:10px;font-size: 18px;text-align: center;color: white;border-top-left-radius: 20px;border-top-right-radius: 20px;">
        Sobre o quarto
      </div>
      <div style="background-color:white;height:330px;width:100%;border:1px solid #ddd;padding:10px">
        <div class="row" style="margin:0">
          <div class="col-sm-4">
            <label for="txtNum">Número do quarto: <span style="color:red">*</span></label>
            <input type="text" class="form-control" id="txtNum" name="txtNum" onkeypress="return SomenteNumero()" maxlength="4" value="<?php echo $row['num_quarto'] ?>" readonly>
          </div>
          <div class="col-sm-4">
            <label for="txtPreco"  id='Pdescricao'>Preço base da diária: <span style="color:red">*</span>  <i class="fa-solid fa-circle-info"></i></label>
            <p class="descricao" style="font-family: Roboto;">Preço aplicável de Seg a quinta, com 20% a mais no preço em dias de sexta a domingo</p>
            <input type="text" class="form-control" id="txtPreco" name="txtPreco" value="R$ <?php echo number_format(  $row['preco_diaria'], 2, ',', '.') ?>">
          </div>
          <div class="col-sm-4">
            <label for="slcEstrelas">Classificação: <span style="color:red">*</span></label>
           <select id="slcEstrelas" name="slcEstrelas" class="form-control">
              <option value="" selected>selecione*</option>
              <option value="1" <?php if( $row['classificacao'] == '1') {echo 'selected';} ?>>Standard</option>
              <option value="2" <?php if( $row['classificacao'] == '2') {echo 'selected';} ?>>Master</option>
              <option value="3" <?php if( $row['classificacao'] == '3') {echo 'selected';} ?>>Deluxe</option>
            </select>
          </div>
        </div>
        <br>
        <div class="row" style="margin:0">
          <div class="col-sm-12">
            <label for="txtPreco">Descrição do quarto: <span style="color:red">*</span></label>
            <textarea id="txtDescricao" name="txtDescricao" class="form-control" maxlength="500" rows="5" style="resize: none" onkeyup="ContadorCaracter()"><?php echo $row['descricao'] ?></textarea>
            <label id="quantidadeLetras">0/500</label>
          </div>
        </div>
        <script>
          function ContadorCaracter(){
            document.getElementById("quantidadeLetras").innerHTML = document.getElementById("txtDescricao").value.length + '/500'
          }

          ContadorCaracter()
        </script>
        <div class="row" style="margin:0">
          <div class="col-sm-9">
          </div>
          <div class="col-sm-3">
            <button type="button" onclick="edicaoQuarto()" style="width:100%;color: white;background-color: #292d33;" class="btn">Atualizar</button>
          </div>
        </div>
    </div>
  </div>

  </section>
  <br>
</form>

<script>
  function SomenteNumero(){
  var tecla=(window.event)?event.keyCode:e.which;
  if((tecla>47 && tecla<58)) return true;
  else{
  if (tecla==8 || tecla==0) return true;
  else  return false;
  }
  }
</script>

<script>
   function ImageSetter(input,target) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                target.attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $(".imgInp").change(function(){
      var imgDiv=$(this).data('id');  
           imgDiv=$('#' + imgDiv);    
        ImageSetter(this,imgDiv);
    });
</script>



<!-- Incluir o footer da página -->

<?php include "footer.php" ?>
  
<script>
   $(document).ready(function (){
      $("#txtPreco").maskMoney({prefix:'R$ ', thousands:'.', decimal:',', affixesStay: true});
  });
</script>


 <script>


    function edicaoQuarto(){
        var mensagem = '';

        if(document.getElementById('txtPreco').value == ''){
          mensagem = mensagem + '\n- Preço da diária'
        }

        if(document.getElementById('slcEstrelas').value == ''){
          mensagem = mensagem + '\n- Classificação'
        }

        if(document.getElementById('txtDescricao').value == ''){
          mensagem = mensagem + '\n- Descrição do quarto'
        }

        if(mensagem != ''){
          alert('Para prosseguir, preencha os seguintes campos:\n' + mensagem);
        }else{
          var formdata = new FormData($("form[name='formCadastro']")[0]);

          $.ajax({
              type:"POST",
              url:"ajax/edicaoQuarto.php?id_quarto=<?php echo $_GET['id'] ?>",
              data:formdata,
              processData: false,
              contentType: false,
              success: function(retorno){
                alert(retorno.mensagem);

                if(retorno.sucesso == 1){
                  document.getElementById('formCadastro').submit();
                }
              },
              error:function(){
                alert('Ocorreu um erro ao cadastrar o quarto!');
              }
          })
        }
    }
</script>


</body>

</html>