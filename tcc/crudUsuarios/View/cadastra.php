<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
<!--form action="/action_page.php" method="get" -->
<form name="cadastro" action="../controller/usuario.php" method="post" enctype="multipart/form-data"  > 

<?php 
session_start();
if(isset($_SESSION['msg'])){
echo $_SESSION['msg'];
unset($_SESSION['msg']);}
?>

<br><br>Cadastro de usuário<br><br>
	<p>Nome completo: <input type="text" name="nome" required><br>
    <p>E-mail: <input type="e-mail" name="email" required><br>
    <p>Telefone: <input type="mumber" name="telefone" required><br>
    <p>Data nascimento: <input type="date" name="dnasc" required><br>
    <p>CPF: <input type="text" name="cpf" required><br>
    <p>Endereço completo <input type="text" name="endereco"><br>
    <p>Login: <input type="text" name="login" required><br>
    <p>Senha:<input type="text" name="senha" required><br>
    <p>Foto de Perfil:<input type="file" name="arquivo">

    <p><input type="submit" name="acao" value="Cadastrar">
 
</form>
</body>
</html>

