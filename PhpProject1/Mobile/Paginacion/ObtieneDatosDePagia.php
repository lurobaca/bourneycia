<?php
	try{
		include("Pagina.php");
		
		require('../Class/Articulos.class.php');
		$objArticuloso=new Articulos;
		
		require('../Class/Carrito.class.php');
		$objCarrito=new Carrito;
		require('../Class/Usuarios.class.php');
        
	    /*Obtiene la lista de precio segun cliente*/
		$objUsuarios=new Usuarios;
		$objArticulos=new Paginas;
		require_once("../Class/sesion.class.php");
	    $sesion = new sesion();
     	$user = $sesion->get("usuario");
			 
				//Verifica si hay o no que mostrar las fotos
			if($objArticuloso->SELECTOcultaMuestraFotos($user)==1)
				 $MostrarFotos = "SI";
			 else
			  	$MostrarFotos = "NO";
			 
		try{
	    	if ($user <> "0")
				$user = trim($_POST['usuario']);
			else $user = "";
		
			if ($user <> "0"){
				$PrecioSegunCliente=$objUsuarios->Precio_SegunCliente ($user);
				$ComdicionPagoSegunCliente=$objUsuarios->ComdicionPago_SegunCliente($user);
           		 if (isset($ComdicionPagoSegunCliente)) {
			    	$CondPago = mysql_fetch_array($ComdicionPagoSegunCliente);
					$CPago = $CondPago['GroupNum'];
					}
			
				  /*------------------ verifica si hay facturas vencidas ---------------------*/
		 // $HayFacVencidas = "NO";
    	 try{
   			$HayFacVencidas ="NO";
   			require('../Class/Facturas.class.php');
			$objFacturas=new Facturas;
			$FacturasCanceladas = $objFacturas->ObtieneFacturasPendientes($user);
			if($FacturasCanceladas){			
		 		while( $Facturas = mysql_fetch_array($FacturasCanceladas) ) {
						if($Facturas['FechaVencimiento'] <=date("Y-m-d") )
							$HayFacVencidas = "SI";	
										
				    }
			}else
				echo "SIN FACTUA";
			 }catch(Exception $e){ echo "Error login";}
				
				  /*------------------ FIN verifica si hay facturas vencidas ---------------------*/
				
				
				
				}
			else  {
				 $Precio = "";
				 }
				 
	      }catch(Exception $e)
	         { echo "Error login";}
	
 

 
	//$FilasAMostrarXPagina con esto indicamos el numero de finas a mostrar x pagina , este valor tambine se usa como el LIMIT dek SELECT * FROM Articulos LIMIT 50
	$FilasAMostrarXPagina = 25;

/*Si se envia page es por que se desea mostrar los siguientes 10 link de paginas*/
	if($_POST['LimiteINICIO']){
		$LimiteINICIO = $_POST['LimiteINICIO'];
		$LimiteFIN  =  $_POST['LimiteFIN'];
	}else{
		$Cont = 1;
		$MaxPaginasAMostrar = 10;
		$LimiteINICIO =0 ;
		$LimiteFIN  =  $FilasAMostrarXPagina;
	}
	
  
	  /*Busqeuda por Descipcion*/
  if ($_POST['DESCRIPCION']<>""){
	  /*Se esta haciendo una busqueda de productos*/
	  $DESCRIPCION = htmlspecialchars_decode($_POST['DESCRIPCION']);
	  
	 /* $miCadena  =  $DESCRIPCION;
      $piezas = explode(" ", $miCadena);*/
		 
		 //define si muestra los datos del rutero o todos los articulos
		  if ($_POST['Rutero']=="MostrarRutero")
	     $result=$objArticulos->mostrar_Rutero($user,$LimiteINICIO,$LimiteFIN);
		 else
      $result=$objArticulos->mostrar_Articulo($DESCRIPCION,$LimiteINICIO,$LimiteFIN);
        
		
	  //$result=$objArticulos->mostrar_Articulo($DESCRIPCION);
	 	
	   }
  else{
	  /*se estan pasando las paginas*/
	   if ($_POST['Rutero']=="MostrarRutero")
	     $result=$objArticulos->mostrar_Rutero($user,$LimiteINICIO,$LimiteFIN);
		 else
	  $result=$objArticulos->ConsultaDatosdePagina($LimiteINICIO,$LimiteFIN);
	 
	  }
    

	//$FilasObtenidas = mysql_num_rows($result);
	$Precio = 0;
	$CondPago = 0;
	/*estos campos de descuento obtendra los descuentos de la lista de descuentos especiales*/
	$Descuento = 0;
	$MontoDescuento = 0;
    if($result){
		
		//Controla el mostrar o ocultar fotos
		echo "<div id='OcultMuestraFoto' style='margin-Top:5px;'>";
			if(trim($_SESSION ['usuario']) <> "")
				{
				if($objArticuloso->SELECTOcultaMuestraFotos(trim($_SESSION ['usuario']))==1   )
					{
  echo "<a href='#' style='padding-top:5px; border: 1px solid #fbcb09; background:  #F90;  border-radius:5px; font-weight: bold; font-size:14px; color:  #FFF; height:25px; width:95%; zoom:1;float:left; margin-bottom:5px; text-decoration:none; text-align:center;' onclick=\"OcultaMuestraFotos(";if (trim($_SESSION ['usuario']) <> "")
								  echo trim("'".$_SESSION ['usuario']."'"); 
							 else 
							     echo "0"; 
							echo ",'Ocultar'); return false\">Ocultar Fotos</a>";
	
}
else
{
echo "<a href='#' style='padding-top:5px; border: 1px solid #fbcb09; background:  #F90;  border-radius:5px; font-weight: bold; font-size:14px; color:  #FFF; height:25px; width:95%; zoom:1;float:left; margin-bottom:5px; margin-left:4px; text-decoration:none; text-align:center;' onclick=\"OcultaMuestraFotos(";if (trim($_SESSION ['usuario']) <> "")
								  echo trim("'".$_SESSION ['usuario']."'"); 
							  else 
							    echo "0"; 
						echo ",'Mostrar'); return false\">Ver Fotos</a>";
	
}}
echo "</div> ";

		
		
		
		
		
		
		  while( $Articulos = mysql_fetch_array($result) ) {
		    
			  /*Si el cliente esta loqueado se obtiene la lista de precio y con base a esta se selecciona el precio de la linea*/
			  if (isset($PrecioSegunCliente))
			     {
                 if($PrecioSegunCliente)
				    { 
				   	 $ListNum = mysql_fetch_array($PrecioSegunCliente);
					 if ($ListNum['ListNum'] = 1){ //1 =	DETALLE 1
					   	$Precio = number_format($Articulos['DETALLE 1'], 2, ",", "");
					    }
					  else if ($ListNum['ListNum'] = 2){ //2	 = LISTA A DETALLE
					    $Precio = number_format($Articulos['LISTA A DETALLE'], 2, ",", "");
					   }
					  else if ($ListNum['ListNum'] = 3){ //3	 = LISTA A SUPERMERCADO/
					    $Precio = number_format($Articulos['LISTA A SUPERMERCADO'], 2, ",", "");
					   }
					  else if ($ListNum['ListNum'] = 4) { //4	 = LISTA A MAYORISTA
					    $Precio = number_format($Articulos['LISTA A MAYORISTA'], 2, ",", "");
					   }
					  else if ($ListNum['ListNum'] = 5) { //5	 = LISTA A + 2% MAYORISTA
					    $Precio = number_format($Articulos['LISTA A + 2% MAYORISTA'], 2, ",", "");
					   }
					  else if ($ListNum['ListNum'] = 6) {//6	 = PAÑALERA
					    $Precio = number_format($Articulos['PANALERA'], 2, ",", "");
					   }
					  else if ($ListNum['ListNum'] = 7){//7	 = SUPERMERCADOS
					    $Precio = number_format($Articulos['SUPERMERCADOS'], 2, ",", "");
					   }
					  else if ($ListNum['ListNum'] = 8){//8	 = MAYORISTAS
					    $Precio = number_format($Articulos['MAYORISTAS'], 2, ",", "");
					   }
					  else if ($ListNum['ListNum'] = 9){//9	 = HUELLAS DORADAS
					    $Precio = number_format($Articulos['HUELLAS DORADAS'], 2, ",", "");
					   }
					  else if ($ListNum['ListNum'] = 10){//10 = ALSER
					    $Precio = number_format($Articulos['ALSER'], 2, ",", "");
					   }
					  else if ($ListNum['ListNum'] = 11){ //11 = COSTO
					    $Precio = number_format($Articulos['COSTO'], 2, ",", "");
					   }
					  else if ($ListNum['ListNum'] = 12){//12 = PRECIO SUGERIDO
					    $Precio = number_format($Articulos['PRECIO SUGERIDO'], 2, ",", "");
					   }
					   
					   
                    }//FIN DE IF PrecioSegunCliente
					
					
				}//FIN DE IF if (isset($PrecioSegunCliente))
			  
			  
			  //aplica el impuesto al precio si la linea esta sugeta a impuesto
			if ($Articulos['VATLiable'] == 'Y')
					    {
							// $Precio = $Precio*1.13;
							$TotalLinea = (($Precio*1.13)*$Cantidad)-$MontoDescuento;
							 
							 $Impuesto = 13;
							$MontoImpuesto = ($TotalLinea*13)/100;
						}else
						{
							$TotalLinea = ($Precio*$Cantidad) -$MontoDescuento;
						 $Impuesto = 0;
					     $MontoImpuesto = 0.0;
						}
						
			  if (isset($Articulos['ItemCode']))
			  		$ItemCode = $Articulos['ItemCode'];
			  else
					$ItemCode = "";
					
			  if (isset($Articulos['ItemName']))
			 		$ItemName = $Articulos['ItemName'];
			  else
					$ItemName = "";
					
			  if (isset($Articulos['codbarras']))
			   		$codbarras = $Articulos['codbarras'];
			  else
					$codbarras = "";
					
			  if (isset($Articulos['existencia']))
			    	  $existencia = $Articulos['existencia'];
			  else
					$existencia = "";
			 
			 if (isset($Articulos['U_Gramaje']))
			    	  $U_Gramaje = $Articulos['U_Gramaje'];
			  else
					$U_Gramaje = "";
					
					
			if (isset($Articulos['codbarras']))
					  		$codbarras=$Articulos['codbarras'];
						 else
							$codbarras = "";		
					 
					   if (isset($Articulos['existencia']))
						  $existencia=$Articulos['existencia'];
						   else
							$existencia = "";
					
					   if (isset($Articulos['lotes']))
						  $lotes=$Articulos['lotes'];
						   else
						  $lotes = "";
					
					   if (isset($Articulos['Unidad']))
						  $Unidad=$Articulos['Unidad'];
						   else
							$Unidad = "";
					
					   if (isset($Articulos['precio']))
						  $precio=$Articulos['precio'];
						   else
							$precio = "";
					
					   if (isset($Articulos['PrchseItem']))
						  $PrchseItem=$Articulos['PrchseItem'];
						   else
							$PrchseItem = "";
					
					   if (isset($Articulos['SellItem']))
						  $SellItem=$Articulos['SellItem'];
						   else
							$SellItem = "";
										  
					   if (isset($Articulos['InvntItem']))
						  $InvntItem=$Articulos['InvntItem'];
						   else
							$InvntItem = "";
					
					   if (isset($Articulos['AvgPrice']))
						  $AvgPrice=$Articulos['AvgPrice'];
						   else
							$AvgPrice = "";
					
					   if (isset($Articulos['Price']))
						  $Price=$Articulos['Price'];
						   else
							$Price = "";
					
					   if (isset($Articulos['frozenFor']))
						  $frozenFor=$Articulos['frozenFor'];
						   else
							$frozenFor = "";
					
					   if (isset($Articulos['SalUnitMsr']))
						  $SalUnitMsr=$Articulos['SalUnitMsr'];
						   else
							$SalUnitMsr = "";
					
					   if (isset($Articulos['VATLiable']))
						  $VATLiable=$Articulos['VATLiable'];
						   else
							$VATLiable = "";
					
					   if (isset($Articulos['lote']))
						  $lote=$Articulos['lote'];
						   else
							$lote = "";
					
					   if (isset($Articulos['U_Grupo']))
						  $U_Grupo=$Articulos['U_Grupo'];
						   else
							$U_Grupo = "";
					
					   if (isset($Articulos['SalPackUn']))
						  $SalPackUn=$Articulos['SalPackUn'];
						   else
							$SalPackUn = "";
					
					   if (isset($Articulos['FAMILIA']))
						  $FAMILIA=$Articulos['FAMILIA'];
						   else
							$FAMILIA = "";
					
					   if (isset($Articulos['CATEGORIA']))
						  $CATEGORIA=$Articulos['CATEGORIA'];
						   else
							$CATEGORIA = "";
					
					   if (isset($Articulos['MARCA']))
						  $MARCA=$Articulos['MARCA'];
						   else
							$MARCA = "";
					
					   /*if (isset($Articulos['CardCode']))
						  $CardCode=$Articulos['CardCode'];
						   else*/
							$CardCode = trim($user);
					
					   if (isset($Articulos['Disponible']))
						  $Disponible=$Articulos['Disponible'];
						   else
							$Disponible = "";
					
					   if (isset($Articulos['U_Gramaje']))
						  $U_Gramaje=$Articulos['U_Gramaje'];
						   else
							$U_Gramaje = "";
					
					   if (isset($Articulos['DETALLE 1']))
						   $DETALLE_1=$Articulos['DETALLE 1'];
						    else
							$DETALLE_1 = "";
					
					    if (isset($Articulos['LISTA A DETALLE']))
						   $LISTA_A_DETALLE=$Articulos['LISTA A DETALLE'];
						    else
							$LISTA_A_DETALLE = "";
					
					    if (isset($Articulos['LISTA A SUPERMERCADO']))
						   $LISTA_A_SUPERMERCADO=$Articulos['LISTA A SUPERMERCADO'];
						    else
							$LISTA_A_SUPERMERCADO = "";
					
					    if (isset($Articulos['LISTA A MAYORISTA']))
						   $LISTA_A_MAYORISTA=$Articulos['LISTA A MAYORISTA'];
						    else
							$LISTA_A_MAYORISTA = "";
					
					    if (isset($Articulos['LISTA A + 2% MAYORISTA']))
						   $LISTA_A_2_MAYORISTA=$Articulos['LISTA A + 2% MAYORISTA'];
						    else
							$LISTA_A_2_MAYORISTA = "";
					
					    if (isset($Articulos['PANALERA']))
						   $PANALERA=$Articulos['PANALERA'];
						    else
							$PANALERA = "";
					
					    if (isset($Articulos['SUPERMERCADOS']))
						   $SUPERMERCADOS=$Articulos['SUPERMERCADOS'];
						    else
							$SUPERMERCADOS = "";
					
					    if (isset($Articulos['MAYORISTAS']))
						   $MAYORISTAS=$Articulos['MAYORISTAS'];
						    else
							$MAYORISTAS = "";
					
					    if (isset($Articulos['HUELLAS DORADAS']))
						   $HUELLAS_DORADAS=$Articulos['HUELLAS DORADAS'];
						    else
							$HUELLAS_DORADAS = "";
					
					    if (isset($Articulos['ALSER']))
						   $ALSER=$Articulos['ALSER'];
						    else
							$ALSER = "";
					
					    if (isset($Articulos['existencia']))
						   $COSTO=$Articulos['COSTO'];
						    else
							$COSTO = "";
					
					    if (isset($Articulos['PRECIO SUGERID']))
						   $PRECIO_SUGERIDO=$Articulos['PRECIO SUGERIDO'];
						    else
							$PRECIO_SUGERIDO = "";
					
					    if (isset($Articulos['PuntosWeb']))
						   $PuntosWeb=$Articulos['PuntosWeb'];
						    else
							$PuntosWeb = "";
					
					    if (isset($Articulos['Ranking']))
						   $Ranking=$Articulos['Ranking'];
						    else
							$Ranking = "";
					
							    
					   $CodCliente=$user;		
					
	
			echo "<article>";
			if ($user <> ""  )   
				    echo "<li id='fila-". $ItemCode ."' class='ProductoIndexLogiado'> ";
				else
				    echo "<li id='fila-". $ItemCode ."' class='ProductoIndex'> "; 
				
			echo "
		          <a style=' align='center' cursor:pointer;' onclick='IrADetalleProducto(\"". $ItemCode ."\",\"". $ItemName ."\",\"". $codbarras ."\",\"". $existencia ."\",\"" .$Precio."\",\"" .$U_Gramaje."\",\"" .trim($_POST['usuario'])."\",\"" .$TotalLinea."\",\"" .$CPago."\",\"" .date("Y-m-d")."\",\"" .$Impuesto."\",\"" .$MontoImpuesto."\",\"" .$Descuento."\",\"" .$MontoDescuento."\",\"".$ItemCode."\",\"".$codbarras."\",\"".$ItemName."\",\"".$existencia."\",\"".$lotes."\",\"".$Unidad."\",\"".$precio."\",\"".$PrchseItem."\",\"".$SellItem."\",\"".$InvntItem."\",\"".$AvgPrice."\",\"".$Price."\",\"".$frozenFor."\",\"".$SalUnitMsr."\",\"".$VATLiable."\",\"".$lote."\",\"".$U_Grupo."\",\"".$SalPackUn."\",\"".$FAMILIA."\",\"".$CATEGORIA."\",\"".$MARCA."\",\"".$CardCode."\",\"".$Disponible."\",\"".$U_Gramaje."\",\"".$DETALLE_1."\",\"".$LISTA_A_DETALLE."\",\"".$LISTA_A_SUPERMERCADO."\",\"".$LISTA_A_MAYORISTA."\",\"". $LISTA_A_2_MAYORISTA."\",\"".$PANALERA."\",\"".$SUPERMERCADOS."\",\"".$MAYORISTAS."\",\"".$HUELLAS_DORADAS."\",\"".$ALSER."\",\"".$COSTO."\",\"".$PRECIO_SUGERIDO."\",\"".$PuntosWeb."\",\"".$Ranking."\",\"".$CodCliente."\",\"".$HayFacVencidas."\") ;'>";
				  //segunda parte del contro de verificar si hay o no que mostrar la foto
				  if( $MostrarFotos == "NO" )
				  {
					  echo"<img src='img/General/SinImagenDisponible.jpg'  alt='CLICK AQUI PARA VER MAS INFORMACION DE ESTE PRODUCTO' title='CLICK AQUI PARA VER MAS INFORMACION DE ESTE PRODUCTO' >";
					  }
				  else
				  {
				  
				  
				  if (file_exists("../img/Articulos/".trim($ItemCode).".jpg")) {
   						 echo" <img src='img/Articulos/$ItemCode.jpg'   alt='CLICK AQUI PARA VER MAS INFORMACION DE ESTE PRODUCTO' title='CLICK AQUI PARA VER MAS INFORMACION DE ESTE PRODUCTO' >";
					} else {
   					
					echo"<img src='img/General/SinImagenDisponible.jpg'  alt='CLICK AQUI PARA VER MAS INFORMACION DE ESTE PRODUCTO' title='CLICK AQUI PARA VER MAS INFORMACION DE ESTE PRODUCTO' >";
						}
			}
				  echo"				 
        		  <div class='TituloArticulo'><strong>" . $ItemName ."</strong></div> 
				  </a> ";
				//Pregunta si es un usuario logueado y si este usuario no tiene facturas vencdas
				if ($user <> "" && $user <> "0" && $HayFacVencidas == "NO" ) 
					{ 
					 //verifica que ya alla sido agregado el articulo para ponerle el check de agregado
					$Cantidad = 0;
				     $Existe = 0; 
					 //Antes de agregar va a verificar si el articulo ya fue insertado
					 $valor = $objCarrito->VerificaArticuloRepetido(trim($ItemCode),trim($user));
					 if(mysql_num_rows($valor))	{	
						 $car = mysql_fetch_array($valor);
						 $Existe =$car['Existe'];
						 $Cantidad =$car['Cantidad'];
						 }
						 
					 if ($user <> ""  )   
				            echo "<div style='margin-top:0px;'>Precio : ".number_format($Precio, 2)."</div><br>";
				 
				
					
					echo "<Div id='btnAdd_".$ItemCode."'>";
					
					
						
					 if($Existe > 0 )
					 {  
					 echo "  <div class='Agregado'>
							<input name='Cant' id='Cant_". $ItemCode ."' type='text' class='Cant'  style='margin-top:-30px;'  placeholder='Digite AQUI la Cantidad' onkeypress='ValidaSoloNumeros(\"Cant_". $ItemCode ."\",\"". $ItemCode ."\",\"" . $ItemName ."\",\"1\",\"" .$Precio  ."\",\"" .$TotalLinea."\",\"".trim($user)."\",\"20\",\"".  $CPago ."\",\"". date("Y-m-d") ."\",\"".$Impuesto."\",\"".$MontoImpuesto."\",\"".$Descuento."\",\"".$MontoDescuento."\",\"".$ItemCode."\",\"".$codbarras."\",\"".$ItemName."\",\"".$existencia."\",\"".$lotes."\",\"".$Unidad."\",\"".$precio."\",\"".$PrchseItem."\",\"".$SellItem."\",\"".$InvntItem."\",\"".$AvgPrice."\",\"".$Price."\",\"".$frozenFor."\",\"".$SalUnitMsr."\",\"".$VATLiable."\",\"".$lote."\",\"".$U_Grupo."\",\"".$SalPackUn."\",\"".$FAMILIA."\",\"".$CATEGORIA."\",\"".$MARCA."\",\"".$CardCode."\",\"".$Disponible."\",\"".$U_Gramaje."\",\"".$DETALLE_1."\",\"".$LISTA_A_DETALLE."\",\"".$LISTA_A_SUPERMERCADO."\",\"".$LISTA_A_MAYORISTA."\",\"". $LISTA_A_2_MAYORISTA."\",\"".$PANALERA."\",\"".$SUPERMERCADOS."\",\"".$MAYORISTAS."\",\"".$HUELLAS_DORADAS."\",\"".$ALSER."\",\"".$COSTO."\",\"".$PRECIO_SUGERIDO."\",\"".$PuntosWeb."\",\"".$Ranking."\",\"".$CodCliente."\");' value='".$Cantidad."'  disabled />
								
								<div id='AccionesAgregado'>
								
								<a id='GardModifArt_". $ItemCode."' style='float:left; display:none' href='javascript:ActualizarArticuloCarrito(\"Cant_". $ItemCode ."\",\"". $ItemCode ."\",\"" . $ItemName ."\",\"1\",\"" .$Precio  ."\",\"" .$TotalLinea."\",\"".trim($user)."\",\"20\",\"".  $CPago ."\",\"". date("Y-m-d") ."\",\"".$Impuesto."\",\"".$MontoImpuesto."\",\"".$Descuento."\",\"".$MontoDescuento."\",\"Articulos\");' > 
								
								
		  							<img style='float:left;' src='img/General/Guardar.jpg' width='8' height='12' alt='Guardar' title='GUARDAR CAMBIOS' alt='CLICK AQUI PARA GUARDAR CAMBIOS'/>
								</a>
		 					     <a id='ActualizaArt_". $ItemCode."' style='float:left; ' href='javascript:Habilitaeditar(\"". $ItemCode ."\",\"Habilitar\");'> 
		  							<img style='float:left;' src='img/General/Editar.png' width='8' height='12' alt='Modificar' title='CLICK AQUI PARA MODIFICAR LA CANTIDAD' alt='CLICK AQUI PARA MODIFICAR LA CANTIDAD'/>
								</a>
								
								<a id='EliminaArt' style='float:left;' href='javascript:EliminaArticuloCarrito(\"Cant_". $ItemCode ."\",\"". $ItemCode ."\",\"" . $ItemName ."\",\"1\",\"" .$Precio  ."\",\"" .$TotalLinea."\",\"".trim($user)."\",\"20\",\"".  $CPago ."\",\"". date("Y-m-d") ."\",\"".$Impuesto."\",\"".$MontoImpuesto."\",\"".$Descuento."\",\"".$MontoDescuento."\",\"Articulos\",\"".$codbarras."\",\"".$ItemName."\",\"".$existencia."\",\"".$lotes."\",\"".$Unidad."\",\"".$precio."\",\"".$PrchseItem."\",\"".$SellItem."\",\"".$InvntItem."\",\"".$AvgPrice."\",\"".$Price."\",\"".$frozenFor."\",\"".$SalUnitMsr."\",\"".$VATLiable."\",\"".$lote."\",\"".$U_Grupo."\",\"".$SalPackUn."\",\"".$FAMILIA."\",\"".$CATEGORIA."\",\"".$MARCA."\",\"".$CardCode."\",\"".$Disponible."\",\"".$U_Gramaje."\",\"".$DETALLE_1."\",\"".$LISTA_A_DETALLE."\",\"".$LISTA_A_SUPERMERCADO."\",\"".$LISTA_A_MAYORISTA."\",\"". $LISTA_A_2_MAYORISTA."\",\"".$PANALERA."\",\"".$SUPERMERCADOS."\",\"".$MAYORISTAS."\",\"".$HUELLAS_DORADAS."\",\"".$ALSER."\",\"".$COSTO."\",\"".$PRECIO_SUGERIDO."\",\"".$PuntosWeb."\",\"".$Ranking."\",\"".$CodCliente."\");'> 
								  <img style='float:left;' src='img/General/Borrar.png' width='8' height='12' alt='Eliminar' title='CLICK AQUI PARA QUITAR DEL PEDIDO' alt='CLICK AQUI PARA QUITAR DEL PEDIDO'/>
					    		 </a>
								 </div>
					    	 </div>";
					 }
					 else{
			        	 echo "<input name='Cant' id='Cant_". $ItemCode ."' type='text' class='Cant'   placeholder='Cantidad AQUI ' onkeypress='ValidaSoloNumeros(\"Cant_". $ItemCode ."\",\"". $ItemCode ."\",\"" . $ItemName ."\",\"1\",\"" .$Precio  ."\",\"" .$TotalLinea."\",\"".trim($user)."\",\"20\",\"".  $CPago ."\",\"". date("Y-m-d") ."\",\"".$Impuesto."\",\"".$MontoImpuesto."\",\"".$Descuento."\",\"".$MontoDescuento."\",\"".$ItemCode."\",\"".$codbarras."\",\"".$ItemName."\",\"".$existencia."\",\"".$lotes."\",\"".$Unidad."\",\"".$precio."\",\"".$PrchseItem."\",\"".$SellItem."\",\"".$InvntItem."\",\"".$AvgPrice."\",\"".$Price."\",\"".$frozenFor."\",\"".$SalUnitMsr."\",\"".$VATLiable."\",\"".$lote."\",\"".$U_Grupo."\",\"".$SalPackUn."\",\"".$FAMILIA."\",\"".$CATEGORIA."\",\"".$MARCA."\",\"".$CardCode."\",\"".$Disponible."\",\"".$U_Gramaje."\",\"".$DETALLE_1."\",\"".$LISTA_A_DETALLE."\",\"".$LISTA_A_SUPERMERCADO."\",\"".$LISTA_A_MAYORISTA."\",\"". $LISTA_A_2_MAYORISTA."\",\"".$PANALERA."\",\"".$SUPERMERCADOS."\",\"".$MAYORISTAS."\",\"".$HUELLAS_DORADAS."\",\"".$ALSER."\",\"".$COSTO."\",\"".$PRECIO_SUGERIDO."\",\"".$PuntosWeb."\",\"".$Ranking."\",\"".$CodCliente."\");' />";
					 	 echo "
								<a href='javascript:AgregarAlCarrito(\"". $ItemCode ."\",\"" . $ItemName ."\",\"1\",\"" .$Precio  ."\",\"" .$TotalLinea."\",\"".trim($user)."\",\"20\",\"".  $CPago ."\",\"". date("Y-m-d") ."\",\"".$Impuesto."\",\"".$MontoImpuesto."\",\"".$Descuento."\",\"".$MontoDescuento."\",\"".$ItemCode."\",\"".$codbarras."\",\"".$ItemName."\",\"".$existencia."\",\"".$lotes."\",\"".$Unidad."\",\"".$precio."\",\"".$PrchseItem."\",\"".$SellItem."\",\"".$InvntItem."\",\"".$AvgPrice."\",\"".$Price."\",\"".$frozenFor."\",\"".$SalUnitMsr."\",\"".$VATLiable."\",\"".$lote."\",\"".$U_Grupo."\",\"".$SalPackUn."\",\"".$FAMILIA."\",\"".$CATEGORIA."\",\"".$MARCA."\",\"".$CardCode."\",\"".$Disponible."\",\"".$U_Gramaje."\",\"".$DETALLE_1."\",\"".$LISTA_A_DETALLE."\",\"".$LISTA_A_SUPERMERCADO."\",\"".$LISTA_A_MAYORISTA."\",\"". $LISTA_A_2_MAYORISTA."\",\"".$PANALERA."\",\"".$SUPERMERCADOS."\",\"".$MAYORISTAS."\",\"".$HUELLAS_DORADAS."\",\"".$ALSER."\",\"".$COSTO."\",\"".$PRECIO_SUGERIDO."\",\"".$PuntosWeb."\",\"".$Ranking."\",\"".$CodCliente."\");'> 
					  					<div id='Add' > Agregar</div>
					 				</a >
									
								 ";
				    		}
					  echo "</div>";
				   }
				elseif ($user <> "0" && $HayFacVencidas == "SI" )
					 	echo "<a href='MiCuenta.php?Tap=2'> 
					  			<div id='FacVencidas' >Ver Fac Vencidas</div>
					  		  </a>"; 
					 
					
              echo "</li>
			        </article>";
				 
		 }// fin while

		  }else { 
		  echo "<DIV style='padding:5PX; border-radius:5PX; margin:5PX; border:thin #F60;'>

No existen registros relacionados a la palabra  [ " .  $DESCRIPCION.  " ] <br> Para garantizar su busqueda utilice palabras clave relacionadas a la marca, Familia o una descripcion con palabras mas especificas al tipo de producto  
</DIV>
 ";}

			}

catch(Exception $e){

    //procedimiento en caso de reportar errores
	echo  "Error " . $e ;

}
?>



