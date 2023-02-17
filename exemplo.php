<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require_once __DIR__ . '/vendor/autoload.php';


$html = '
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style>
.title-black-white {
    background: RGB(12,12,12);
    color: #FFF!important;
}
.right {
    float: right;
    width: 68px;
    position: absolute;
    padding: 10px;
  }
  .botm
  {
    margin-bottom: 40px;
  }
  .center {
    display: block;
    margin-left: 280px;
    margin-right: 280px;
    right: 100px;
  }
  .line-bord {
    border: 1px solid RGB(12,12,12);
}
.mylabel {
    color: #333;
    background: #87CEEB !important;
}
.align_div {
    margin-bottom: 15px;
}
.w3-padding-8 {
    padding-top: 8px!important;
    padding-bottom: 8px!important;
}
.w3-card-2, .w3-example {
    box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)!important;
}
.bolder
{
    font-weight:bold;
}
</style>

<img src="logo/logo_ico.png" class="center">
<div class="botm"></div>
<h3 style="text-align: center;" class="bolder"> Aqui & Agora - Conteudo da Reserva 1</h3>
<div class="botm"></div>
<div class="line-bord">
<img src="logo/logo_ico.png" class="right">
<div class="modal-header title-black-white">
    <h4 class="modal-title bolder" style="color: #fff;"><img src="icons/agenda.svg" class="img-responsive"> Reserva Numero 1</h4> 
</div>
<div class="form-horizontal" id="form">
<div class="panel-body" style="padding: 16px; margin-top: -10px;">
<h5 class="col-xs-12 mylabel w3-padding-8 w3-card-2 align_div bolder"> 
<img src="icons/user.png" class="img-responsive">&nbsp;&nbsp;Detalhes Pessoais
</h5>
<div class="container">
<div class="row">

<div class="col-xs-12 col-md-6">
<div class="form-group">
<font class="bolder">Nome da Pessoa:</font> Ricardo Peleira
</div>
</div>

<div class="col-xs-12 col-md-6">
<div class="form-group">
<font class="bolder" >Email:</font> r.peleira@hotmail.com
</div>
</div>

<h5 class="col-xs-12 mylabel w3-padding-8 w3-card-2 align_div bolder"> 
<img src="icons/open-book.png" class="img-responsive">&nbsp;&nbsp;Marcação da Reserva
</h5>

<div class="container">
<div class="row">

<div class="col-xs-12 col-md-6">
<div class="form-group">
<font class="bolder">Data de Reserva:</font> 17/04/2019
</div>
</div>

</div>
</div>


<h5 class="col-xs-12 mylabel w3-padding-8 w3-card-2 align_div bolder"> 
<img src="icons/travel.png" class="img-responsive">&nbsp;&nbsp;Detalhes da Actividade da Localidade Adequada
</h5>

<div class="container">
<div class="row">

<div class="col-xs-12 col-md-6">
<div class="form-group">
<font class="bolder">Localidade:</font> Albufeira
</div>
</div>


<div class="col-xs-12 col-md-6">
<div class="form-group">
<font class="bolder">Actividade:</font> Arborismo
</div>
</div>

<div class="col-xs-12 col-md-6">
<div class="form-group">
<font class="bolder">Numero de Pessoas:</font> 2
</div>
</div>

</div>
</div>



<h5 class="col-xs-12 mylabel w3-padding-8 w3-card-2 align_div bolder"> 
<img src="icons/com.png" class="img-responsive">&nbsp;&nbsp;Comentarios Finais
</h5>

<div class="container">
<div class="row">

<div class="col-xs-12 col-md-6">
<div class="form-group">
<font class="bolder">Comentarios Finais:</font> Nenhum
</div>
</div>


</div>
</div>


</div>
</div>






</div>
</div>

</div>

<br>
Cumprimentos
<br>
Elisa Dias - Dep. Juridico Aqui & Agora

';


$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);

$filename = "Reserva - aaa .pdf";

$attachment = $mpdf->Output($filename, 'S');

        


// Criando uma nova instâcia
$mail = new PHPMailer(true);


$mail->CharSet = 'UTF-8';

// Informando para usar SMTP
$mail->isSMTP();

/*
  Habilitando debug SMTP
  0 = off (uso em produção)
  1 = Mensagens ao Cliente
  2 = Mensagens ao Cliente e Servidor
*/

$mail->SMTPDebug = 0;

/*
  Definir o nome do servidor de e-mail
  use $mail ->HOST = gethostbyname('email.gmail.com');
  se sua rede não suportar SMTP over Ipv6
*/

$mail->Host = 'smtp.mailgun.org';

/*
  Defina o numero da porta SMTP - 587 para autenticação TLS,
  a.k.a. RFC4409 SMTP submission
*/

$mail->Port = 587;

// Define o sistema de criptografia a usar- ssl (depreciado) ou tals
$mail->SMTPSecure = 'tls';

// Se vai usar SMTP authentication
$mail->SMTPAuth = true;

// Usuário para usar SMTP authentication
// Use o endereço completodo e-mail do Gmail
$mail->Username = 'postmaster@sandbox8beda8045ac64df49c67924c9dde95e7.mailgun.org';

// Senha para SMTP authentication
$mail->Password = '53812d403f906cf10a84c744043606a4-38029a9d-ce985080';

// Definir o remetente
$mail->setFrom('postmaster@sandboxe2313ce239e048f4a30fabd8f01bc24b.mailgun.org', 'Curso');

// Definir o endereço para respostas
$mail->addReplyTo('postmaster@sandboxe2313ce239e048f4a30fabd8f01bc24b.mailgun.org', 'Curso');

// Definir destinatario
$mail->addAddress('r.peleira@hotmail.com', 'Destinatário');

// Definir o Assunto
$mail->Subject = 'Teste PHPMailer';

// Definir formato de mensagem HTML
$mail->isHTML(true);

// Corpo da Mensagem
$mail->Body = 'Uma mensagem <strong> Negrito </strong>';

// Corpo alternativo caso email não suporte html
$mail->AltBody = 'Mensangem simples';

$mail->addStringAttachment($attachment, $filename, 'base64', 'application/pdf');




// Envia a mensagem e verifica os erros
if (!$mail->send()) {
  echo "Erro no Mailer: " . $mail->ErrorInfo; 
} else {
  echo 'mensagem enviada! <br>';
}		
		
?>