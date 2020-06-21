<?php 

	require('Class/Facturas.class.php');
	$objFacturas=new Facturas;
$FacturasCanceladas = $objFacturas->ObtieneFacturasPendientes($usuario);
			if($FacturasCanceladas){
				$EstadoFactura = "NO";
		 		while( $Facturas = mysql_fetch_array($FacturasCanceladas) ) {
					if($Facturas['FechaVencimiento'] <= getdate())
				    	{
							$EstadoFactura = "SI";
							exit;
						}
					else 
						$EstadoFactura =  "NO";
				    }
				
				}
				?>