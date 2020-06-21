<?php 
class conexion{
	var $conect;
  	var $BaseDatos;
	var $Servidor;
	var $Usuario;
	var $Clave;
	
	function __construct(){
		$this->BaseDatos = "esscodb";
		//$this->Servidor = "69.162.154.57:3307";
		// $this->Servidor = "10.123.0.61:3307";
        $this->Servidor = "127.0.0.1";
		$this->Usuario = "sa";
		$this->Clave = "123";
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