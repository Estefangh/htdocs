<?php

session_start();

include_once '../../includes/conexao.php';

$usuarioID = $_SESSION['usuarioID'];

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpf'];
$endereco = $_POST['endereco'];

if($_POST['senha'] == ''){
        $sqlSenha = '';
}else{
        $senha = md5($_POST['senha']);
        $sqlSenha = "senha = '$senha' ,";
}

$update = $con->prepare("UPDATE estabelecimentos SET 
                                nome = '$nome',
                                email = '$email', 
                                telefone ='$telefone', 
                                cpfcnpj = '$cpf', 
                                $sqlSenha
                                endereco = '$endereco'
                        WHERE
                                id_estabelecimento = '$usuarioID'
                                
                                ");
$update->execute();



?>