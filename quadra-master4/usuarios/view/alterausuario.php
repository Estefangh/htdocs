<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>  

	
<form name="alterar" action="..\controller\usuario.php" method="post"> 

Altere suas informações de usuário de usuário<br><br>
 <p>Nome completo: <input type="text" name="nome" value="<?php echo $nome?>" required><br>
 <p>E-mail: <input type="e-mail" name="email" value="<?php echo $email?>"required><br>
 <p>Telefone: <input type="mumber" name="telefone" value="<?php echo $telefone?>"required><br>
 <p>Data nascimento: <input type="date" name="dnasc" value="<?php echo $dnasc?>" required><br>
 <p>CPF: <input type="text" name="cpf" value="<?php echo $cpf?>"required> <br>  
 <p>Endereço: <input type="text" name="endereco" placeholder="Endereço Completo" value="<?php echo $endereco?>"<br>
 <p>Login: <input type="text" name="login" value="<?php echo $login?>" required><br>
 <p>Senha:<input type="text" name="senha"  value="<?php echo $senha?>" required><br>
 
 <p> <input type="submit" name="acao" value="Salvar Dados">

</form>
</body>
</html>
