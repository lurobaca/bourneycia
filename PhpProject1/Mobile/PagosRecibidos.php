<?php 
  if(isset($_POST['#FAC']))
  		{
			$Factura = $_POST['#FAC'];
	?>

<section>
  <article>
	<!--este over es el que esta encima del cuadro de fondo oscuto-->  
	<div id="overFac" class="overbox" style="display: none;">
    overFac 
      <a href="javascript:hideLightboxFac();">cerrar ventana</a>
<?php 
	require_once("Class/sesion.class.php");
	$sesion = new sesion();
	$usuario = $sesion->get("usuario");
	
	require('Class/Facturas.class.php');
	$objFacturas=new Facturas;
		
	if(isset($_POST['submit']))
	   if (isset($_POST['Tipo']))	{
		 if ($_POST['Tipo'] == 'Canceladas') {
			//<!-- Table goes in the document BODY -->
			echo"<table class='altrowstable' id='alternatecolor'>
				<tr>
					<th>#Pago</th>
					<th>Fecha Pago</th>
					<th>#Factura</th>
					<th>Fecha de Factura</th>
					<th>Estado</th>
					<th>Cod cliente</th>
					<th>Nombre</th>
					<th>Monto Pagado</th>
				</tr>";
//setlocale(LC_MONETARY, 'en_US');
			$FacturasCanceladas = $objFacturas->ObtienePagosEfectuados($Factura);
			if($FacturasCanceladas){
		 		while( $Facturas = mysql_fetch_array($FacturasCanceladas) ) {
				  echo "
				  <tr>
					<td>". $Facturas['DocNum']."</td>
					<td>". $Facturas['Fecha de Pago']."</td>
					<td>". $Facturas['#Factura']."</td>
					<td>". $Facturas['Fecha de Factura']."</td>
					<td>". $Facturas['Estado']."</td>
					<td>". $Facturas['Cod Cliente']."</td>
					<td>". $Facturas['Nombre Cliente']."</td>
					<td>". money_format('%i', $Facturas['Monto Pagado']) ."</td>
					<td><a id='IrPagos' href='javascript:showLightboxFac();'>VER</a></td>
				  </tr>";
				 }}
		  }
	    if ($_POST['Tipo'] == 'Pendientes')
		   echo "DATOS DE FACTURAS PENDIENTES ".$_POST['Tipo']. "  cliente : ". $usuario;
		}
		
	 echo "</table>";
	 
	 	}
	
?>

</div>


	</div>  
</div>

<!--este Fade es el cuadro oscuro de fondo-->
<div id="fadeFac" class="fadebox" style="display: none;" >&nbsp;</div>

 </article>
   	</section>