<?php

require_once 'vendor/autoload.php';

$nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$telefone = filter_var($_POST['telefone'], FILTER_SANITIZE_STRING);
$cnpj = filter_var($_POST['cnpj'], FILTER_SANITIZE_STRING);
$razaosocial = filter_var($_POST['razaosocial'], FILTER_SANITIZE_STRING);
$nomefantasia = filter_var($_POST['nomefantasia'], FILTER_SANITIZE_STRING);

$body = 'Elfo 2018 <br/> Confirmação de cadastro.<br/><br/>
  Nome: '.$nome.' <br/>
  E-mail: '.$email.' <br/>
  Telefone: '.$telefone.' <br/>
  CNPJ: '.$cnpj.' <br/>
  Razão Social: '.$razaosocial.' <br/>
  Nome Fantasia: '.$nomefantasia.' <br/><br/>';

$transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
  ->setUsername('contato.auth@gmail.com')
  ->setPassword('lthuolgtondujpnp');

$swift = \Swift_Mailer::newInstance($transport);

$content = $body;

$message = \Swift_Message::newInstance("Confirmação de cadastro - Elfo 2018")
    ->setFrom (array("contato.auth@gmail.com" => "Elfo 2018"))
    ->setTo (array("eventos@devir.com.br"))
    ->SetBody ($content, 'text/html')
    ->addPart(strip_tags($content), 'text/plain');

if ($falha) {
  echo "erro";
} else {
  if ($swift->send($message)) {
    echo "sucesso";
  }
}

// if ($swift->send($message)) {
//   echo "Tudo certo!";
// } else {
//   echo "Há algo errado, por favor, tente novamente mais tarde.";
// }

?>