<?php

session_start();

include_once '../../includes/conexao.php';
$ano = date('Y');
$usuarioID = $_SESSION['usuarioID'];
$tipoUser = $_SESSION['tipouser'];

 $contAgendamento = $_POST['horario'];
 $idQuadra = $_POST['quadra'];

$separaData = explode(' ',$contAgendamento);

 $dataAgendamento = $separaData[1];
  $separaDataAgendamento = explode('/',$dataAgendamento);
   $dia = $separaDataAgendamento[0];
   $mes = $separaDataAgendamento[1];

   $dataFinal = $ano.'-'.$mes.'-'.$dia;


 $horarioIniAgendamento = $separaData[0]; // horario inicial

 $d = new DateTime($horarioIniAgendamento);
$d->modify( '+1 hour' );
 $horarioFinAgendamento =  $d->format( 'H:i' ); // horario final


$verificaAulaMarcada = $con->prepare("SELECT id_agendamento 
                                      FROM
                                             agendamentos
                                      WHERE 
                                             horario_ini = '$horarioIniAgendamento' AND
                                             id_quadra = '$idQuadra'
                                    ");
$verificaAulaMarcada->execute();
 $seExisteAula = $verificaAulaMarcada->rowCount();

  if($seExisteAula > 0):
      echo '0';
  else:

    // idestabelecimento
    $consultaidEstab = $con->prepare("SELECT id_estabelecimento 
                                      FROM
                                             quadra
                                      WHERE 
                                             id_quadra = '$idQuadra'
                                    ");
$consultaidEstab->execute();

 foreach($consultaidEstab as $infoEstab){
     $idEstabelecimento = $infoEstab['id_estabelecimento'];
 }


      $insereAulaMarcada = $con->prepare("INSERT INTO agendamentos (id_quadra, id_estabelecimento, horario_ini, horario_fin,data, id_usuario, tipo_usuario)
                                          VALUES 
                                          ('$idQuadra', '$idEstabelecimento','$horarioIniAgendamento','$horarioFinAgendamento', '$dataFinal', '$usuarioID', '$tipoUser')
                                            ");
      $insereAulaMarcada->execute();
      $seInseriu = $insereAulaMarcada->rowCount();
       if($seInseriu > 0){
           echo '1';

       }else{
           echo '2';
       }
  endif;
  
  

?>