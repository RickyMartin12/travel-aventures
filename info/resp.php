<?php


	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	require_once $_SERVER['DOCUMENT_ROOT']. '/vendor/autoload.php';


	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$mensagem = $_POST['mensagem'];


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
        $mail = configMailUser();
        
        // Definir o remetente
        $mail->setFrom('martinscarlos799@gmail.com', 'Curso');

        // Definir o endereço para respostas
        $mail->addReplyTo('martinscarlos799@gmail.com', 'Curso');

        // Definir destinatario
        $mail->addAddress($email, 'Envio de Informações');
        $mail->addAddress('ricardopeleira16@gmail.com', 'Envio de Informações');

        // Definir o Assunto
        $mail->Subject = 'Envio de Informações';

        // Definir formato de mensagem HTML
        $mail->isHTML(true);

        // Corpo da Mensagem
        $corpo_informacoes = "<div style='width:95%; margin-left:2.5%;'>
            <h4> Pedido de informações submetido, em breve receberá a informação pretendida.</h4>
            <hr><b>Name: </b> $nome<br /><br />
            <b>Email: </b> $email<br /><br/>
            <b>Message: </b> $message<br />
            <hr>
            <br>Obrigado $nome, Pronto a Comer.
            </div>";


        $mail->Body = $corpo_informacoes;

        // Corpo alternativo caso email não suporte html
        $mail->AltBody = 'Mensangem simples';

        $mail->send();



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