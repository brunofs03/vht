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
  <link rel="stylesheet" href="Content/css/Página-Inicial.css" media="screen">
  <script class="u-script" type="text/javascript" src="Content/js/javascriptPrincipal.js" defer=""></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

<?php 
    require_once "config.php";


    $sql = "SELECT * FROM quartos order by id_quarto desc";


    $result = mysqli_query($link, $sql);

    
  ?>

<style>
    td{
        border: 1px solid #ddd;
    }
</style>
<section style="min-height:500px">
    <div class="container">
        <h1 align="center"><small><b>Edição de quartos</b></small></h1>
        <table class="table">
            <thead class="table table-bordered" style="background-color:#292d33; color:white;">
                <tr>
                    <th style="text-align:center !important">Número</th>
                    <th style="text-align:center !important">Preço base</th>
                    <th style="text-align:center !important">Classificação</th>
                    <th style="text-align:center !important">Editar</th>
                </tr>
            </thead>
            <tbody>
                
                <?php
            
            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td align='center'>";
                echo $row['num_quarto'];
                echo "</td>";
                echo "<td align='center'>";
                echo $row['preco_diaria'];
                echo "</td>";
                echo "<td align='center'>";
                if($row['estrelas'] == 1){
                    echo "<div style='color: white;font-size: 18px;background-color: #9c9c9c;padding-top: 6px;padding-bottom: 6px;padding-right: 14px;padding-left: 14px;border-radius: 7px;width: 120px;text-align:center;margin: auto;'>Standard</div>";
                }else if($row['estrelas'] == 2){
                    echo "<div style='color: white;font-size: 18px;background-color: crimson;padding-top: 6px;padding-bottom: 6px;padding-right: 14px;padding-left: 14px;border-radius: 7px;width: 120px;text-align:center;margin: auto;'>Master</div>";
                }else if($row['estrelas'] ==3){
                    echo "<div style='color: white;font-size: 18px;background-color: darkgoldenrod;padding-top: 6px;padding-bottom: 6px;padding-right: 14px;padding-left: 14px;border-radius: 7px;width: 120px;text-align:center;margin: auto;'>Deluxe</div>";
                }
                echo "</td>";
                echo "<td align='center'><i class='fas fa-edit' style='font-size:20px;cursor:pointer' onclick='editaQuarto(";
                echo $row['id_quarto'];
                echo ")'</i></td>";
                echo "</tr>";
            }
            ?>
            </tbody>  
        </table>
    </div>
</section>

<?php include "footer.php" ?>
  

<script>
  function editaQuarto(id){
    window.location.href = 'editaQuarto.php?id=' + id
  }
</script>

</body>

</html>