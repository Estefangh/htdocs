<?php
	class Usuario{
	private $id_usuario;
	private $nome;
	private $email;
	private $telefone;
	private $dnasc;
	private $cpf;
	private $endereco;
	private $login;
	private $senha;
	private $status;
	//private $imagem;

		public function setId_Usuario($id_usuario) {
			 $this->id_Usuario=$id_usuario;
		}
		
		public function getId_Usuario() {
			return $this->id_Usuario;
		}

		public function setNome($nome) {
			 $this->nome=$nome;
		}
		
		public function getNome() {
			return $this->nome;
		}

		public function setEmail($email) {
			 $this->email=$email;
		}
		
		public function getEmail() {
			return $this->email;
		}

		public function setTelefone($telefone) {
			 $this->telefone=$telefone;
		}
		
		public function getTelefone() {
			return $this->telefone;
		}

		public function setDnasc($dnasc) {
			 $this->dnasc=$dnasc;
		}
		
		public function getDnasc() {
			return $this->dnasc;
		}

		public function setCPF($cpf) {
			 $this->cpf=$cpf;
		}
		
		public function getCPF() {
			return $this->cpf;
		}

		public function setEndereco($endereco) {
			 $this->endereco=$endereco;
		}
		
		public function getEndereco() {
			return $this->endereco;
		}
				
		public function setLogin($login) {
			 $this->login=$login;
		}
		
		public function getLogin() {
			return $this->login;
		}
		
		public function setSenha($senha) {
			 $this->senha=$senha;
		}
		
		public function getSenha() {
			return $this->senha;
		}
		
		public function setStatus($status) {
			 $this->status=$status;
		}
		
		public function getStatus() {
			return $this->status;
		}
		/*
		public function setImagem($imagem) {
			 $this->imagem=$imagem;
		}
		
		public function getImagem() {
			return $this->imagem;
		}
		*/
	}
?>