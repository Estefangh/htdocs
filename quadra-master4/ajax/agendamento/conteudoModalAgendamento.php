
<?php
session_start();

include_once '../../includes/conexao.php';
?>
<select class="form-select" id="sltAgendamento" aria-label="Default select example">
<?php 

date_default_timezone_set('America/Sao_Paulo');
$idQuadra = $_POST['quadra'];
$datadia = date("Y-m-d");

$dia = date('d');
$ano = date('Y');
$mes = date('m');

$consultarHorario = $con->prepare("SELECT horario_inicial, horario_final FROM quadra WHERE id_quadra = '$idQuadra'");
$consultarHorario->execute();
 foreach($consultarHorario as $infoHorario){
  $horarioInicial = $infoHorario['horario_inicial'];
  $horarioFinal = $infoHorario['horario_final'];
 }


 $separahorarioInicial = explode(":", $horarioInicial);
 $separahorarioInicial = $separahorarioInicial[0];

 $separahorarioFinal = explode(":", $horarioFinal);
 $separahorarioFinal = $separahorarioFinal[0];


 /*primeiro dia */
 for ($i=$separahorarioInicial; $i <= $separahorarioFinal; $i++) { 
  $horario = $i;
  $dataCompara = $ano.'-'.$mes.'-'.$dia;
  // confere se marcou
  $confereSeMarcou = $con->prepare("SELECT id_agendamento FROM agendamentos WHERE horario_ini = '$horario:00' AND id_quadra = '$idQuadra' AND data = '$dataCompara'");
  $confereSeMarcou->execute();
   $seMarcou = $confereSeMarcou->rowCount();
    if($seMarcou < 1):     
      echo "<option 'value='".$dia.";".$mes.";".$horario."'> ".$horario.":00 ".$dia."/".$mes." </option>";

    endif;



}


 /*segundo dia */
 $segundoDia =  date('Y-m-d', strtotime($datadia. ' + 1 days'));

$separaSegundoDia = explode("-", $segundoDia);
$dia = $separaSegundoDia[2];
$mes = $separaSegundoDia[1];


 for ($i=$separahorarioInicial; $i <= $separahorarioFinal; $i++) { 
  $horario = $i;
  $dataCompara = $ano.'-'.$mes.'-'.$dia;
  // confere se marcou
  $confereSeMarcou = $con->prepare("SELECT id_agendamento FROM agendamentos WHERE horario_ini = '$horario:00' AND id_quadra = '$idQuadra' AND data = '$dataCompara'");
  $confereSeMarcou->execute();
   $seMarcou = $confereSeMarcou->rowCount();
    if($seMarcou < 1):     
      echo "<option 'value='".$dia.";".$mes.";".$horario."'> ".$horario.":00 ".$dia."/".$mes." </option>";

    endif;
}


 /*teceiro dia */
 $terceiroDia =  date('Y-m-d', strtotime($segundoDia. ' + 1 days'));

$separaTerceiroDia = explode("-", $terceiroDia);
$dia = $separaTerceiroDia[2];
$mes = $separaTerceiroDia[1];
 
 for ($i=$separahorarioInicial; $i <= $separahorarioFinal; $i++) { 
  $horario = $i;
  $dataCompara = $ano.'-'.$mes.'-'.$dia;
  // confere se marcou
  $confereSeMarcou = $con->prepare("SELECT id_agendamento FROM agendamentos WHERE horario_ini = '$horario:00' AND id_quadra = '$idQuadra' AND data = '$dataCompara'");
  $confereSeMarcou->execute();
   $seMarcou = $confereSeMarcou->rowCount();
    if($seMarcou < 1):     
      echo "<option 'value='".$dia.";".$mes.";".$horario."'> ".$horario.":00 ".$dia."/".$mes." </option>";

    endif;
}

/*Quarto dia */
 $quartoDia =  date('Y-m-d', strtotime($terceiroDia. ' + 1 days'));

$separaQuartoDia = explode("-", $quartoDia);
$dia = $separaQuartoDia[2];
$mes = $separaQuartoDia[1];
 
 for ($i=$separahorarioInicial; $i <= $separahorarioFinal; $i++) { 
  $horario = $i;
  $dataCompara = $ano.'-'.$mes.'-'.$dia;
  // confere se marcou
  $confereSeMarcou = $con->prepare("SELECT id_agendamento FROM agendamentos WHERE horario_ini = '$horario:00' AND id_quadra = '$idQuadra' AND data = '$dataCompara'");
  $confereSeMarcou->execute();
   $seMarcou = $confereSeMarcou->rowCount();
    if($seMarcou < 1):     
      echo "<option 'value='".$dia.";".$mes.";".$horario."'> ".$horario.":00 ".$dia."/".$mes." </option>";

    endif;
}

/*Quinto dia */
$quintoDia =  date('Y-m-d', strtotime($quartoDia. ' + 1 days'));

$separaQuintoDia = explode("-", $quintoDia);
$dia = $separaQuintoDia[2];
$mes = $separaQuintoDia[1];
 
 for ($i=$separahorarioInicial; $i <= $separahorarioFinal; $i++) { 
  $horario = $i;
  $dataCompara = $ano.'-'.$mes.'-'.$dia;
  // confere se marcou
  $confereSeMarcou = $con->prepare("SELECT id_agendamento FROM agendamentos WHERE horario_ini = '$horario:00' AND id_quadra = '$idQuadra' AND data = '$dataCompara'");
  $confereSeMarcou->execute();
   $seMarcou = $confereSeMarcou->rowCount();
    if($seMarcou < 1):     
      echo "<option 'value='".$dia.";".$mes.";".$horario."'> ".$horario.":00 ".$dia."/".$mes." </option>";

    endif;
}

/*Sexto dia */
$sextoDia =  date('Y-m-d', strtotime($quintoDia. ' + 1 days'));

$separaSextoDia = explode("-", $sextoDia);
$dia = $separaSextoDia[2];
$mes = $separaSextoDia[1];
 
 for ($i=$separahorarioInicial; $i <= $separahorarioFinal; $i++) { 
  $horario = $i;
  $dataCompara = $ano.'-'.$mes.'-'.$dia;
  // confere se marcou
  $confereSeMarcou = $con->prepare("SELECT id_agendamento FROM agendamentos WHERE horario_ini = '$horario:00' AND id_quadra = '$idQuadra' AND data = '$dataCompara'");
  $confereSeMarcou->execute();
   $seMarcou = $confereSeMarcou->rowCount();
    if($seMarcou < 1):     
      echo "<option 'value='".$dia.";".$mes.";".$horario."'> ".$horario.":00 ".$dia."/".$mes." </option>";

    endif;
}

/*Setimo dia */
$setimoDia =  date('Y-m-d', strtotime($sextoDia. ' + 1 days'));

$separaSetimoDia = explode("-", $setimoDia);
$dia = $separaSetimoDia[2];
$mes = $separaSetimoDia[1];
 
 for ($i=$separahorarioInicial; $i <= $separahorarioFinal; $i++) { 
  $horario = $i;
  $dataCompara = $ano.'-'.$mes.'-'.$dia;
  // confere se marcou
  $confereSeMarcou = $con->prepare("SELECT id_agendamento FROM agendamentos WHERE horario_ini = '$horario:00' AND id_quadra = '$idQuadra' AND data = '$dataCompara'");
  $confereSeMarcou->execute();
   $seMarcou = $confereSeMarcou->rowCount();
    if($seMarcou < 1):     
      echo "<option 'value='".$dia.";".$mes.";".$horario."'> ".$horario.":00 ".$dia."/".$mes." </option>";

    endif;
}



?>
</select>

      <div class="modal-footer">
      <?php if(!isset($_SESSION['usuarioID'])):?>
          <div id="acessaBtn " class="form-text " style="color:red; text-align:start; ">Efetue login para agendar seu horário!</div>
        <?php endif;?>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

        <?php if(isset($_SESSION['usuarioID'])):?>
          <button type="button" class="btn btn-primary" onclick="confirmaAgendamento('<?=$idQuadra?>')">Agendar</button>
        <?php endif;?>
      </div>
