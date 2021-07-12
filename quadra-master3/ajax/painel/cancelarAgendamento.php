<?php

// nome, email, telefone, dnasc, cpf, endereco, login, senha

session_start();

include_once '../../includes/conexao.php';

$agendamento = $_POST['agendamento'];

    $cancela = $con->prepare("DELETE FROM  agendamentos WHERE id_agendamento = '$agendamento'                        
                                ");
    $cancela->execute();
    

?>