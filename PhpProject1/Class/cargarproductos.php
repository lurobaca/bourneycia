<?php 
include_once("conexion.class.php");
 
$con = new conexion;

$limite = $_POST["limite"];


		//cuenta los registros para luego dividirlo entre el numero de resultados por pagina
		if($con->conectar()==true){
			$res = mysql_query("SELECT ItemCode FROM arquitect_bourne.Articulos");
	    	}

$total = $número_filas = mysql_num_rows($res);
echo "total " . $total;
?>
	