<?php

// nome, email, telefone, dnasc, cpf, endereco, login, senha

session_start();

include_once '../../includes/conexao.php';

$usuarioID = $_SESSION['usuarioID'];
$tipoUser = $_SESSION['tipouser'];

$horaIni = $_POST['horaIni'];
$horaFin = $_POST['horaFin'];
$tipoQuadra = $_POST['tipoQuadra'];
$idQuadra = $_POST['idQuadra'];



if(isset($_FILES['file']['name'])):

$nomeImageQuadra = $con->prepare("SELECT image FROM quadra WHERE id_quadra = '$idQuadra' ");
$nomeImageQuadra->execute();
 foreach($nomeImageQuadra as $infoImage){
     $nomeImage = $infoImage['image'];
 }
 unlink('../../assets/quadra/'.$nomeImage);


        move_uploaded_file($_FILES['file']['tmp_name'], '../../assets/quadra/'.$usuarioID.'_'.$tipoUser.'_'.$_FILES['file']['name']);

      $imagem = $usuarioID.'_'.$tipoUser.'_'.$_FILES['file']['name'];

      $updateQuadra = $con->prepare("UPDATE quadra
                                SET 
                                tipo_quadra = '$tipoQuadra', horario_inicial = '$horaIni', horario_final = '$horaFin', image = '$imagem'   
                                WHERE
                                id_quadra = '$idQuadra'                      
                                ");
$updateQuadra->execute();

else:
    $updateQuadra = $con->prepare("UPDATE quadra
    SET 
    tipo_quadra = '$tipoQuadra', horario_inicial = '$horaIni', horario_final = '$horaFin'  
    WHERE
    id_quadra = '$idQuadra'                      
    ");
$updateQuadra->execute();
endif;







?>