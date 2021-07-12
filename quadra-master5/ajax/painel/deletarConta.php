<?php

// nome, email, telefone, dnasc, cpf, endereco, login, senha

session_start();

include_once '../../includes/conexao.php';

$usuarioID = $_SESSION['usuarioID'];
$tipoUser = $_SESSION['tipouser'];

$cancela = 0;

if($tipoUser == 'usuario'){

    $desativa = $con->prepare("UPDATE usuarios SET 
                                status='0' 
                        WHERE
                                id_usuario = '$usuarioID'                                
                                ");
    $desativa->execute();
    
    $cancela = 1;
    session_destroy();

}


if($tipoUser == 'ginasio'){

    $desativa = $con->prepare("UPDATE estabelecimentos SET 
                                status='0' 
                        WHERE
                                id_estabelecimento = '$usuarioID'                                
                                ");
    $desativa->execute();
    $cancela = 1;

     session_destroy();
}

echo $cancela;
?>