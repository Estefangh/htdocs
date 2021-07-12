<?php
session_start();

include_once '../../includes/conexao.php';

$usuarioID = $_SESSION['usuarioID'];
$tipoUser = $_SESSION['tipouser'];

 
if($tipoUser == 'ginasio'):
    $verificaUsuario = $con->prepare("SELECT * FROM estabelecimentos where id_estabelecimento = '$usuarioID' ");
    $verificaUsuario->execute();
      foreach($verificaUsuario as $infoUser):
          $idGinasio= $infoUser['id_estabelecimento'];
          $nomeGinasio = $infoUser['nome'];
          $emailGinasio = $infoUser['email'];
          $telefoneGinasio = $infoUser['telefone'];
          $enderecoGinasio = $infoUser['endereco'];
          $cpfcnpjGinasio = $infoUser['cpfcnpj'];
          $loginGinasio = $infoUser['login'];
          $senhaGinasio = $infoUser['senha'];
          $statusGinasio = $infoUser['status'];
        //   $Usuario = $infoUser['imagem'];
      endforeach
      ?>
<div class="row mt-5">
  <div class="col">
  <label for="inputEmail4" class="form-label">Nome:</label>
    <input type="text" class="form-control" id="nomeGinasio" value="<?=$nomeGinasio?>">
  </div>
  <div class="col">
  <label for="inputEmail4" class="form-label">Email: </label>
    <input type="text" class="form-control" id="emailGinasio"value="<?=$emailGinasio?>">
  </div>
</div>


<div class="row">
  <div class="col">
  <label for="inputEmail4" class="form-label">Telefone:</label>
    <input type="text" class="form-control" id="telefoneGinasio"value="<?=$telefoneGinasio?>">
  </div>

  <div class="col">
  <label for="inputEmail4" class="form-label">CPF: </label>
    <input type="text" class="form-control" id="cpfGinasio"value="<?=$cpfcnpjGinasio?>">
  </div>


</div>


<div class="row">

<div class="col">
  <label for="inputEmail4" class="form-label">Endereco: </label>
    <input type="text" class="form-control"id="enderecoGinasio"value="<?=$enderecoGinasio?>">
  </div>

</div>


<div class="row">
  <div class="col">
  <label for="inputEmail4" class="form-label">Login: </label>
    <input type="text" class="form-control" readonly id="loginGinasio"value="<?=$loginGinasio?>">
  </div>
  <div class="col">
  <label for="inputEmail4" class="form-label">Senha:</label>
    <input type="text" class="form-control" id="senhaGinasio"value="<?=$senhaGinasio?>">
  </div>
</div>



<div class="container aligncenter mt-5 mb-5">
    <button class="btn btn-sm btn-success" onclick="editarCadastro('<?=$tipoUser?>')">Salvar</button>
</div>




<?php endif; 

if($tipoUser == 'usuario'):
    $verificaUsuario = $con->prepare("SELECT * FROM usuarios where id_usuario = '$usuarioID' ");
    $verificaUsuario->execute();
      foreach($verificaUsuario as $infoUser):
        $idUsuario = $infoUser['id_usuario'];
        $nomeUsuario = $infoUser['nome'];
        $emailUsuario = $infoUser['email'];
        $telefoneUsuario = $infoUser['telefone'];
        $dnascUsuario = $infoUser['dnasc'];
        $cpfUsuario = $infoUser['cpf'];
        $enderecoUsuario = $infoUser['endereco'];
        $loginUsuario = $infoUser['login'];
        $senhaUsuario = $infoUser['senha'];
        $statusUsuario = $infoUser['status'];
      //   $Usuario = $infoUser['imagem'];
      endforeach;

   
?>

<div class="row mt-5">
  <div class="col">
  <label for="inputEmail4" class="form-label">Nome:</label>
    <input type="text" class="form-control" id="nomeUser" value="<?=$nomeUsuario?>">
  </div>
  <div class="col">
  <label for="inputEmail4" class="form-label">Email: </label>
    <input type="text" class="form-control" id="email"value="<?=$emailUsuario?>">
  </div>
</div>


<div class="row">
  <div class="col">
  <label for="inputEmail4" class="form-label">Telefone:</label>
    <input type="text" class="form-control" id="telefone"value="<?=$telefoneUsuario?>">
  </div>
  <div class="col">
  <label for="inputEmail4" class="form-label">Data Nascimento</label>
    <input type="date" class="form-control" id="dnasc"value="<?=$dnascUsuario?>">
  </div>
</div>


<div class="row">
  <div class="col">
  <label for="inputEmail4" class="form-label">CPF: </label>
    <input type="text" class="form-control" id="cpf"value="<?=$cpfUsuario?>">
  </div>
  <div class="col">
  <label for="inputEmail4" class="form-label">Endereco: </label>
    <input type="text" class="form-control"id="endereco"value="<?=$enderecoUsuario?>">
  </div>
</div>


<div class="row">
  <div class="col">
  <label for="inputEmail4" class="form-label">Login: </label>
    <input type="text" class="form-control" readonly id="login"value="<?=$loginUsuario?>">
  </div>
  <div class="col">
  <label for="inputEmail4" class="form-label">Senha:</label>
    <input type="text" class="form-control" id="senhaUser" value="<?=$senhaUsuario?>">
  </div>
</div>



<div class="container aligncenter mt-5 mb-5">
    <button class="btn btn-sm btn-success" onclick="editarCadastro('<?=$tipoUser?>')">Salvar</button>
</div>

<?php endif; ?>
