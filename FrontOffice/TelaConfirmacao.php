<br>
<br>


<?php 
    require_once "config.php";

    $id = $_GET['id'];
    $sql = "SELECT  * FROM  quartos where id = " .$id;
    
    $result = mysqli_query($link, $sql);

    $row = mysqli_fetch_array($result);

            
    function dateDifference($start_date, $end_date)
        {
            // calulating the difference in timestamps 
            $diff = strtotime($start_date) - strtotime($end_date);
            
            // 1 day = 24 hours 
            // 24 * 60 * 60 = 86400 seconds
            return ceil(abs($diff / 86400));
        }
  ?>

    <style>
        #confirmacaoTables td{
            padding: 5px;
            border: 1px solid #c4c4c4 !important;
        }
        
        #confirmacaoTables table{
            min-height: 275px;
            width: 100%;
        }
        
                
        @media (max-width: 777px) {
        
            #confirmacaoTables table{
                min-height: 360px;
                width: 100%;
            }
        }
    </style>

   <input type="hidden" name="precoTotal" id="precoTotal" value="<?php echo number_format($row['preco_diaria'], 2, ',', ' '); ?>">
  <input type="hidden" name="precoPix" id="precoPix" value="<?php echo number_format($row['preco_diaria'] * 0.90, 2, ',', ' '); ?>">
   <input type="hidden" name="precoTotalCalculado" id="precoTotalCalculado" value="<?php echo number_format($row['preco_diaria'] * (dateDifference($_GET['data_inicial'], $_GET['data_final']) + 1), 2, ',', ' '); ?>">
  <input type="hidden" name="precoPixCalculado" id="precoPixCalculado" value="<?php echo number_format(($row['preco_diaria'] * 0.90) * (dateDifference($_GET['data_inicial'], $_GET['data_final']) + 1), 2, ',', ' '); ?>">

    <div class="container" style="background-color: rgb(255, 255, 255);box-shadow: 0 1px 1px 0 rgb(0 0 0 / 20%);min-height: 580px;">
        <br>
        <div class="progress-bar2" style="width:75%;margin-left:12.5%">
            <div class="step2 active"></div>
            <div class="step2 active"></div>
            <div class="step2"></div>
            <div class="step2"></div>
        </div>
        <br>
        <br>
        <div style="overflow: auto;word-break: break-word;border: 1px solid #c4c4c4;">
            <div style="min-width: 700px;" id="confirmacaoTables">
                <div style="width:33%;float:left;border-right: 1px solid #eee;border-left:1px solid #eee;">
                <label style="border-bottom:1px solid #eee;width:100%;border-top:1px solid #eee;width:100%;border-left:1px solid #eee;width:100%;text-align:center;font-size:20px;padding:7px;background-color: #363636;color: white !important;margin: 0;">Dados Pessoais</label>
                    <table>
                        <tbody>
                            <tr>
                                <td>Nome:</td>
                                <td id="nomeConfirmar">Erro ao carregar Nome</td>
                            </tr>
                            <tr>
                                <td>Sobrenome:</td>
                                <td id="sobrenomeConfirmar">Erro ao carregar Sobrenome</td>
                            </tr>
                            <tr>
                                <td>CPF</td>
                                <td id="cpfConfirmar">Erro ao carregar CPF</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td id="emailConfirmar">Erro ao carregar Email</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div style="width:34%;float:left;border-right: 1px solid #eee;" id="quartoConfirmation">
                <label style="border-bottom:1px solid #eee;width:100%;border-top:1px solid #eee;width:100%;text-align:center;font-size:20px;padding:7px;background-color: #363636;color: white !important;margin: 0;">Dados do Quarto</label>
                    <table>
                        <tbody>
                            <tr>
                                <td>Quarto:</td>
                                <td><?php echo $row['num_quarto'] ?></td>
                            </tr>
                            <tr>
                                <td>Preço diária:</td>
                                <td>R$ <span id="precoConfirm"><?php echo number_format($row['preco_diaria'], 2, ',', ' '); ?></span></td>
                            </tr>
                            <tr>
                                <td>Início da estádia</td>
                                <td><?php echo date("d/m/Y", strtotime($_GET['data_inicial'])); ?></td>
                            </tr>
                            <tr>
                                <td>Fim da estádia</td>
                                <td><?php echo date("d/m/Y", strtotime($_GET['data_final'])); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div style="width:33%;float:left;border-right:1px solid #eee;" id="paymentConfirmation">
                <label style="border-bottom:1px solid #eee;width:100%;border-top:1px solid #eee;width:100%;border-right:1px solid #eee;width:100%;text-align:center;font-size:20px;padding:7px;background-color: #363636;color: white !important;margin: 0;">Dados de Pagamento</label>
                    <table>
                        <tbody>
                            <tr>
                                <td>Método de pagamento:</td>
                                <td id="MetodoPag">Erro ao carregar método de pagamento</td>
                            </tr>
                            <tr>
                                <td id="tipoPag">Número do cartão:</td>
                                <td id="NumeroCartaoCensurado">Erro ao carregar número do cartão</td>
                            </tr>
                            <tr>
                                <td>Data do pagamento</td>
                                <td><?php echo date("d/m/Y"); ?></td>
                            </tr>
                            <tr>
                                <td>Preço total:</tdz>
                                <td>R$ <span id="precoCalculado"></span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="panel-footer2">
            <button class="btn2 back-btn2" type="button" onclick="MudaFrame('2')">Voltar</button>
            <button class="btn2 next-btn2" type="button" onclick="MudaFrame('4')">Finalizar</button>
        </div>
    </div>
    <br>
    <br>