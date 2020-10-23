<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/styles.css">  
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="/index.html">IPlay</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
              <span class="navbar-toggler-icon"></span>
            </button>
      <div class="collapse navbar-collapse" id="navbarSite">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
              <a class="nav-link" href="/index.html">Home</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="/index.html#services">Serviços</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="/index.html">Agendamento</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="/index.html#contact">Contato</a>
          </li>
          <li class="nav-item">
              <a class="nav-link active" href="estabelecimentos/view/cadastra.php">Possui um centro esportivo?</a>
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
    <div class="container">
        <div class="row">
            <div class="col-12 text-center my-5">
                <h1 class="display-4">Cadastre-se seu estabelecimento</h1>
            </div>
        </div>
        <div class="row justify-content-center  mb-5">
            <div class="col-sm-12 col-md-10 col-lg-8">
                <form class="pb-5" name="cadastro" action="../controller/estabelecimento.php" method="post" enctype="multipart/form-data">
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
                        <div class="form-group col-sm-6">
                            <label>Digite seu CPF ou CNPJ</label>
                            <input type="text" class="form-control" placeholder="Ex: 123.456.789-00" name="cpfcnpj" required>
                        </div>
                        <div class="form-group col-sm-6">
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

