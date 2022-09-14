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

  <!--- Importação Javascript --->
  <script src="/VHT/FrontOffice/Content/library/jquery.min.js"></script>
  <script src="/VHT/FrontOffice/Content/library/bootstrap.min.js"></script>
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <title>Virtual Hotel Tech</title>
<link rel="icon" href="/VHT/FrontOffice/images/estrela.png"> 
</head>


<body style="font-family: 'Open Sans',sans-serif;font-size:15px;line-height:1.6">


<!-- Incluir o Menu da página -->

<?php include "topmenu.php" ?>


<style>
  .SectionImagemGrande{
      background-image: linear-gradient(0deg, rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url(/VHT/FrontOffice/images/QuartoArrumado.jpeg);
      overflow: visible;
      object-fit: cover;
      display: block;
      vertical-align: middle;
      background-size: cover;
      background-position: 50% 50%;
      background-repeat: no-repeat;
      height: 700px;
  }

  .innerImage{
    margin:auto;
    margin-top: 250px;
    width: 250px;
    display: grid;
  }

  .textoValorPrincipal{
      margin: 35px 20px 0 0;
      font-family: Georgia, serif !important
  }

  .SubTextoValor{
    margin-left: 0;
    margin-right: 20px;
    position: relative;
    font-size: 14px;
    margin-top: 20px;
    margin-bottom: 20px;
  }
</style>

<!-- Seção da Imagem com o logo principal -->

  <section class="SectionImagemGrande" style="display:flex">
      <div class="innerImage">
        <img src="images/Logo3.png" alt="LogoVHT" style="width:150px;margin-left:40px">
        <img src="images/5Estrelas.png" alt="Estrelas" style="width:200px;margin-left:20px">
      </div>
  </section>


<!-- Seção dos cartões de valores -->

  <section>
   <div class="container" style="min-height: 251px;">
      <div style="margin: -131px auto 40px 0;">
         <div class="row">
            <div class="col-sm-4">
               <div style="color: #ffffff;background-color: #858e99;height: 350px;padding: 15px;">
                  <img src="Images/trofeisLogo.png" alt="Logo Trofeis" style="width:75px;margin-top:20px">
                  <h3 class="textoValorPrincipal">Atendimento De Primeira Classe</h3>
                  <p class="SubTextoValor">Ganhadores do prêmio World Boutique Hotel Awards em 2019.</p>
               </div>
            </div>
            <div class="col-sm-4">
               <div style="color: #111111;background-color: #e0e5eb;height: 350px;padding: 15px;">
                  <img src="Images/CamaLogo.png" alt="Logo Cama" style="width:75px;margin-top:20px">
                  <h3 class="textoValorPrincipal">Sempre Com Um Comforto Ilimitado</h3>
                  <p class="SubTextoValor">Você vai se impressionar com as facilidades que proporcionamos.</p>
               </div>
            </div>
            <div class="col-sm-4">
               <div style="color: #111111;background-color: #ccd3db;height: 350px;padding: 15px;">
                  <img src="Images/CoracaoLogo.png" alt="Logo Coração" style="width:75px;margin-top:20px">
                  <h3 class="textoValorPrincipal">Colocamos Nosso Coração Em Tudo Que Fazemos</h3>
                  <p class="SubTextoValor">Funcionários treinados para sempre colocar o cliente em primeiro lugar.</p>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>


<!-- Seção do texto sobre viajante local -->

  <section>
   <div class="container" style="min-height: 806px;">
      <div class="row" style="margin-top:100px">
         <div class="col-sm-6">
            <div style="background-image: url(/VHT/FrontOffice/images/RestauranteNoite.jpeg);min-height: 571px;background-position: 50% 50%;flex: 0 0 100%;max-width: 100%;overflow:visible;background-position: center;background-size: cover;">
            </div>
         </div>
         <div class="col-sm-6">
            <div class="row">
               <div class="col-sm-12">
                  <h2 style="font-weight: 400;font-size: 2.25rem;line-height: 1.1;margin-top: 20px;margin-bottom: 20px;font-family: Georgia, serif !important;">Um Hotel Extraordinário Para o Viajante Local</h2>
                  <img src="images/FaixaDourada.png" alt="Faixa Dourada" style="width:100%">
               </div>
            </div>
            <div class="row">
               <div class="col-sm-6">
                  <div style="background-image: url(/VHT/FrontOffice/images/MesaArrumada2.jpeg);min-height: 190px;background-position: 50% 50%;flex: 0 0 100%;max-width: 100%;overflow:visible;background-position: center;background-size: cover;">
                  </div>
               </div>
               <div class="col-sm-6">
                  <p style="margin-top: 20px;margin-bottom: 20px;">O World Boutique Hotel Awards é a primeira e unica organização de prêmiação internacional dedicada exclusivamente para reconhecer talento unico por meio da luxuria de hotéis.</p>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-6">
                  <p style="margin-top: 20px;margin-bottom: 20px;">Nossa Premiação foi avaliada pessoalmente por um membro do time de juizes, certificando que todos os nossos reconhecimentos foram dados pela capacidade de encantar o publico local
                  </p>
               </div>
               <div class="col-sm-6">
                  <div style="background-image: url(/VHT/FrontOffice/images/ChefPreparando.jpeg);min-height: 190px;background-position: 50% 50%;flex: 0 0 100%;max-width: 100%;overflow:visible;background-position: center;background-size: cover;">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

  
<!-- Seção do texto sobre nós -->


  <section style="background-image: url( /VHT/FrontOffice/images/CasaLago.jpeg);object-fit: cover;display: block;vertical-align: middle;background-size: cover;
    background-position: 50% 50%;background-repeat: no-repeat;">
    <div class="container" style="min-height: 581px;;">
      <div  style="max-width: 570px;min-height: 238px;margin: 172px auto;color: #111111;background-color: #f5f7fa;opacity: 0.9;padding:20px">
        <h2 style="text-align:center;font-family: georgia;">Sobre nós</h2>
        <img src="images/FaixaDourada.png" style="width:100%" alt="Faixa Dourada">
        <p style="text-align:center">Não importa se você está procurando um quarto luxuoso para passar o dia, ou um bar requintado para passar a noite, temos algo para você.</p>
      </div>
    </div>
  </section>


<!-- Seção do review do hotel no trivago -->

  <section>
    <div class="container" style="min-height:250px">
      <div class="row" style="margin-top:30px;margin-bottom:30px">
        <div class="col-sm-3">
          <div style="width: 175px;height: 175px;object-position: 92.31% 50%;background-position: 50% 50%;background-image: url(images/girlphoto.png);margin: 25px auto;border-radius:50%;object-fit: cover;display: block;vertical-align: middle;background-size: cover;">
          </div>
        </div>
        <div class="col-sm-9">
          <br><br>
          <p> Esse lindo hotel fica na parte oeste de Alphaville, Sua localização faz com que seja de fácil acesso a qualquer um vindo do centro. Um lugar perfeito, calmo e confortável, onde você pode passar seu tempo na varanda olhando a vista, na piscina, ou vendo os shows no salão de festas, o serviço aqui é impecável.</p>
          <h5 style="font-family: Georgia, serif !important;    margin: 20px 0 25px;font-weight:400;font-size: 20px;">Jeniffer L, Postado no Trivago.com Abril, 2016</h5>
        </div>
      </div>
    </div>
  </section>


<!-- Seção de seguir nas redes sociais -->

  <section style="color: #ffffff;background-color: #555c66;">
    <div style="padding:50px;    display: grid;">
      <h2 style="text-align: center;    font-family: Georgia, serif !important;">Não consegue ficar de fora? Nos siga nas redes sociais!
      </h2>
      <a href="https://fieb.edu.br/" style="color: #111111 !important;background-color: #b9c1cc !important;font-family: Georgia, serif !important;width: 100px;text-align: center;border-radius: 40px;margin: auto;padding: 10px;">Seguir</a>
    </div>
  </section>


<!-- Seção de beneficios do melhor hotel -->

  <section style="color: #111111;background-color: #f5f7fa;min-height: 450px;">
   <div class="container">
      <div style="margin: 40px auto 0;">
         <h2 style="position: relative;margin: 10px 0;font-family: Georgia, serif !important;text-align:center;">Descubra o que faz de nós o melhor hotel </h2>
      </div>
      <div style="margin-left:0px !important">
         <div class="row">
            <div class="col-sm-4">
               <div style="display:flex;flex-direction: column;min-height: 350px;justify-content: center;">
                  <div style="display: flex;flex-direction: column;padding: 10px;">
                     <img src="images/PratoLogo.png" alt="Prato" style="width:70px;margin-bottom: 0 !important;margin-top: 0 !important;width: 70px;margin: auto;">
                     <p  style="text-align:center;">Refeições variadas inclusas no pacote do quarto, preparadas por chefes profissionais.</p>
                  </div>
                  <div style="display: flex;flex-direction: column;">
                     <img src="images/MedicoLogo.png" alt="Medico" style="width:70px;margin-bottom: 0 !important;margin-top: 0 !important;width: 70px;margin: auto;">
                     <p style="text-align:center;">Primeiros socorros e atendimento imediato sempre de prontidão.</p>
                  </div>
               </div>
            </div>
            <div class="col-sm-4">
               <div style="display:flex;flex-direction: column;min-height: 350px;justify-content: center;">
                  <div style="display: flex;flex-direction: column;padding: 10px;">
                     <img src="images/MalaLogo.png" alt="Mala" style="width:70px;margin-bottom: 0 !important;margin-top: 0 !important;width: 70px;margin: auto;">
                     <p style="text-align:center;">Lugar de fácil acesso e boa localização.</p>
                  </div>
               </div>
            </div>
            <div class="col-sm-4">
               <div style="display:flex;flex-direction: column;min-height: 350px;justify-content: center;">
                  <div style="display: flex;flex-direction: column;padding: 10px;">
                     <img src="images/HotelLogo.png" alt="Hotel" style="width:70px;margin-bottom: 0 !important;margin-top: 0 !important;width: 70px;margin: auto;">
                     <p style="text-align:center;">Estádia confortável e atendida em um hotél de 5 estrelas.</p>
                  </div>
                  <div style="display: flex;flex-direction: column;padding: 10px;">
                     <img src="images/LogoPeixe.png" alt="Peixe" style="width:70px;margin-bottom: 0 !important;margin-top: 0 !important;width: 70px;margin: auto;">
                     <p style="text-align:center;">Piscina coberta, aquecida 24h para clientes.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>



<!-- Incluir o footer da página -->

<?php include "footer.php" ?>
  



</body>

</html>