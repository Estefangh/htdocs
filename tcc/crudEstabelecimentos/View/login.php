<?php
session_start();
if(isset($_SESSION['msg'])){
echo $_SESSION['msg'];	
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
	<form name="login" action="../Controller/estabelecimento.php" method="post"> 
		<label for ="estabelecimento"> Estabelecimento: </label><br>
		<input type="text" name="login" id="user" required><br>
		<label for ="senha"> Senha: </label><br>
		<input type="text" name="senha" id="senha" required><br>

		<input type="submit" name="acao" value="Logar">
 
 
</form>


</body>
</html>
