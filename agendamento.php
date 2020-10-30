
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- PEGA O ARQUIVO CSS DO BOOTSTRAP E O MEU-->
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/styles.css">  
      <script src="./js/jquery.min.js"></script>
      <script src="./js/popper.min.js"></script> 
      <script src="./js/bootstrap.min.js"></script>
    <title>iPlay Quadras</title>
  </head>
  <body>
    <!--<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">  ERRO É O FIXED-TOP-->
      <!--teste sem o fixed tava lg-->
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">IPlay</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
              <span class="navbar-toggler-icon"></span>
            </button>
      <div class="collapse navbar-collapse" id="navbarSite">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
              <a class="nav-link" href="/index.html">Home</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#services">Serviços</a>
          </li>
          <li class="nav-item">
              <a class="nav-link active" href="#">Agendamento</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#contact">Contato</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="estabelecimentos/view/cadastra.php">Possui um centro esportivo?</a>
          </li>
          <li class="nav-item" data-toggle="modal" data-target="#modalLogin" data-whatever="@getbootstrap">
              <a class="nav-link" href="#">Login</a>
          </li>
<!--<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modalLogin" data-whatever="@getbootstrap">Login</button>-->
          <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                  <div class="modal-body">
                  <!--  <form name="login" action="../tcc/usuarios/controller/usuario.php" method="post"> -->
                  <!--  <form name="login" action="../usuarios/controller/usuario.php" method="post">--> 
                      <form name="login" action="../usuarios/controller/usuario.php" method="post"> 
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
                        <div class="col-auto"> <button type="submit" name="acao" value="Logar" class="btn btn-secondary">Entrar</button> </div>
                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                        </div>
                    </form>
                  </div>
              </div>
            </div>
          </div>
        </ul>
      </div>
     </nav>
    </div>
  </body>
</html>