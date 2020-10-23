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
	<!--<form name="index" action="../CRUD_OO_PDO/controller/estabelecimento.php" method="post"> -->
	<form>
		Bem vindo 
		<?php echo $_SESSION['nome']; ?>
		
		<p><a href="../controller/estabelecimento.php?acao=alterar">Alterar os dados do estabelecimento </a>
		<!--<p><a href="../CRUD_OO_PDO/view/estabelecimento.html">Cadastrar novo estabelecimento</a>-->
		<p><a href="../controller/estabelecimento.php?acao=logout">Sair </a>
		<p><a href="../controller/estabelecimento.php?acao=Listar">Listar todos os estabelecimentos </a>
		<p><a href="../controller/estabelecimento.php?acao=Deletar">Apagar conta deste estabelecimento</a> 
		
	</form>


</body>
</html>


