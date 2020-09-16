<?php
 
 class BD {
	
    private $host = "localhost";
    private $banco = "iplayq25_tcc";

 
	public function __construct() {
			try {
				 $this->pdo = new PDO("mysql:host=localhost; dbname=iplayq25_tcc",'root','');
				 $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 
			} catch (PDOException  $e) {
				 print $e->getMessage();
			}
		}
	}
?>