<?php 
include_once("conexion.class.php");

class CuentaComprobantes{
 //constructor	
 	var $con;
 	function __construct(){
 		$this->con=new conexion;
 	}


 		//obtiene los datos del articulo a insertar en el rutero
	function ConsultaConteos(){
		try{
			
		 if($this->con->conectar()==true){
		
			$sql="
SELECT 

Ano,
(CASE WHEN T1.Mes= 1 then 'ENERO'
 ELSE CASE WHEN T1.Mes= 2 then 'FEBRERO'    
 ELSE CASE WHEN T1.Mes= 3 then 'MARZO'      
 ELSE CASE WHEN T1.Mes= 4 then 'ABRIL'     
 ELSE CASE WHEN T1.Mes= 5 then 'MAYO'       
 ELSE CASE WHEN T1.Mes= 6 then 'JUNIO'     
 ELSE CASE WHEN T1.Mes= 7 then 'JULIO'      
 ELSE CASE WHEN T1.Mes= 8 then 'AGOSTO'     
 ELSE CASE WHEN T1.Mes= 9 then 'SETIEMBRE' 
 ELSE CASE WHEN T1.Mes= 10 then 'OCTUBRE'    
 ELSE CASE WHEN T1.Mes= 11 then 'NOVIEMBRE'  
 ELSE CASE WHEN T1.Mes= 12 then 'DOCIEMBRE' END END END END END END END END END END END END) As Mes, 
	T1.Emisor_NumeroCedula,
	T1.Emisor_Nombre,
	T1.Tipo,
	T1.Cantidad FROM(
SELECT 
	T0.Tipo,
	
	(SELECT YEAR(T0.Fecha)) AS Ano,
	(SELECT MONTH(T0.Fecha)) AS Mes,
	T0.Emisor_Nombre,
	T0.Emisor_NumeroCedula,
	count(T0.Clave) as Cantidad 
FROM `Conteo_Comprobantes` T0
GROUP BY Tipo,Emisor_NumeroCedula,Emisor_Nombre) T1
";

        	if (!$resultado = $this->con->conect->query($sql)) {
    			// ¡Oh, no! La consulta falló. 
    			echo "Lo sentimos, este sitio web está experimentando problemas.";
			    // De nuevo, no hacer esto en un sitio público, aunque nosotros mostraremos
    			// cómo obtener información del error
    			echo "Error: La ejecución de la consulta falló debido a: \n\n".
    				 "Query: " . $sql . "\n".
    			     "Errno: " . $this->con->conect->errno . "\n".
    			     "Error: " . $this->con->conect->error . "\n";
    			exit;
			}else{
			return $resultado;	
			}
			
			
		 }else{

		 	
		 	return "No conecto";
		 }



		}
        catch(Exception $e){ echo $e;}
	}

	

 	}