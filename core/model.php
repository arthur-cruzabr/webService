<?php

	class model {

		protected $pdo;

		public function __construct() {
			global $config;
            try {
			 $this->pdo = new PDO("mysql:host=".$config['host'].";dbname=".$config['dbname'], $config['login'], $config['senha']);
            }catch(PDOException $e) {
                echo "ERRO AO CONECTAR A BASE DE DADOS: ".$e->getCode();
            }
        }

	}

 ?>
