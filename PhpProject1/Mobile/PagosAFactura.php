
<?php 
	require_once("Class/sesion.class.php");
	$sesion = new sesion();
	$usuario = $sesion->get("usuario");
	
	require('Class/Facturas.class.php');
	$objFacturas=new Facturas;
	
	
	if(isset($_POST['submit']))
			
     if (isset($_POST['Factura']))	{
		
         $Factura = $_POST['Factura'];
			//<!-- Table goes in the document BODY -->
			echo"
			<a id='IrPagos' href='javascript:ObtieneFacturasPendientes();' class='ClassBotones'>Regresar</a></td>";
echo"<table class='altrowstable' id='alternatecolor'>
<tr>
	<th>#</th>
	<th>Fecha</th>
	<th>#Fac</th>
	<th>Fecha de Fac</th>
	
	<th>Pagado</th>
	<th>Saldo</th>
</tr>";
//setlocale(LC_MONETARY, 'en_US');
			$FacturasCanceladas = $objFacturas->ObtienePagosEfectuados( $Factura);
			if($FacturasCanceladas){
				$TotalPagado = 0;
				$TotalSaldo = 0;
		 		while( $Facturas = mysql_fetch_array($FacturasCanceladas) ) {
			  echo "
			  <tr>
			 	
				<td>". $Facturas['DocNum']."</td>
				<td>". $Facturas['Fecha de Pago']."</td>
				<td>". $Facturas['#Factura']."</td>
				<td>". $Facturas['Fecha de Factura']."</td>
				
				<td>".number_format($Facturas['Monto Pagado'], 2)   ."</td>
				<td>". number_format($Facturas['SALDO'], 2)   . "\n" ."</td>
				
			  </tr>";
			  
			  $TotalPagado +=$Facturas['Monto Pagado'];
			  $TotalSaldo += $Facturas['SALDO'];
			 }
			 
			  echo "
			  <tr>
			 	<td colspan='4' align='center'>TOTAL</td>
				<td>". number_format($TotalPagado, 2)  ."</td>
				<td>". number_format($TotalSaldo, 2)   ."</td>
				
			  </tr>";
			 }
		 
		  
		  
		}
	 echo "</table>";
?>
