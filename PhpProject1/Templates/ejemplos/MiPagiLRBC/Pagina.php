<?php
	  include('../Pag/conexion.class.php'); 
	class Paginas{
 //constructor	
 	var $con;
 	function Paginas(){
 		$this->con=new conexion;
 	}
	
	/* Obtiene El numero de Paginas Totales y El numero de paginas a mostrar segun el numero de finlas a mostrar*/
	function ConsultaPagina($FilasAMostrar){
		try{
		 if($this->con->conectar()==true){
			$NumPaginas ;
			$TotalFinalas;
			$result = mysql_query("SELECT COUNT(*) FROM  `Articulos` ");     
			//si No devuelve nada con el nombre de usuario , es por que lo existe el usuario digitado
			echo "result: ". $result ."mysql_num_rows: ".   mysql_num_rows($result) ;
		 if(mysql_num_rows($result)){
			$row=mysql_fetch_row($result);
			$TotalFinalas = $row[0];
			echo " <br> Numero de registros =  ".$row[0];
			echo " <br> Numero de Rilad a mostrar =  ".$FilasAMostrar;
			$NumPaginas = $TotalFinalas / $FilasAMostrar  ;	
			echo " <br> Num Paginas a mostrar = " . $NumPaginas;	
		 }else {	echo "no hay registros " ;}
			return $NumPaginas;
		 }
		}
        catch(Exception $e){ echo $e;}
	}
	
		/* Obtiene El numero de Paginas Totales y El numero de paginas a mostrar segun el numero de finlas a mostrar*/
	function ConsultaDatosdePagina($LimiteINICIO,$LimiteFIN){
		try{
		 if($this->con->conectar()==true){
			$NumPaginas ;
			$TotalFinalas;
			$result = mysql_query("SELECT * FROM  `Articulos` LIMIT ".$LimiteINICIO.",".$LimiteFIN." ");     
						
			
			return $result;
		 }
		}
        catch(Exception $e){ echo $e;}
	}
	
	

} 
?>