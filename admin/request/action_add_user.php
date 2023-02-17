<?php
require_once '../connect.php';



switch ($_POST['action']){

/*GRAVAR NOVO REGISTO*/
  case '1':

  	/*GRAVAR NOVO UTILIZADOR*/

    $err='';

    // Topico 1 - Serviços

    // Data de Serviços
    
    $password = '';
    
    $passord_conf = '';

    if (!$_POST['nome_utilizador'])
      $err .= "- Nome do Utilizador <span class='w3-text-red'> *</span><br>";
    else{
     $nome_utilizador = $_POST['nome_utilizador'];
    }

    // Password

    if ($_POST['password_utilizador']){
      $password = $_POST['password_utilizador'];
    }
    else
    {
      $err .= "- Password do Utilizador <span class='w3-text-red'> *</span><br>";
    }
    
    // Confirmar Password
    
    if ($_POST['password_utilizador_conf']){
      $password_conf = $_POST['password_utilizador_conf'];
    }
    else
    {
      $err .= "- Password do Utilizador Confirmada <span class='w3-text-red'> *</span><br>";
    }
    
    if ($_POST['password_utilizador_conf'] && $_POST['password_utilizador'])
    {
        if ($password == $password_conf)
        {
            $pass = $password;
        }
        else
        {
            $err .= "- As passwords devem ser iguais <span class='w3-text-red'> *</span><br>";
        }
    }

    // Tipo do Utilizador 

    if ($_POST['tipo_utilizador']){
      $tipo_utilizador= $_POST['tipo_utilizador'];
    }
    else
    {
      $err .= "- Tipo de Utilizador <span class='w3-text-red'> *</span><br>";
    }


    // Email
     $email = $_POST['email'];
     
     
     // Privilegios
     
     if ($_POST['privilegios']){
      $privilegios = $_POST['privilegios'];
    }
    else
    {
      $err .= "- Tipo de privilegios o utilizador <span class='w3-text-red'> *</span><br>";
    }
    


    
    
     

      
      

      
    
    

      

if (!$err) 
{

  $v = "";

  $obter_comp=" SELECT nome FROM admins ORDER BY nome ASC";
  $result = mysqli_query($conn, $obter_comp);
  while($obj = mysqli_fetch_object($result)) 
  {
    $v[] = $obj;

}

$array = json_decode(json_encode($v), True);


$key = array_search($nome_utilizador, array_column($array, 'nome'));
if (is_numeric($key))
{
  echo 100;
  exit;
}
else
{
  $sql =" INSERT INTO admins (nome, pass, tipo, email, privilegios) VALUES ('$nome_utilizador', MD5('".$pass."'), '$tipo_utilizador', '$email', '$privilegios')";

$result = mysqli_query($conn,$sql);
  if ($result) {
    $response = 1; 
    $last_id = mysqli_insert_id($conn);
  }  
  else {
    $response = 0;
    $last_id = 0; 
  }

  $r=array('error'=>'','success' => $response,'id' => $last_id, 'nome' => $nome_utilizador);
  echo json_encode($r);
 
 

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
$headers .= 'From:' .$email. "\r\n";
$email_subject = "Envio de Informacoes de adicao do utilizador ".$nome_utilizador;

$email_body_client = '<div style="width:95%; margin-left:2.5%;">
<h4> Envio de Informacoes do utilizador '.$nome_utilizador.'</h4>
<hr><b>Username: </b> '.$nome_utilizador.' <br /><br />
<b>Password: </b> '.$pass.' <br /><br/>
<hr>
<br>Obrigado '.$nome_utilizador.', Toyota Cars Rental Lda.
</div>';
mail($email,$email_subject,$email_body_client,$headers);
}

  
}
else{
  $r = array('error' =>$err, 'success' =>'','id' =>'', 'nome' => '');
  echo json_encode($r);
}





break;

}

mysqli_close($conn);


?>
