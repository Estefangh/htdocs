<?php

include_once 'BD.class.php';

class UsuarioDAO extends BD{
private $bd; //conexão com o banco
private $tabela; //nome da tabela

    public function __construct() {
        parent::__construct();
        $this->tabela = "usuarios";
    }

    public function __destruct() {
        unset($this->bd);
    }
//insere um novo registro na tabela usuário      
    public function inserir($usuario) {
		$nome=$usuario->getNome();
		$email=$usuario->getEmail();
		$telefone=$usuario->getTelefone();
		$dnasc=$usuario->getDnasc();
		$cpf=$usuario->getCPF();
		$endereco=$usuario->getEndereco();
		$login=$usuario->getLogin();
		$senha=$usuario->getSenha();
		$status=$usuario->getStatus();
		//insere a imagem
		$imagem=$usuario->getImagem();
		
		//testa se o login já está em uso
		$teste=$this->pdo->prepare('SELECT login FROM usuarios WHERE login=:login');
		$teste->bindValue(':login',$login);
		$teste->execute();
		$existe=$teste->rowCount();
		//var_dump ($existe);
		//die();
		
		try{
			if($existe!=0){
				$_SESSION['msg'] = "Login já em uso! Escolha outro login";
				return false;
			}
			else{
				$resultado=$this->pdo->prepare('INSERT INTO usuarios(nome, email, telefone, dnasc, cpf, endereco, login, senha, status, imagem ) values(:nome,:email,:telefone,:dnasc,:cpf,:endereco,:login,:senha,:status,:imagem)');
			
			//$sql = "INSERT INTO $this->tabela (nome, endereco, email, rg, cpf, senha, login, status ) values ('$nome','$endereco','$email','$rg','$cpf','$senha','$login','$status')";
				$resultado->bindValue(':nome',$nome);
				$resultado->bindValue(':email',$email);
				$resultado->bindValue(':telefone',$telefone);
				$resultado->bindValue(':dnasc',$dnasc);
				$resultado->bindValue(':cpf',$cpf);
				$resultado->bindValue(':endereco',$endereco);
				$resultado->bindValue(':login',$login);
				$resultado->bindValue(':senha',$senha);
				$resultado->bindValue(':status',$status);
				$resultado->bindValue(':imagem',$imagem);
				
				$dados = $resultado->execute();//retorna true se incluiu
				if($dados){
					// testo se houve alguma linha alterada?
					if($resultado->rowCount()>=1){
							//echo	$resultado->rowCount();	
							//die();
						return true;
					//	header ('Location:../testel');//optei p direcionar daqui a carga do index.html
										
					}
					else{
						$_SESSION['msg']= "Erro ao inserir no BD";
						return false;
					}
				}
			}
		}
		catch (PDOException  $e) {
  			 print $e->getMessage();
			}
	}
	///testa se existe algum registro que já esteja utilizando o login
	public function existe($login){
		$novologin=$usuario->getLogin();
			try{
				$resultado=$this->pdo->prepare('SELECT * FROM usuarios WHERE login=$login');			
				$resultado->execute();
				
				if($resultado->rowCount()>=1){ // testo se encontrou alguma linha 
					return true;
				}else{
					return false;
				}
			}catch (PDOException  $e) {
				 print $e->getMessage();
				}		
	}
	//altera um registro na tabela usuário      
    public function alterar($usuario) {
		$nome=$usuario->getNome();
		$email=$usuario->getEmail();
		$telefone=$usuario->getTelefone();
		$dnasc=$usuario->getDnasc();
		$cpf=$usuario->getCPF();
		$endereco=$usuario->getEndereco();		
		$login=$usuario->getLogin();
		$senha=$usuario->getSenha();
		$status=$usuario->getStatus();
		$id_usuario=$usuario->getId_Usuario();
		
		try{			
			$resultado=$this->pdo->prepare('UPDATE usuarios SET nome=:nome, email=:email, telefone=:telefone, dtnasc=:dnasc, cpf=:cpf, endereco=:endereco, login=:login, senha=:senha, status=:status WHERE id_usuario=:id_usuario ');
			//UPDATE table_name SET column1 = value1, column2 = value2 WHERE condition;
			$resultado->bindValue(':nome',$nome);
			$resultado->bindValue(':email',$email);		
			$resultado->bindValue(':telefone',$telefone);
			$resultado->bindValue(':dnasc',$dnasc);
			$resultado->bindValue(':cpf',$cpf);
			$resultado->bindValue(':endereco',$endereco);
			$resultado->bindValue(':login',$login);
			$resultado->bindValue(':senha',$senha);
			$resultado->bindValue(':status',$status);
			$resultado->bindValue(':id_usuario',$id_usuario);
			$_SESSION[nome]=$nome;
			$dados = $resultado->execute();//retorna true se incluiu
			if($dados){
				if($resultado->rowCount()>=1){// testo se houve alguma linha alterada?
				//return true; //se deixar p o controller decidir o q via fazer
				header ('Location: ../view/logado.php');//optei p direcionar daqui a carga p logado.php
				}
				else{
					return false;
				}
			}
		}catch (PDOException  $e) {
  			 print $e->getMessage();
			}
	}
	//Deleta usuário - altera um registro na tabela usuário      
    public function deleta($usuario) {
		$status=$usuario->getStatus();
		$id_usuario=$usuario->getId_Usuario();
		try{
			$resultado=$this->pdo->prepare('UPDATE usuarios SET status=:status WHERE id_usuario=:id_usuario ');
			//UPDATE table_name SET column1 = value1, column2 = value2 WHERE condition;		
			$resultado->bindValue(':status',$status);
			$resultado->bindValue(':id_usuario',$id_usuario);
			$dados = $resultado->execute();//retorna true se incluiu
			if($dados){
				if($resultado->rowCount()>=1){// testo se houve alguma linha alterada?
				//return true; //se deixar p o controller decidir o q via fazer
				session_destroy();
				unset($_SESSION['id_usuario']);
				unset($_SESSION['nome']);	
				header ('Location: ../view/login.php');//optei p direcionar daqui a carga p logado.php
				}
				else{
					return false;
				}
			}
		}catch (PDOException  $e) {
  			 print $e->getMessage();
			}
	}
	//logar
	public function logar($login,$senha){
		try{
			$resultado=$this->pdo->prepare('SELECT id_usuario, nome FROM usuarios WHERE login=:login and senha=:senha and status=1');
			$resultado->bindValue(':login',$login);
			$resultado->bindValue(':senha',$senha);
			if($resultado->execute()) {
				$linhas=$resultado->rowCount();
				if($linhas > 0) {
					$registro=$resultado->fetch();
					var_dump($registro);
					$_SESSION['id_usuario']=$registro['id_usuario'];
					$_SESSION['nome']=$registro['nome'];
					return true;
				}	
				else {
					 return false;
				}
			}			
		}
		catch (PDOException  $e) {
  			 print $e->getMessage();
		}
	}
	/*
	public function logar($usuario,$senha){
		try{
			$resultado->$this->pdo->prepare(
			'SELECT * FROM usuarios WHERE usuario=:usuario and senha=:senha');
			$resultado->bindValue(':usuario',$usuario);
			$resultado->bindValue(':senha',$senha);
			
			$dados = $resultado->execute();
			if($dados->rowcount()==1)
			{
				$registro=$resultado->fetch();
				$_SESSION['nome']=registro ->nome;
				return true;// pode tratar no controler e carregar a página de área restrita ou já faz aqui a indicação para carregar a área restrita
				header ('Location: login.html');
			}
					
			$registro=$resultado->fetch();
		}
	}
	*/
	
	
	//lista usuário por complemento
        public function listar($complemento="") {
			try{
				//$resultado=$this->pdo->prepare('SELECT id_usuario, nome FROM usuarios WHERE login=:login and senha=:senha');
				//$sql = "SELECT * FROM $this->tabela " . $complemento;
				$resultado=$this->pdo->prepare('SELECT * FROM usuarios '.$complemento);
				$resultado->execute();
				if($resultado->rowCount()>=1) { // testo se encontrou alguma linha 
					return $resultado->fetchAll();
				}
			}	
			catch (PDOException  $e) {
				 print $e->getMessage();
			}			
		}
          }

	//deleta usuário por cd_usuario
    /*public function excluir($cd_usuario) {
        $sql = "delete from $this->tabela where id_usuario='$id_usuario'";
        $retorno = pg_query($sql);
        return $retorno;
    }*/
    //retornar código do ultimo usuario    
 /*   public function retornaUltimo() {
        $sql = "select max(id) FROM $this->tabela";
        $resultado = pg_query($sql);
        $retorno = pg_fetch_array($resultado);
        $ultimo=$retorno['id'];
        return $ultimo;
    }*/
?> 