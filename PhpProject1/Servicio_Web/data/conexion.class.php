<?php 
class conexion{
	var $conect;
  
	var $BaseDatos;
	var $Servidor;
	var $Usuario;
	var $Clave;
	function __construct(){
	$this->BaseDatos = "seller";
		//$this->Servidor = "69.162.154.57:3307";
		// $this->Servidor = "10.123.0.61:3307";
         $this->Servidor = "localhost:3307";
		$this->Usuario = "root";
		$this->Clave = "root";
	    }

	 function conectar() {
		if(!($con=@mysql_connect($this->Servidor,$this->Usuario,$this->Clave))){
   			echo"<h1> [:(] Error al conectar a la base de datos</h1>";	
	    	exit();
			}
		if (!@mysql_select_db($this->BaseDatos,$con)){
			echo "<h1> [:(] Error al seleccionar la base de datos</h1>";  
		 	exit();
		    }
		$this->conect=$con;
		return true;	
	}
	
	
	
	
}
?>