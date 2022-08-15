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
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
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
        background:transparent;
        padding: 10px;
    }
    body{
        padding-top: 0px !important;padding-right: 0px !important;padding-bottom: 0px !important;padding-left: 0px !important;
    }
  </style>

  <?php 

    $datasOcupadas = array();

    require_once "config.php";

    $id = $_GET['id'];

    $sql = "select * from tb_agendamentos where dt_inicio > now() and id_quarto = " .$id;
    
    $result = mysqli_query($link, $sql);


    while($row = mysqli_fetch_array($result)){
        $sqlNovo = "
            select * from 
            (select adddate('1970-01-01',t4.i*10000 + t3.i*1000 + t2.i*100 + t1.i*10 + t0.i) selected_date from
             (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t0,
             (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t1,
             (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t2,
             (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t3,
             (select 0 i union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t4) v
            where selected_date between '" . $row['dt_inicio'] ."' and '" .$row['dt_fim'] ."'
        ";

    
        $resultNovo = mysqli_query($link, $sqlNovo);


        while($rowNovo = mysqli_fetch_array($resultNovo)){
            array_push($datasOcupadas,$rowNovo['selected_date']);
        }
    }
            
        
  ?>

  <style>
    html{
  background: #fafafa;
}
.containerForm{
      margin: 0 auto;
    text-align: center;
}
.containerForm input{
  width: 263px;
    height: 25px;
    text-align: left;
    padding: 5px;
    margin-bottom: 10px;
}

div.datepicker {
    display: inline-block;
    text-align: center;
    margin: 0 auto;
    width: 100%;
    float: none;
    font-family: 'Montserrat', sans-serif;
    background: none\9;
    -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#F70F141C,endColorstr=#F70F141C)";
    font-size: 10px;
    padding: 10px;
    color: rgba(255,255,255,0.9);
    border-radius: 5px;
    -ms-border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    -khtml-border-radius: 5px;
}
.ui-datepicker-row-break {
  display: none;
}
.ui-datepicker-multi .ui-datepicker-group {
    float: left;
    padding: 5px;
}



.ll-skin-melon {
    font-size: 90%;
}

.ll-skin-melon .ui-widget {
    font-family: "Lucida Grande", "Lucida Sans Unicode", Helvetica, Arial, Verdana, sans-serif;
    background: #dddddd;
    border: none;
    border-radius: 0;
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
}

.ll-skin-melon .ui-datepicker {
    padding: 0;
}

.ll-skin-melon .ui-datepicker-header {
    border: none;
    background: transparent;
    font-weight: normal;
    font-size: 15px;
}

.ll-skin-melon .ui-datepicker-header .ui-state-hover {
    background: transparent;
    border-color: transparent;
    cursor: pointer;
    border-radius: 0;
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
}

.ll-skin-melon .ui-datepicker .ui-datepicker-title {  
    font-size: 19px;
    font-weight: bold;
    padding: 0px;
    margin: 0px;
    width: 100%;
    height: 45px;
    color: #000000;
    text-align: center;
    padding-top: 17px;
    text-transform: uppercase;
}

.ll-skin-melon .ui-datepicker .ui-datepicker-prev-hover,
.ll-skin-melon .ui-datepicker .ui-datepicker-next-hover,
.ll-skin-melon .ui-datepicker .ui-datepicker-next,
.ll-skin-melon .ui-datepicker .ui-datepicker-prev {
    top: .9em;
    border:none;
}

.ll-skin-melon .ui-datepicker .ui-datepicker-prev-hover {
    left: 2px;
}

.ll-skin-melon .ui-datepicker .ui-datepicker-next-hover {
    right: 2px;
}

.ll-skin-melon .ui-datepicker .ui-datepicker-next span,
.ll-skin-melon .ui-datepicker .ui-datepicker-prev span {
    background-image: url(images/ui-icons_000000_256x240.png);
    background-position: -32px 0;
    margin-top: 0;
    top: 0;
    font-weight: normal;
}

.ll-skin-melon .ui-datepicker .ui-datepicker-prev span {
    background-position: -96px 0;
}

.ll-skin-melon .ui-datepicker table {
    margin: 0;
}

.ll-skin-melon .ui-datepicker th {
    font-weight: normal;
    background: transparent;
    border: none;
    color: #000000;
    cursor: text;
    height: 25px;
    text-transform: uppercase;
    font-size: 12px;
    padding-top: 10px;
}

.ll-skin-melon .ui-datepicker td {
    background: rgba(255,255,255,0.05);
    border: none;
    padding: 0;
}

.ll-skin-melon td .ui-state-default {
    background: transparent;
    border: none;
    text-align: center;
    padding: .5em;
    margin: 0;
    font-weight: normal;
    color: #888888;
    font-size: 16px;
}

.ll-skin-melon .ui-state-disabled  {
    opacity: 1;
}

.ll-skin-melon .ui-state-disabled .ui-state-default {
    color: rgba(0, 0, 0, 0.1);
}

/*.ll-skin-melon td .ui-state-active,*/
.ll-skin-melon td .ui-state-hover {
    background: #ada841 !important;
    color: #FFF;
}
/****************************************/
/****************************************/
.ll-skin-melon td.dp-highlight .ui-state-default {
    background: #707055;
    color: #FFF;
}

.ll-skin-melon .ui-datepicker td.dateFrom a,.ll-skin-melon .ui-datepicker td.dateTo a{
    background: #ada841;
    color: #FFF;
}
.ui-datepicker td.dp-highlight:first a , .ui-datepicker td.dp-highlight:last a{
    background: #ada841;
    color: #FFF;
}

.ui-datepicker.ui-datepicker-multi  {
    width: auto;
    padding: 10px;
    border-radius: 3px;
    display: inline-block !important;
}
.ui-datepicker-multi .ui-datepicker-group {
    float:left;
    border: 1px solid #c9c9c9;
}
#datepicker {
    height: 300px;
    overflow-x: scroll;
}
.ui-widget { font-size: 100% }

.dateFrom {
    position: relative;
    background: #ada841;
    color: #FFF;
    border: 4px solid #0008f5;
}
.dateFrom:after, .dateFrom:before {
    left: 100%;
    top: 50%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
}

.dateFrom:after {
    border-color: rgba(213, 0, 0, 0);
    border-left-color: #ada841;
    color: #FFF;
    border-width: 17px;
    margin-top: -17px;
}
.dateFrom:before {
    border-color: rgba(0, 8, 245, 0);
    border-width: 17px;
    margin-top: -17px;
}

  </style>

</head>

<body class="u-body" style="padding-top: 0px !important;padding-right: 0px;padding-bottom: 0px !important;padding-left: 0px !important;">


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
        <section id="carousel_5804" style="height: 831px;">
            <div class="u-clearfix u-sheet u-sheet-1" style="min-height: 0px;">
                <div class="u-align-center-lg u-align-center-md u-align-center-xl u-align-center-xs u-container-style u-group u-opacity u-opacity-90 u-palette-5-light-3 u-group-1" style="width: 482px;min-height: 156px;margin: 15px auto;">
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
                            <div class="formQuarto" style="border: 0.1em solid #939393;">
                                <div id="items-wrapper" class="carrosel" style="border-width: 1px;">
                                        <img class="d-block w-100" src="<?php echo $row[5]; ?>" style="height: 350px;" alt="Imagem do quarto">
                                </div>

                                <div class="informacoes">
                                    <div  style="border-bottom: 2px solid #cdcdcd;height: 180px;width:100%">
                                        <h2 style="margin-top: 0 !important;">A partir de R$ <?php echo number_format($row[1], 2, ',', ' '); ?></h2>
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
                                        <!-- <label for="dataInicial">Data Inicial</label>
                                        <input type="date" name="dataInicial" id="dataInicial" class="form-control" style="background-color: gainsboro;">
 -->
                                    </div>
                                    <div class="data2" style="width: 245px;">
                                        <!-- <label for="dataFinal">Data Final</label>
                                        <input type="date" name="dataFinal" id="dataFinal" class="form-control" style="background-color: gainsboro;"> -->
                                    </div>

                                    <div class="u-form-group u-form-submit" id="btns">
                                        <a href="http://localhost/vht/FrontOffice/TelaResultadoExplorar.php" class="u-btn u-btn-round u-btn-submit u-button-style u-font-georgia u-palette-5-base u-btn-1"  style="margin-right: 20px;margin-left: 32px;"><< Voltar</a>
                                        <input type="button" value="submit" class="u-form-control-hidden">

                                        <a <?php if($row[3] == 'Disponível'){echo 'data-toggle="modal" data-target="#modalCriacao"';} ?> class="u-btn u-btn-round u-btn-submit u-button-style u-font-georgia u-palette-5-base u-btn-1" style="width: 200px;<?php if($row[3] != 'Disponível'){echo "cursor:not-allowed";} ?>" <?php if($row[3] != 'Disponível'){echo "disabled";} ?>>Agendar</a>
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


    <div class="modal fade" id="modalCriacao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document" style="width: fit-content;max-width: 100%;">
          <div class="modal-content">
             <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agendar quarto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <br>
             </div>
                <span style="padding-left: 25px;padding-top: 25px;color: #525252;font-style: italic;"><span style="color:red">*</span> Acréscimo de 20% no valor da diária em finais de semana</span>
             <div class="modal-body" id="corpoEdicao">
              <input type="hidden" id="dataInicial" name="dataInicial" class="from" size="10">
              <input type="hidden" id="dataFinal" name="dataFinal" class="to" size="10">
                <div class="datepicker ll-skin-melon"></div>
             </div>
             <div class="modal-footer">
                <button type="button" onclick="irParaAgendamento()" class="btn btn-primary" style="background-color:#e11b22 !important">Agendar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
             </div>
          </div>
       </div>
    </div>
  </div>




    
<!-- Incluir o footer da página -->

<?php include "footer.php" ?>



</body>

<script>
    function irParaAgendamento(){
        dataInicial = new Date(document.getElementById('dataInicial').value);
        dataInicial = dataInicial.getFullYear().toLocaleString('en-US', {minimumIntegerDigits: 4, useGrouping:false}) + '-' 
        + (dataInicial.getMonth() + 1).toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false}) + '-' 
        + dataInicial.getDate().toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false})

        dataFinal = new Date(document.getElementById('dataFinal').value);
        dataFinal = dataFinal.getFullYear().toLocaleString('en-US', {minimumIntegerDigits: 4, useGrouping:false}) + '-' 
        + (dataFinal.getMonth() + 1).toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false}) + '-' 
        + dataFinal.getDate().toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false})

        if(document.getElementById('dataInicial').value == ''){
            alert('Por Favor, preencha as datas de agendamento para prosseguir.')
        }else if(document.getElementById('dataFinal').value == ''){
            alert('Por Favor, preencha as datas de agendamento para prosseguir.')
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
        background-color: #f1f1f1;
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



 <script>
    var dateFrom = null;
    var dateTo = null;

    var selectedDate = null;
    var tempDateFrom = null;
    var tempDateTo = null;

    var datesForDisable = <?php echo json_encode($datasOcupadas); ?>

$(".datepicker").datepicker({
    minDate: 0,
    numberOfMonths: [2,1],
    monthNames: [ "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro" ],
    dayNamesMin: [ "Seg", "Ter", "Qua", "Qui", "Sex", "Sab", "Dom" ],

    beforeShowDay: function(date) {           
        dateFrom = $.datepicker.parseDate($.datepicker._defaults.dateFormat, $("#dataInicial").val());
        dateTo = $.datepicker.parseDate($.datepicker._defaults.dateFormat, $("#dataFinal").val());
        dateFormatada = date.getFullYear().toLocaleString('en-US', {minimumIntegerDigits: 4, useGrouping:false}) + '-' 
        + (date.getMonth() + 1).toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false}) + '-' 
        + date.getDate().toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false});

        if(datesForDisable.indexOf(dateFormatada) != -1){
            return [ false ];
        }

        if(dateFrom != null){
            if(date.getTime() == dateFrom.getTime()){
                return [true,"dateFrom"];                     
            }
        }
        if(dateTo != null){
            if(date.getTime() == dateTo.getTime()){
                return [true,"dateTo"];
            } 
        }   

        if(dateFrom != null && dateTo != null){
            for (var i = 0; i < datesForDisable.length; i++) {
                var dataAtual = new Date(datesForDisable[i]);
                var dataAtual1 = new Date(dateFrom);
                var dataAtual2 = new Date(dateTo);

                if(dataAtual > dataAtual1 && dataAtual < dataAtual2){
                    alert('Selecione um período válido, existem agendamentos no período informado.');
                    $("#dataInicial").val('')
                    $("#dataFinal").val('')
                return [ false ];
                } 
            }
        }


        return [true, dateFrom && ((date.getTime() == dateFrom.getTime()) || (dateTo && date >= dateFrom && date <= dateTo)) ? "dp-highlight" : ""];   
    },
    onSelect: function(dateText, inst) {
        console.log('onSelect');
        dateFrom = $.datepicker.parseDate($.datepicker._defaults.dateFormat, $("#dataInicial").val());
        dateTo = $.datepicker.parseDate($.datepicker._defaults.dateFormat, $("#dataFinal").val());
        selectedDate = $.datepicker.parseDate($.datepicker._defaults.dateFormat, dateText);  
        
        

        
        if (!dateFrom || dateTo) {
            $("#dataInicial").val(dateText);
            $("#dataFinal").val("");
            $(this).datepicker();
        } else if( selectedDate < dateFrom ) {
            $("#dataFinal").val( $("#dataInicial").val() );
            $("#dataInicial").val( dateText );
            $(this).datepicker();
        } else {
            $("#dataFinal").val(dateText);
            $(this).datepicker();
        }           
        setTimeout(function() {                
            highlightBetweenDates(); 
        }, 0); 
    },
    refresh: function() {
       alert('sdfdsf');
    }
});

var currentDate = null;
var allTds = null;

function highlightBetweenDates() {
    if(dateFrom == null || dateTo == null ){ 
        $(".ui-datepicker-calendar td").mouseover(function() {
            if(dateFrom != null && !$(this).hasClass('ui-datepicker-unselectable')){
                currentDate = $.datepicker.parseDate($.datepicker._defaults.dateFormat, $(this).children().text() + '/' + (parseInt($(this).attr('data-month'))+1) + '/' + parseInt($(this).attr('data-year')));
                if(currentDate != selectedDate){
                    if (selectedDate === null) {
                        selectedDate = new Date();
                    }
                    allTds = $('.ui-datepicker').find('td');            
                    allTds.removeClass('dp-highlight')
                    found = false;
                    if (currentDate < selectedDate) {
                        for (i = 0; i < allTds.length; i++) {
                            if (allTds[i] == this) {
                                found = true;
                            }
                            if ($(allTds[i]).hasClass('ui-datepicker-current-day')) {
                                break;
                            }
                            if (found) {
                                $(allTds[i]).addClass('dp-highlight');
                            }
                        }
                    } else if (currentDate > selectedDate) {
                        for (i = 0; i < allTds.length; i++) {
                            if (found) {
                                $(allTds[i]).addClass('dp-highlight');
                            }
                            if ($(allTds[i]).hasClass('ui-datepicker-current-day') ) {
                                found = true;
                            }
                            if (allTds[i] == this) {
                                break;
                            }
                        }
                    }              
                } else {
                    console.log('same');  
                }    
            } else {
                console.log('NOT');   
            }    
        });
    }  else {
        $(".ui-datepicker-calendar td").unbind('mouseover');
        $(".ui-datepicker-calendar td").off('mouseover');
    } 
}

highlightBetweenDates();
 </script>



</html>