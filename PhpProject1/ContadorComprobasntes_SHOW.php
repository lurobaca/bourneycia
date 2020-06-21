<?php 
	require('Class/ContadorComprobantes.php');
$obj_CuentaComprobantes=new CuentaComprobantes();

	//if(isset($_POST["submit"])){
		


			//if($_POST["Accion"] =="ConsultaConteos"){
			$Carrito=$obj_CuentaComprobantes->ConsultaConteos();
			$cont = 0;
			$MES = "";
			$MostroTotal = 0;
			$MES_ANTERIOR = "";
	    	echo"<table class='altrowstable' id='alternatecolor' align='center'>
				<tr>
				<th>Año</th>
				<th>Mes</th>
				<th>Cedula</th>
				<th>Nombre</th>
				<th>Tipo</th>
				<th>Conteo</th>
			
			   ";
			   
			if($Carrito){
					while( $Articulos = mysqli_fetch_array($Carrito, MYSQLI_ASSOC) ) {
						$MES=$Articulos['Mes'];
 					   if($MES<>$MES_ANTERIOR && $cont==0){
							$MES_ANTERIOR=$MES;
						}
					  	echo "
						  <tr id='".$Articulos['Emisor_NumeroCedula']."'>
						   <td ><input name='Mes' type='text' class='Cant' value='". $Articulos['Ano']."' /></td>
						     <td ><input name='Mes' type='text' class='Cant' value='". $Articulos['Mes']."' /></td>

						   <td ><input name='Emisor_NumeroCedula' type='text' class='Cant' value='". $Articulos['Emisor_NumeroCedula']."' /></td>
						   <td ><input name='Emisor_Nombre' type='text' class='Cant' value='". $Articulos['Emisor_Nombre']."' /></td>
						   <td ><input name='Tipo' type='text' class='Cant' value='". $Articulos['Tipo']."' /></td>
						   <td ><input name='Conteo' type='text' class='Cant' value='". $Articulos['Cantidad']."' /></td>
			              </tr>";
					if($MES<>$MES_ANTERIOR ){
							$MES_ANTERIOR=$MES;
							 echo "
					<tr id='Total'><td colspan='5'  type='text' class='Cant'>TOTAL DEL MES DE ".$MES."</td><td >".$cont."</tr>
					 </table>
					 </br>
								 </br>";
								 $cont="0";
								 $MostroTotal=1;

						}
					 $cont=$cont+$Articulos['Cantidad'];
					 }

					if($MostroTotal==0){
					 echo "
					<tr id='Total'><td colspan='5'  type='text' class='Cant'>TOTAL DEL MES DE ".$MES."</td><td >".$cont."</tr>
					 </table>
					 </br>
								 </br>";
								 }
			}
			/*}
			}*/
			

	?>