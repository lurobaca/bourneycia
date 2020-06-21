<?php 
	require('Class/Carrito.class.php');
	$objCarrito=new Carrito;
    $DocTotal = 0;
	 $IVITotal = 0;
	 $DescTotal = 0;
	if(isset($_POST["submit"])){
		//Cuenta los articulos en carrito
		if($_POST["Accion"] =="RUTERO"){
			$objCarrito->ObtieneRutero($_POST["CardCode"]);
			}
		//Cuenta los articulos en carrito
		if($_POST["Accion"] =="CUENTAPEDIDOSPRONTOAFACTURAR"){
			$objCarrito->CuentaPedidosProntoAFacturar($_POST["CardCode"]);
			}
	     if($_POST["Accion"] =="DETALLE_PEDIDOSPRONTOAFACTURAR"){
			$objCarrito->DetallePedidosProntoAFacturar($_POST["CardCode"],$_POST["NumPedido"]);
			}
		//Cuenta los articulos en carrito
		if($_POST["Accion"] =="CUENTAARTICULOS"){
			$objCarrito->CuentaUnidades($_POST["CardCode"]);
			}
				//Suma Total del pedido
		if($_POST["Accion"] =="SUMATOTAL"){
			$objCarrito->SumaTotal($_POST["CardCode"]);
			}
				
		if($_POST["Accion"] =="INSERTAR"){
			//debe seleccionar todos los datos de la linea a agregar para agregar todos los datos a la tabla rutero
			
			
				$ItemCode=$_POST['ItemCode'];
				$codbarras=$_POST['codbarras'];
				$ItemName=$_POST['ItemName'];
				$existencia=$_POST['existencia'];
				$lotes=$_POST['lotes'];
				$Unidad=$_POST['Unidad'];
				$precio=$_POST['precio'];
				$PrchseItem=$_POST['PrchseItem'];
				$SellItem=$_POST['SellItem'];
				$InvntItem=$_POST['InvntItem'];
				$AvgPrice=$_POST['AvgPrice'];
				$Price=$_POST['Price'];
				$frozenFor=$_POST['frozenFor'];
				$SalUnitMsr=$_POST['SalUnitMsr'];
				$VATLiable=$_POST['VATLiable'];
				$lote=$_POST['lote'];
				$U_Grupo=$_POST['U_Grupo'];
				$SalPackUn=$_POST['SalPackUn'];
				$FAMILIA=$_POST['FAMILIA'];
				$CATEGORIA=$_POST['CATEGORIA'];
				$MARCA=$_POST['MARCA'];
				$CardCode=$_POST['CardCode'];
				$Disponible=$_POST['Disponible'];
				$U_Gramaje=$_POST['U_Gramaje']; 
				$DETALLE_1=$_POST['DETALLE_1'];
				$LISTA_A_DETALLE=$_POST['LISTA_A_DETALLE'];
				$LISTA_A_SUPERMERCADO=$_POST['LISTA_A_SUPERMERCADO'];
				$LISTA_A_MAYORISTA=$_POST['LISTA_A_MAYORISTA'];
				$LISTA_A_2_MAYORISTA=$_POST['LISTA_A_2_MAYORISTA'];
				$PANALERA=$_POST['PANALERA'];
				$SUPERMERCADOS=$_POST['SUPERMERCADOS'];
				$MAYORISTAS=$_POST['MAYORISTAS'];
				$HUELLAS_DORADAS=$_POST['HUELLAS_DORADAS'];
				$ALSER=$_POST['ALSER'];
				$COSTO=$Articulos['COSTO'];
				$PRECIO_SUGERIDO=$Articulos['PRECIO_SUGERIDO'];
				$PuntosWeb=$Articulos['PuntosWeb'];
				$Ranking=$Articulos['Ranking'];
				$CodCliente=$_POST['CodCliente'];
		
			
			
			
	   	 echo $objCarrito->Agrega($_POST["ItemCode"],$_POST["Descripcion"],$_POST["cantidad"],$_POST["Precio"],$_POST["Total"],$_POST["CardCode"],$_POST["Agente"],$_POST["ComdicionPago"],$_POST["Fecha"],$_POST["Impuesto"],$_POST["MontoImpuesto"],$_POST["Descuento"],$_POST["MontoDescuento"],$ItemCode,$codbarras,$ItemName,$existencia,$lotes,$Unidad,$precio,$PrchseItem,$SellItem,$InvntItem,$AvgPrice,$Price,$frozenFor,$SalUnitMsr,$VATLiable,$lote,$U_Grupo,$SalPackUn,$FAMILIA,$CATEGORIA,$MARCA,$CardCode,$Disponible,$U_Gramaje, $DETALLE_1,$LISTA_A_DETALLE,$LISTA_A_SUPERMERCADO,$LISTA_A_MAYORISTA,$LISTA_A_2_MAYORISTA,$PANALERA,$SUPERMERCADOS,$MAYORISTAS,$HUELLAS_DORADAS,$ALSER,$COSTO,$PRECIO_SUGERIDO,$PuntosWeb,$Ranking,$CodCliente);
		 
		 
		 		
		 exit;
		}
		
		if($_POST["Accion"] =="ELIMINAR"){
			$objCarrito->EliminaAunArticulo($_POST["Codarticulo"],$_POST["CardCode"]);	
		}
		if($_POST["Accion"] =="ELIMINARTODO"){
			$objCarrito->EliminaCarrito($_POST["CardCode"]);	
		}
	if($_POST["Accion"] =="MOSTRAR"){
			$Carrito=$objCarrito->Muestra($_POST["CardCode"]);	
			$cont = 0;
	    	echo"<table class='altrowstable' id='alternatecolor' align='center'>
				<tr>
				<th>Foto</th>
				<th>Cantidad</th>
				<th>CodArticulo</th>
				<th>Descripcion</th>
				<th>%Descuento</th>
				<th>Monto Descuento</th>
				<th>IV</th>
				<th>Monto IV</th>
				<th>Precio</th>
				<th>Total</th>
				<th>Accion</th>
			   </tr>";
			   
			if($Carrito){
			while( $Articulos = mysql_fetch_array($Carrito) ) {
				
		  	echo "
			  <tr id='".$Articulos['CodArticulo']."'>
			    <td>";
							
				    if (file_exists("img/Articulos/".trim($Articulos['CodArticulo']).".jpg")) {
   						 echo" <img src='img/Articulos/".trim($Articulos['CodArticulo']).".jpg'  width='150' height='109' alt='".$ItemName."' >";
					} else {
   						 echo"<img src='img/General/SinImagenDisponible.jpg' width='150' height='109' alt='SinImagenDisponible'>";
						}
				
				echo"
				
				<td ><input name='Cant' id='Canti_". $Articulos['CodArticulo']."' type='text' class='Cant'  
				onkeypress='ValidaSoloNumeros(\"Canti_". $Articulos['CodArticulo'] ."\",\"". $Articulos['CodArticulo'] ."\",\"" . $Articulos['Descripcion'] ."\",\"1\",\"" .number_format($Articulos['Precio'], 2)  ."\",\"" .$Articulos['Total']."\",\"".$_POST["CardCode"]."\",\"25\",\"". $Articulos['CondicionPago'] ."\",\"".$Articulos['Fecha'] ."\",\"".$Articulos['Impuesto']."\",\"".$Articulos['MontoImpuesto']."\",\"".$Articulos['Descuento']."\",\"".$Articulos['MontoDescuento']."\");'
				 value='". $Articulos['Cantidad']."' /></td>
				 
				<td>". $Articulos['CodArticulo']."</td>
				<td>". $Articulos['Descripcion']."</td>
				<td>".number_format($Articulos['Descuento'], 2)."</td>
				<td>".number_format($Articulos['MontoDescuento'], 2)."</td>
				<td>".number_format($Articulos['Impuesto'], 2)."</td>
				<td>".number_format($Articulos['MontoImpuesto'], 2)."</td>
				
				<td >". number_format($Articulos['Precio'], 2)   ."</td>
				
				<td id='TotaLinea_".$Articulos['CodArticulo']."'>". number_format($Articulos['Total'], 2)   . "\n" ."</td>
				<td>
					<a  id='Eliminar' class='ClassBotones' style='width:250px;' href='javascript:EliminaArticuloCarrito(\"Cant_". $Articulos['CodArticulo'] ."\",\"". $Articulos['CodArticulo']."\",\"" . $Articulos['Descripcion'] ."\",\"1\",\"" .$Articulos['Precio']  ."\",\"" .$Articulos['Total']."\",\"".$_POST["CardCode"]."\",\"25\",\"".  $Articulos['CondicionPago'] ."\",\"". $Articulos['Fecha'] ."\",\"".$Articulos['Impuesto']."\",\"".$Articulos['MontoImpuesto']."\",\"".$Articulos['Descuento']."\",\"".$Articulos['MontoDescuento']."\",\"Carrito\");'>ELIMINAR</a>
					 </br>
					 </br>
					 
								
								 
								 
<a id='Actualizar' class='ClassBotones' style='width:250px;' href='javascript:ActualizarArticuloCarrito(\"Cant_". $Articulos['CodArticulo'] ."\",\"". $Articulos['CodArticulo'] ."\",\"" . $Articulos['Descripcion'] ."\",\"1\",\"" .$Articulos['Precio']  ."\",\"" .$Articulos['Total']."\",\"".$_POST["CardCode"]."\",\"25\",\"".  $Articulos['CondicionPago'] ."\",\"". $Articulos['Fecha'] ."\",\"".$Articulos['Impuesto']."\",\"".$Articulos['MontoImpuesto']."\",\"".$Articulos['Descuento']."\",\"".$Articulos['MontoDescuento']."\",\"Carrito\");'>MODIFICAR</a>
				</td>
			  </tr>";
			
			  $DocTotal = $DocTotal +  $Articulos['Total'];
			  $IVITotal =  $IVITotal + $Articulos['MontoImpuesto'];
	          $DescTotal = $DescTotal + $Articulos['MontoDescuento'];
			  
			// $DocTotal = $objCarrito->formatcurrency( $DocTotal);
			 }}
		
		 echo "<tr>
		 		<td colspan='5'>TOTAL</td>
				
				<td id='TotalDescuento".$_POST["CardCode"]."'>". number_format($DescTotal, 2)." </td>
				<td></td>
				<td id='TotalImpuesto".$_POST["CardCode"]."'>". number_format( $IVITotal, 2)." </td>
				<td></td>
		 		<td id='TotalGeneral_".$_POST["CardCode"]."'>". number_format($DocTotal, 2)."</td>
				 </tr>
		 </table></br>
					 </br>";
		 }
		 
		 
		 //Cuenta los articulos en carrito
		if($_POST["Accion"] =="ACTUALIZACARRITO"){
			$objCarrito->ActualizaLineaCarrito($_POST["CardCode"],$_POST["Cantidad"],$_POST["Codarticulo"],$_POST["Total"]);
			}
			
			
		 //enviara el pedido
		 if($_POST["Accion"] =="ENVIAR"){
			 
			 //Primero debemos recorrer el contenido del carrito , ya que se debe dividir en pedidos de 19 lineas por el espacio de la factura fisica
			 $Carrito=$objCarrito->Muestra($_POST["CardCode"]);
			 	
			 $CuentaLineas = 0;
			  $AgregoEncabezado = false;
			  
			  $NumPedido = "0";
			  
			 if($Carrito){
				 $TotalPedido = 0;
				 $NumPedido=0;
				
				while($Articulos = mysql_fetch_array($Carrito) ) {
					 $CuentaLineas+=1;
					
					//deberiamos agregar las lineas al rutero aqui
					$objCarrito->InsertarAlRutero($Articulos['CodArticulo'], $Articulos['CardCode']);
					
					  
					 //Calcula Total pedido
					 if($Articulos['Impuesto']==13)
   						$TotalPedido = $TotalPedido +(($Articulos['Precio']*1.13)*$Articulos['Cantidad'])-$Articulos['MontoDescuento'];
				     else
						$TotalPedido = $TotalPedido +($Articulos['Cantidad']*$Articulos['Precio'])-$Articulos['MontoDescuento'];
					
					 if($AgregoEncabezado==false  ){
						$CuentaLineas=1;
						
						//inserta El encabezado en la tabla que controla que no se repitan los consecutivos
						 $objCarrito->AgregaEncabezadoPedido( $Articulos['CardCode'],$Articulos['Fecha'],$Articulos['CondicionPago'],$Articulos['Agente'],"0");
						$AgregoEncabezado=true;
						
						//obtiene el consecutivo del pedido insertado en el encabezado 
						$NumPedido= $objCarrito->ObtieneNumPedido( $Articulos['CardCode']);
						
						}
					
					  //se envia el consecutivo para relacionar el detalle con el encabezado
					 echo $objCarrito->AgregaDetallePedido($NumPedido,$Articulos['CodArticulo'] ,$Articulos['Descripcion'],$Articulos['Cantidad'] ,$Articulos['Precio'],$Articulos['Descuento'] ,$Articulos['MontoDescuento'] ,$Articulos['MontoImpuesto']);
					
					
					//INSERTA EN TABLA PEDIDOS SOLICITADOS
					$objCarrito->AgregaPedidosProntosAFacturar( $Articulos['CardCode'],$Articulos['Fecha'],$Articulos['CondicionPago'],$Articulos['Agente'],"0","00".$NumPedido,$Articulos['CodArticulo'] ,$Articulos['Descripcion'],$Articulos['Cantidad'] ,$Articulos['Precio'],$Articulos['Descuento'] ,$Articulos['MontoDescuento'] ,$Articulos['Impuesto'] ,$Articulos['MontoImpuesto']);
					
						$objCarrito->AgregaLineaA_In_Pedid($Articulos['CardCode'],$Articulos['Fecha'],$Articulos['CondicionPago'],$Articulos['Agente'],"0",$NumPedido,$Articulos['CodArticulo'] ,$Articulos['Descripcion'],$Articulos['Cantidad'] ,$Articulos['Precio'],$Articulos['Descuento'] ,$Articulos['MontoDescuento'] ,$Articulos['MontoImpuesto']);
						
						$objCarrito->EliminaAunArticulo($Articulos['CodArticulo'],$Articulos['CardCode']);
					  $objCarrito->EliminaDetallePedido("\"".$NumPedido."\"","\"".$Articulos['CodArticulo']."\"");
					 if($CuentaLineas==19){
						//Debe mandar a inserta un nuevo encabezado de pedido ya que se alcanso el limite de 19 lineas por pedido
					   $AgregoEncabezado=false;
					  }
					  
					   
					  //Actualiza el MontoTotal Pedido en Pedidos prontos a Facturar
					  $objCarrito->ActualizaTotalPedidoProntoAFActurar($_POST["CardCode"],$NumPedido,$TotalPedido);
					  
					 $objCarrito->EliminaEncabezadoPedido($_POST["CardCode"]);
					//agrega la linea al rutero en caso de no existir
					$objCarrito->IngresarARutero($_POST["CardCode"],$_POST["CodArticulo"],$Articulos['Descripcion']);
					
					$Mensaje =$Mensaje." [ ".$Articulos['Cantidad']." ] , [ ".$Articulos['CodArticulo']." ] , [ ".$Articulos['Descripcion']." ] \n\n";
				 }//fin while
				 $objCarrito->EnviaCorreoNotificadora($_POST["CardCode"],$NumPedido,$Mensaje);
				 $Mensaje="";
					 // $objCarrito->ObtieneDiaEntrega("\"".$_POST["CardCode"]."\"");
					  $DiaVisita=$objCarrito->ObtieneDiaVisita($_POST["CardCode"]);
				 
				 
			   }
			    echo "
				 <div style='background-color:#FF6702;box-shadow: 5px 5px 15px #333333;height:40px; padding:5px; border-radius:5px;color:#FFFFFF;
 text-decoration:none; font-family:sans-serif; font-weight:bold;border-bottom:thin solid #CCCCCC;' align='center'>
				<H1 >INFORMACION DE SU PEDIDO</H1>
				</DIV>
				<p><strong>Su Numero de pedido es[".$NumPedido."]</strong> </br></br>
						 Sera entregado aproximadamente de 24 a 48 Horas despues de su dia de visita [ ".$DiaVisita." ] </br>
						
						 Si desea Cancelar este pedido debera llamar al 2669-6103 he indicar el numero del pedido a cancelar</p>
				</br>
				<a class='ClassBotones' href='../MiCuenta.php?Tap=3'>He visto mi numero de pedido</a>";
			}//FIN  if($_POST["Accion"] =="ENVIAR")
		 
	}else echo "NO SE PUDO MOSTRAR EL CARRITO";

?>