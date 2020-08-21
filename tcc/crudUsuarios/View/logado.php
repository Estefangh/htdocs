<?php 
session_start();
if (!isset ($_SESSION['nome'])){
	header ('Location:../view/login.html');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
<!--form action="/action_page.php" method="get" -->
	<!--<form name="index" action="../CRUD_OO_PDO/controller/usuario.php" method="post"> -->

		Bem vindo 
		<?php echo $_SESSION['nome']; ?>
		<p><a href="../controller/usuario.php?acao=alterar">Alterar meus dados</a>
		<p><a href="../controller/usuario.php?acao=logout">Sair </a>
		<p><a href="../controller/usuario.php?acao=Deletar">Deletar a minha conta</a> 
<!--O TRECHO DE BAIXO ESTÁ FUNCIONANDO E LISTA TODOS OS USUÁRIOS-->
	<!--	<p><a href="../controller/usuario.php?acao=Listar">Listar todos os usuários </a>  -->
<!--O TRECHO DE ACIMA ESTÁ FUNCIONANDO E LISTA TODOS OS USUÁRIOS-->
	</form>
</body>
</html>


