       <?php 
if(isset($_POST['ItemCode'])){
	$HayFacVencidas = $_POST['HayFacVencidas']; 
	
?><link rel="stylesheet" type="text/css" href="css/IDs.css">
 <script type="text/javascript" src="../js/CarritoJS.js"></script>
 
 <section>
   <article  >
      <div id="overDetalle" class="overboxDet">

         <div id="DetalleContenedor1"  >
          
           <a href="javascript:hideLightboxDetalle();" style="text-decoration:none; ">
          <div align="left" id="CerrarVent" >
           Cerrar Ventana
          </div>
          </a>
                        
             <div style=" margin:5px; height:100px;padding:10px; ">
               
            <?php 
			 if (file_exists("../img/Articulos/".trim($_POST['ItemCode']).".jpg")) {
   						 echo" <img class='DetImg' src='img/Articulos/".$_POST['ItemCode'].".jpg'  width='250' height='167'>";
					} else {
   					
					echo"<img class='DetImg' src='img/General/SinImagenDisponible.jpg'  width='250' height='167'>";
						}
						
			 ?>
             </div>
 		       
             <div >
             <br> 
             
              <form action="" method="post" class="formul" style="padding-bottom:20px; height:280px;margin:10px;">
               <label class="Textos">Codigo Bourne</label>
                <input name="Codcliente" id="Codcliente" type="text" class="CajaTexto" placeholder="Codigo del negocio" required value="<?php echo $_POST['ItemCode']; ?>"  disabled="disabled"/><br />
                
                
                <label class="Textos">Descripcion</label>
                <input name="nombre" id="nombre" type="text" class="CajaTexto" placeholder="Nombre del negocio" required value="<?php echo $_POST['ItemName']; ?>" disabled="disabled"/><br />
                
                <label class="Textos">Existencias</label>
                <input name="empresa" id="empresa" type="text" class="CajaTexto"  placeholder="Direccion el negocio" value="<?php  				if ($_POST['user'] <> "" && $_POST['user'] <> "0" && $HayFacVencidas == "NO" ) 
					echo number_format( $_POST['existencia'], 0) ;
				else
					echo "DEBE INISIAR SESION"; 
				 ?>" disabled="disabled"/><br />
            
                <label class="Textos">Precio</label>
                <input name="NombrResponsable" id="NombrResponsable" type="text" class="CajaTexto" placeholder="Nombre de Responsable" required  value=" <?php
				 if ($_POST['user'] <> "" && $_POST['user'] <> "0" && $HayFacVencidas == "NO" ) 
					 echo number_format( $_POST['Precio'], 2); 
				 else
				 	echo "DEBE INISIAR SESION"; 
				 ?>" disabled="disabled"/><br>
                
                
                            
                <label class="Textos">Gramaje</label>
                <input name="D151" id="D151" type="text" class="CajaTexto"  required value="<?php echo $_POST['U_Gramaje']; ?>" disabled="disabled"/><br>
               
                <label class="Textos">Codigo de Barras</label>
                <input name="Estado" id="Estado" type="text" class="CajaTexto" placeholder="Estado del cliente" required value="<?php echo $_POST['codbarras'];?>" disabled="disabled"/><br><br>
                
                
             
              
              
                
                
                
            </form>  <?php 
					  /*------------------ verifica si hay facturas vencidas ---------------------*/
		 // $HayFacVencidas = "NO";
    	/**/ try{
			
   			//$HayFacVencidas ="NO";
   			//require('../Class/Facturas.class.php');
			require('../Class/Carrito.class.php');
		    $objCarrito=new Carrito;
		
			//$objFacturas=new Facturas;
			//$FacturasCanceladas = $objFacturas->ObtieneFacturasPendientes($_POST['user'] );
		/*	if($FacturasCanceladas){			
		 		while( $Facturas = mysql_fetch_array($FacturasCanceladas) ) {
						if($Facturas['FechaVencimiento'] <=date("Y-m-d") )
							$HayFacVencidas = "SI";	
										
				    }
			}else
				echo "SIN FACTUA";
				*/
			 }catch(Exception $e){ echo "Error login";}
				
				  /*------------------ FIN verifica si hay facturas vencidas ---------------------*/
				//Pregunta si es un usuario logueado y si este usuario no tiene facturas vencdas
				if ($_POST['user'] <> "" && $_POST['user'] <> "0" && $HayFacVencidas == "NO" ) 
					{ 
					 //verifica que ya alla sido agregado el articulo para ponerle el check de agregado
					$Cantidad = 0;
				     $Existe = 0; 
					 //Antes de agregar va a verificar si el articulo ya fue insertado
					/**/ $valor = $objCarrito->VerificaArticuloRepetido($_POST['ItemCode'],$_POST['user']);
					 if(mysql_num_rows($valor))	{	
						 $car = mysql_fetch_array($valor);
						 $Existe =$car['Existe'];
						 $Cantidad =$car['Cantidad'];
						 }
						
			
			 
				 
				 if (isset($_POST['codbarras']))
					  		$codbarras=$_POST['codbarras'];
						 else
							$codbarras = "";		
					 
					   if (isset($_POST['existencia']))
						  $existencia=$_POST['existencia'];
						   else
							$existencia = "";
					
					   if (isset($_POST['lotes']))
						  $lotes=$_POST['lotes'];
						   else
						  $lotes = "";
					
					   if (isset($_POST['Unidad']))
						  $Unidad=$_POST['Unidad'];
						   else
							$Unidad = "";
					
					   if (isset($_POST['precio']))
						  $precio=$_POST['precio'];
						   else
							$precio = "";
					
					   if (isset($_POST['PrchseItem']))
						  $PrchseItem=$_POST['PrchseItem'];
						   else
							$PrchseItem = "";
					
					   if (isset($_POST['SellItem']))
						  $SellItem=$_POST['SellItem'];
						   else
							$SellItem = "";
										  
					   if (isset($_POST['InvntItem']))
						  $InvntItem=$_POST['InvntItem'];
						   else
							$InvntItem = "";
					
					   if (isset($_POST['AvgPrice']))
						  $AvgPrice=$_POST['AvgPrice'];
						   else
							$AvgPrice = "";
					
					   if (isset($_POST['Price']))
						  $Price=$_POST['Price'];
						   else
							$Price = "";
					
					   if (isset($_POST['frozenFor']))
						  $frozenFor=$_POST['frozenFor'];
						   else
							$frozenFor = "";
					
					   if (isset($_POST['SalUnitMsr']))
						  $SalUnitMsr=$_POST['SalUnitMsr'];
						   else
							$SalUnitMsr = "";
					
					   if (isset($_POST['VATLiable']))
						  $VATLiable=$_POST['VATLiable'];
						   else
							$VATLiable = "";
					
					   if (isset($_POST['lote']))
						  $lote=$_POST['lote'];
						   else
							$lote = "";
					
					   if (isset($_POST['U_Grupo']))
						  $U_Grupo=$_POST['U_Grupo'];
						   else
							$U_Grupo = "";
					
					   if (isset($_POST['SalPackUn']))
						  $SalPackUn=$_POST['SalPackUn'];
						   else
							$SalPackUn = "";
					
					   if (isset($_POST['FAMILIA']))
						  $FAMILIA=$_POST['FAMILIA'];
						   else
							$FAMILIA = "";
					
					   if (isset($_POST['CATEGORIA']))
						  $CATEGORIA=$_POST['CATEGORIA'];
						   else
							$CATEGORIA = "";
					
					   if (isset($_POST['MARCA']))
						  $MARCA=$_POST['MARCA'];
						   else
							$MARCA = "";
					
					   if (isset($_POST['user']))
						  $CardCode=$_POST['user'];
						   else
							$CardCode = trim($user);
					
					   if (isset($_POST['Disponible']))
						  $Disponible=$_POST['Disponible'];
						   else
							$Disponible = "";
					
					   if (isset($_POST['U_Gramaje']))
						  $U_Gramaje=$_POST['U_Gramaje'];
						   else
							$U_Gramaje = "";
					
					   if (isset($_POST['DETALLE 1']))
						   $DETALLE_1=$_POST['DETALLE 1'];
						    else
							$DETALLE_1 = "";
					
					    if (isset($_POST['LISTA A DETALLE']))
						   $LISTA_A_DETALLE=$_POST['LISTA A DETALLE'];
						    else
							$LISTA_A_DETALLE = "";
					
					    if (isset($_POST['LISTA A SUPERMERCADO']))
						   $LISTA_A_SUPERMERCADO=$_POST['LISTA A SUPERMERCADO'];
						    else
							$LISTA_A_SUPERMERCADO = "";
					
					    if (isset($_POST['LISTA A MAYORISTA']))
						   $LISTA_A_MAYORISTA=$_POST['LISTA A MAYORISTA'];
						    else
							$LISTA_A_MAYORISTA = "";
					
					    if (isset($_POST['LISTA A + 2% MAYORISTA']))
						   $LISTA_A_2_MAYORISTA=$_POST['LISTA A + 2% MAYORISTA'];
						    else
							$LISTA_A_2_MAYORISTA = "";
					
					    if (isset($_POST['PANALERA']))
						   $PANALERA=$_POST['PANALERA'];
						    else
							$PANALERA = "";
					
					    if (isset($_POST['SUPERMERCADOS']))
						   $SUPERMERCADOS=$_POST['SUPERMERCADOS'];
						    else
							$SUPERMERCADOS = "";
					
					    if (isset($_POST['MAYORISTAS']))
						   $MAYORISTAS=$_POST['MAYORISTAS'];
						    else
							$MAYORISTAS = "";
					
					    if (isset($_POST['HUELLAS DORADAS']))
						   $HUELLAS_DORADAS=$_POST['HUELLAS DORADAS'];
						    else
							$HUELLAS_DORADAS = "";
					
					    if (isset($_POST['ALSER']))
						   $ALSER=$_POST['ALSER'];
						    else
							$ALSER = "";
					
					    if (isset($_POST['existencia']))
						   $COSTO=$_POST['COSTO'];
						    else
							$COSTO = "";
					
					    if (isset($_POST['PRECIO SUGERID']))
						   $PRECIO_SUGERIDO=$_POST['PRECIO SUGERIDO'];
						    else
							$PRECIO_SUGERIDO = "";
					
					    if (isset($_POST['PuntosWeb']))
						   $PuntosWeb=$_POST['PuntosWeb'];
						    else
							$PuntosWeb = "";
					
					    if (isset($_POST['Ranking']))
						   $Ranking=$_POST['Ranking'];
						    else
							$Ranking = "";
					 if (isset($_POST['CodCliente']))
						   $CodCliente=$_POST['CodCliente'];
						    else
							$CodCliente = "";
				
					
					echo "<Div id='btnAdd_".$_POST['ItemCode']."'>";
					
					
						
					/* if($Existe > 0 )
					 {  
				
					 echo "  <div class='Agregado'>
							<input name='DETCant' id='DETCant_". $_POST['ItemCode'] ."' type='text' class='DetCant'    placeholder='Digite AQUI la Cantidad' onkeypress='ValidaSoloNumeros(\"Cant_". $_POST['ItemCode'] ."\",\"". $_POST['ItemCode'] ."\",\"" . $_POST['ItemName'] ."\",\"1\",\"" .$_POST['Precio']  ."\",\"" . $_POST['TotalLinea']."\",\"".trim($_POST['CodCliente'])."\",\"25\",\"".  $_POST['CPago']."\",\"". $_POST['fecha'] ."\",\"".$_POST['Impuesto']."\",\"".$_POST['MontoImpuesto'] ."\",\"".$_POST['Descuento']."\",\"".$_POST['MontoDescuento']."\",\"".$_POST['ItemCode'] ."\",\"".$codbarras."\",\"".$ItemName."\",\"".$existencia."\",\"".$lotes."\",\"".$Unidad."\",\"".$precio."\",\"".$PrchseItem."\",\"".$SellItem."\",\"".$InvntItem."\",\"".$AvgPrice."\",\"".$Price."\",\"".$frozenFor."\",\"".$SalUnitMsr."\",\"".$VATLiable."\",\"".$lote."\",\"".$U_Grupo."\",\"".$SalPackUn."\",\"".$FAMILIA."\",\"".$CATEGORIA."\",\"".$MARCA."\",\"".trim($_POST['CodCliente'])."\",\"".$Disponible."\",\"".$U_Gramaje."\",\"".$DETALLE_1."\",\"".$LISTA_A_DETALLE."\",\"".$LISTA_A_SUPERMERCADO."\",\"".$LISTA_A_MAYORISTA."\",\"". $LISTA_A_2_MAYORISTA."\",\"".$PANALERA."\",\"".$SUPERMERCADOS."\",\"".$MAYORISTAS."\",\"".$HUELLAS_DORADAS."\",\"".$ALSER."\",\"".$COSTO."\",\"".$PRECIO_SUGERIDO."\",\"".$PuntosWeb."\",\"".$Ranking."\",\"".trim($_POST['CodCliente'])."\");' value='".$Cantidad."' disabled/>
														
								<div id='AccionesAgregado'>
								
								<a id='GardModifArt_". $_POST['ItemCode']."' style='float:left; display:none' href='javascript:ActualizarArticuloCarrito(\"Cant_". $_POST['ItemCode'] ."\",\"". $ItemCode ."\",\"" . $_POST['ItemName'] ."\",\"1\",\"" .$_POST['Precio']  ."\",\"" .$TotalLinea."\",\"".trim($_POST['user'])."\",\"25\",\"".  $CPago ."\",\"". date("Y-m-d") ."\",\"".$Impuesto."\",\"".$MontoImpuesto."\",\"".$Descuento."\",\"".$MontoDescuento."\");' > 
								
		  							<img style='float:left;' src='img/General/Guardar.jpg' width='22' height='24' alt='Guardar'/>
								</a>
		 					   <a id='ActualizaArt_". $_POST['ItemCode']."' style='float:left; ' href='javascript:Habilitaeditar(\"Cant_".  $_POST['ItemCode'] ."\",\"Habilitar\");'> 
		  							<img style='float:left;' src='img/General/Editar.png' width='22' height='24' alt='Modificar'/>
								</a>
								
		  						<a id='EliminaArt' style='float:left;' href='javascript:EliminaArticuloCarrito(\"DETCant_". $_POST['ItemCode'] ."\",\"". $_POST['ItemCode'] ."\",\"" . $_POST['ItemName'] ."\",\"1\",\"" .$_POST['Precio']  ."\",\"" .$TotalLinea."\",\"".trim($_POST['user'])."\",\"25\",\"".  $CPago ."\",\"". date("Y-m-d") ."\",\"".$Impuesto."\",\"".$MontoImpuesto."\",\"".$Descuento."\",\"".$MontoDescuento."\",\"Articulos\",\"".$codbarras."\",\"" .$_POST['ItemName']."\",\"" .$existencia."\",\"" .$lotes."\",\"" .$Unidad."\",\"" .$precio."\",\"" .$PrchseItem."\",\"" .$SellItem."\",\"" .$InvntItem."\",\"" .$AvgPrice."\",\"" .$Price."\",\"" .$frozenFor."\",\"" .$SalUnitMsr."\",\"" .$VATLiable."\",\"" .$lote."\",\"" .$U_Grupo."\",\"" .$SalPackUn."\",\"" .$FAMILIA."\",\"" .$CATEGORIA."\",\"" .$MARCA."\",\"" .$Disponible."\",\"" .$U_Gramaje."\",\"" .$DETALLE_1."\",\"" .$LISTA_A_DETALLE."\",\"" .$LISTA_A_SUPERMERCADO."\",\"" .$LISTA_A_MAYORISTA."\",\"" .$LISTA_A_2_MAYORISTA."\",\"" .$PANALERA."\",\"" .$SUPERMERCADOS."\",\"" .$MAYORISTAS."\",\"" .$HUELLAS_DORADAS."\",\"" .$ALSER."\",\"" .$COSTO."\",\"" .$PRECIO_SUGERIDO."\",\"" .$PuntosWeb."\",\"" .$Ranking."\",\"" .$CodCliente.");'> 
								  <img style='float:left;' src='img/General/Borrar.png' width='22' height='24' alt='Eliminar' />
					    		 </a>
								 </div>
					    	 </div>
							 ";
							
						
							 
					 }
					 else{
			
					   
						 echo "<input name='Cant' id='Cant_".$_POST['ItemCode'] ."' type='text' class='DetCant'   placeholder='Digite AQUI la Cantidad' onkeypress='ValidaSoloNumeros(\"Cant_". $_POST['ItemCode'] ."\",\"". $_POST['ItemCode'] ."\",\"" . $_POST['ItemName'] ."\",\"1\",\"" .$_POST['Precio']  ."\",\"" . $_POST['TotalLinea']."\",\"".trim($_POST['CodCliente'])."\",\"25\",\"".  $_POST['CPago']."\",\"". $_POST['fecha'] ."\",\"".$_POST['Impuesto']."\",\"".$_POST['MontoImpuesto'] ."\",\"".$_POST['Descuento']."\",\"".$_POST['MontoDescuento']."\",\"".$_POST['ItemCode'] ."\",\"".$codbarras."\",\"".$ItemName."\",\"".$existencia."\",\"".$lotes."\",\"".$Unidad."\",\"".$precio."\",\"".$PrchseItem."\",\"".$SellItem."\",\"".$InvntItem."\",\"".$AvgPrice."\",\"".$Price."\",\"".$frozenFor."\",\"".$SalUnitMsr."\",\"".$VATLiable."\",\"".$lote."\",\"".$U_Grupo."\",\"".$SalPackUn."\",\"".$FAMILIA."\",\"".$CATEGORIA."\",\"".$MARCA."\",\"".trim($_POST['CodCliente'])."\",\"".$Disponible."\",\"".$U_Gramaje."\",\"".$DETALLE_1."\",\"".$LISTA_A_DETALLE."\",\"".$LISTA_A_SUPERMERCADO."\",\"".$LISTA_A_MAYORISTA."\",\"". $LISTA_A_2_MAYORISTA."\",\"".$PANALERA."\",\"".$SUPERMERCADOS."\",\"".$MAYORISTAS."\",\"".$HUELLAS_DORADAS."\",\"".$ALSER."\",\"".$COSTO."\",\"".$PRECIO_SUGERIDO."\",\"".$PuntosWeb."\",\"".$Ranking."\",\"".trim($_POST['CodCliente'])."\");' />";

					      echo "
								<a href='javascript:AgregarAlCarrito(\"". $_POST['ItemCode'] ."\",\"" . $_POST['ItemName'] ."\",\"1\",\"" .$_POST['Precio']  ."\",\"" . $_POST['TotalLinea']."\",\"".trim($_POST['user'])."\",\"20\",\"".  $_POST['CPago']."\",\"". $_POST['fecha'] ."\",\"".$_POST['Impuesto']."\",\"".$_POST['MontoImpuesto'] ."\",\"".$_POST['Descuento']."\",\"".$_POST['MontoDescuento']."\",\"".$_POST['ItemCode'] ."\",\"".$codbarras."\",\"".$ItemName."\",\"".$existencia."\",\"".$lotes."\",\"".$Unidad."\",\"".$precio."\",\"".$PrchseItem."\",\"".$SellItem."\",\"".$InvntItem."\",\"".$AvgPrice."\",\"".$Price."\",\"".$frozenFor."\",\"".$SalUnitMsr."\",\"".$VATLiable."\",\"".$lote."\",\"".$U_Grupo."\",\"".$SalPackUn."\",\"".$FAMILIA."\",\"".$CATEGORIA."\",\"".$MARCA."\",\"".$CardCode."\",\"".$Disponible."\",\"".$U_Gramaje."\",\"".$DETALLE_1."\",\"".$LISTA_A_DETALLE."\",\"".$LISTA_A_SUPERMERCADO."\",\"".$LISTA_A_MAYORISTA."\",\"". $LISTA_A_2_MAYORISTA."\",\"".$PANALERA."\",\"".$SUPERMERCADOS."\",\"".$MAYORISTAS."\",\"".$HUELLAS_DORADAS."\",\"".$ALSER."\",\"".$COSTO."\",\"".$PRECIO_SUGERIDO."\",\"".$PuntosWeb."\",\"".$Ranking."\",\"".trim($_POST['user'])."\");'> 
					  					<div id='DetAdd' align='center' style='text-decoration:none' > Agregar</div>
					 				</a >
								 ";
				    		}*/
					  echo "</div>";
					  
					  
				   }elseif ($_POST['user'] <> "0" && $HayFacVencidas == "SI" )
					 	echo "<a href='MiCuenta.php?Tap=2'> 
					  			<div id='FacVencidas' >Ver Fac Vencidas</div>
					  		  </a>"; 
				?>
               </div>

          </div>
		 
       </div> 
   </article>
 </section>
             <?php }else
			{ //echo "No existen datos ";
			}
			
			?>
