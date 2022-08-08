

<?php var_dump($_POST); ?>



<?php

session_start();

require_once "../config.php";


$sql = "insert into tb_agendamentos(id_quarto,id_criador,data_criacao,txtNome,txtSobrenome,txtCpf,dateDataNascimento,txtEndereco,txtCidade,txtCep,txtEmail,txtTelefone,txtCelular,dt_inicio,dt_fim) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
        $stmt = mysqli_prepare($link, $sql);
        
        mysqli_stmt_bind_param($stmt, "sssssssssssssss", $param_cod, $param_criador, $param_dt_criacao, $param_nome, $param_sobrenome, $param_cpf, $param_dataNasc, $param_endereco, $param_cidade, $param_cep, $param_email, $param_telefone, $param_celular, $param_dt_inicio, $param_dt_fim);

        $param_cod = $_POST['codQuarto'];
        $param_criador = $_SESSION['id'];
        $param_dt_criacao = date("Y-m-d H:i:s");
        $param_nome = $_POST['txtNome'];
        $param_sobrenome = $_POST['txtSobrenome'];
        $param_cpf = $_POST['txtCpf'];
        $param_dataNasc = $_POST['dateDataNascimento'];
        $param_endereco = $_POST['txtEndereco'];
        $param_cidade = $_POST['txtCidade'];
        $param_cep = $_POST['txtCep'];
        $param_email = $_POST['txtEmail'];
        $param_telefone = $_POST['txtTelefone'];
        $param_celular = $_POST['txtCelular'];
        $param_dt_inicio = $_POST['dt_inicio'];
        $param_dt_fim = $_POST['dt_fim'];

        mysqli_stmt_execute($stmt);

?>

<?php 

    $sql = "SELECT * FROM  tb_agendamentos where id_criador = " .$_SESSION['id'] ." ORDER BY id DESC LIMIT 1;";
    
    $result = mysqli_query($link, $sql);

    $row = mysqli_fetch_array($result);

    $idInserido = $row['id'];
     
  ?>

<?php

        $sql = "INSERT INTO tb_pagamentos(id_agendamento,payment,cardholder,dateVencimento,verification,cardnumber,numPix,preco_diaria,preco_total) VALUES (?,?,?,?,?,?,?,?,?);";
        $stmt = mysqli_prepare($link, $sql);
        
        mysqli_stmt_bind_param($stmt, "sssssssss", $param_agend, $param_payment, $param_cardholder, $param_dateVenc, $param_verification, $param_cardNumb, $param_numPix, $param_preco_diaria, $param_preco_total);

        $param_agend = $idInserido;
        $param_payment = $_POST['payment'];

        if($_POST['payment'] != 'pix'){
            $param_cardholder = $_POST['cardholder'];
        }else{
            $param_cardholder = $_POST['PixOwner'];
        }

        $param_dateVenc = $_POST['dateVencimento'];
        $param_verification = $_POST['verification'];
        $param_cardNumb = $_POST['cardnumber'];
        $param_numPix = $_POST['CodPix'];

        if($_POST['payment'] != 'pix'){
            $param_preco_diaria = $_POST['precoTotal'];
        }else{
            $param_preco_diaria = $_POST['precoPix'];
        }

        if($_POST['payment'] != 'pix'){
            $param_preco_total = $_POST['precoTotalCalculado'];
        }else{
            $param_preco_total = $_POST['precoPixCalculado'];
        }


        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
    
    mysqli_close($link);
?>