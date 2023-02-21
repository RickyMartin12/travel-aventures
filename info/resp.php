<?php


	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	require_once $_SERVER['DOCUMENT_ROOT']. '/vendor/autoload.php';


	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$message = $_POST['mensagem'];


	$error_message = '';
    $r = array();
    $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
    if ($nome == '') {
        $error_message .= '<p> - Nome *</p>';
    }
    if ($email == '') {
        $error_message .= '<p> - Email *</p>';
    }
    if ($email != '') {
        if (!preg_match($regex, $email)) {
            $error_message .= " <p> - " . $email . " is not valid </p>";
        }
    }
    if ($message == '') {
        $error_message .= '<p> - Mensagem *</p>';
    }
    if ($error_message == '')
    {
        $mail = new PHPMailer(true);

		$mail->isSMTP();  // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify mailgun SMTP servers
		$mail->SMTPAuth = true; // Enable SMTP authentication
		$mail->Username = 'ricardomanuelpeleira@gmail.com';
        // Senha para SMTP authentication
        $mail->Password = 'qcwrdlcthjenrtln';
		$mail->SMTPSecure = 'tls';   // Enable encryption, 'ssl'
				$mail->Port= '587';

		$mail->From = 'ricardopeleira16@gmail.com'; // The FROM field, the address sending the email 
		$mail->FromName = 'Pedido de Informacoes'; // The NAME field which will be displayed on arrival by the email client
		$mail->addAddress($email);     // Recipient's email address and optionally a name to identify him
		$mail->isHTML(true);

		$mail->Subject = "Pedido de Informacoes";	

        // Corpo da Mensagem
        $corpo_informacoes = "<div style='width:95%; margin-left:2.5%;'>
            <h4> Pedido de informações submetido, em breve receberá a informação pretendida.</h4>
            <hr><b>Name: </b> $nome<br /><br />
            <b>Email: </b> $email<br /><br/>
            <b>Message: </b> $message<br />
            <hr>
            <br>Obrigado $nome, Travel Adventures.
            </div>";


        $mail->Body = $corpo_informacoes;

        // Corpo alternativo caso email não suporte html
        $mail->AltBody = 'Mensangem simples';

        // Envia a mensagem e verifica os erros
        if (!$mail->send() ) {
            $r = array('error' => '', 'info' =>'erro ao enviar o envio de informações "Envio de Informações" ', 'success' => '0');
        } else {
            $r = array('info' =>'sucesso ao inserir ', 'success' => '1', 'error' => '');
        }
    }
    else
    {
        $r = array('error' => $error_message, 'success' =>'', 'info' => '');
    }


    echo json_encode($r);







          
?>