<?php

	class Estabelecimento {
	private $id_estabelecimento;
	private $nome;
	private $email;
	private $telefone;
	private $endereco;
	private $cpfcnpj;
	private $login;
	private $senha;
	//não sei se é necessário esse private status de baixo
	private $status;

		public function setId_Estabelecimento($id_estabelecimento) {
			 $this->id_Estabelecimento=$id_estabelecimento;
		}
		
		public function getId_Estabelecimento() {
			return $this->id_Estabelecimento;
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

		public function setEndereco($endereco) {
			 $this->endereco=$endereco;
		}
		
		public function getEndereco() {
			return $this->endereco;
		}

		public function setCPFCNPJ($cpfcnpj) {
			 $this->cpfcnpj=$cpfcnpj;
		}
		
		public function getCPFCNPJ() {
			return $this->cpfcnpj;
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
	}
?>
 