

<?php var_dump($_POST); ?>



<?php

session_start();

require_once "../config.php";


$sql = "insert into agendamentos(id_quarto,id_usuario,nome,sobrenome,cpf,data_nascimento,endereco,cidade,cep,email,telefone,celular,data_inicio,data_fim) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
        $stmt = mysqli_prepare($link, $sql);
        
        mysqli_stmt_bind_param($stmt, "ssssssssssssss", $param_cod, $param_criador, $param_nome, $param_sobrenome, $param_cpf, $param_dataNasc, $param_endereco, $param_cidade, $param_cep, $param_email, $param_telefone, $param_celular, $param_dt_inicio, $param_dt_fim);

        $param_cod = $_POST['codQuarto'];
        $param_criador = $_SESSION['id'];
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

    $sql = "SELECT * FROM  agendamentos where id_usuario = " .$_SESSION['id'] ." ORDER BY id DESC LIMIT 1;";
    
    $result = mysqli_query($link, $sql);

    $row = mysqli_fetch_array($result);

    $idInserido = $row['id'];
     
  ?>

<?php

        $sql = "INSERT INTO pagamentos(id_agendamento,tipo,preco_diaria,preco_total) VALUES (?,?,?,?);";
        $stmt = mysqli_prepare($link, $sql);
        
        mysqli_stmt_bind_param($stmt, "ssss", $param_agend, $param_payment, $param_preco_diaria, $param_preco_total);

        $param_agend = $idInserido;
        $param_payment = $_POST['payment'];

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