<?php include "sessionStart.php"?>

<!DOCTYPE html>

<!-- Inicio da Importação de todas as bibliotecas usadas -->

<html style="font-size: 16px;">
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
  
  <meta property="og:title" content="Página Inicial">
  <meta property="og:type" content="website">
  <meta name="theme-color" content="#478ac9">
</head>


<body class="u-body">


<!-- Incluir o Menu da página -->
<?php include "topmenu.php" ?>


<div style="background-color:#dbdbdb;">


<!-- Seção do filtro da tabela -->

  <section class="u-clearfix u-image u-section-4" id="carousel_5804" style="background-image: url(images/PaisagemMinimalista.png);height: fit-content;min-height: 0px;">
    <div class="u-clearfix u-sheet u-sheet-1" style="min-height: 0px;">
      <div
        class="u-align-center-lg u-align-center-md u-align-center-xl u-align-center-xs u-container-style u-group u-opacity u-opacity-90 u-palette-5-light-3 u-group-1" style="width: 100%;min-height: 156px;margin: 50px auto;">
        <div class="u-container-layout u-valign-middle u-container-layout-1" style="padding: 15px;  ">
            <div class="row">
            <div class="col-sm-2">
                <label for="estrelasSelect">Classificação</label><br>
                <select name="estrelasSelect" id="estrelasSelect" class="form-control">
                    <option value="" selected>Selecione *</option>
                    <option value="1">Standard</option>
                    <option value="2">Master</option>
                    <option value="3">Deluxe</option>
                </select>
            </div>
            <div class="col-sm-4">
                <label for="preco">Preço Minimo</label><br>
                <input type="text" id="valorQuarto" class="form-control">
            </div>
            <div class="col-sm-4">
                <label for="preco">Preço Máximo</label><br>
                <input type="text" id="ValorQuarto2" class="form-control">
            </div>
            <div class="col-sm-2">
                <label for="">&nbsp</label><br>
                <input type="button" value="Explorar" class="form-control" id="menubutton" onclick="filtrar()">
            </div>
            </div>
        </div>
      </div>
    </div>
  </section>

  <?php 
    require_once "config.php";


    $sql = "SELECT * FROM quartos order by num_quarto asc";


    $result = mysqli_query($link, $sql);

    
  ?>



<!-- Seção das informações da tabela -->
<div style="background-color:#dbdbdb;">
  <section>
    <div class="container" style="background-color:#e6e6e6;height: 100%;max-width: 100%;">
        <div class="row" id="retornoFiltro">


        <?php
            
            while($row = mysqli_fetch_array($result)){
                echo "<div class='col-sm-4' style='height:350px !important;margin-bottom:25px;margin-top:25px;'>";
                echo "<div style='cursor:pointer' onclick='window.location.href=`http://localhost/vht/FrontOffice/TelaQuarto.php?id=";
                echo $row[0];
                echo "`'> <div style='height: 50px;'><div style='color: black;padding: 10px;width: 100%;font-size: 18px;background-color: rgba(189, 189, 189, 0.8);font-weight:700;vertical-align: middle;width:100%;font-size: 22px;text-align: center;'>Quarto ";
                echo $row[2];
                if($row[3] == 'Disponível'){
                  echo " <img src='https://upload.wikimedia.org/wikipedia/commons/thumb/0/0e/Location_dot_green.svg/1200px-Location_dot_green.svg.png' style='margin-bottom: 5px;margin-left: 8px;height:17px'></div></div>";
                  }else{
                    echo " <img src='https://upload.wikimedia.org/wikipedia/commons/thumb/9/92/Location_dot_red.svg/1024px-Location_dot_red.svg.png' style='margin-bottom: 5px;margin-left: 8px;height:17px'></div></div>";
                  }; 
                echo "<div style='height: 250px;overflow:hidden;background-image: url(";
                echo $row[5];
                echo ");background-position: center;background-size: cover;'></div>";
                echo "<div style='color: black;display:flex;padding: 10px;width: 100%;background-color: rgba(189, 189, 189, 0.8);font-weight:700;vertical-align: middle;width:100%;font-size: 22px;text-align: center;'>";
                echo "<div style='width:50%;'>";
                echo "<span style='font-weight:700;vertical-align: middle;font-size: 16px;'>A partir de R$ ";
                echo number_format($row[1], 2, ',', ' ');
                echo "</span>";
                echo "</div>";
                echo "<div style='width:50%;'>";

                if($row[4] == 1){
                    echo "<div style='color: white;font-size: 16px;background-color: #9c9c9c;padding-top: 6px;padding-bottom: 6px;padding-right: 14px;padding-left: 14px;border-radius: 7px;width: 120px;text-align:center;margin: auto;'>Standard</div>";
                }else if($row[4] == 2){
                    echo "<div style='color: white;font-size: 16px;background-color: crimson;padding-top: 6px;padding-bottom: 6px;padding-right: 14px;padding-left: 14px;border-radius: 7px;width: 120px;text-align:center;margin: auto;'>Master</div>";
                }else if($row[4] ==3){
                    echo "<div style='color: white;font-size: 16px;background-color: darkgoldenrod;padding-top: 6px;padding-bottom: 6px;padding-right: 14px;padding-left: 14px;border-radius: 7px;width: 120px;text-align:center;margin: auto;'>Deluxe</div>";
                }
                echo "</div></div></div></div>";
            }
            ?>
            
                
        </div><br>
    </div>
  </section>
</div>




<!-- Incluir o footer da página -->

<?php include "footer.php" ?>



</body>

</html>


     <script>


        function filtrar(){
            var estrelas = document.getElementById('estrelasSelect').value;
            var moneyMin = document.getElementById('valorQuarto').value;
            var moneyMax = document.getElementById('ValorQuarto2').value;

            $.ajax({
                type:"POST",
                url:"filtroQuartos.php",
                data:{
                    estrelas : estrelas,
                    moneyMin : moneyMin,
                    moneyMax : moneyMax
                },
                success: function(html){
                    $("#retornoFiltro").empty();
                    $("#retornoFiltro").append(html);
                },
                error:function(){

                }
            })
        }


         $(document).ready(function (){
            $("#valorQuarto").maskMoney({prefix:'R$ ', thousands:'.', decimal:',', affixesStay: true});
        });


         $(document).ready(function (){
            $("#ValorQuarto2").maskMoney({prefix:'R$ ', thousands:'.', decimal:',', affixesStay: true});
        });
    </script>