
<?php
session_start();
if(!isset($_SESSION['usuarioID'])){
    header("Location: index.php"); 
}

date_default_timezone_set('America/Sao_Paulo');

// session_destroy();
include_once "includes/conexao.php";
// var_dump ($_SESSION);
?>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- PEGA O ARQUIVO CSS DO BOOTSTRAP E O MEU-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">  
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script> 
      <!-- <script src="js/bootstrap.min.js"></script> -->
      <script src="js/funcs.js"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
      <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
      <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
      

      <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>iPlay Quadras</title>
  </head>
  <script>
$(document).ready(function() {
    $('#tableAgendamento').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Portuguese-Brasil.json"
        }
    } );
} );
  </script>
  <body class="d-flex flex-column h-100">
    <!--<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">  ERRO É O FIXED-TOP-->
      <!--teste sem o fixed tava lg-->
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">IPlay</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSite">
              <span class="navbar-toggler-icon"></span>
            </button>
      <div class="collapse navbar-collapse"style="margin-right:5em;" id="navbarSite">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
              <a class="nav-link active" href="index.php">Home</a>
          </li>



          <?php
          if(isset($_SESSION['tipouser'])):
             if($_SESSION['tipouser'] == 'usuario'){
          ?>
                    <li class="nav-item">
              <a class="nav-link" href="agendamento.php">Agendamento</a>
          </li>

          <?php }else{?>
          <li class="nav-item">
              <a class="nav-link" href="agendamento.php">Agendamento</a>
          </li>
          <?php }else:?>

          <?php endif; ?>



          <?php
          if(isset($_SESSION['tipouser'])):
             if($_SESSION['tipouser'] == 'usuario'){
          ?>
          <?php }else{?>
          <li class="nav-item">
              <a class="nav-link" href="estabelecimentos/view/cadastra.php">Possui um centro esportivo?</a>
          </li>
          <?php }else:?>
            <li class="nav-item">
              <a class="nav-link" href="estabelecimentos/view/cadastra.php">Possui um centro esportivo?</a>
          </li>
          <?php endif; ?>

          
          <?php
          if(!isset($_SESSION['usuarioID'])):
          ?>
          <li class="nav-item" data-bs-toggle="modal" data-bs-target="#modalLogin" data-whatever="@getbootstrap">
              <a class="nav-link" href="#">Login</a>
          </li>
          <?php
          else:

            $usuarioId = $_SESSION['usuarioID'];
            $tipoUser = $_SESSION['tipouser'];

            if($tipoUser == 'ginasio'){
              $verificaUsuario = $con->prepare("SELECT nome FROM estabelecimentos where id_estabelecimento = '$usuarioId' ");
              $verificaUsuario->execute();
                foreach($verificaUsuario as $infoUser):
                    $nomeUsuario = $infoUser['nome'];
                endforeach;
              }else{
              $verificaUsuario = $con->prepare("SELECT nome FROM usuarios where id_usuario = '$usuarioId' ");
              $verificaUsuario->execute();
                foreach($verificaUsuario as $infoUser):
                    $nomeUsuario = $infoUser['nome'];
                endforeach;

              }



          ?>
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:#FFA500">
          <?=$nomeUsuario?>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="painel.php">Meus Dados</a></li>
            <li><a class="dropdown-item" href="meusAgendamentos.php">Agendamentos</a></li>
            <?php if($tipoUser == 'ginasio') {?>
              <li><a class="dropdown-item" href="quadra.php">Quadras</a></li>
            <?php }?>
            <li><a class="dropdown-item" style="cursor:pointer;"onclick="logout()">Logout</a></li>
          </ul>
          <?php
          endif;
          ?>

        </ul>
      </div>
     </nav>
    </div>

<!-- container -->
<div class="container mt-5" >   




<div class="container-fluid mt-5" id="conteudoQuadra">

<h3>Meus Agendamentos</h3>
<?php
            // $usuarioId = $_SESSION['usuarioID'];
            // $tipoUser = $_SESSION['tipouser'];
            

if($tipoUser == 'ginasio'):



   $consultaQuadras = $con->prepare("SELECT  ag.horario_ini , ag.data, est.endereco, user.nome,est.nome as nomeEsta, ag.id_quadra, qd.tipo_quadra
                                    FROM 
                                            agendamentos as ag,
                                            usuarios as user,
                                            estabelecimentos as est,
                                            quadra as qd
                                    WHERE 
                                            ag.id_estabelecimento = '$usuarioId' AND
                                            est.id_estabelecimento = ag.id_estabelecimento AND
                                            user.id_usuario = ag.id_usuario AND
                                            qd.id_quadra = ag.id_quadra
                                            ");
   $consultaQuadras->execute();
    $existeQuadra = $consultaQuadras->rowCount();

if($existeQuadra > 0):
  ?>

<div class="table-responsive mt-5 ">
<table class="table" id="tableAgendamento">
  <thead>
    <tr>
      <th scope="col">Nome:</th>
      <th scope="col">Horário</th>
      <th scope="col">Data</th>
      <th scope="col">Endereço</th>
      <th scope="col">Tipo</th>
      <th scope="col">Quadra</th>
    </tr>
  </thead>
  <tbody>
<?php 
  
  foreach($consultaQuadras as $infoQuadra):
     $idAgendamento = $infoQuadra['id'];
     $nomeEsta = $infoQuadra['nomeEsta'];
     $nomeUsuario = $infoQuadra['nome'];
     $horarioIni = $infoQuadra['horario_ini'];
     $dataAgen = $infoQuadra['data'];
      $explodeData = explode('-',$dataAgen);
      $dataFinal = $explodeData[2].'/'.$explodeData[1].'/'.$explodeData[0];
     $enderecoAgen = $infoQuadra['endereco'];
     $tipoQuadra = $infoQuadra['tipo_quadra'];
?>

    <tr>

      <td><?=$nomeUsuario?></td>
      <td><?=$horarioIni?> </td>
      <td><?=$dataFinal?></td>
      <td><?=$enderecoAgen?></td>
      <td><?=$tipoQuadra?></td>
      <td><?=$nomeEsta?></td>
    </tr>

    <?php endforeach; ?>

  </tbody>
</table>
</div>

</div>
<?php else:?>

<div class="aligncenter">
<h5>Não foi agendado nenhum horário.</h5>
</div>
<?php endif;endif;?>

<!-- Usuario -->


<?php
            // $usuarioId = $_SESSION['usuarioID'];
            // $tipoUser = $_SESSION['tipouser'];
            

if($tipoUser == 'usuario'):



   $consultaQuadras = $con->prepare("SELECT ag.id_agendamento, ag.horario_ini , ag.data, est.endereco,est.nome as nomeEsta, user.nome, ag.id_quadra, qd.tipo_quadra
                                    FROM 
                                            agendamentos as ag,
                                            usuarios as user,
                                            estabelecimentos as est,
                                            quadra as qd
                                    WHERE 
                                            ag.id_usuario = '$usuarioId' AND
                                            est.id_estabelecimento = ag.id_estabelecimento AND
                                            user.id_usuario = ag.id_usuario AND
                                            qd.id_quadra = ag.id_quadra
                                            ");
   $consultaQuadras->execute();
    $existeQuadra = $consultaQuadras->rowCount();

if($existeQuadra > 0):
  ?>

<div class="table-responsive mt-5 ">
<table class="table" id="tableAgendamento">
  <thead>
    <tr>
    <th scope="col">Ações</th>
      <th scope="col">Nome:</th>
      <th scope="col">Horário</th>
      <th scope="col">Data</th>
      <th scope="col">Endereço</th>
      <th scope="col">Tipo</th>
    </tr>
  </thead>
  <tbody>
<?php 
  
  foreach($consultaQuadras as $infoQuadra):
     $idAgendamento = $infoQuadra['id_agendamento'];
     $idQuadra = $infoQuadra['id_quadra'];
     $nomeUsuario = $infoQuadra['nomeEsta'];
     $horarioIni = $infoQuadra['horario_ini'];
     $dataAgen = $infoQuadra['data'];
      $explodeData = explode('-',$dataAgen);
      $dataFinal = $explodeData[2].'/'.$explodeData[1].'/'.$explodeData[0];
     $enderecoAgen = $infoQuadra['endereco'];
     $tipoQuadra = $infoQuadra['tipo_quadra'];
?>
    <tr>
    <?php 
      $dataHoraAula = $dataAgen.' '.$horarioIni;
      $horaAtual = date('Y-m-d H:s:i');    
        $dt_lim = date('Y-m-d H:i:s', strtotime('+48 hours', strtotime($horaAtual))); 

if ($dt_lim <= $dataHoraAula): // IF hora aula for maior que data limite
    ?>
      <td><span style="cursor:pointer;" onclick="cancelarAgendamento('<?=$idAgendamento?>')"class="badge bg-danger ml-2">Cancelar</span></td>
      <?php else:?>
      <td></td>
      <?php endif;?>
      <td><?=$nomeUsuario?></td>
      <td><?=$horarioIni?> </td>
      <td><?=$dataFinal?></td>
      <td><?=$enderecoAgen?></td>
      <td><?=$tipoQuadra?></td>
    </tr>

    <?php endforeach; ?>

  </tbody>
</table>
</div>

</div>
<?php else:?>

<div class="aligncenter">
<h5>Não foi agendado nenhum horário.</h5>
</div>
<?php endif;endif;?>



</div>
<!-- container -->

<footer class="footer mt-auto py-3 ">
  <div class="container text-center text-black">
  <small>Copyright &copy; Estefan Hense 2020</small>
  </div>
</footer>

 
  </body>
</html>