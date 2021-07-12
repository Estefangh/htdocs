<?php

session_start();

include_once '../../includes/conexao.php';

$usuarioID = $_SESSION['usuarioID'];

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpf'];
$endereco = $_POST['endereco'];
$senha = $_POST['senha'];

$update = $con->prepare("UPDATE estabelecimentos SET 
                                nome = '$nome',
                                email = '$email', 
                                telefone ='$telefone', 
                                cpfcnpj = '$cpf', 
                                endereco = '$endereco', 
                                senha = '$senha' 
                        WHERE
                                id_estabelecimento = '$usuarioID'
                                
                                ");
$update->execute();



?>