<?php         session_start(); ?>
<html lang="pt-br">
<html lang="pt-br">
<head>
	<meta charset="utf-8">
  <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/styles.css">  
      <script src="../../js/jquery.min.js"></script>
      <script src="../../js/popper.min.js"></script> 
      <script src="../../js/funcs.js"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
   
</head>
<body>
<?php 
        if(isset($_SESSION['msg'])) {
            // session_start();
            // var_dump($_SESSION);
            // echo $_SESSION['msg'];
            // unset($_SESSION['msg']); 
        }


        // var_dump($_SESSION);
    ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="../../index.php">IPlay</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSite">
              <span class="navbar-toggler-icon"></span>
            </button>
      <div class="collapse navbar-collapse" id="navbarSite">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
              <a class="nav-link" href="../../index.php">Home</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="../../agendamento.php">Agendamento</a>
          </li>

    
          <?php
          if(isset($_SESSION['tipouser'])):
             if($_SESSION['tipouser'] == 'usuario'){
          ?>
          <?php }else{?>
          <li class="nav-item">
              <a class="nav-link" href="../../estabelecimentos/view/cadastra.php">Possui um centro esportivo?</a>
          </li>
          <?php }else:?>
            <li class="nav-item">
              <a class="nav-link" href="../../estabelecimentos/view/cadastra.php">Possui um centro esportivo?</a>
          </li>
          <?php endif; ?>



          <li class="nav-item">
              <a class="nav-link active" href="#">Cadastro</a>
          </li>
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
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-center my-5">
                <h1 class="display-4">Cadastre-se preenchendo o formulário abaixo</h1>
            </div>
        </div>
        <div class="row justify-content-center  mb-5">
            <div class="col-sm-12 col-md-10 col-lg-8">
                <form class="pb-5" name="cadastro" action="../controller/usuario.php" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label>Digite seu nome completo</label>
                            <input type="text" class="form-control" placeholder="Ex: Fulano da Silva" name="nome" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Digite seu E-mail</label>
                            <input type="email" class="form-control" placeholder=" Ex: email@gmail.com" name="email" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label>Digite seu endereço completo</label>
                            <input type="text" class="form-control" placeholder="Ex: Rua Marechal Deodoro, centro, Pelotas-RS" name="endereco" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <label>Digite seu CPF</label>
                            <input type="text" class="form-control" placeholder="Ex: 123.456.789-00" name="cpf" required>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Digite sua data de nascimento</label>
                            <input type="date" class="form-control" placeholder=" Ex: email@gmail.com" name="dnasc" required>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Digite seu telefone</label>
                            <input type="tel" class="form-control" placeholder=" Ex: (53)981321477" name="telefone" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label>Defina um nome de usuário</label>
                            <input type="text" class="form-control" placeholder="Ex: Fulanosilva" name="login" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Defina uma senha</label>
                            <input type="password" class="form-control" placeholder=" Ex: ********" name="senha" required>
                        </div>
                    </div>
                    <div class="form-row">
                       <div class="col-sm-12">
                            <input type="submit" name="acao" value="Cadastrar" class="btn btn-secondary">
                       </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="footer-copyright py-5 text-center text-black">
      <div class="container">
        <small>Copyright &copy; Estefan Hense 2020</small>
      </div>
    </div>
</body>
</html>

