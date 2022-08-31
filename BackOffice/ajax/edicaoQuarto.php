



<?php

session_start();

require_once "../config.php";


$sql = "SELECT * FROM  quartos where id_quarto = " .$_GET['id_quarto'];

$result = mysqli_query($link, $sql);

$row = mysqli_fetch_array($result);

$idInserido = isset($row['id_quarto']) ? $row['id_quarto'] : '';

if($idInserido != ''){

	$uploadOk = 1;

	if($_FILES["ImportImgQuarto"]["name"] != ''){
		$target_dir = "../imagensQuarto/";
		$target_file = $target_dir . basename($_FILES["ImportImgQuarto"]["name"]);
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		  $check = getimagesize($_FILES["ImportImgQuarto"]["tmp_name"]);
		  if($check !== false) {
		    $uploadOk = 1;
		  } else {
		    $mensagemRetorno =  "Arquivo não é uma imagem.\n";
		    $uploadOk = 0;
		  }
		}

		// Check if file already exists
		// if (file_exists($target_file)) {
		//   echo "Esse arquivo já existe!";
		//   $uploadOk = 0;
		// }

		// Check file size
		if ($_FILES["ImportImgQuarto"]["size"] > 500000) {
		  $mensagemRetorno = "O arquivo é muito grade.\n";
		  $uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		  $mensagemRetorno = "Aceitamos somente JPG, JPEG e PNG.\n";
		  $uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		  $mensagemRetorno = "\nArquivo não realizado o upload.";
		    $caminhoImagem = "";
		// if everything is ok, try to upload file
		} else {
		  $target_file = $target_dir . md5(date('Y-m-d H:i:s:u')).".".$imageFileType;
			  if (move_uploaded_file($_FILES["ImportImgQuarto"]["tmp_name"], $target_file)) {
			    $caminhoImagem = "/VHT/BackOffice/imagensQuarto/" . md5(date('Y-m-d H:i:s:u')).".".$imageFileType;

			    $sql = "update quartos set link = ? where id_quarto = " .$row['id_quarto'];
		        $stmt = mysqli_prepare($link, $sql);
		        
		        mysqli_stmt_bind_param($stmt, "s", $param_link);

		        $param_link = $caminhoImagem;
		        mysqli_stmt_execute($stmt);


		        unlink('C:/xampp/htdocs' .$row['link']);


		  } else {
		    $mensagemRetorno = "\nMe desculpe, teve um erro ao realizar o upload.";
		    $caminhoImagem = "";
		  }
		}
	}

	if ($uploadOk == 1) {

				$sql = "update quartos set preco_diaria = ?, num_quarto = ?, disponibilidade = ?, estrelas = ?, descricao = ? where id_quarto = " .$row['id_quarto'];
		        $stmt = mysqli_prepare($link, $sql);
		        
		        mysqli_stmt_bind_param($stmt, "sssss", $param_preco, $param_num, $param_disponibilidade, $param_estrelas, $param_descricao);


		        $param_preco = $_POST['txtPreco'];
		        $param_preco = str_replace("R$ ", "", $param_preco);
		        $param_preco = str_replace(".", "", $param_preco);
		        $param_preco = str_replace(",", ".", $param_preco);
		        $param_num = $_POST['txtNum'];
		        $param_disponibilidade = 'Disponível';
		        $param_estrelas = $_POST['slcEstrelas'];
		        $param_descricao = $_POST['txtDescricao'];

		        mysqli_stmt_execute($stmt);

		    $mensagemRetorno = "Quarto " . $_POST['txtNum'] . " atualizado com sucesso!";
		 
	}else{
		$mensagemRetorno = "Ocorreu um erro ao realizar o cadastro\n\n".$mensagemRetorno;
	}
}else{
 	$mensagemRetorno = "Não existe o quarto que está sendo alterado";
		$uploadOk = 0;
 }

$data = [ 'mensagem' => $mensagemRetorno, 'sucesso' => $uploadOk ];
header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);

?>