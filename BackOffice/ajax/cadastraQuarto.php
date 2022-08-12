

<?php var_dump($_POST); ?>



<?php

session_start();

require_once "../config.php";


$sql = "insert into quartos(preco_diaria, num_quarto, disponibilidade, estrelas, link, descricao) values (?, ?, ?, ?, ?, ?);";
        $stmt = mysqli_prepare($link, $sql);
        
        mysqli_stmt_bind_param($stmt, "ssssss", $param_preco, $param_num, $param_disponibilidade, $param_estrelas, $param_link, $param_descricao);

        $param_preco = $_POST['txtPreco'];
        $param_num = 0;
        $param_disponibilidade = 'Disponível';
        $param_estrelas = $_POST['slcEstrelas'];
        $param_link = '';
        $param_descricao = $_POST['txtDescricao'];

        mysqli_stmt_execute($stmt);

?>