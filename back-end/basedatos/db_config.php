<?php

class DBConfig{
private $conn;

public function __CONSTRUCT(){

	try {
		
	  $this->conn=new PDO("mysql:host=localhost:3306; dbname=empresa", 'Diego','123');
          //$this->con= new PDO("sqlsrv:Server=foo-sql,1433;Database=mydb", 'sa' , 'secreto');
	  // set the PDO error mode to exception
	  $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	  echo "";
	
	 }catch(PDOException $e) {
	  echo "Error: " . $e->getMessage();
	 }
}

public function getConection(){
	 	return $this->conn;
	}
	public function desconectar(){
		$this->conn=null;
			//echo "Conexión cerrada";
	}
}



//$conn=new Conexion();
 ?>