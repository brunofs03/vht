<?php 

session_start();


    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        $logado = '1';
    };

    
  if($_SERVER['SERVER_NAME'] == 'localhost'){
    $varPath = '/VHT/';
  }else{
    $varPath = 'http://vht.mytcc.com.br/';
  } 

?>