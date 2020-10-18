<?php
session_start();

include_once "../Model/Usuario.class.php";
include_once "../Model/UsuarioDAO.class.php";

$usuarioDAO=new UsuarioDAO();
/*************** Altera usuário logado ***************/	
if (isset($_GET['acao'])&&($_GET['acao']=="alterar")){
	$id_usuario=$_SESSION['id_usuario'];
		//echo "ola".$id_usuario;
		//die();
	$listar=$usuarioDAO->listar("where id_usuario='$id_usuario'");
	$tamanho=sizeof($listar);
		//print_r($listar);
		//die();
	for($i=0;$i<$tamanho;$i++)
	{
		$nome = $listar[$i]['nome'];
		$email = $listar[$i]['email'];
		$telefone = $listar[$i]['telefone'];
		$dnasc = $listar[$i]['dnasc'];
		$cpf = $listar[$i]['cpf'];
		$endereco = $listar[$i]['endereco'];
		$login = $listar[$i]['login'];
		$senha = $listar[$i]['senha'];
	}
	 include "../view/alterausuario.php";
}
/********************* cadastra novo usuário ********************/
elseif (isset($_POST['acao']) && ($_POST['acao']== "Cadastrar"))
	{
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$telefone = $_POST['telefone'];
		$dnasc = $_POST['dnasc'];
		$cpf = $_POST['cpf'];
		$endereco = $_POST['endereco'];
		$login = $_POST['login'];
		//$senha = md5($_POST['senha']);
		$senha = $_POST['senha'];
		$status = 1;
	//	$imagem = $_POST['imagem'];
		//INCLUSÃO DE IMAGEM
		/*
		$limitar_ext="sim";
		$extensoes_validas=array(".gif",".jpg",".png",".jpeg",".bmp",".GIF",".JPG",".PNG",".JPEG",".BMP",);
		$caminho="../view/imagens";
		$limitar_tamanho="não";
		$tamanho_bytes="200000";
		$sobrescrever="não";	
		$nome_arquivo=$_FILES['arquivo']['name'];
		$tamanho_arquivo=$_FILES['arquivo']['size'];
		$arquivo_temporario=$_FILES['arquivo']['tmp_name'];
			
			if (!empty($nome_arquivo)) {
				if($sobrescrever=="não" && file_exists("$caminho/$nome_arquivo"))
					die("Arquivo já existe");
				if($limitar_tamanho=="sim" && ($tamanho_arquivo > $tamanho_bytes))
					die("Arquivo deve ter o no máximo $tamanho_bytes bytes");
				$ext = strrchr($nome_arquivo,'.');
				if (($limitar_ext == "sim") && !in_array($ext,$extensoes_validas))
					die("Extensão de arquivo inválida para upload");
				if (move_uploaded_file($arquivo_temporario, "../view/imagens/$nome_arquivo")) {
					echo " Upload do arquivo: ". $nome_arquivo." foi concluído com sucesso";
				} else {
					echo "Arquivo não pode ser copiado para o servidor.";
				}
			} else {
				die("Selecione o arquivo a ser enviado");
			}
			*/
			//INCLUSÃO DE IMAGEM

		$usuario = new Usuario();
		$usuario->setNome($nome);
		$usuario->setEmail($email);
		$usuario->setTelefone($telefone);
		$usuario->setDnasc($dnasc);
		$usuario->setCPF($cpf);
		$usuario->setEndereco($endereco);
		$usuario->setLogin($login);
		$usuario->setSenha($senha);
		$usuario->setStatus($status);
		//imagem
		//$usuario->setImagem($nome_arquivo);
	//var_dump ($usuarioDAO);
	//die();
			$retorno=$usuarioDAO->inserir($usuario);
				if($retorno)
				{
					echo "Você se cadastrou";
					//header ('Location:/tcc/src/index.html');
					header ('Location:/index.html');
				}
				else
				{
					header ('Location: ../view/cadastra.php');
				}
	}
//***** salvar alterações de usuário logado *****
elseif (isset($_POST['acao']) && ($_POST['acao']== "Salvar Dados"))
{
	$id_usuario=$_SESSION['id_usuario'];
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$telefone = $_POST['telefone'];	
	$dnasc = $_POST['dnasc'];
	$cpf = $_POST['cpf'];
	$endereco = $_POST['endereco'];
	$login = $_POST['login'];
	//$senha = md5($_POST['senha']);
	$senha = $_POST['senha'];
	$status = 1;

	$usuario = new Usuario();
	$usuario->setNome($nome);
	$usuario->setEmail($email);
	$usuario->setTelefone($telefone);
	$usuario->setDnasc($dnasc);
	$usuario->setCPF($cpf);
	$usuario->setEndereco($endereco);
	$usuario->setLogin($login);
	$usuario->setSenha($senha);
	$usuario->setStatus($status);
	$usuario->setId_Usuario($id_usuario);
	//var_dump ($usuarioDAO);
	//die();
		if($usuarioDAO->alterar($usuario))
		{
			echo "Usuário alterado com sucesso";	
		}
		else
		{
			echo "Erro ao inserir";
			print_r($usuario);
			die();
		}
	}
/***** Deleta usuário - altera o status para *****/
elseif (isset($_GET['acao']) && ($_GET['acao']== "Deletar"))
{
	$id_usuario=$_SESSION['id_usuario'];
	$status = 0;
	$usuario = new Usuario();
	$usuario->setStatus($status);
	$usuario->setId_Usuario($id_usuario);
	//var_dump($usuario);
	//die();
	//Aqui tinha q exibir uma caixa perguntando se quer delatar? a apresentar dois botões Sim /não. Daí controla com um if a ação deletar.
	if($usuarioDAO->deleta($usuario))
	{
		echo "Usuário excluído com sucesso";
	
	}
	else
	{	
		echo "Erro ao excluir";
		print_r($usuario);
		die();
	}
}
/***** Lista todos os usuários *****/
elseif (isset($_GET['acao']) && ($_GET['acao'] == "Listar"))
{
	$listar=$usuarioDAO->listar('ORDER BY nome');
	$tamanho=sizeof($listar);
	for($i=0;$i<$tamanho;$i++)
	{
		echo "<br>Nome: ".$listar[$i]['nome']." - ";
		echo "E-mail:" .$listar[$i]['email']." - ";
		echo "Telefone: ".$listar[$i]['telefone']." - ";
		echo "Data de nascimento:" .$listar[$i]['dnasc']." - ";
		echo "CPF:" .$listar[$i]['cpf']." - ";
		echo "Endereço: ".$listar[$i]['endereco']." - ";
		echo "login:".$listar[$i]['login']." - ";
		echo "senha:".$listar[$i]['senha']." - ";
		//echo "imagem:".$listar[$i]['imagem']."<br>";
		//inclui a imagem na hora de listar os dados do usuário
		//echo "<img src='../View/imagens/".$listar[$i]['imagem']."' height ='100px'>";
	}
}
/***** Faz o login do usuário *****/
elseif (isset($_POST['acao']) && ($_POST['acao']=="Logar"))
{
//	$login = $_POST['login'];
//	$senha = $_POST['senha'];

	$login = addslashes($_POST['login']);
	$senha = addslashes($_POST['senha']);
		if($usuarioDAO->logar($login,$senha)){
			header ('Location:../view/logado.php');
		}
		else{
			echo "Não foi possivel logar... Tente novamente.";
		}
}
elseif (isset($_GET['acao'])&&($_GET['acao']=="logout")){
	unset ($_SESSION['id_usuario']);
	unset ($_SESSION['nome']);
	session_destroy();
	//var_dump($_SESSION);
	//die();
	//o codigo abaixo voltava para uma determinada pag dps do logout
	header ('Location: /index.html');
}	
?>
	<!-- <p><a href="../view/logado.php">Voltar</a> -->
	<p><a href="/index.html">Voltar</a>