
<?php 
    require_once "config.php";

    $id = $_GET['id'];
    $sql = "SELECT  * FROM  quartos where id_quarto = " .$id;
    
    $result = mysqli_query($link, $sql);

    $row = mysqli_fetch_array($result);

            
  ?>


  <br><br>
<div class="container" style="background-color: rgb(255, 255, 255);box-shadow: 0 1px 1px 0 rgb(0 0 0 / 20%);min-height: 580px;">
<br>
  <div class="progress-bar2" style="width:75%;margin-left:12.5%">
    <div class="step2 active"></div>
    <div class="step2"></div>
    <div class="step2"></div>
    <div class="step2"></div>
  </div>
  <br>
  <div class="payment-method2" style="width: 70%;margin-left: 15%;">
    <label for="card" class="method2 card">
      <div class="card-logos">
        <img src="https://designmodo.com/demo/checkout-panel/img/visa_logo.png"/>
        <img src="https://designmodo.com/demo/checkout-panel/img/mastercard_logo.png"/>
      </div>
      <div class="radio-input" style="margin-top: 15px !important;font-weight: 500 !important;">
        <input id="card" value="cartao" type="radio" name="payment" style="float: left;margin-right: 10px;" onclick="changePagamento(1)">
        Pague R$ <?php echo number_format($row[1], 2, ',', ' '); ?> no cartão
      </div>
    </label>

    <!-- <label for="debito" class="method2 debito" style="padding-top: 7px !important;">
      <img src="https://xda.com.br/wp-content/uploads/boleto-icone.png" style="width:82px"/>
      <div class="radio-input" style="margin-top: 15px;font-weight: 500;">
        <input id="debito" type="radio" name="payment" style="float: left;margin-right: 10px;">
        Pague R$ 202,00 no boleto
      </div>
    </label>
       -->
      <label for="pix" class="method2 pix" style="padding-top: 2px !important;">
        <img src="https://logospng.org/download/pix/logo-pix-icone-512.png" style="width:72px"/>
        <div class="radio-input" style="margin-top: 4px;font-weight: 500;">
          <input value="pix" id="pix" type="radio" name="payment" style="float: left;margin-right: 10px;" onclick="changePagamento(2)">
          Pague <span style="text-decoration: line-through;color: #e61030;">R$ <?php echo number_format($row[1], 2, ',', ' '); ?></span> R$ <?php echo number_format($row[1] * 0.90, 2, ',', ' '); ?> no pix 
        </div>
      </label>
  </div>

<div class="row" style="width: 75%;margin-left: 12.5%;display:none" id="changeCard">
  <div class="col-sm-6">
    <div class="row">
      <div class="col-sm-12">
        <label for="cardholder">Nome</label> <span style="color:red">*</span>
        <input type="text" class="form-control" id="cardholder" name="cardholder"/>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-sm-6">
          <label for="dateVencimento">Data de vencimento</label> <span style="color:red">*</span>
          <input type="text" class="form-control" id="dateVencimento" name="dateVencimento"/>
      </div>
      <div class="col-sm-6">
        <label for="verification">CVV / CVC</label> <span style="color:red">*</span>
        <input type="text" class="form-control" id="verification" name="verification"/>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="row">
      <div class="col-sm-12">
        <div class="row">
          <div class="col-sm-12">
            <label for="cardnumber">Número do cartão</label> <span style="color:red">*</span>
             <input type="text" class="form-control" id="cardnumber" name="cardnumber" />
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
              <span class="info">* CVV ou CVC é o código de segurança do cartão, três digitos únicos na parte de trás.</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="row" style="width: 75%;margin-left: 12.5%;display:none" id="changePix">
  <div class="col-sm-6">
    <div class="row">
      <div class="col-sm-12">
        <label for="PixOwner">Nome</label> <span style="color:red">*</span>
        <input type="text" class="form-control" id="PixOwner" name="PixOwner"/>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="row">
          <div class="col-sm-12">
              <label for="CodPix">Código do Pix</label> <span style="color:red">*</span>
              <input type="text" class="form-control" id="CodPix" name="CodPix"/>
          </div>
        </div>
      </div>
    </div>
    <br>
  </div>

<div class="container">
  <div class="panel-footer2">
      <button class="btn2 back-btn2" type="button" onclick="MudaFrame('1')">Voltar</button>
      <button class="btn2 next-btn2" type="button" onclick="MudaFrame('3')">Próximo</button>
  </div>
</div>
<br><br>

<script>
  function changePagamento(tipo){
    if(tipo == 1){
      document.getElementById('MetodoPag').innerHTML = 'Cartão'
      document.getElementById('changeCard').style = 'width: 75%;margin-left: 12.5%;display:flex !important'
      document.getElementById('changePix').style = 'width: 75%;margin-left: 12.5%;display:none !important'
      document.getElementById('tipoPag').innerHTML = 'Número do cartão:'
      document.getElementById('precoConfirm').innerHTML = document.getElementById('precoTotal').value
      document.getElementById('precoCalculado').innerHTML = document.getElementById('precoTotalCalculado').value
    }else if(tipo == 2){
      document.getElementById('MetodoPag').innerHTML = 'PIX'
      document.getElementById('changeCard').style = 'width: 75%;margin-left: 12.5%;display:none !important'
      document.getElementById('changePix').style = 'width: 75%;margin-left: 12.5%;display:flex !important'
      document.getElementById('tipoPag').innerHTML = 'Código do PIX:'
      document.getElementById('precoConfirm').innerHTML = document.getElementById('precoPix').value
      document.getElementById('precoCalculado').innerHTML = document.getElementById('precoPixCalculado').value
    }
  }
</script>