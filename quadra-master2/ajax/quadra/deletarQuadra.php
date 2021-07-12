<?php

include_once '../../includes/conexao.php';

$idQuadra = $_POST['quadra'];

$deletaQuadra = $con->prepare("DELETE FROM quadra WHERE id_quadra = '$idQuadra' ");
$deletaQuadra->execute();


?>