<?php include "sessionStart.php"?>

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

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!--- Importação Javascript --->
  <script src="/VHT/FrontOffice/Content/library/jquery.min.js"></script>
  <script src="/VHT/FrontOffice/Content/library/bootstrap.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <title>VHT</title>

  <style>
    .u-border-grey-30, .u-separator-grey-30:after {
        border-color: #b3b3b3 !important;
        stroke: #b3b3b3 !important;
        border: 1px solid #b3b3b3 !important;
    }
        .progress-bar2 {
      display: flex;
      margin-bottom: 50px;
      justify-content: space-between;
    }
    
    .step2 {
      box-sizing: border-box;
      position: relative;
      z-index: 1;
      display: block;
      width: 25px;
      height: 25px;
      margin-bottom: 30px;
      border: 4px solid #fff;
      border-radius: 50%;
      background-color: #efefef;
    }
    
    .step2:after {
      position: absolute;
      z-index: -1;
      top: 5px;
      left: 22px;
      width: 250px;
      height: 6px;
      content: '';
      background-color: #efefef;
    }
    
    .step2:before {
      color: #2e2e2e;
      position: absolute;
      top: 40px;
    }
    
    .step2:last-child:after {
      content: none;
    }
    
    .step2.active {
      background-color: #e1e05b;
    }
    .step2.active:after {
      background-color: #e1e05b;
    }
    .step2.active:before {
      color: #e1e05b;
    }
    .step2.active + .step2 {
      background-color: #e1e05b;
    }
    .step2.active + .step2:before {
      color: #9d9c15;
    }
    
    .step2:nth-child(1):before {
      color: #9d9c15;
      content: 'Dados';
    }
    .step2:nth-child(2):before {
      right: -40px;
      content: 'Confirmação';
    }
    .step2:nth-child(3):before {
      right: -30px;
      content: 'Pagamento';
    }
    .step2:nth-child(4):before {
      right: 0;
      content: 'Finalizado';
    }

    .payment-method2 {
      display: flex !important;
      margin-bottom: 60px !important;
      justify-content: space-between !important;
    }
    
    .method2 {
      display: flex !important;
      flex-direction: column !important;
      width: 370px !important;
      height: 125px !important;
      padding-top: 20px !important;
      cursor: pointer !important;
      border-radius: 2px !important;
      background-color: rgb(249, 249, 249) !important;
      justify-content: center !important;
      align-items: center !important;
      border: 1px solid #f0f0f0 !important;
    }

    .input-fields {
      display: flex !important;
      justify-content: space-between !important;
    }
    
    .input-fields label {
      display: block !important;
      margin-bottom: 10px !important;
      color: #b4b4b4 !important;
    }
    
    .info {
      font-size: 12px !important;
      font-weight: 300 !important;
      display: block !important;
      margin-top: 50px !important;
      opacity: .5 !important;
      color: #2e2e2e !important;
    }
    
    div[class*='column'] {
      width: 382px !important;
    }
    
    input[type='text'],
    input[type='date'],
    input[type='password'] {
      font-size: 16px !important;
      width: 100% !important;
      height: 35px !important;
      padding-right: 40px !important;
      padding-left: 16px !important;
      color: rgba(46, 46, 46, .8) !important;
      border: 1px solid rgb(225, 225, 225) !important;
      border-radius: 4px !important;
      outline: none !important;
    }
    
    input[type='text']:focus,
    input[type='date']:focus,
    input[type='password']:focus {
      border-color: rgb(119, 219, 119) !important;
    }
    
    #date { background: url(img/icons_calendar_black.png) no-repeat 95% !important; }
    #cardholder { background: url(img/icons_person_black.png) no-repeat 95% !important; }
    #cardnumber { background: url(img/icons_card_black.png) no-repeat 95% !important; }
    #verification { background: url(img/icons_lock_black.png) no-repeat 95% !important; }
    
    .small-inputs {
      display: flex !important;
      margin-top: 20px !important;
      justify-content: space-between !important;
    }
    
    .small-inputs div {
      width: 182px !important;
    }
    .panel-footer2 {
      display: flex;
      width: 100%;
      height: 96px;
      justify-content: space-between;
      align-items: center;
    }
    .btn2 {
      font-size: 16px;
      width: 163px;
      height: 48px;
      cursor: pointer;
      transition: all .2s ease-in-out;
      letter-spacing: 1px;
      border: none;
      border-radius: 23px;
    }
    
    .back-btn2 {
      color: #363636;
      background: #fff;
    }
    
    .next-btn2 {
      color: #fff;
      background: #363636;
    }
    
    .btn2:focus {
      outline: none;
    }
    
    .btn2:hover {
      transform: scale(1.1);
    }
    .blue-border2 {
      border: 1px solid rgb(110, 178, 251);
    }
    label{
        color: #919191 !important;
        font-weight:600;
    }

    @media (max-width: 1200px) {
      .step2:after {
        position: absolute;
        z-index: -1;
        top: 5px;
        left: 22px;
        width: 200px;
        height: 6px;
        content: '';
        background-color: #efefef;
      }
    }

@media (max-width: 990px) {
  .step2:after {
    position: absolute;
    z-index: -1;
    top: 5px;
    left: 22px;
    width: 150px;
    height: 6px;
    content: '';
    background-color: #efefef;
  }
}

@media (max-width: 777px) {
  .step2:after {
    position: absolute;
    z-index: -1;
    top: 5px;
    left: 22px;
    width: 100px;
    height: 6px;
    content: '';
    background-color: #efefef;
  }
  
  .step2:nth-child(2):before {
      right: -40px;
      content: 'Confirmação';
    }
    .step2:nth-child(3):before {
      right: -30px;
      content: 'Pagamento';
    }

  .progress-bar2{
    width: 100% !important;
    margin: 0 !important;
  }

  .payment-method2{
    width: 100% !important;
    margin: 0 !important;
  }
}

@media (max-width: 430px) {
  .step2:after {
    position: absolute;
    z-index: -1;
    top: 5px;
    left: 22px;
    width: 93px;
    height: 6px;
    content: '';
    background-color: #efefef;
  }
    .step2:nth-child(2):before {
      right: -25px;
      content: 'Confirmação';
    }
    .step2:nth-child(3):before {
      right: -24px;
      content: 'Pagamento';
    }

    .progress-bar2{
  width: 100% !important;
      margin: 0 !important;
    }

  .payment-method2{
    width: 100% !important;
    margin: 0 !important;
  }
}
  </style>
</head>


<body class="u-body">


<!-- Incluir o Menu da página -->
<?php include "topmenu.php" ?>


<!-- Define todas as abas da página -->

<section style="background-color: #eeeeee;">
  <form id="formPagamento" name="formPagamento" action="" method="POST" autocomplete="off">
      <input type="hidden" name="dt_inicio" id="dt_inicio" value="<?php echo $_GET['data_inicial']; ?>">
      <input type="hidden" name="dt_fim" id="dt_fim" value="<?php echo $_GET['data_final']; ?>">
      <input type="hidden" name="codQuarto" id="codQuarto" value="<?php echo $_GET['id']; ?>">
      <input type="hidden" name="codPix" id="codPix" value="">
        <div id="telas">
            <div id="DadosPessoais">
                <?php include "TelaDadosPessoais.php" ?>
            </div>

            <div id="TelaConfirmacao">
                <?php include "TelaConfirmacao.php" ?>
            </div>

            <div id="TelaPagamento">
                <?php include "TelaPagamento2.php" ?>
            </div>
            
            <div id="TelaFinalizar">
                <?php include "TelaFinalizar.php" ?>
            </div>
        </div>
  </form>
</section>




<!-- Incluir o Footer da página -->
<?php include "footer.php" ?>



</body>

</html>

<script>
  setTimeout(function(){
    document.getElementById('cardholder').disabled = false;
    document.getElementById('dateVencimento').disabled = false;
    document.getElementById('verification').disabled = false;
    document.getElementById('cardnumber').disabled = false;
  }, 1000);
</script>

<script>
    
        $("[id='telas'] > [id!='DadosPessoais']").attr({style: "display:none"});
   
   function MudaFrame(numero){
     if(numero == "1"){
        $("[id='telas'] > [id!='DadosPessoais']").attr({style: "display:none"});
        $("[id='telas'] > [id='DadosPessoais']").attr({style: "display:block"});
        } 
     if(numero == "2"){
       
       var msg = "";
       
       if(document.getElementById('txtNome').value == ""){
         msg = msg + "\n - Nome"
       }
       if(document.getElementById('txtSobrenome').value == ""){
         msg = msg + "\n - Sobrenome"
       }
       if(document.getElementById('txtCpf').value == ""){
         msg = msg + "\n - CPF"
       }
       if(document.getElementById('txtCep').value == ""){
         msg = msg + "\n - CEP"
       }
       if(document.getElementById('txtEmail').value == ""){
         msg = msg + "\n - Email"
       }

       if(msg != ""){
         alert("Antes de prosseguir, preencha os seguintes campos:\n" + msg)
       }else{

          document.getElementById('nomeConfirmar').innerHTML = document.getElementById('txtNome').value;
          document.getElementById('sobrenomeConfirmar').innerHTML = document.getElementById('txtSobrenome').value;
          document.getElementById('cpfConfirmar').innerHTML = document.getElementById('txtCpf').value;
          document.getElementById('emailConfirmar').innerHTML = document.getElementById('txtEmail').value;
          document.getElementById('celularConfirmar').innerHTML = document.getElementById('txtCelular').value;
          


          $("[id='telas'] > [id!='TelaConfirmacao']").attr({style: "display:none"});
          $("[id='telas'] > [id='TelaConfirmacao']").attr({style: "display:block"});

       }


        } 
     if(numero == "3"){

        if (window.confirm("Você deseja iniciar o pagamento?\nConfirme suas informações antes de prosseguir.")) {
              var formdata = new FormData($("form[name='formPagamento']")[0]);

                BloqueiaInput(1);

                $.ajax({
                  method:"POST",
                  url: 'ajax/criarNovoAgendamento.php',
                  data:formdata,
                  processData: false,
                  contentType: false,

                  success: function(retorno){
                    if(retorno.init_point != undefined){
                     window.location.href= retorno.init_point
                    }else{
                    alert('Ocorreu um erro interno, por favor verifique sua conexão!');
                     BloqueiaInput(2);

                    }
                  },
                  error: function(){
                    alert('Ocorreu um erro interno, por favor contate um administrador!');
                     BloqueiaInput(2);
                  }
                  });
              }

        } 
    }


</script>


<script>

$('#txtCep').mask('00000-000');
$('#txtCpf').mask('000.000.000-00');
$('#txtCelular').mask('(00) 00000-0000');
$('#txtTelefone').mask('(00) 0000-0000');

function BloqueiaInput(tipo){
  if(tipo == 1){ 
    document.getElementById('botaoMercadoP').disabled = 'disabled'
    document.getElementById('botaoMercadoP').style.background = '#787878'
    document.getElementById('botaoMercadoP').style.cursor = 'not-allowed'
    document.getElementById('spinnerFirst').style.display = ''
  }else{
    document.getElementById('botaoMercadoP').disabled = ''
    document.getElementById('botaoMercadoP').style.background = '#363636'
    document.getElementById('botaoMercadoP').style.cursor = ''
    document.getElementById('spinnerFirst').style.display = 'none'

  }
}

</script>


<script>
    $(document).ready(function() {

      function limpa_formulário_cep() {
          // Limpa valores do formulário de cep.
          $("#txtEndereco").val("");
          $("#txtCidade").val("");
          
      }
      
      //Quando o campo cep perde o foco.
      $("#txtCep").blur(function() {

          //Nova variável "cep" somente com dígitos.
          var cep = $(this).val().replace(/\D/g, '');

          //Verifica se campo cep possui valor informado.
          if (cep != "1") {

              //Expressao regular para validar o CEP.
              var validacep = /^[0-9]{8}$/;

              //Valida o formato do CEP.
              if(validacep.test(cep)) {

                  //Preenche os campos com "..." enquanto consulta webservice.
                  $("#txtEndereco").val("...");
                  $("#txtCidade").val("...");
                  

                  //Consulta o webservice viacep.com.br/
                  $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                      if (!("erro" in dados)) {
                          //Atualiza os campos com os valores da consulta.
                  var log = dados.logradouro;
                  log = log.toUpperCase();
                          var cid = dados.localidade;
                  cid = cid.toUpperCase();
                          var bairro = dados.bairro;
                  bairro = bairro.toUpperCase();
                          var uf = dados.uf;
                  uf = uf.toUpperCase();
                          
                  $("#txtEndereco").val(log + ', ' + bairro);
                  $("#txtCidade").val(cid);
                          
                      } //end if.
                      else {
                          //CEP pesquisado nao foi encontrado.
                          limpa_formulário_cep();
                          alert("CEP nao encontrado.");
                      }
                  });
              } //end if.
              else {
                  //cep é inválido.
                  limpa_formulário_cep();
                  alert("Formato de CEP inválido.");
              }
          } //end if.
          else {
              //cep sem valor, limpa formulário.
              limpa_formulário_cep();
          }
      });
  });
</script>