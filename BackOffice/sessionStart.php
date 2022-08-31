<?php 

session_start();


    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true && $_SESSION["permissao"] === true){
        $logado = '1';
    }else{
        header("location: /VHT/telaLogin.php");
        exit;
    };

?>