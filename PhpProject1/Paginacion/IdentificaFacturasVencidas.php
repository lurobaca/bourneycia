<?php 



try{
   $HayVencidas ="NO";
   if($_POST['usuario']){
		$usuario =  $_POST['usuario'];

		require('../Class/Facturas.class.php');
		$objFacturas=new Facturas;
		$FacturasCanceladas = $objFacturas->ObtieneFacturasPendientes($usuario);
			if($FacturasCanceladas){			
		 		while( $Facturas = mysql_fetch_array($FacturasCanceladas) ) {
						if($Facturas['FechaVencimiento'] <=date("Y-m-d") )
							$HayVencidas = "SI";					
				    }
				}else
				echo "SIN FACTUA";
				
	} else
		echo "SIN USUARIO";
				
   echo $HayVencidas;
							
  }catch(Exception $e){ echo "Error login";}
				?>