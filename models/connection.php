<?php

class Conexion{

	static public function conectar(){

		try{
		
			//local
			$servidor="mysql:host=localhost;dbname=electoral";
			$usuario="root";
			$clave="";
			$link = new PDO($servidor,$usuario,$clave);
			$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
			$link->exec("set names utf8");
			return $link;
			}catch(PDOException $e){
			echo "ERROR: " . $e->getMessage();
		  }

	}

}