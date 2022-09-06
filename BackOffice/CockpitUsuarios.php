<?php include "sessionStart.php"?>

<!DOCTYPE html>

<!-- Inicio da Importação de todas as bibliotecas usadas -->

<html style="font-size: 16px;">
<head>
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
  
</head>


<body class="u-body">


<!-- Incluir o Menu da página -->

<?php include "topmenu.php" ?>

<?php 
    require_once "config.php";


    $sql = "SELECT * FROM usuarios order by id desc";


    $result = mysqli_query($link, $sql);

    
  ?>

<style>
    td{
        border: 1px solid #ddd;
    }
</style>
<section style="min-height:500px">
    <div class="container">
        <h1 align="center"><small><b>Edição de usuários</b></small></h1>
        <table class="table">
            <thead class="table table-bordered" style="background-color:#292d33; color:white;">
                <tr>
                    <th style="text-align:center !important">Id</th>
                    <th style="text-align:center !important">Perfil</th>
                    <th style="text-align:center !important">Nome</th>
                    <th style="text-align:center !important">E-mail</th>
                    <th style="text-align:center !important">Telefone</th>
                    <th style="text-align:center !important">Data de criação</th>
                    <th style="text-align:center !important">Editar</th>
                </tr>
            </thead>
            <tbody>
                
                <?php
            
            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td align='center'>";
                echo $row['id'];
                echo "</td>";
                echo "<td align='center'>";
                if($row['Perfil'] == 1){
                  echo "Cliente";
                }else{
                  echo "Funcionário";
                };
                echo "</td>";
                echo "<td align='center'>";
                echo $row['nome'];
                echo "</td>";
                echo "<td align='center'>";
                echo $row['email'];
                echo "</td>";
                echo "<td align='center'>";
                echo $row['telefone'];
                echo "</td>";
                echo "<td align='center'>";
                $date=date_create($row['data_criacao']);
				echo date_format($date,"d/m/Y");
                echo "</td>";
                echo "<td align='center'><i class='fas fa-edit' style='font-size:20px;cursor:pointer' onclick='editaUser(";
                echo $row['id'];
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
  function editaUser(id){
    window.location.href = 'EdicaoUsuario.php?id=' + id
  }
</script>

</body>

</html>