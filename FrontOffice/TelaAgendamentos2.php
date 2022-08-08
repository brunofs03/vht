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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
  <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
  <meta property="og:title" content="Página Inicial">
  <meta property="og:type" content="website">
  <meta name="theme-color" content="#478ac9">

  <style>
    .u-border-grey-30, .u-separator-grey-30:after {
        border-color: #b3b3b3 !important;
        stroke: #b3b3b3 !important;
        border: 1px solid #b3b3b3 !important;
    }

	td{
		text-align: center !important;
	}

	th{
		text-align: center !important;
	}

	tbody tr:hover {
		background-color: #dbdbdb;
	}
  </style>
</head>


<body class="u-body">


<!-- Incluir o Menu da página -->

<?php include "topmenu.php" ?>



<!-- Seção do filtro da tabela -->
  <div style="background-color:#e6e6e6">
  <section class="u-clearfix u-image u-section-4" id="carousel_5804" style="background-image: url(images/Montanhosa.jpg);height: 264px;">
    <div class="u-clearfix u-sheet u-sheet-1" style="height: 264px;min-height:264px">
      <div
        class="u-align-center-lg u-align-center-md u-align-center-xl u-align-center-xs u-container-style u-group u-opacity u-opacity-90 u-palette-5-light-3 u-group-1" style="width: 482px;min-height: 156px;margin: 50px auto;max-width: 100%;">
        <div class="u-container-layout u-valign-middle u-container-layout-1">
          <h2 class="u-align-center-sm u-custom-font u-font-georgia u-text u-text-1">Agendamentos</h2>
          <img src="images/FaixaDourada.png" alt="" class="u-image u-image-default u-image-1"
            data-image-width="680" data-image-height="80">
        </div>
      </div>
    </div>
  </section>

  
<?php 
    require_once "config.php";

    $id = $_SESSION['id'];
    $sql = "SELECT * FROM `tb_agendamentos` inner join tb_pagamentos on tb_pagamentos.id_agendamento = tb_agendamentos.id inner join quartos on tb_agendamentos.id_quarto = quartos.id_quarto where id_criador = " .$id;
    
    $result = mysqli_query($link, $sql);

            
  ?>


<!-- Seção das informações da tabela -->

<section id="mainTable">
  <div class="limiter">
		<div class="container-table100" style="background: transparent !important;align-items: initial">
			<div class="wrap-table100">
				<div class="table100">
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">Data de Início</th>
								<th class="column2">Data Final</th>
								<th class="column3">Data agendamento</th>
								<th class="column3">Hora agendamento</th>
								<th class="column4">Preço por dia</th>
								<th class="column5">Total</th>
								<th class="column6">Quarto</th>
							</tr>
						</thead>
						<tbody style="background-color: white;">
							<?php while($row = mysqli_fetch_array($result)){
								echo '<tr>';
								echo '<td class="column1">';
								echo date("d/m/Y", strtotime($row['dt_inicio']));
								echo '</td>';
								echo '<td class="column2">';
								echo date("d/m/Y", strtotime($row['dt_fim']));
								echo '</td>';
								echo '<td class="column3">';
								echo date("d/m/Y", strtotime($row['data_criacao']));
								echo '</td>';
								echo '<td class="column4">';
								echo date("H:i:s", strtotime($row['data_criacao']));
								echo '</td>';
								echo '<td class="column5">R$ ';
								echo $row['preco_diaria'];
								echo '</td>';
								echo '<td class="column6">R$ ';
								echo $row['preco_total'];
								echo '</td>';
								echo '<td class="column7">';
								echo $row['num_quarto'];
								echo '</td>';
								echo '</tr>';
								};
							?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</section>


  <!-- Incluir o footer da página -->

<?php include "footer.php" ?>



</body>

</html>