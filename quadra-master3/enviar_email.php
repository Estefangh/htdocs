<?php

if(isset($_POST['email']) && !empty($_POST['email'])){

$nome = addslashes($_POST['name']);
$email = addslashes($_POST['email']);
$phone = addslashes($_POST['phone']);
$mensagem = addslashes($_POST['message']);

$to = "estefan.hense@gmail.com";
$subject = "Contato - iPlay Quadras";
$body = "Nome: ".$nome. "\r\n".
        "Email: ".$email. "\r\n".
        "Telefone: ".$phone. "\r\n".
        "Mensagem: ".$mensagem;
$header = "From: tefagh@hotmail.com"."\r\n".
          "Reply-To:".$email."\e\n".
          "X=Mailer:PHP/".phpversion();

if(mail($to, $subject, $body, $header)){
    // echo("Email enviado com sucesso!");
    echo"<script>alert('Email enviado com sucesso!');</script>";
}else{
    // echo("O Email não pode ser enviado");
    echo"<script>alert('O Email não pode ser enviado');</script>";
    }
}
?>