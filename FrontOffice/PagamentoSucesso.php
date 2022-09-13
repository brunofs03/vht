<?php include "sessionStart.php"?>

<?php

		require_once "config.php";

        $sql = "UPDATE pagamentos set status = 1, retornoAPI = '" .$_SERVER['QUERY_STRING'] ."' where id = " .$_GET['external_reference'];

        $stmt = mysqli_prepare($link, $sql);

        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
    
    mysqli_close($link);

?>

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
      <br>
		<br>
		    <div class="container" style="background-color: rgb(255, 255, 255);box-shadow: 0 1px 1px 0 rgb(0 0 0 / 20%);height: 580px;">
		        <br>
		        <div class="progress-bar2" style="width:75%;margin-left:12.5%">
		            <div class="step2 active"></div>
		            <div class="step2 active"></div>
		            <div class="step2 active"></div>
		            <div class="step2 active"></div>
		        </div>
		        <br><br>
		        <h1 style="width:100%;text-align:center;">O Agendamento foi cadastrado com sucesso!</h1>
		        <h3 style="width:100%;text-align:center;">O pagamento pode levar até 48h para ser processado</h3>
		        <br><br>
		        <div style="justify-content: center;width: 100%;display: flex;">
		            <img src="/VHT/FrontOffice/images/CheckMark.png" style="width:100px">
		        </div>
		    </div>
		    
		    <div class="container">
		        <div class="panel-footer2" style="justify-content: end;">
		            <button class="btn2 next-btn2" style="width:275px;" type="button" onclick="window.location.href = 'TelaAgendamentos2.php'">Visualizar Agendamentos</button>
		        </div>
		    </div>
		<br>
		<br>
  </form>
</section>




<!-- Incluir o Footer da página -->
<?php include "footer.php" ?>



</body>

</html>


<script>
   
   function MudaFrame(){
     
        if (window.confirm("Você tem certeza que quer finalizar seu agendamento?\nConfirme suas informações antes de prosseguir.")) {
          var formdata = new FormData($("form[name='formPagamento']")[0]);
            $.ajax({
              method:"POST",
              url: 'ajax/gerarPag.php',
              data:formdata,
              processData: false,
              contentType: false,

              success: function(retorno){
                window.location.href= retorno.init_point
              },
              error: function(){
                alert('Ocorreu um erro interno, por favor contate um administrador!');
              }
              });
          }
    }


</script>