
<?php 
    require_once "config.php";

    $id = $_GET['id'];
    $sql = "SELECT  * FROM  quartos where id = " .$id;
    
    $result = mysqli_query($link, $sql);

    $row = mysqli_fetch_array($result);

            
  ?>


  <br><br>
<div class="container" style="background-color: rgb(255, 255, 255);box-shadow: 0 1px 1px 0 rgb(0 0 0 / 20%);min-height: 580px;">
<br>
  <div class="progress-bar2" style="width:75%;margin-left:12.5%">
    <div class="step2 active"></div>
    <div class="step2 active"></div>
    <div class="step2"></div>
    <div class="step2"></div>
  </div>
    <br><br>
    <h1 style="width:100%;text-align:center;">Api do mercado pago aqui</h1>
    <h3 style="width:100%;text-align:center;">Pendente conclusão</h3>
  </div>

<div class="container">
  <div class="panel-footer2">
      <button class="btn2 back-btn2" type="button" onclick="MudaFrame('2')">Voltar</button>
      <button class="btn2 next-btn2" type="button" onclick="MudaFrame('4')">Finalizar</button>
  </div>
</div>
<br><br>
