<?php include "sessionStart.php"?>

<!DOCTYPE html>

<!-- Inicio da Importação de todas as bibliotecas usadas -->

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
  
  <meta property="og:title" content="Página Inicial">
  <meta property="og:type" content="website">
  <meta name="theme-color" content="#478ac9">

  <style>
    .anychart-credits{
      display: none !important;
    }
  </style>
</head>


<body class="u-body">


<!-- Incluir o Menu da página -->

<?php include "topmenu.php" ?>



<!-- Seção dos gráficos -->


<section style="min-height: 600px">


<br>
<br>
   <div class="container" style="width: 90% !important;max-width: 90%;border: 1px solid black;padding: 27px;">
      <div class="row">
         <div class="col-sm-4" style="border-right: 1px solid black;">
            <div id="PieChartHold" style="height:400px"></div>
         </div>
         <div class="col-sm-8">
            <div id="lineChartHold" style="height:400px"></div>
         </div>
      </div>
   </div>
   <br>
   <br>

<script>

        // Adiciona os valores do gráfico e os nomes
        var data = [
        {x: "Clientes", value: 30},
        {x: "Funcionários", value: 9}
        ];

        // Cria o gráfico e adiciona os valores a ele
        chart = anychart.pie(data);

      chart.title(
        'Tipos de contas criadas'
      );

        // Adiciona o gráfico a uma div
        chart.container("PieChartHold");

        // Inicializa a vizualisação do gráfico
        chart.draw();
    </script>

<script>

    anychart.onDocumentReady(function () {
      // create data set on our data
      var dataSet = anychart.data.set(getData());

      var firstSeriesData = dataSet.mapAs({ x: 0, value: 1 });

      // create line chart
      var chart = anychart.line();

      // turn on chart animation
      chart.animation(true);

      // set chart padding
      chart.padding([10, 20, 5, 20]);

      // turn on the crosshair
      chart.crosshair().enabled(true).yLabel(false).yStroke(null);

      // set tooltip mode to point
      chart.tooltip().positionMode('point');

      // set chart title text settings
      chart.title(
        'Quantidade de agendamentos.'
      );

      // set yAxis title
      chart.yAxis().title('Agendamentos realizados no período');
      chart.xAxis().labels().padding(5);

      var firstSeries = chart.line(firstSeriesData);
      firstSeries.name('Agendamentos');
      firstSeries.hovered().markers().enabled(true).type('circle').size(4);
      firstSeries
        .tooltip()
        .position('right')
        .anchor('left-center')
        .offsetX(5)
        .offsetY(5);    

      // turn the legend on
      chart.legend().enabled(true).fontSize(13).padding([0, 0, 10, 0]);

      // set container id for the chart
      chart.container('lineChartHold');
      // initiate chart drawing
      chart.draw();
    });

    function getData() {
      return [
        ['Jan', 0],
        ['Fev', 1],
        ['Mar', 3],
        ['Abr', 3],
        ['Mai', 5],
        ['Jun', 5],
        ['Jul', 7],
        ['Ago', 12],
        ['Set', 13],
        ['Out', 24],
        ['Nov', 15],
        ['Dez', 20],
      ];
    }
  
</script>

</section>



<!-- Incluir o footer da página -->

<?php include "footer.php" ?>
  



</body>

</html>