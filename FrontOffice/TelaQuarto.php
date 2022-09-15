<?php include "sessionStart.php"?>

<!DOCTYPE html>
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


  <link rel="stylesheet" href="/VHT/FrontOffice/Content/css/estiloPrincipal.css" media="screen">
  <link rel="stylesheet" href="/VHT/FrontOffice/Content/css/mainPage.css" media="screen">

  <link rel="stylesheet" href="/VHT/FrontOffice/Content/css/jquery-ui.css">
  <script src="/VHT/FrontOffice/Content/js/jquery-1.10.2.js"></script>
  <script src="/VHT/FrontOffice/Content/js/jquery-ui.js"></script>
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <title>Virtual Hotel Tech</title>
<link rel="icon" href="/VHT/FrontOffice/images/estrela.png"> 

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

    $sql = "select * from agendamentos
    inner join pagamentos on pagamentos.id_agendamento = agendamentos.id
    where DATEDIFF(data_inicio, now()) >= 0 and status = 1 and agendamentos.id_quarto = " .$id;
    
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
            where selected_date between '" . $row['data_inicio'] ."' and '" .$row['data_fim'] ."'
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
    $sql = "SELECT  * FROM  quartos where id = " .$id;
    
    $result = mysqli_query($link, $sql);

    $row = mysqli_fetch_array($result);

            
  ?>

    <div style="background-color:#e6e6e6">
        <div style="background-color:#292d33;padding:30px">
            <h2 class="u-align-center-sm u-custom-font u-font-georgia u-text u-text-1"  style="font-family: Roboto;font-size: 40px;text-align:center;margin: 0;color:white">Quarto <?php echo $row['num_quarto'] ?></h2>
            <div style="display: flex;justify-content: center;">
                <img src="images/faixaDourada.png" alt="Faixa dourada" style="max-width: 640px;width: -webkit-fill-available;">
            </div>
        </div>
        <div class="container" style="background-color:white">
            <br>
            <div class="row">
                <div class="col-sm-6">
                    <img src="<?php echo $row['link']; ?>" style="max-height: 350px;width: -webkit-fill-available;border:1px solid #333333" alt="Imagem do quarto">
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2 style="margin-bottom: 0 !important;font-size:30px;text-align: center">A partir de R$ <?php echo number_format($row['preco_diaria'], 2, ',', ' '); ?></h2>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <div style="display: flex;margin-bottom: 5px;">
                                <div class="status" style="width:125px">
                                    <h2 style="font-size:20px;margin: 0;margin-top: 6px;">Classificação:</h2>
                                </div>
                                    <?php 
                                        if($row['classificacao'] == 1){
                                            echo "<div style='color: white;font-size: 18px;background-color: #9c9c9c;padding-top: 6px;padding-bottom: 6px;padding-right: 14px;padding-left: 14px;border-radius: 7px;width: 120px;text-align:center;margin: auto;'>Standard</div>";
                                        }else if($row['classificacao'] == 2){
                                            echo "<div style='color: white;font-size: 18px;background-color: crimson;padding-top: 6px;padding-bottom: 6px;padding-right: 14px;padding-left: 14px;border-radius: 7px;width: 120px;text-align:center;margin: auto;'>Master</div>";
                                        }else if($row['classificacao'] ==3){
                                            echo "<div style='color: white;font-size: 18px;background-color: darkgoldenrod;padding-top: 6px;padding-bottom: 6px;padding-right: 14px;padding-left: 14px;border-radius: 7px;width: 120px;text-align:center;margin: auto;'>Deluxe</div>";
                                        } ?>
                                </div>
                            </div>
                        <div class="col-sm-6">
                            <div style="display: flex;margin-bottom: 5px;">
                               <div class="status" style="width:125px">
                                    <h2 style="font-size:20px;margin: 0;margin-top: 6px;">Status:</h2>

                                </div>
                                <div class="<?php 
                                if($row['disponibilidade'] == 'Disponível'){
                                    echo "livre";
                                }else{
                                    echo "ocupado";
                                }; 



                                    ?>">
                                    <?php echo $row['disponibilidade']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <h5><?php echo $row['descricao']; ?></h5>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div <?php echo (!(isset($_SESSION["id"]))) ? 'hidden' : '' ?>>
                <div class="row">
                    <div class="col-sm-12">
                        <a href="/VHT/FrontOffice/TelaResultadoExplorar.php" style="padding: 10px;border-radius: 5px;color: #111111 !important;background-color: #b9c1cc !important;cursor:pointer;text-decoration: none">Voltar</a>

                        <a <?php if($row['disponibilidade'] == 'Disponível'){echo 'data-toggle="modal" data-target="#modalCriacao"';} ?>  style="margin-left: 32px;padding: 10px;border-radius: 5px;color: #111111 !important;background-color: #b9c1cc !important;cursor:pointer<?php if($row['disponibilidade'] != 'Disponível'){echo "cursor:not-allowed";} ?>" <?php if($row['disponibilidade'] != 'Disponível'){echo "disabled";} ?>>Agendar</a>
                    </div>
                </div>
                <br>
            </div>
        </div>
       
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
                console.log($(this).children().text() + '/' + (parseInt($(this).attr('data-month'))+1) + '/' + parseInt($(this).attr('data-year')));
                currentDate = $.datepicker.parseDate($.datepicker._defaults.dateFormat, (parseInt($(this).attr('data-month'))+1) + '/' + $(this).children().text() + '/' + parseInt($(this).attr('data-year')));
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