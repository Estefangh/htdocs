<?php
session_start();

include_once '../../includes/conexao.php';

$usuarioID = $_SESSION['usuarioID'];
$idQuadra = $_POST['quadra'];

$consultaQuadra = $con->prepare("SELECT horario_inicial, horario_final,image,tipo_quadra FROM quadra WHERE id_quadra = '$idQuadra' ");
$consultaQuadra->execute();
  
 foreach($consultaQuadra as $infoQuadra){
     $horarioIni = $infoQuadra['horario_inicial'];
     $horarioFin = $infoQuadra['horario_final'];
     $image = $infoQuadra['image'];
     $tipoQuadra = $infoQuadra['tipo_quadra'];
 }
?>

<div class="container-fluid">
<a class="btn btn-primary " href="quadra.php">Voltar</a>
</div>


<div class="row mt-5" >
  <div class="col">
  <label for="inputEmail4" class="form-label">Horario Inicial:</label>
    <input type="time" class="form-control" id="horarioInicial" value="<?=$horarioIni?>">
  </div>
  <div class="col">
  <label for="inputEmail4" class="form-label">Horario Final</label>
    <input type="time" class="form-control" id="horarioFinal" value="<?=$horarioFin?>">
  </div>
</div>

<div class="row ">

  <div class="col">
  <div class="mb-3">
  <label for="formFile" class="form-label">Imagem:</label>
  <input class="form-control" type="file"  id="formFile">
</div>

  </div>

  <div class="col">
  <label class="form-label">Tipo Quadra:</label>
<select class="form-select mb-3" id='tipoQuadra'aria-label=".form-select-lg example">
  <option value="<?=$tipoQuadra?>"><?=$tipoQuadra?></option>
  <option value="Society">Society</option>
  <option value="Vôlei">Vôlei</option>
  <option value="Basquete">Basquete</option>
  <option value="Multi esportes">Multi esportes</option>
</select>
  </div>


</div>




<div class="container aligncenter mt-5 mb-5">
    <button class="btn btn-sm btn-success" style="cursor:pointer;" onclick="updateQuadra('<?=$idQuadra?>')">Editar</button>
</div>
