<?php
session_start();

include_once "../model/Estabelecimento.class.php";
include_once "../model/EstabelecimentoDAO.class.php";


$EstabelecimentoDAO=new EstabelecimentoDAO();

/**************
* Altera usuário logado
***************/	
if (isset($_GET['acao'])&&($_GET['acao']=="alterar")){
	
	$id_estabelecimento=$_SESSION['id_estabelecimento'];
		//echo "ola".$id_usuario;
		//die();
	$listar=$estabelecimentoDAO->listar("where id_estabelecimento='$id_estabelecimento'");
	$tamanho=sizeof($listar);
		//print_r($listar);
		//die();
	for($i=0;$i<$tamanho;$i++)
	{
		$nome = $listar[$i]['nome'];
		$email = $listar[$i]['email'];
		$telefone = $listar[$i]['telefone'];
		$endereco = $listar[$i]['endereco'];
		$cpfcnpj = $listar[$i]['cpfcnpj'];
		$login = $listar[$i]['login'];
		$senha = $listar[$i]['senha'];
		
	}
	 include "../view/alteraestabelecimento.php";
}
/********************
* cadastra novo estabelecimento
********************/
elseif (isset($_POST['acao']) && ($_POST['acao']== "Cadastrar"))
	{
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$telefone = $_POST['telefone'];
		$endereco = $_POST['endereco'];
		$cpfcnpj = $_POST['cpfcnpj'];
		$login = $_POST['login'];
		$senha = $_POST['senha'];
		$status = 1;

		$estabelecimento = new Estabelecimento();
		$estabelecimento->setNome($nome);
		$estabelecimento->setEmail($email);
		$estabelecimento->setTelefone($telefone);
		$estabelecimento->setEndereco($endereco);
		$estabelecimento->setCPFCNPJ($cpfcnpj);
		$estabelecimento->setLogin($login);
		$estabelecimento->setSenha($senha);
		$estabelecimento->setStatus($status);
	//var_dump ($estabelecimentoDAO);
	//die();
			//$retorno=$estabelecimentoDAO->inserir($estabelecimento);
				$retorno=$EstabelecimentoDAO->inserir($estabelecimento);
				if($retorno)
				{
					echo"<script>
					alert('Seu estabelecimento foi cadastrado com sucesso!');
					location.href='../../index.php';					
					</script>";
					// header ('Location:../../index.php');
				}
				else
				{
					header ('Location: ../view/cadastra.php');
				}
	}

//salvar alterações de usuário logado
elseif (isset($_POST['acao']) && ($_POST['acao']== "Salvar Dados"))
{
	$id_estabelecimento=$_SESSION['id_estabelecimento'];
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$telefone = $_POST['telefone'];	
	$endereco = $_POST['endereco'];
	$cpfcnpj = $_POST['cpfcnpj'];
	$login = $_POST['login'];
	$senha = $_POST['senha'];
	$status = 1;

	$estabelecimento = new Estabelecimento();
	$estabelecimento->setNome($nome);
	$estabelecimento->setEmail($email);
	$estabelecimento->setTelefone($telefone);
	$estabelecimento->setEndereco($endereco);
	$estabelecimento->setCPFCNPJ($cpfcnpj);
	$estabelecimento->setLogin($login);
	$estabelecimento->setSenha($senha);
	$estabelecimento->setStatus($status);
	$estabelecimento->setId_Estabelecimento($id_estabelecimento);

	//var_dump ($estabelecimentoDAO);
	//die();

	if($estabelecimentoDAO->alterar($estabelecimento))
	{
		echo "Estabelecimento alterado com sucesso";	
	}
	else
	{
		echo "Erro ao inserir";
		print_r($estabelecimento);
		die();
	}
}
/**************************
* Deleta estabelecimento - altera o status para 0
***************************/
elseif (isset($_GET['acao']) && ($_GET['acao']== "Deletar"))
{
	$id_estabelecimento=$_SESSION['id_estabelecimento'];
	$status = 0;
	$estabelecimento = new Estabelecimento();
	$estabelecimento->setStatus($status);
	$estabelecimento->setId_Estabelecimento($id_estabelecimento);
	//var_dump($estabelecimento);
	//die();
	//Aqui tinha q exibir uma caixa perguntando se quer delatar? a apresentar dois botões Sim /não. Daí controla com um if a ação deletar.
	if($estabelecimentoDAO->deleta($estabelecimento))
	{
		echo "Estabelecimento excluído com sucesso";
	}
	else
	{	
		echo "Erro ao excluir";
		print_r($estabelecimento);
		die();
	}
}
/****************************
* Lista todos os usuários
*****************************/
elseif (isset($_GET['acao']) && ($_GET['acao'] == "Listar"))
{
	$listar=$estabelecimentoDAO->listar('ORDER BY nome');
	$tamanho=sizeof($listar);
	for($i=0;$i<$tamanho;$i++)
	{
		echo "<br>Nome: ".$listar[$i]['nome']." - ";
		echo "E-mail:" .$listar[$i]['email']." - ";
		echo "Telefone: ".$listar[$i]['telefone']." - ";
		echo "Endereço: ".$listar[$i]['endereco']." - ";
		echo "CPFCNPJ:" .$listar[$i]['cpfcnpj']." - ";
		echo "login:".$listar[$i]['login']." - ";
		echo "senha:".$listar[$i]['senha']."<br>";
	}
}

/**************************
* Faz o login do estabelecimento
***************************/
elseif (isset($_POST['acao']) && ($_POST['acao']=="Logar"))
{
	$login = $_POST['login'];
	$senha = $_POST['senha'];

	if($EstabelecimentoDAO->logar($login,$senha)){
		//echo $_SESSION['id_estabelecimento'];
		//echo $_SESSION['nome'];
		//die();
		header ('Location:../view/logado.php');
	}
	else{
		echo "Não foi possivel logar... Tente novamente.";
	}
}
elseif (isset($_GET['acao'])&&($_GET['acao']=="logout")){
	unset ($_SESSION['id_estabelecimento']);
	unset ($_SESSION['nome']);
	session_destroy();
	//var_dump($_SESSION);
	//die();
	header ('Location: ../index.html');
}	
?>
<!--	<p><a href="../view/logado.php">Voltar</a> -->
	<p><a href="../view/login.php">Voltar</a>