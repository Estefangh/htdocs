<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/styles.css">  
</head>
<body>

    <?php 
        session_start();
        if(isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']); 
        }
    ?>

    <div class="container">
        <div class="row">
            <div class="col-12 text-center my-5">
                <h1 class="display-4">Cadastre-se preenchendo o formulário abaixo</h1>
            </div>
        </div>
        <div class="row justify-content-center  mb-5">
            <div class="col-sm-12 col-md-10 col-lg-8">
                <form name="cadastro" action="../controller/usuario.php" method="post" enctype="multipart/form-data">
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
                            <label>Digite seu nome de usuário</label>
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
</body>
</html>

