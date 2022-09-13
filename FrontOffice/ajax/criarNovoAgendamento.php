



<?php

session_start();

require_once "../config.php";



$sql = "update pagamentos set status = 3 where status = 0 and preco_total = '" .$_POST['precoTotalCalculado'] ."'";
$stmt = mysqli_prepare($link, $sql);
mysqli_stmt_execute($stmt);


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
        $param_payment = 'Mercado Pago';
        $param_preco_diaria = str_replace(' ', '', str_replace(',', '.', str_replace('.', '', $_POST['precoTotal'])));
        $param_preco_total = str_replace(' ', '', str_replace(',', '.', str_replace('.', '', $_POST['precoTotalCalculado'])));


        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
    
?>


<?php 

    $sql = "SELECT * FROM  pagamentos where id_agendamento = " .$idInserido ." ORDER BY id DESC LIMIT 1;";
    
    $result = mysqli_query($link, $sql);

    $row = mysqli_fetch_array($result);

    $idInseridoPag = $row['id'];
     
  ?>

<?php


require_once "../config.php";


$sqlQuarto = "SELECT * FROM  quartos where id = " .$_POST['codQuarto'];

$resultQuarto = mysqli_query($link, $sqlQuarto);

$rowQuarto = mysqli_fetch_array($resultQuarto);


// SDK do Mercado Pago
require __DIR__ .  '/vendor/autoload.php';
// Adicione as credenciais
MercadoPago\SDK::setAccessToken('TEST-6146994744457230-090809-445af8b418773efefcc54dd7c5d347e7-269206052');
?>
<?php

// Cria um objeto de preferência
$preference = new MercadoPago\Preference();



  // Cria um item na preferência
  $item = new MercadoPago\Item();
$item->title = 'Estadia quarto ' .$rowQuarto['num_quarto'];
$item->quantity = 1;
$item->unit_price = $param_preco_total;

$preference->back_urls = array(
    "success" => "http://" .$_SERVER['HTTP_HOST'] ."/VHT/FrontOffice/PagamentoSucesso.php"
);

  $payer = new MercadoPago\Payer();

    $payer->name = $_POST['txtNome'] . " " . $_POST['txtSobrenome'];
    $payer->email = $_POST['txtEmail'];

    $payer->identification = array(
        "type" => "CPF",
        "number" => $_POST['txtCpf']
    );

    $payer->address = array(
        "zip_code" => $_POST['txtCep'],
        "address" => $_POST['txtEndereco']
    );

$preference->external_reference = $idInseridoPag;

$preference->auto_return = "approved";

$preference->items = array($item);
$preference->save();


$data = [ 'init_point' => $preference->init_point ];
header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);


$sql = "update pagamentos set linkApi = '" .$preference->init_point ."' where id = '" .$idInseridoPag ."'";
$stmt = mysqli_prepare($link, $sql);
mysqli_stmt_execute($stmt);

    mysqli_close($link);

?>