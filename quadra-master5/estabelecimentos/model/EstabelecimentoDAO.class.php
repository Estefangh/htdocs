<?php

include_once 'BD.class.php';

class EstabelecimentoDAO extends BD{
private $bd; //conexão com o banco
private $tabela; //nome da tabela

    public function __construct() {
        parent::__construct();
        $this->tabela = "estabelecimentos";
    }

    public function __destruct() {
        unset($this->bd);
    }
//insere um novo registro na tabela "estabelecimentos"      
    public function inserir($estabelecimento) {
		$nome=$estabelecimento->getNome();
		$email=$estabelecimento->getEmail();
		$telefone=$estabelecimento->getTelefone();
		$endereco=$estabelecimento->getEndereco();
		$cpfcnpj=$estabelecimento->getCPFCNPJ();
		$login=$estabelecimento->getLogin();
		$senha=$estabelecimento->getSenha();
		$status=$estabelecimento->getStatus();
		$senha = md5($senha);
		
		//testa se o login já está em uso
		$teste=$this->pdo->prepare('SELECT login FROM estabelecimentos WHERE login=:login');
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
				$resultado=$this->pdo->prepare('INSERT INTO estabelecimentos(nome, email, telefone, endereco, cpfcnpj, login, senha, status ) values(:nome,:email,:telefone,:endereco,:cpfcnpj,:login,:senha,:status)');
			
				$resultado->bindValue(':nome',$nome);
				$resultado->bindValue(':email',$email);
				$resultado->bindValue(':telefone',$telefone);
				$resultado->bindValue(':endereco',$endereco);
				$resultado->bindValue(':cpfcnpj',$cpfcnpj);
				$resultado->bindValue(':login',$login);
				$resultado->bindValue(':senha',$senha);
				$resultado->bindValue(':status',$status);
				
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
		
		$novologin=$estabelecimento->getLogin();
			try{
				$resultado=$this->pdo->prepare('SELECT * FROM estabelecimentos WHERE login=$login');			
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
	
	
	//altera um registro na tabela estabelecimentos    
    public function alterar($estabelecimento) {
		
		$nome=$estabelecimento->getNome();
		$email=$estabelecimento->getEmail();
		$telefone=$estabelecimento->getTelefone();
		$endereco=$estabelecimento->getEndereco();
		$cpfcnpj=$estabelecimento->getCPFCNPJ();
		$login=$estabelecimento->getLogin();
		$senha=$estabelecimento->getSenha();
		$status=$estabelecimento->getStatus();
		$id_estabelecimento=$estabelecimento->getId_Estabelecimento();
		
		try{			
			$resultado=$this->pdo->prepare('UPDATE estabelecimentos SET nome=:nome, email=:email, telefone=:telefone, endereco=:endereco, cpfcnpj=:cpfcnpj, login=:login, senha=:senha, status=:status WHERE id_estabelecimento=:id_estabelecimento ');
			
			//UPDATE table_name SET column1 = value1, column2 = value2 WHERE condition;
		  
			$resultado->bindValue(':nome',$nome);
			$resultado->bindValue(':email',$email);		
			$resultado->bindValue(':telefone',$telefone);
			$resultado->bindValue(':endereco',$endereco);
			$resultado->bindValue(':cpfcnpj',$cpfcnpj);
			$resultado->bindValue(':login',$login);
			$resultado->bindValue(':senha',$senha);
			$resultado->bindValue(':status',$status);
			$resultado->bindValue(':id_estabelecimento',$id_estabelecimento);
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
	
	
	//Deleta estabelecimento - altera um registro na tabela estabelecimentos      
    public function deleta($estabelecimento) {
		
		
		$status=$estabelecimento->getStatus();
		$id_estabelecimento=$estabelecimento->getId_Estabelecimento();
		
		try{
			$resultado=$this->pdo->prepare('UPDATE estabelecimentos SET status=:status WHERE id_estabelecimento=:id_estabelecimento ');
		  
			$resultado->bindValue(':status',$status);
			$resultado->bindValue(':id_estabelecimento',$id_estabelecimento);
			
			$dados = $resultado->execute();//retorna true se incluiu
			if($dados){
				if($resultado->rowCount()>=1){// testo se houve alguma linha alterada?
				//return true; //se deixar p o controller decidir o q via fazer
				session_destroy();
				unset($_SESSION['id_estabelecimento']);
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
			$resultado=$this->pdo->prepare('SELECT id_estabelecimento, nome FROM estabelecimentos WHERE login=:login and senha=:senha and status=1');
			$resultado->bindValue(':login',$login);
			$resultado->bindValue(':senha',$senha);
			
		
			if($resultado->execute())
			{
			$linhas=$resultado->rowCount();

			if($linhas > 0){
				
				$registro=$resultado->fetch();
				var_dump($registro);
				$_SESSION['id_estabelecimento']=$registro['id_estabelecimento'];
				$_SESSION['nome']=$registro['nome'];
				return true;
			}	
			else
			{ return false;}
			}			
		}
		catch (PDOException  $e) {
  			 print $e->getMessage();
		}
	}
	
	//lista estabelecimento por complemento
        public function listar($complemento="") {
			try{
				$resultado=$this->pdo->prepare('SELECT * FROM estabelecimentos '.$complemento);
				$resultado->execute();
				
				if($resultado->rowCount()>=1){ // testo se encontrou alguma linha 
					return $resultado->fetchAll();
				}
			}	catch (PDOException  $e) {
					 print $e->getMessage();
				}			
		}
        
          }

?> 