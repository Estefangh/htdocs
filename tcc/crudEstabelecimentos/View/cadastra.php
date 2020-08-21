<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
<!--form action="/action_page.php" method="get" -->
<form name="cadastro" action="../controller/estabelecimento.php" method="post"> 

<?php 
session_start();
if(isset($_SESSION['msg'])){
echo $_SESSION['msg'];
unset($_SESSION['msg']);}
?>

<br><br>Informe aqui os dados do seu estabelecimento que nós analisaremos os dados e possivelmente criaremos o seu cadastro!<br><br>
	<p>Nome completo: <input type="text" name="nome" required><br>
    <p>E-mail: <input type="e-mail" name="email" required><br>
    <p>Telefone: <input type="mumber" name="telefone" required><br>
    <p>Endereço completo <input type="text" name="endereco"><br>
    <p>CPF ou CNPJ: <input type="text" name="cpfcnpj" required><br>
    <p>Login: <input type="text" name="login" required><br>
    <p>Senha:<input type="text" name="senha" required><br>

    <p><input type="submit" name="acao" value="Cadastrar">
 
</form>
</body>
</html>

