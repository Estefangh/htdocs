<?php

// nome, email, telefone, dnasc, cpf, endereco, login, senha

session_start();

include_once '../../includes/conexao.php';

$usuarioID = $_SESSION['usuarioID'];

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$dnasc = $_POST['dnasc'];
$cpf = $_POST['cpf'];
$endereco = $_POST['endereco'];

if($_POST['senha'] == ''){
        $sqlSenha = '';
}else{
        $senha = md5($_POST['senha']);
        $sqlSenha = "senha = '$senha' ,";
}



$update = $con->prepare("UPDATE usuarios SET 
                                nome = '$nome',
                                email = '$email', 
                                telefone ='$telefone', 
                                dnasc = '$dnasc', 
                                cpf = '$cpf', 
                                $sqlSenha
                                endereco = '$endereco'
                        WHERE
                                id_usuario = '$usuarioID'
                                
                                ");
$update->execute();

?>