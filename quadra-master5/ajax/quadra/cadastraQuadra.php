<?php


session_start();

include_once '../../includes/conexao.php';

$usuarioID = $_SESSION['usuarioID'];
$tipoUser = $_SESSION['tipouser'];


if(isset($_FILES['file']['name'])):
        move_uploaded_file($_FILES['file']['tmp_name'], '../../assets/quadra/' . $usuarioID.'_'.$tipoUser.'_'.$_FILES['file']['name']);

      $imagem = $usuarioID.'_'.$tipoUser.'_'.$_FILES['file']['name'];

else:

    $imagem = '';
endif;

$horaIni = $_POST['horaIni'];
$horaFin = $_POST['horaFin'];
$tipoQuadra = $_POST['tipoQuadra'];


$cadastraQuadra = $con->prepare("INSERT INTO quadra
                                             (tipo_quadra,horario_inicial, horario_final, image, id_estabelecimento)
                                 VALUES
                                           ('$tipoQuadra','$horaIni', '$horaFin','$imagem', '$usuarioID')                                
                                ");
$cadastraQuadra->execute();
 $seCadastrou = $cadastraQuadra->rowCount();

 if($seCadastrou > 0):
    echo '1';

 else:
echo'0';
 endif;








?>