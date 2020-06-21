<?php 

	require_once("Class/sesion.class.php");
	$sesion = new sesion();
	$usuario = $sesion->get("usuario");
	
	require('Class/Facturas.class.php');
	$objFacturas=new Facturas;
		
	if(isset($_POST['submit']))
	 if (isset($_POST['Tipo']))	{
	   if ($_POST['Tipo'] == 'Pendientes') {
			//<!-- Table goes in the document BODY -->
echo"<table class='altrowstable' id='alternatecolor'>
<tr>
	<th>#Fac</th><th>Fecha Vencimiento</th><th>Vencida</th><th>CardCode</th><th>CardName</th><th>DocTotal</th><th>Saldo</th><th>Ver Pagos</th>
</tr>";
//setlocale(LC_MONETARY, 'en_US');
			$FacturasCanceladas = $objFacturas->ObtieneFacturasPendientes($usuario);
			if($FacturasCanceladas){
				$SaldoTotal = 0;
				$TotalFactura = 0;
				$EstadoFactura = "NO";
		 		while( $Facturas = mysql_fetch_array($FacturasCanceladas) ) {
					
					if($Facturas['FechaVencimiento'] <= date("Y-m-d") )
						   { $EstadoFactura = "SI";}
							 else 
							{ $EstadoFactura =  "NO";}
					
				  echo "
				  <tr>
					<td>". $Facturas['DocNum']."</td>
					<td>". $Facturas['FechaVencimiento'] ."</td>
					<td>".$EstadoFactura."</td>
					<td>". $Facturas['CardCode']."</td>
					<td>". $Facturas['CardName']."</td>
					<td>". number_format($Facturas['DocTotal'], 2) ."</td>
					<td>". number_format($Facturas['SALDO'], 2) . "\n" ."</td>
					<td><a  id='IrPagos' href='javascript:MostrasPagosAFactura(". $Facturas['DocNum'].");'>Ver Pagos</a></td>
				  </tr>";
				  $SaldoTotal +=  $Facturas['SALDO'];
				  $TotalFactura +=$Facturas['DocTotal'];
			 		}
					
				echo "
				  <tr>
				  <td colspan='5' align='center'>TOTAL</td>
					
					<td>". number_format($TotalFactura, 2)  ."</td>
					<td>". number_format($SaldoTotal, 2) ."</td>
					<td></td>
				  </tr>";
				
				}
		  }
		}
	 echo "</table>";
?>