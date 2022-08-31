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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <title>VHT</title>
</head>


<body style="font-family: 'Open Sans',sans-serif;font-size:15px;line-height:1.6">


<!-- Incluir o Menu da página -->
<?php include "topmenu.php" ?>


<div style="background-color:#dbdbdb;">


<!-- Seção do filtro da tabela -->

  <section style="background-image: url(images/PaisagemMinimalista.png);height: fit-content;min-height: 0px;object-fit: cover;display: block;vertical-align: middle;background-size: cover;background-position: 50% 50%;background-repeat: no-repeat;">
    <div class="container" style="min-height: 0px;">
      <div style="width: 100%;min-height: 156px;margin: 50px auto;background-color: #f5f7fa;opacity:0.9;display:flex;justify-content: center;flex-direction: column;border-radius: 5px;">
        <div style="padding: 15px;">
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


    $sqlPrimeiro = "
    update quartos set disponibilidade = 'Disponível' where id_quarto not in(
    select quartos.id_quarto from quartos
    inner join tb_agendamentos on tb_agendamentos.id_quarto = quartos.id_quarto
    where tb_agendamentos.dt_inicio >= convert(now(),DATE) and dt_fim <= convert(now(),DATE)
    )";


    $resultPrimeiro = mysqli_query($link, $sqlPrimeiro);


    $sqlSegundo = "
    update quartos set disponibilidade = 'Ocupado' where id_quarto in(
    select quartos.id_quarto from quartos
    inner join tb_agendamentos on tb_agendamentos.id_quarto = quartos.id_quarto
    where tb_agendamentos.dt_inicio >= convert(now(),DATE) and dt_fim <= convert(now(),DATE)
    )";


    $resultSegundo = mysqli_query($link, $sqlSegundo);

    
  ?>

  <?php 


    $sql = "SELECT * FROM quartos order by num_quarto asc";


    $result = mysqli_query($link, $sql);

    
  ?>



<!-- Seção das informações da tabela -->
<div style="background-color:#dbdbdb;">
  <section>
    <div class="container" style="background-color:#e6e6e6;min-height:200px;height: 100%;max-width: 100%;">
        <div class="row" id="retornoFiltro">


        <?php
            
            while($row = mysqli_fetch_array($result)){
                echo "<div class='col-sm-4' style='height:350px !important;margin-bottom:25px;margin-top:25px;'>";
                echo "<div style='cursor:pointer' onclick='window.location.href=`/VHT/FrontOffice/TelaQuarto.php?id=";
                echo $row[0];
                echo "`'> <div style='height: 50px;'><div style='color: black;padding: 10px;width: 100%;font-size: 18px;background-color: rgba(189, 189, 189, 0.8);font-weight:700;vertical-align: middle;width:100%;font-size: 22px;text-align: center;'>Quarto ";
                echo $row[2];
                if($row[3] == 'Disponível'){
                  echo " <img src='/VHT/FrontOffice/images/Location_dot_green.svg.png' style='margin-bottom: 5px;margin-left: 8px;height:17px'></div></div>";
                  }else{
                    echo " <img src='/VHT/FrontOffice/images/1024px-Location_dot_red.svg.png' style='margin-bottom: 5px;margin-left: 8px;height:17px'></div></div>";
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