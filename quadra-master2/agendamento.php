
<?php
session_start();

include_once "includes/conexao.php";
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
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>iPlay Quadras</title>
  </head>
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
              <a class="nav-link " href="index.php">Home</a>
          </li>
          <li class="nav-item">
              <a class="nav-link active" href="agendamento.php">Agendamento</a>
          </li>

          
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
          <li class="nav-item" data-bs-toggle="modal" data-bs-target="#modalLogin" data-bs-whatever="@getbootstrap">
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
<!--<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalLogin" data-whatever="@getbootstrap">Login</button>-->
          <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                  <div class="modal-body">
                  <!--  <form name="login" action="../tcc/usuarios/controller/usuario.php" method="post"> -->
                  <!--  <form name="login" action="../usuarios/controller/usuario.php" method="post">--> 
                      <!-- <form name="login" action="../usuarios/controller/usuario.php" method="post">  -->
                        <div class="form-group">
                          <label for="usuario" class="col-form-label">Nome de usuário ou e-mail:</label>
                          <input type="text" name="login" class="form-control" id="user" required>
                        </div>
                        <div class="form-group">
                          <label for="senha" class="col-form-label">Senha:</label>
                          <input type="password" name="senha" class="form-control" id="senha" required>
                        </div>
                        <div class="row" class="modal-footer">
                        <div class="col-auto mr-auto">  <p><a href="../usuarios/view/cadastra.php">Não possui uma conta? Cadastre-se</a> </div>  
                        <div class="col-auto"> <button type="button" name="acao" value="Logar" onclick="verificaLogin()"class="btn btn-secondary">Entrar</button> </div>
                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                        </div>
                    <!-- </form> -->
                  </div>
              </div>
            </div>
          </div>
        </ul>
      </div>
     </nav>
    </div>

<!-- container -->
<div class="container mt-5 " >   


<div class="row ">
<?php 
 $consultaQuadras = $con->prepare("SELECT quadra.id_quadra,quadra.tipo_quadra, quadra.horario_inicial, quadra.horario_final, quadra.image, est.endereco, est.nome
                                    FROM quadra, estabelecimentos as est
                                    WHERE quadra.id_estabelecimento = est.id_estabelecimento
                                    ");
 $consultaQuadras->execute();
  $seExisteQuadra = $consultaQuadras->rowCount();

  if($seExisteQuadra > 0){
      foreach($consultaQuadras as $infoQuadras):
          $idQuadra = $infoQuadras['id_quadra'];
          $nomeEstabelecimento = $infoQuadras['nome'];
          $tipoQuadra = $infoQuadras['tipo_quadra'];
          $horario_inicial = $infoQuadras['horario_inicial'];
          $horario_final = $infoQuadras['horario_final'];
          $image = $infoQuadras['image'];
          $endereco = $infoQuadras['endereco'];
      
?>


<div class="col aligncenter mt-4">

  <div class="d-flex">

      <div class="card " style=" cursor:pointer; width:18rem;" data-bs-toggle="modal" data-bs-target="#modalAgendamento" onclick="conteudoModalAgendamento('<?=$idQuadra?>')">
        <div style="">
        <img src="assets/quadra/<?=$image?>"  class="card-img-top"  style="    width: 100%;
    height:10em;
    object-fit: cover;" >
        </div>


  
      <div class="card-body">
          <p class="card-text"><span style="font-weight:bold">Horario Inicial: </span> <?=$horario_inicial?></p>
          <p class="card-text"><span style="font-weight:bold">Horario Final: </span><?=$horario_final?></p>
          <p class="card-text"><span style="font-weight:bold">Ginásio: </span><?=$nomeEstabelecimento?></p>
          <p class="card-text" style="height:80px;"><span style="font-weight:bold;">Endereco: </span><?=$endereco?></p>
          <p class="card-text" style="font-size:14px;"><span style="font-weight:bold">Tipo: </span><?=$tipoQuadra?></p>
      </div>
    </div>
  </div>


</div>

<?php
endforeach;
  }else{
?>

<div class="aligncenter">
 <h5>Não temos quadras disponíveis no momento.</h5>
</div>

<?php } ?>

</div>

</div>
<!-- container -->





<footer class="footer mt-auto py-3 ">
  <div class="container text-center text-black">
  <small>Copyright &copy; Estefan Hense 2020</small>
  </div>
</footer>

 
  </body>
</html>
<!-- Modal -->
<div class="modal fade" id="modalAgendamento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Horário de agendamento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="bodyModal">
       
      </div>

  </div>
</div>
