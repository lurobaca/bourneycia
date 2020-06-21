<?php 
include_once("conexion.class.php");

class Facturas{
 //constructor	
 	var $con;
 	function Facturas(){
 		$this->con=new conexion;
 	}


	function ObtieneFacturasPendientes($CodCliente){
		if($this->con->conectar()==true){
		
			return mysql_query("SELECT * FROM `FacturasPendientes` WHERE `CardCode` = '".$CodCliente."' ");
			
		}else {echo "no pudo conectar";}
	}
	
		function ObtienePagosEfectuados($NumFactura){
		if($this->con->conectar()==true){
		
			return mysql_query("SELECT * FROM `PagosEfectuados` WHERE `#Factura`= '".$NumFactura."'");
			
		}else {echo "no pudo conectar";}
	}
	
}
?>