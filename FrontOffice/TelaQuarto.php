<?php include "sessionStart.php"?>

<!DOCTYPE html>
<html style="font-size: 16px;">


<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="page_type" content="np-template-header-footer-from-plugin">
  <title>VHT</title>
  <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="Content/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Content/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="Content/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="Content/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="Content/vendor/perfect-scrollbar/perfect-scrollbar.css">
	<link rel="stylesheet" type="text/css" href="Content/css/util.css">
	<link rel="stylesheet" type="text/css" href="Content/css/main.css">
  <link rel="stylesheet" href="Content/css/estiloPrincipal.css" media="screen">
  <link rel="stylesheet" href="Content/css/mainPage.css" media="screen">
  <script class="u-script" type="text/javascript" src="Content/js/javascriptPrincipal.js" defer=""></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous"></script>
    <meta property="og:title" content="Página Inicial">
  <meta property="og:type" content="website">
  <meta name="theme-color" content="#478ac9">

  <style>
    .u-border-grey-30, .u-separator-grey-30:after {
        border-color: #b3b3b3 !important;
        stroke: #b3b3b3 !important;
        border: 1px solid #b3b3b3 !important;
    }
    .u-palette-5-light-3, .u-body.u-palette-5-light-3, .u-container-style.u-palette-5-light-3:before, .u-table-alt-palette-5-light-3 tr:nth-child(even) {
        color: #2c2c2c;
        background-color: #222222 !important;
        border: 1px solid #481f1f;
        background-image: linear-gradient(#ffffff, #ffffff);
        padding: 10px;
        border-radius: 16px;
    }
  </style>
</head>

<body class="u-body">


    <script>
        document.querySelector("#items")
            .addEventListener("wheel", event => {
                    if (event.deltaY > 0) {
                        event.target.scrollBy(300, 0);
                    } else {
                        event.target.scrollBy(-300, 0);
                    }
                }

            )
    </script>

    
<!-- Incluir o Menu da página -->
<?php include "topmenu.php" ?>


<?php 
    require_once "config.php";

    $id = $_GET['id'];
    $sql = "SELECT  * FROM  quartos where id_quarto = " .$id;
    
    $result = mysqli_query($link, $sql);

    $row = mysqli_fetch_array($result);

            
  ?>

    <div style="background-color:#e6e6e6">
        <section id="carousel_5804" style="background-image: linear-gradient(#878484, #141212);height: 831px;">
            <div class="u-clearfix u-sheet u-sheet-1" style="min-height: 0px;">
                <div class="u-align-center-lg u-align-center-md u-align-center-xl u-align-center-xs u-container-style u-group u-opacity u-opacity-90 u-palette-5-light-3 u-group-1" style="width: 482px;min-height: 156px;margin: 50px auto;">
                    <div class="u-container-layout u-valign-middle u-container-layout-1">
                        <h2 class="u-align-center-sm u-custom-font u-font-georgia u-text u-text-1"  style="font-family: Roboto;font-size: 40px;">Quarto <?php echo $row[2] ?></h2>
                        <img src="images/faixaDourada.png" alt="" class="u-image u-image-default u-image-1" data-image-width="680" data-image-height="80">
                    </div>
                </div>
            </div>
            <div class="limiter">
            <div class="u-size-30">
                <div class="u-layout-col">
                    <div class="u-align-left u-container-style u-layout-cell u-left-cell u-size-60 u-layout-cell-1">
                        <div class="u-container-layout u-valign-middle-sm u-valign-middle-xl u-valign-middle-xs">
                            <div class="formQuarto">
                                <div id="items-wrapper" class="carrosel" style="border-width: 2px;">
                                        <img class="d-block w-100" src="<?php echo $row[5]; ?>" style="height: 350px;" alt="Imagem do quarto">
                                </div>

                                <div class="informacoes">
                                    <div  style="border-bottom: 2px solid #cdcdcd;height: 180px;width:100%">
                                        <h2 style="margin-bottom: 0 !important;">A partir de R$ <?php echo number_format($row[1], 2, ',', ' '); ?></h2>
                                        <div style="margin-bottom: 10px;margin-top:10px;font-size: 20px;">


                                        <div class="status" style="width:125px">Classificação:</div>
                                        <?php 
                                            if($row[4] == 1){
                                                echo "<div style='color: white;font-size: 18px;background-color: #9c9c9c;padding-top: 6px;padding-bottom: 6px;padding-right: 14px;padding-left: 14px;border-radius: 7px;width: 120px;text-align:center;margin: auto;'>Standard</div>";
                                            }else if($row[4] == 2){
                                                echo "<div style='color: white;font-size: 18px;background-color: crimson;padding-top: 6px;padding-bottom: 6px;padding-right: 14px;padding-left: 14px;border-radius: 7px;width: 120px;text-align:center;margin: auto;'>Master</div>";
                                            }else if($row[4] ==3){
                                                echo "<div style='color: white;font-size: 18px;background-color: darkgoldenrod;padding-top: 6px;padding-bottom: 6px;padding-right: 14px;padding-left: 14px;border-radius: 7px;width: 120px;text-align:center;margin: auto;'>Deluxe</div>";
                                            } ?>
                                        </div>
                                        <br>
                                        <div class="status" style="width:125px">
                                            <h2 style="font-size:20px;margin: 0;margin-top: 6px;">Status:</h2>

                                        </div>
                                        <div class="<?php 
                                        if($row[3] == 'Disponível'){
                                            echo "livre";
                                        }else{
                                            echo "ocupado";
                                        }; 



                                            ?>">
                                            <?php echo $row[3]; ?>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div style="border-bottom: 2px solid #cdcdcd;height: 151px;">
                                        <h5 style="width: 417px;"><?php echo $row[6]; ?></h5>
                                    </div>
                                </div>

                                <div class="informacoes" style="top: 411px;left: 14px;">
                                    <div class="data1" style="width: 245px;">
                                        <label for="dataInicial">Data Inicial</label>
                                        <input type="date" name="dataInicial" id="dataInicial" class="form-control" style="background-color: gainsboro;">

                                    </div>
                                    <div class="data2" style="width: 245px;">
                                        <label for="dataFinal">Data Final</label>
                                        <input type="date" name="dataFinal" id="dataFinal" class="form-control" style="background-color: gainsboro;">
                                    </div>

                                    <div class="u-form-group u-form-submit" id="btns">
                                        <a href="http://localhost/vht/FrontOffice/TelaResultadoExplorar.php" class="u-btn u-btn-round u-btn-submit u-button-style u-font-georgia u-palette-5-base u-btn-1"  style="margin-right: 20px;margin-left: 32px;"><< Voltar</a>
                                        <input type="button" value="submit" class="u-form-control-hidden">

                                        <a <?php if($row[3] == 'Disponível'){echo 'onclick="irParaAgendamento()"';} ?> class="u-btn u-btn-round u-btn-submit u-button-style u-font-georgia u-palette-5-base u-btn-1" style="width: 200px;<?php if($row[3] != 'Disponível'){echo "cursor:not-allowed";} ?>" <?php if($row[3] != 'Disponível'){echo "disabled";} ?>>Agendar</a>
                                        <input type="button" value="submit" class="u-form-control-hidden">

                                    </div>
                                 </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
       
    </div>




    
<!-- Incluir o footer da página -->

<?php include "footer.php" ?>



</body>

<script>
    function irParaAgendamento(){
        dataInicial = document.getElementById('dataInicial').value;
        dataFinal = document.getElementById('dataFinal').value;

        if(dataInicial == ''){
            alert('Por Favor, preencha as datas de agendamento para prosseguir.')
        }else if(dataFinal == ''){
            alert('Por Favor, preencha as datas de agendamento para prosseguir.')
        }else if(dataInicial > dataFinal){
            alert('A data inicial não pode ser maior que a data final.')
        }else{
            window.location.href="TelaPagamentoTotal.php?id=<?php echo $_GET['id']; ?>&data_inicial=" + dataInicial + "&data_final=" + dataFinal
        }
    }
</script>

<style>
    .formQuarto {
        height: 516px;
        padding-left: 10px;
        padding-top: 33px;
        padding-left: 30px;
        background-color: white;
        color: #111111;
        display: inline-flexbox;
        width: 1000px;
        margin: auto;
        border-radius: 20px;
    }
    
    .formQuarto div {
        display: inline-block;
    }
    
    .carrosel {
        width: 500px;
        border-style: solid;
    }
    
    .informacoes {
        position: absolute;
        margin-left: 20px;
        margin-bottom: 10px;
    }
    
    .barra {
        background-color: #111111;
        height: 2px;
        width: 380px;
        margin-bottom: 5px;
        float: left;
    }
    
    .status h5 {
        display: inline-block;
        position: sticky;
    }
    .livre{
            color: white;
            font-size: 18px;
            background-color: green;
            padding-top: 6px;
            padding-bottom: 6px;
            padding-right: 14px;
            padding-left: 14px;
            border-radius: 7px;
            width: 120px;
            text-align: center;
            margin: auto;

    }
    .ocupado {
     
            color: white;
            font-size: 18px;
            background-color: red;
            padding-top: 6px;
            padding-bottom: 6px;
            padding-right: 14px;
            padding-left: 14px;
            border-radius: 7px;
            width: 120px;
            text-align: center;
            margin: auto;
    }
    
    #btns {
        margin-bottom: 20px;
    }
</style>

</html>