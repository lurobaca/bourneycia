<?php
include_once("conexion.class.php");
class Class_Login{
	//constructor	
	var $con;
 	function Class_Login(){
 		$this->con=new conexion;
 	}


 function verifica_usuario($user,$password){
 	try{
 		 $Returna="";
 		 if($user=="" && $password=="")
			$Returna= 'Debe llenar los campos de usuario y contraseña,Intente nuevamente';
		 else{
			if($this->con->conectar()==true){
		      $Resultado = mysql_query("SELECT  `Nombre`  FROM  `SCA_User` WHERE  `user` = '" .mysql_real_escape_string($user). "' and `clave` = '" .mysql_real_escape_string($password). "'");
		
			if(mysql_num_rows($Resultado)) {
				$row=mysql_fetch_row($Resultado);
					$Returna=$row[0];
		    	}else $Returna= "";


			
			}else $Returna= "";
		}
		
	return $Returna;

	}catch(Exception $e){
 		//$Returna= "Error en verifica_usuario [ " .$e. " ]";
 		//echo $Returna;
	}


	
 }
}

?>