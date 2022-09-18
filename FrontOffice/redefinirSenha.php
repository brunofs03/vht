<?php 
    require_once "config.php";

    $sql = "SELECT  * FROM  usuarios where email = '" .$_POST['email'] ."'";
    
    $result = mysqli_query($link, $sql);

    $row = mysqli_fetch_array($result);
     
	$idInserido = isset($row['id']) ? $row['id'] : '';

	$enviadoPergunta = 'Não enviado';

	if($idInserido != ''){

		$bytes = random_bytes(20);
		$tokenVar = bin2hex($bytes);

		$sql = "INSERT INTO log_senha (id_usuario, token ,status) VALUES (?, ? ,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){

            mysqli_stmt_bind_param($stmt, "sss", $param_idUser, $param_token, $param_status);
            
            $param_idUser = $row['id'];
            $param_token = $tokenVar;
            $param_status = 0;
            
            mysqli_stmt_execute($stmt);

            // Close statement
            mysqli_stmt_close($stmt);
        }

        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

		$message = '
			<html>
				   <body >
				      <table style="border: 2px solid #bfbfbf;margin-left: auto;margin-right: auto;width: 600px;height: auto; font-size: 15px;color:#595959; background-color: white;" align="center" cellspacing="0" cellpadding="0">
				         <tbody>
				            <tr align="left">
				               <td>
				                  <table >
				                     <tr>
				                        <td>
				                           <br>
				                        </td>
				                     </tr>
				                     <tr align="right">
				                        <td>
				                           <img width="130" height="80"  alt="logo" style="margin-left:20px; width: 130px;" src="https://i.imgur.com/VinOXaM.png">
				                        </td>
				                     </tr>
				                     <tr>
				                        <td>
				                           <br>
				                           <br>
				                        </td>
				                     </tr>
				                  </table>
				               </td>
				            </tr>
				            <tr>
				               <td>
				                  <table style="margin-left: auto;margin-right: auto;width: 600px;height: auto; padding-left: 30px;padding-right: 30px;padding-bottom: 30px; font-size: 15px;color:#595959;" align="left" cellspacing="0" cellpadding="0">
				                     <tr>
				                        <td>
				                           <div style="text-align:justify; text-align:justify;font-size: 15px; font-family:Calibri;">
				                              <span style="font-size: 15px;font-family:Calibri"><b>Prezado(a) ' .$row['nome'] .',</b><b></b></span><br>
				                           </div>
				                           <div style="text-align:justify; text-align:justify; text-align:justify;font-size: 15px; font-family:Calibri;">
				                              <p style="font-size: 15px;font-family:Calibri">
				                                 Informamos que foi solicitada a Redefinição de sua senha no portal VHT
				                              </p>
				                              <br>
				                              <p style="font-size: 15px;font-family:Calibri">
				                                 Se não foi você que fez a solicitação, por favor desconsidere.
				                              </p>
				                           </div>
				                        </td>
				                     </tr>
				                     <br>
				                     <tr>
				                        <td>
				                           <div style="text-align:justify">
				                              <table id="tblDados" style="border-collapse: collapse !important;font-family: Calibri;font-size: 15px;width: 100%;color:#595959">
				                                 <tr class="columSolicitacao">
				                                    <td style="font-size: 15px;" colspan="2">
				                                       Link para redefinir senha: <br><a href="' .$actual_link .'/VHT/FrontOffice/AlterarSenhaEmail.php?token=' .$tokenVar .'" target=”_blank”>/VHT/FrontOffice/AlterarSenhaEmail.php</a>
				                                    </td>
				                                 </tr>
				                                 <tr class="columSolicitacao">
				                                    <td style="font-size: 15px;" colspan="2">&nbsp;</td>
				                                    <br>
				                                 </tr>
				                                 <tr class="columSolicitacao">
				                                    <td style="font-size: 15px;" colspan="2">&nbsp;</td>
				                                    <br>
				                                 </tr>
				                                 <tr class="columSolicitacao">
				                                    <td style="font-size: 15px;" colspan="2">
				                                       A senha precisa conter os requisitos abaixo:
				                                    </td>
				                                    <br>
				                                 </tr>
				                                 <tr class="columSolicitacao">
				                                    <td style="font-size: 15px;" colspan="2">
				                                       <b>- Mínimo 8 caracteres;</b>
				                                    </td>
				                                 </tr>
				                                 <tr class="columSolicitacao">
				                                    <td style="font-size: 15px;" colspan="2">
				                                       <b>- Letra maíuscula;</b>
				                                    </td>
				                                 </tr>
				                                 <tr class="columSolicitacao">
				                                    <td style="font-size: 15px;" colspan="2">
				                                       <b>- Letra minúscula;</b>
				                                    </td>
				                                 </tr>
				                                 <tr class="columSolicitacao">
				                                    <td style="font-size: 15px;" colspan="2">
				                                       <b>- Um número;</b>
				                                    </td>
				                                 </tr>
				                                 <tr class="columSolicitacao">
				                                    <td style="font-size: 15px;" colspan="2">
				                                       <b>- Um caracter especial.</b>
				                                    </td>
				                                 </tr>
				                                 <tr class="columSolicitacao">
				                                    <td style="font-size: 15px;" colspan="2">&nbsp;</td>
				                                    <br>
				                                 </tr>
				                                 <tr class="columSolicitacao">
				                                    <td style="font-size: 15px;" colspan="2"><i>Por favor não responda a este e-mail, foi enviado automaticamente.</i></td>
				                                    <br>
				                                 </tr>
				                              </table>
				                           </div>
				                           <br>
				                        </td>
				                     </tr>
				                  </table>
				               </td>
				            </tr>
				         </tbody>
				      </table>
				   </body>
				</html>
		';


	    $to      = $_POST['email'];
	    $subject = 'Redefinição de senha - VHT Security panel - '.date("d/m/Y"). " " .date("h:i:s") ;
	    $headers = 'From: Hotel VHT <no-reply.VhtHotel@outlook.com.br>'       . "\r\n" .
	                 'Reply-To: no-reply.VhtHotel@outlook.com.br' . "\r\n" .
	                 'X-Mailer: PHP/' . phpversion() . "\r\n".
	                 "Content-type: text/html; charset=iso-8859-1" . "\r\n".
	                 'MIME-Version: 1.0' . "\r\n";

	    var_dump(mail($to, $subject, $message, $headers));
		$enviadoPergunta = 'Enviado';
	}

	var_dump($enviadoPergunta);

?>