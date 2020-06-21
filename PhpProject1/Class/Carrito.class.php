<?php 
include_once("conexion.class.php");

class Carrito{
 //constructor	
 	var $con;
 	function Carrito(){
 		$this->con=new conexion;
 	}
	//Cuenta los articulos en el carrito
	 function CuentaUnidades($CardCode){
		 $Total_Articulos = 0;
		  $Total_Pedido = 0;
		  
		if($this->con->conectar()==true){
			$Resultado = mysql_query("SELECT  COUNT( * ) as NumItems  FROM  `Carrito` WHERE  `CardCode` = '" .$CardCode. "'");
			if($Resultado){
			 	  $Result = mysql_fetch_array($Resultado) ;
		  	 	  $Total_Articulos = $Result["NumItems"];
			}
			echo  $Total_Articulos;
		}
	}
	
	//obtiene los datos del articulo a insertar en el rutero
	function ConsultaDatosdeArituclo($CodArticulo){
		try{
		 if($this->con->conectar()==true){
			$NumPaginas ;
			$TotalFinalas;
			$result = mysql_query("SELECT * FROM  `Articulos` where ItemCode='".$CodArticulo."'");
			return $result;
		 }
		}
        catch(Exception $e){ echo $e;}
	}
	
	//cuando le dan enviar al pedido , se insertara el articulo al turero del cliente
	 function InsertarAlRutero($CodArticulo,$CardCode){
		
		
		 //consulta todos los datos del articulo
		  $result=$this->ConsultaDatosdeArituclo($CodArticulo);
		  if( $result)
		  {
		   while( $DatoRutero = mysql_fetch_array($result) )
		   {
			  //inserta los datos al rutero
		  
		$this->AgregalineaARutero($DatoRutero["ItemCode"],$DatoRutero["codbarras"],$DatoRutero["ItemName"],$DatoRutero["existencia"],$DatoRutero["lotes"],$DatoRutero["Unidad"],$DatoRutero["precio"], $DatoRutero["PrchseItem"],$DatoRutero["SellItem"],$DatoRutero["InvntItem"],$DatoRutero["AvgPrice"],$DatoRutero["Price"],$DatoRutero["frozenFor"],$DatoRutero["SalUnitMsr"], $DatoRutero["VATLiable"], $DatoRutero["lote"],$DatoRutero["U_Grupo"], $DatoRutero["SalPackUn"], $DatoRutero["FAMILIA"],  $DatoRutero["CATEGORIA"],$DatoRutero["MARCA"], $DatoRutero["CardCode"], $DatoRutero["Disponible"],$DatoRutero["U_Gramaje"], $DatoRutero["DETALLE 1"],$DatoRutero["LISTA A DETALLE"],$DatoRutero["LISTA A SUPERMERCADO"],$DatoRutero["LISTA A MAYORISTA"],$DatoRutero["LISTA A + 2% MAYORISTA"],$DatoRutero["PANALERA"],$DatoRutero["SUPERMERCADOS"],$DatoRutero["MAYORISTAS"],$DatoRutero["HUELLAS DORADAS"],$DatoRutero["ALSER"],$DatoRutero["COSTO"],$DatoRutero["PRECIO SUGERIDO"],$DatoRutero["PuntosWeb"],$DatoRutero["Ranking"],$CardCode);
			   
			}
		  }
		
		 
		 }
	//consulta pedidos prontos a facturar
	 function CuentaPedidosProntoAFacturar($CardCode){
		
		  $Total_Pedido = 0;
		  $NumPedido = 0;
		   $FechaCreacion = 0;
		    $FechaFin = 0;
			 $Total = 0;
			  $TotalGeneral = 0;
		if($this->con->conectar()==true){
			$Resultado = mysql_query("SELECT * FROM  `PedidosProntosAFacturar` WHERE  `CardCode` = '" .$CardCode. "'");
			if($Resultado){
				echo "<table class='altrowstable' id='alternatecolor' align='center'>
							<tr>
								<th>Num Pedido</th>
								<th>Fecha Creacion</th>
								
								<th>Total</th>
								<th>Accion</th>
							</tr>";
				  while( $PedidoHecho = mysql_fetch_array($Resultado) )
				      {
						  //suma total pedido
							//  $Total_Pedido = $Total_Pedido +  ($PedidoHecho['Cantidad']*$PedidoHecho['Precio']);
						
					  //respalda numero pedido
					   if ($NumPedido != $PedidoHecho['NumPedido'])
					  		{
							
							  
					     echo"<tr>
					   	 	  <td>". $PedidoHecho['NumPedido']."</td>
							  <td>".  $PedidoHecho['Fecha']."</td>
							  <td>". number_format($PedidoHecho['Total'], 2) ."</td>
							  <td>
							  <a id='Actualizar' class='ClassBotones' href='javascript:VerDetallePedido(\"".$CardCode."\",\"". $PedidoHecho['NumPedido']."\");'>Ver Detalle</a>
							  </td>
							<tr>";
							$TotalGeneral=$TotalGeneral+$PedidoHecho['Total'];
							
							}
							
							$NumPedido = $PedidoHecho['NumPedido'];
							/* NOTAS SE DEBE HACER UA VARIABLE INDEPENDIENTE PARA CADA DATO YA QUE SI NO EL TOTAL DEL PEDIDO NO PODRA MOSTRARSE */					
					  //si el proximo pedido es diferente al actual	
					  //agarra la siguiente linea
							
					  }//fin while
	
				/*echo"<table class='altrowstable' id='alternatecolor'>
							<tr>
								<th>Num Pedido</th>
								<th>Foto</th>
								<th>CodArticulo</th>
								<th>Descripcion</th>
								<th>Cantidad</th>
								<th>Precio</th>
								<th>Total</th>	
						   </tr>";
			   while( $PedidoHecho = mysql_fetch_array($Resultado) ) {
							
					   echo"<tr>
					   		  <td>". $PedidoHecho['NumPedido']."</td>
					          <td>";
				 				if (file_exists("../img/Articulos/".trim($ItemCode).".jpg")) {
   						 			echo" <img src='img/Articulos/$ItemCode.jpg'  width='100' height='117'>";
									} else {
   					
										echo"<img src='img/General/SinImagenDisponible.jpg'  width='100' height='115'>";
											}
				
							echo"
							</td>
							 <td>". $PedidoHecho['CodArticulo']."</td>
							 <td>". $PedidoHecho['Descripcion']."</td>
							 <td>". $PedidoHecho['Cantidad']."</td>
							 <td>". number_format($PedidoHecho['Precio'], 2)   ."</td>
							 <td>". number_format(($PedidoHecho['Cantidad']*$PedidoHecho['Precio']), 2)   . "\n" ."</td>
							</tr>";
						  $Total_Pedido = $Total_Pedido +  ($PedidoHecho['Cantidad']*$PedidoHecho['Precio']);
						 // $Total_Articulos = $Result["NumItems"];
					    
			    }//FIN WHILE
				*/ echo "<tr>
						<td colspan='2' align='center'>TOTAL</td>
						<td colspan='1' align='left'>". number_format($TotalGeneral, 2)."</td>
					 </tr>
			 </table>";
			
		      }
			  }
	}
	

//consulta pedidos prontos a facturar
function DetallePedidosProntoAFacturar($CardCode,$NumPedido){
		
		 
		if($this->con->conectar()==true){
			$Resultado = mysql_query("SELECT * FROM  `PedidosProntosAFacturar` WHERE  `CardCode` = '" .$CardCode. "' and `NumPedido` = '" .$NumPedido. "'");
			if($Resultado){
				
				echo"<a class='ClassBotones' id='IrPagos' href='javascript:ObtienePedidosProntosAFacturar(\"".$CardCode."\");'>Regresar</a>
				<table class='altrowstable' id='alternatecolor' align='center'>
							<tr>
								<th>Num Pedido</th>
								<th>Foto</th>
								<th>CodArticulo</th>
								<th>Descripcion</th>
								<th>Cantidad</th>
								<th>%Descuento</th>
								<th>I.V</th>
								<th>Precio</th>
								<th>Total</th>	
						   </tr>";
			   while( $PedidoHecho = mysql_fetch_array($Resultado) ) {
							
					   echo"<tr>
					   		  <td>". $PedidoHecho['NumPedido']."</td>
					          <td>";
				 				if (file_exists("../img/Articulos/".trim($ItemCode).".jpg")) {
   						 			echo" <img src='img/Articulos/$ItemCode.jpg'  width='100' height='117'>";
									} else {
   					
										echo"<img src='img/General/SinImagenDisponible.jpg'  width='100' height='115'>";
											}
											$TotalLinea = 0;
											if($PedidoHecho['Impuesto']=="13.00")
												{				
												$IVI = "1.13";
												 $TotalLinea= $PedidoHecho['Cantidad']*$PedidoHecho['Precio']* $IVI;
												}
											   else
											   {
												 
												 $TotalLinea= $PedidoHecho['Cantidad']*$PedidoHecho['Precio'] ; 
												  }
											  
				
							echo"
							</td>
							 <td>". $PedidoHecho['CodArticulo']."</td>
							 <td>". $PedidoHecho['Descripcion']."</td>
							 <td>". $PedidoHecho['Cantidad']."</td>
							 <td>". number_format("0.0", 2)."</td>
							 <td>". number_format($PedidoHecho['Impuesto'], 2) ."</td>
							 <td>". number_format($PedidoHecho['Precio'], 2)   ."</td>
							 <td>". number_format($TotalLinea, 2)   . "\n" ."</td>
							</tr>";
						  $Total_Pedido = $Total_Pedido +  ($TotalLinea);
						 // $Total_Articulos = $Result["NumItems"];
					    
			    }//FIN WHILE
				 echo "<tr>
						<td colspan='8' align='center'>TOTAL</td>
						<td >". number_format($Total_Pedido, 2)."</td>
					 </tr>
			 </table>";
			 
			
		      }
			  }
	}
	
	
	

//suma el total del pedido de un cliente
	 function SumaTotal($CardCode){
		
		  $Total_Pedido = 0;
		  
		if($this->con->conectar()==true){
			$Resultado = mysql_query("SELECT  `Total`  FROM  `Carrito` WHERE  `CardCode` = '" .$CardCode. "'");
			if($Resultado){
			   while( $Articulos = mysql_fetch_array($Resultado) ) {
		  	     $Total_Pedido = $Total_Pedido + (int) $Articulos['Total'] ;
		      }}
			echo number_format($Total_Pedido, 2) ;
		}
	}
	
	//Elimina un articulo del carrito de un cliente
	 function VerificaArticuloRepetido($Cod_Articulo,$CardCode){
		if($this->con->conectar()==true){
			$Resultado = mysql_query("SELECT COUNT( * )as 'Existe',Cantidad  FROM  `Carrito` WHERE  `CardCode` = '" .$CardCode. "' and `CodArticulo`='" . $Cod_Articulo."'");
			
			return $Resultado;
			
		}
	}

function AumentaRanking($Cod_Articulo)
{
	try{
		
		$valor = mysql_query("SELECT `Ranking` FROM `Articulos` WHERE `ItemCode` = '".$Cod_Articulo."'");
		if(mysql_num_rows($valor))
			 {
				 $Arti = mysql_fetch_array($valor);
				$PuntosWeb =$Arti['Ranking'];
			
			 }
			 if($PuntosWeb=="")
			    $PuntosWeb=0;
		
		$PuntosWeb=intval($PuntosWeb)+1;
		
		mysql_query("UPDATE `Articulos` SET `Ranking`='".$PuntosWeb."' WHERE `ItemCode` = '".$Cod_Articulo."'");
		
	} catch(Exception $e){
                return "Error al Aumentar Ranking" & $e;
              }
	}
	
	//Agrega linea al RUTERO
	function AgregalineaARutero($ItemCode,$codbarras,$ItemName,$existencia,$lotes,$Unidad,$precio,$PrchseItem,$SellItem,$InvntItem,$AvgPrice,$Price,$frozenFor,$SalUnitMsr,$VATLiable,$lote,$U_Grupo,$SalPackUn,$FAMILIA,$CATEGORIA,$MARCA,$CardCode,$Disponible,$U_Gramaje, $DETALLE_1,$LISTA_A_DETALLE,$LISTA_A_SUPERMERCADO,$LISTA_A_MAYORISTA,$LISTA_A_2_MAYORISTA,$PANALERA,$SUPERMERCADOS,$MAYORISTAS,$HUELLAS_DORADAS,$ALSER,$COSTO,$PRECIO_SUGERIDO,$PuntosWeb,$Ranking,$CodCliente)
	{
		if(	$this->VerificaExisteEnRutero($CodCliente,$ItemCode)==0)
		{
			 if($this->con->conectar()==true){
				 
				try{
			 mysql_query("INSERT INTO `RUTEROS`(`ItemCode`, `codbarras`, `ItemName`, `existencia`, `lotes`, `Unidad`, `precio`, `PrchseItem`, `SellItem`, `InvntItem`, `AvgPrice`, `Price`, `frozenFor`, `SalUnitMsr`, `VATLiable`, `lote`, `U_Grupo`, `SalPackUn`, `FAMILIA`, `CATEGORIA`, `MARCA`, `CardCode`, `Disponible`, `U_Gramaje`, `DETALLE 1`, `LISTA A DETALLE`, `LISTA A SUPERMERCADO`, `LISTA A MAYORISTA`, `LISTA A + 2% MAYORISTA`, `PANALERA`, `SUPERMERCADOS`, `MAYORISTAS`, `HUELLAS DORADAS`, `ALSER`, `COSTO`, `PRECIO SUGERIDO`, `PuntosWeb`, `Ranking`, `CodCliente`) VALUES ('".$ItemCode."','".$codbarras."','".$ItemName."','".$existencia."','".$lotes."','".$Unidad."','".$precio."','".$PrchseItem."','".$SellItem."','".$InvntItem."','".$AvgPrice."','".$Price."','".$frozenFor."','".$SalUnitMsr."','".$VATLiable."','".$lote."','".$U_Grupo."','".$SalPackUn."','".$FAMILIA."','".$CATEGORIA."','".$MARCA."','".$CardCode."','".$Disponible."','".$U_Gramaje."','".$DETALLE_1."','".$LISTA_A_DETALLE."','".$LISTA_A_SUPERMERCADO."','".$LISTA_A_MAYORISTA."','".$LISTA_A_2_MAYORISTA."','".$PANALERA."','".$SUPERMERCADOS."','".$MAYORISTAS."','".$HUELLAS_DORADAS."','".$ALSER."','".$COSTO."','".$PRECIO_SUGERIDO."','".$PuntosWeb."','".$Ranking."','".$CodCliente."')");
			
			//return "Agrego linea a rutero";
			
			} catch(Exception $e){ return "Error al linea a rutero" & $e;}
			
			
			}else return "no conecto EN";
			}else return "ya existe EN RUTERO";
		
		
	}
	
//Agrega un articulo al carrito de un cliente
function Agrega($Cod_Articulo,$Descripcion,$Cantidad,$Precio,$Total,$CardCode,$Agente,$ComdicionPago,$Fecha,$Impuesto,$MontoImpuesto,$Descuento,$MontoDescuento,$ItemCode,$codbarras,$ItemName,$existencia,$lotes,$Unidad,$precio,$PrchseItem,$SellItem,$InvntItem,$AvgPrice,$Price,$frozenFor,$SalUnitMsr,$VATLiable,$lote,$U_Grupo,$SalPackUn,$FAMILIA,$CATEGORIA,$MARCA,$CardCode,$Disponible,$U_Gramaje, $DETALLE_1,$LISTA_A_DETALLE,$LISTA_A_SUPERMERCADO,$LISTA_A_MAYORISTA,$LISTA_A_2_MAYORISTA,$PANALERA,$SUPERMERCADOS,$MAYORISTAS,$HUELLAS_DORADAS,$ALSER,$COSTO,$PRECIO_SUGERIDO,$PuntosWeb,$Ranking,$CodCliente){
	
	 	try{
			  $valor = false; 
			  $Existe = 0; 
						
			//Antes de agregar va a verificar si el articulo ya fue insertado
			$valor = $this->VerificaArticuloRepetido($Cod_Articulo,$CardCode);
			 if(mysql_num_rows($valor))
			 {
				 $car = mysql_fetch_array($valor);
				$Existe =$car['Existe'];
			 }
			 
			 if($Existe > 0 )
			  echo "Articulo " .$Descripcion. "  ya existe, si desea agregar mas unidades vaya a su carrito y Actualice las Unidades a solicitar" ;
			else
				{
				 if($this->con->conectar()==true){
					 // $Total= $Precio*$Cantidad;
					 // $Total=$Total+$MontoImpuesto-$MontoDescuento;
					  
					 mysql_query("INSERT INTO `arquitect_bourne`.`Carrito` (`CodArticulo`, `Descripcion`, `cantidad`, `Precio`, `Total`, `CardCode`, `Fecha`, `Descuento`, `MontoDescuento`,`Impuesto` ,`MontoImpuesto`,`Agente`, `CondicionPago`) VALUES ('". $Cod_Articulo . "','".$Descripcion ."','".$Cantidad."','".$Precio."','".$Total."','" . $CardCode ."','" . date("Y-m-d")  ."','".$Descuento."','".$MontoDescuento."','".$Impuesto."','".$MontoImpuesto."','" .  $Agente ."','" . $ComdicionPago ."');");
					 
				 
				 $this->AumentaRanking($Cod_Articulo);
				 
				 //Agrega el articulo al rutero del cliente si aun no existe
				//return  $this->AgregalineaARutero($ItemCode,$codbarras,$ItemName,$existencia,$lotes,$Unidad,$precio,$PrchseItem,$SellItem,$InvntItem,$AvgPrice,$Price,$frozenFor,$SalUnitMsr,$VATLiable,$lote,$U_Grupo,$SalPackUn,$FAMILIA,$CATEGORIA,$MARCA,$CardCode,$Disponible,$U_Gramaje, $DETALLE_1,$LISTA_A_DETALLE,$LISTA_A_SUPERMERCADO,$LISTA_A_MAYORISTA,$LISTA_A_2_MAYORISTA,$PANALERA,$SUPERMERCADOS,$MAYORISTAS,$HUELLAS_DORADAS,$ALSER,$COSTO,$PRECIO_SUGERIDO,$PuntosWeb,$Ranking,$CodCliente);
				  
			  // return "Agregado Correctamente";
				   
			       }
			   }
			} catch(Exception $e){
                return "Error al agrega" & $e;
              }
			  
		
	}
		//al darle enviar al pedido a bourne , inica el proceso de recorrer el pedido del carrito y dividirlo en pedidos de 19 lineas
		//asignar el consecutivo de cada pedido he insertarlo en las tablas de encabezado y detalle de pedido 
		//luego de dibidirlo se empieza a generar el archivo in_pedid ya con todos los datos de la linea de este archivo
 
 
 
 function AgregaRevisame()
 {
	 try{
	     $nombre_archivo = 'Revisame/25.mbg'; 
     	 $contenido="0";
    	 fopen($nombre_archivo, 'a+'); 
	   	 //Asegurarse primero de que el archivo existe y puede escribirse sobre el. 
		 if (is_writable("Revisame/25.mbg")) { 
		   if (!$gestor = fopen($nombre_archivo, 'a')) { 
			 echo "No se puede abrir el archivo ($nombre_archivo)"; 
			 exit; 
		     } 
		   if (fwrite($gestor, $contenido."\n") === FALSE) { 
		     echo "No se puede escribir al archivo ($nombre_archivo)"; 
		     exit; 
		      } 
		 fclose($gestor); 
		 } else { 
			     echo "No se puede escribir sobre el archivo $nombre_archivo"; 
			    } 
		} catch(Exception $e){
                echo "Error :" & $e;
              }	
}
 
   
   function AgregaLineaA_In_Pedid($CardCode,$Fecha,$ComdicionPago,$Agente,$Total,$NumPedido,$Cod_Articulo,$Descripcion,$Cantidad,$Precio,$Descuento, $MontoDescuento,$MontoImpuesto){
         
	   $nombre_archivo = '25/expo/pedidos.mbg'; 
	   fopen($nombre_archivo, 'a+'); 


$Hora= date('h:i:s A');

$dia = substr($Fecha,8, 2);
$mes   = substr($Fecha, 5, 2);
$ano = substr($Fecha, 0, 4);
// fechal final realizada el cambio de formato a las fechas europeas
$Fecha2 = intval(trim($dia)) . '/' . trim($mes) . '/' .intval(trim($ano));


	/*$contenido = 	"\"00$NumPedido\",\"trim($mes) \",\"trim($ano)\",\"#s lineas\",\"$Fecha2\",\"Hora\",\"$CardCode\",\"1\",\"1\",\"1\",\"$ComdicionPago\",\"1\",\"$Agente\",\"Nombre cliente\",\" \",\"$Cod_Articulo\",\"Tipo venta\",\"$Descripcion\",\"1\",\"$Cantidad\",\"$Cantidad\",\"0\",\"0\",\"$Precio\",\"0\",\"0\",\"0\",\"0\",\"$Descuento\",\"$MontoDescuento\",\"%Impuesto\",\"0\",\"$MontoImpuesto\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\"0\",\" \",\"0\",\"0\",\" \",\" \",";*/
	
$contenido ="$NumPedido,$Fecha2,$Hora,$CardCode,$ComdicionPago,$Agente,$Cod_Articulo,$Cantidad,$Precio,$Descuento,$MontoDescuento,$MontoImpuesto,";
	
	
	
	
	
	
	
			// Asegurarse primero de que el archivo existe y puede escribirse sobre el. 
			if (is_writable("25/expo/pedidos.mbg")) { 
		   // En nuestro ejemplo estamos abriendo $nombre_archivo en modo de adicion. 
		   // El apuntador de archivo se encuentra al final del archivo, asi que 
		   // alli es donde ira $contenido cuando llamemos fwrite(). 
		   if (!$gestor = fopen($nombre_archivo, 'a')) { 
				 echo "No se puede abrir el archivo ($nombre_archivo)"; 
				 exit; 
		   } 
		   // Escribir $contenido a nuestro arcivo abierto. 
		   if (fwrite($gestor, $contenido."\n") === FALSE) { 
			   echo "No se puede escribir al archivo ($nombre_archivo)"; 
			   exit; 
		   } 
			//echo "&Eacute;xito, se escribi&oacute; ($contenido) al archivo ($nombre_archivo)"; 
		   fclose($gestor); 
			 /*
			$archivo="20/impo/in_pedid.mbg"; 
			$fp = fopen($archivo,"w"); 
			fclose($fp); */
			
			$this->AgregaRevisame();
			} else { 
			   echo "No se puede escribir sobre el archivo $nombre_archivo"; 
			} 
	   }
   function ActualizaTotalPedidoProntoAFActurar($CardCode,$NumPedido,$TotalPedido)
      {
	     try{
			if($this->con->conectar()==true){
		 mysql_query("UPDATE `PedidosProntosAFacturar` SET `Total`=".$TotalPedido." WHERE `CardCode` = '".$CardCode."' and `NumPedido`='".$NumPedido."'");
				  
				  
				 }
			} catch(Exception $e){
                //return "Error al agrega Encabezado" & $e;
              }	
	   }
   
     function AgregaPedidosProntosAFacturar($CardCode,$Fecha,$ComdicionPago,$Agente,$Total,$NumPedido,$Cod_Articulo,$Descripcion,$Cantidad,$Precio,$Descuento,$Impuesto, $MontoDescuento,$MontoImpuesto){
		try{
			if($this->con->conectar()==true){
					 mysql_query("INSERT INTO `arquitect_bourne`.`PedidosProntosAFacturar` (`CodArticulo`, `Descripcion`, `Cantidad`, `Precio`, `Total`, `CardCode`, `Fecha`, `Descuento`, `MontoDescuento`, `Impuesto`,`MontoImpuesto`, `Agente`, `CondicionPago`, `NumPedido`) VALUES ('".$Cod_Articulo."', '".$Descripcion."', '".$Cantidad."', '".$Precio."', '".$Total."', '".$CardCode."', '".$Fecha."', '".$Descuento."', '".$Impuesto."', '".$MontoDescuento."', '".$MontoImpuesto."', '25', '".$ComdicionPago."', '".$NumPedido."');");
				  
				   return "Agregado Correctamente";
				 }
			} catch(Exception $e){
                return "Error al agrega Encabezado" & $e;
              }	
	  }
   
   	//Elimina el carrito de un cliente
	 function EliminaEncabezadoPedido($CardCode){
		if($this->con->conectar()==true){
		return mysql_query("DELETE FROM  `arquitect_bourne`.`ENC_PedidosSolicitados` WHERE  `CardCode` =  '" .$CardCode. "'");
		}
	}
		//Obtiene el dia de entrega del pedido
	 function ObtieneDiaEntrega($NumPedido,$CodArti){
		if($this->con->conectar()==true){
		return mysql_query("SELECT * FROM `DET_PedidosSolicitados` WHERE `NumPedido` =  '" .$NumPedido. "' and `NumPedido` =  '" .$CodArti. "'");
		}
	}
	
		//muestra el carrito de un cliente
	 function ObtieneDiaVisita($CardCode){
		if($this->con->conectar()==true){
			$Resultado = mysql_query("SELECT `DiaVisita` FROM  `Cliente_Proveedores` WHERE  `CardCode` =  '".$CardCode."'");
					
			if($Resultado){
			   while( $Articulos = mysql_fetch_array($Resultado) ) {
		  	     $DiaVisita =  $Articulos['DiaVisita'] ;
		      }}
			return $DiaVisita;
			
		}
	}
	
	
	//Elimina el carrito de un cliente
	 function EliminaDetallePedido($NumPedido,$CodArti){
		if($this->con->conectar()==true){
		return mysql_query("DELETE * FROM `DET_PedidosSolicitados` WHERE `NumPedido` =  '" .$NumPedido. "' and `NumPedido` =  '" .$CodArti. "'");
		}
	}
	
    function AgregaEncabezadoPedido($CardCode,$Fecha,$ComdicionPago,$Agente,$Total){
		try{
			if($this->con->conectar()==true){
					 mysql_query("INSERT INTO `arquitect_bourne`.`ENC_PedidosSolicitados` (`CardCode`, `Fecha`, `CondicionPago`, `Agente`, `Total`) VALUES ('" . $CardCode ."','" . date("Y-m-d")  ."','" . $ComdicionPago ."','" .  $Agente ."','".$Total."');");
				  
				   return "Agregado Correctamente";
				 }
			} catch(Exception $e){
                return "Error al agrega Encabezado" & $e;
              }	
	  }
	
	    function AgregaDetallePedido($NumPedido,$Cod_Articulo,$Descripcion,$Cantidad,$Precio,$Descuento, $MontoDescuento,$MontoImpuesto){
		try{
			  $valor = false; 
			  $Existe = 0; 
			//Antes de agregar va a verificar si el articulo ya fue insertado por el cliente 
			$valor = $this->VerificaArticuloRepetido($Cod_Articulo,$CardCode);
			 if(mysql_num_rows($valor))
			 {
				 $car = mysql_fetch_array($valor);
				$Existe =$car['Existe'];
			
			 }
			 
			 if($Existe > 0 )
			  echo "Articulo " .$Descripcion. "  ya existe, si desea agregar mas unidades vaya a su carrito y Actualice las Unidades a solicitar" ;
			else
				{
				 if($this->con->conectar()==true){
					 
					 mysql_query("INSERT INTO `arquitect_bourne`.`DET_PedidosSolicitados` (`NumPedido`, `CodArticulo`, `Descripcion`, `Cantidad`, `Precio`, `Descuento`, `MontoDescuento`, `MontoImpuesto`) VALUES ('".$NumPedido."','" . $Cod_Articulo ."','" . $Descripcion  ."','" . $Cantidad ."','" .  $Precio ."','".$Descuento."','".$MontoDescuento."','".$MontoImpuesto."');");
				 
				  // return "Detalle Agregado Correctamente";
				   
			       }
			   }
			
			} catch(Exception $e){
                return "Error al agrega Encabezado" & $e;
              }
	}
	
	//muestra el carrito de un cliente
	 function ObtieneNumPedido($CardCode){
		 try{
		if($this->con->conectar()==true){
			$NumPedido = mysql_query("SELECT MAX( NumPedido ) AS NumPedido FROM  `ENC_PedidosSolicitados` WHERE `CardCode` = '" .$CardCode. "'");
			
			if($NumPedido){
			 $Consecutivo = mysql_fetch_array($NumPedido); 
				     return  $Consecutivo['NumPedido'];
			}
		}
		}catch(Exception $e){
                return "Error al agrega ObtieneNumPedido" & $e;
				}
	}
	
	
	
	
		//Elimina el carrito de un cliente
	 function EliminaCarrito($CardCode){
		if($this->con->conectar()==true){
		return mysql_query("DELETE FROM  `Carrito` WHERE  `CardCode` =  '" .$CardCode. "'");
		}
	}
	//Elimina un articulo del carrito de un cliente
	 function EliminaAunArticulo($Cod_Articulo,$CardCode){
		if($this->con->conectar()==true){
		return mysql_query("DELETE FROM  `Carrito` WHERE  `CardCode` =  '" .$CardCode. "' AND  `CodArticulo` =  '".$Cod_Articulo."'");
		}
	}
	
	
	
		//ACTUALIZA CARRITO
	 function ActualizaLineaCarrito($CardCode,$Cantidad,$Cod_Articulo,$Total){
		if($this->con->conectar()==true){
			 mysql_query("UPDATE `Carrito` SET `Cantidad`='" . $Cantidad ."',`Total`='". $Total ."' WHERE `CardCode`='". $CardCode ."' and `CodArticulo`='". $Cod_Articulo ."'");
		
			 echo number_format($Total, 2) ;
        
		 
		 
		}
	}
	//muestra el carrito de un cliente
	 function Muestra($CardCode){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM  `Carrito` WHERE  `CardCode` = '" .$CardCode. "'");
		}
	}
	
	
	
	
		//Obtiene el rutero del cliente
	 function ObtieneRutero($CardCode){
		 
		 
		 if($this->con->conectar()==true){
			
			return mysql_query("SELECT * FROM `Ruteros` WHERE `CardCode` = '".$CardCode."'");
			 
			 		 
		}
		
		
	 }
	//Verifica si ya se ingreso en el rutero
	 function VerificaExisteEnRutero($CardCode,$ItemCode){
		if($this->con->conectar()==true){
			
			$ArtiRutero = mysql_query("SELECT COUNT (*) AS EXIST FROM `RUTEROS` WHERE `CardCode` = '".$CardCode."' and `ItemCode` = '".$ItemCode."'");
			
			 if($ArtiRutero)
			 {
				  $Exis = mysql_fetch_array($ArtiRutero); 
				if($Exis['EXIST']>0)
					return 1;
				else
					  return 0;
		      }
			 
				 
			
			 
		}
	}
	//muestra el carrito de un cliente
	 function IngresarARutero($CardCode,$ItemCode,$Descripcion){
		if($this->con->conectar()==true){
			//si no existe en la tabla de ruteros la inserta de loc ontrario no ahce nada
			if($this->VerificaExisteEnRutero($CardCode,$ItemCode)== 0)
					return mysql_query("INSERT INTO `Ruteros`(`CardCode`, `ItemCode`, `Descrpcion`) VALUES ('".$CardCode."','".$ItemCode."','".$Descripcion."')");
				
				
		}
	}
	

	 function EnviaCorreo($CardCode,$NumPedido,$CardName,$SlpCode,$E_Mail,$DetallePedido){
		 
		 try
		 {
			 if ($SlpCode < 10)
			 $Ruta ="0".$SlpCode ;
			 else
			 $Ruta =$SlpCode ;
			// email de destino
			//$email = "lurobaca@bourneycia.net;bourneruta".$Ruta."@gmail.com;facturacionbourne@gmail.com";
			$email = "lurobaca@bourneycia.net,bourneenlace@gmail.com,facturacionbourne@gmail.com,bourneruta".$Ruta."@gmail.com";
			
			// asunto del email
			$subject = "PEDIDO CREADO EN PAGINA WEB";
			
			// Cuerpo del mensaje
			$mensaje = "---------------------------------- \n";
			$mensaje.= "      INFO Pedido Creado en WEB    \n";
			$mensaje.= "---------------------------------- \n";
			$mensaje.= "#Pedido:   ".$NumPedido."\n";
			$mensaje.= "Cod Cliente:  ".$CardCode."\n";
			$mensaje.= "Nombre Cliente:  ".$CardName."\n";
			$mensaje.= "Agente Asignado:  ".$SlpCode."\n";
			$mensaje.= "EMAIL Cliente:    ".$E_Mail."\n";
			//$mensaje.= "TELEFONO: ".$_POST['telefono']."\n";
			$mensaje.= "FECHA:    ".date("d/m/Y")."\n";
			$mensaje.= "HORA:     ".date("h:i:s a")."\n";
			//$mensaje.= "IP:       ".$_SERVER['REMOTE_ADDR']."\n\n";
			
			$mensaje.= "------------[DETALLE DEL PEDIDO]----------- \n\n";
			$mensaje.= "[CANTIDAD] , [COD ARTICULO] , [DESCRIPCION] \n\n";
			
						  
			$mensaje.= $DetallePedido."\n\n";			  
		
			
		
			$mensaje.= "---------------------------------- \n\n";
			$mensaje.= "Se le informa que el cliente [ ".$CardName." ] Creo el  pedido numero [ ".$NumPedido." ] desde la pagina WEB  \n Por favor evite repetir este pedido y confirme con el cliente la creacion de este pedido \n\n";
			$mensaje.= "---------------------------------- \n";
			$mensaje.= "Enviado desde http://bourneycia.net \n";
			
			// headers del email
			$headers = "From:lurobaca@bourneycia.net\r\n";
			
			// Enviamos el mensaje
			if (mail($email, $subject, $mensaje, $headers)) {
				$aviso = "Su mensaje fue enviado correctamente";
			} else {
				$aviso = "Error de envío";
			}
		
		}catch(Exception $e){
                return "Error al enviar correo " & $e;
				}
				
				
				
				 }
	
	
	//Notifica ala gente de la creacion del pedido
	 function EnviaCorreoNotificadora($CardCode,$NumPedido, $Mensaje){
		 //obtiene el nombre del cliente que hizo el pedido
		 if($this->con->conectar()==true){
			$Resultado= mysql_query("SELECT  `CardName` ,`SlpCode` ,`E_Mail` FROM  `Cliente_Proveedores` WHERE  `CardCode`  = '" .$CardCode. "'");
			
			if($Resultado)
			   {
				
				 $InfoCliente = mysql_fetch_array($Resultado); 
				 $CardName=  $InfoCliente['CardName'];
				 $SlpCode= $InfoCliente['SlpCode'];
				 $E_Mail= $InfoCliente['E_Mail'];
				 
				 $this->EnviaCorreo($CardCode,$NumPedido,$CardName,$SlpCode,$E_Mail,$Mensaje);
				 				 
				 
				 
				}
			else
			echo "No se encontradoros datos";
		}
		 //obtiene el agente que le corresponde ese cliente
		 //envia el correo al cliente que hizo el correo y al cliente si es que tiene correo
		
		
		
	}
	
	//----------------- FUNCIONES PARA DAR FORMATO A LOS NUMEROS ------------------------------
	function formatcurrency($floatcurr, $curr = "USD")
{
        $currencies['ARS'] = array(2,',','.');          //  Argentine Peso
        $currencies['AMD'] = array(2,'.',',');          //  Armenian Dram
        $currencies['AWG'] = array(2,'.',',');          //  Aruban Guilder
        $currencies['AUD'] = array(2,'.',' ');          //  Australian Dollar
        $currencies['BSD'] = array(2,'.',',');          //  Bahamian Dollar
        $currencies['BHD'] = array(3,'.',',');          //  Bahraini Dinar
        $currencies['BDT'] = array(2,'.',',');          //  Bangladesh, Taka
        $currencies['BZD'] = array(2,'.',',');          //  Belize Dollar
        $currencies['BMD'] = array(2,'.',',');          //  Bermudian Dollar
        $currencies['BOB'] = array(2,'.',',');          //  Bolivia, Boliviano
        $currencies['BAM'] = array(2,'.',',');          //  Bosnia and Herzegovina, Convertible Marks
        $currencies['BWP'] = array(2,'.',',');          //  Botswana, Pula
        $currencies['BRL'] = array(2,',','.');          //  Brazilian Real
        $currencies['BND'] = array(2,'.',',');          //  Brunei Dollar
        $currencies['CAD'] = array(2,'.',',');          //  Canadian Dollar
        $currencies['KYD'] = array(2,'.',',');          //  Cayman Islands Dollar
        $currencies['CLP'] = array(0,'','.');           //  Chilean Peso
        $currencies['CNY'] = array(2,'.',',');          //  China Yuan Renminbi
        $currencies['COP'] = array(2,',','.');          //  Colombian Peso
        $currencies['CRC'] = array(2,',','.');          //  Costa Rican Colon
        $currencies['HRK'] = array(2,',','.');          //  Croatian Kuna
        $currencies['CUC'] = array(2,'.',',');          //  Cuban Convertible Peso
        $currencies['CUP'] = array(2,'.',',');          //  Cuban Peso
        $currencies['CYP'] = array(2,'.',',');          //  Cyprus Pound
        $currencies['CZK'] = array(2,'.',',');          //  Czech Koruna
        $currencies['DKK'] = array(2,',','.');          //  Danish Krone
        $currencies['DOP'] = array(2,'.',',');          //  Dominican Peso
        $currencies['XCD'] = array(2,'.',',');          //  East Caribbean Dollar
        $currencies['EGP'] = array(2,'.',',');          //  Egyptian Pound
        $currencies['SVC'] = array(2,'.',',');          //  El Salvador Colon
        $currencies['ATS'] = array(2,',','.');          //  Euro
        $currencies['BEF'] = array(2,',','.');          //  Euro
        $currencies['DEM'] = array(2,',','.');          //  Euro
        $currencies['EEK'] = array(2,',','.');          //  Euro
        $currencies['ESP'] = array(2,',','.');          //  Euro
        $currencies['EUR'] = array(2,',','.');          //  Euro
        $currencies['FIM'] = array(2,',','.');          //  Euro
        $currencies['FRF'] = array(2,',','.');          //  Euro
        $currencies['GRD'] = array(2,',','.');          //  Euro
        $currencies['IEP'] = array(2,',','.');          //  Euro
        $currencies['ITL'] = array(2,',','.');          //  Euro
        $currencies['LUF'] = array(2,',','.');          //  Euro
        $currencies['NLG'] = array(2,',','.');          //  Euro
        $currencies['PTE'] = array(2,',','.');          //  Euro
        $currencies['GHC'] = array(2,'.',',');          //  Ghana, Cedi
        $currencies['GIP'] = array(2,'.',',');          //  Gibraltar Pound
        $currencies['GTQ'] = array(2,'.',',');          //  Guatemala, Quetzal
        $currencies['HNL'] = array(2,'.',',');          //  Honduras, Lempira
        $currencies['HKD'] = array(2,'.',',');          //  Hong Kong Dollar
        $currencies['HUF'] = array(0,'','.');           //  Hungary, Forint
        $currencies['ISK'] = array(0,'','.');           //  Iceland Krona
        $currencies['INR'] = array(2,'.',',');          //  Indian Rupee
        $currencies['IDR'] = array(2,',','.');          //  Indonesia, Rupiah
        $currencies['IRR'] = array(2,'.',',');          //  Iranian Rial
        $currencies['JMD'] = array(2,'.',',');          //  Jamaican Dollar
        $currencies['JPY'] = array(0,'',',');           //  Japan, Yen
        $currencies['JOD'] = array(3,'.',',');          //  Jordanian Dinar
        $currencies['KES'] = array(2,'.',',');          //  Kenyan Shilling
        $currencies['KWD'] = array(3,'.',',');          //  Kuwaiti Dinar
        $currencies['LVL'] = array(2,'.',',');          //  Latvian Lats
        $currencies['LBP'] = array(0,'',' ');           //  Lebanese Pound
        $currencies['LTL'] = array(2,',',' ');          //  Lithuanian Litas
        $currencies['MKD'] = array(2,'.',',');          //  Macedonia, Denar
        $currencies['MYR'] = array(2,'.',',');          //  Malaysian Ringgit
        $currencies['MTL'] = array(2,'.',',');          //  Maltese Lira
        $currencies['MUR'] = array(0,'',',');           //  Mauritius Rupee
        $currencies['MXN'] = array(2,'.',',');          //  Mexican Peso
        $currencies['MZM'] = array(2,',','.');          //  Mozambique Metical
        $currencies['NPR'] = array(2,'.',',');          //  Nepalese Rupee
        $currencies['ANG'] = array(2,'.',',');          //  Netherlands Antillian Guilder
        $currencies['ILS'] = array(2,'.',',');          //  New Israeli Shekel
        $currencies['TRY'] = array(2,'.',',');          //  New Turkish Lira
        $currencies['NZD'] = array(2,'.',',');          //  New Zealand Dollar
        $currencies['NOK'] = array(2,',','.');          //  Norwegian Krone
        $currencies['PKR'] = array(2,'.',',');          //  Pakistan Rupee
        $currencies['PEN'] = array(2,'.',',');          //  Peru, Nuevo Sol
        $currencies['UYU'] = array(2,',','.');          //  Peso Uruguayo
        $currencies['PHP'] = array(2,'.',',');          //  Philippine Peso
        $currencies['PLN'] = array(2,'.',' ');          //  Poland, Zloty
        $currencies['GBP'] = array(2,'.',',');          //  Pound Sterling
        $currencies['OMR'] = array(3,'.',',');          //  Rial Omani
        $currencies['RON'] = array(2,',','.');          //  Romania, New Leu
        $currencies['ROL'] = array(2,',','.');          //  Romania, Old Leu
        $currencies['RUB'] = array(2,',','.');          //  Russian Ruble
        $currencies['SAR'] = array(2,'.',',');          //  Saudi Riyal
        $currencies['SGD'] = array(2,'.',',');          //  Singapore Dollar
        $currencies['SKK'] = array(2,',',' ');          //  Slovak Koruna
        $currencies['SIT'] = array(2,',','.');          //  Slovenia, Tolar
        $currencies['ZAR'] = array(2,'.',' ');          //  South Africa, Rand
        $currencies['KRW'] = array(0,'',',');           //  South Korea, Won
        $currencies['SZL'] = array(2,'.',', ');         //  Swaziland, Lilangeni
        $currencies['SEK'] = array(2,',','.');          //  Swedish Krona
        $currencies['CHF'] = array(2,'.','\'');         //  Swiss Franc 
        $currencies['TZS'] = array(2,'.',',');          //  Tanzanian Shilling
        $currencies['THB'] = array(2,'.',',');          //  Thailand, Baht
        $currencies['TOP'] = array(2,'.',',');          //  Tonga, Paanga
        $currencies['AED'] = array(2,'.',',');          //  UAE Dirham
        $currencies['UAH'] = array(2,',',' ');          //  Ukraine, Hryvnia
        $currencies['USD'] = array(2,'.',',');          //  US Dollar
        $currencies['VUV'] = array(0,'',',');           //  Vanuatu, Vatu
        $currencies['VEF'] = array(2,',','.');          //  Venezuela Bolivares Fuertes
        $currencies['VEB'] = array(2,',','.');          //  Venezuela, Bolivar
        $currencies['VND'] = array(0,'','.');           //  Viet Nam, Dong
        $currencies['ZWD'] = array(2,'.',' ');          //  Zimbabwe Dollar

        function formatinr($input){
            //CUSTOM FUNCTION TO GENERATE ##,##,###.##
            $dec = "";
            $pos = strpos($input, ".");
            if ($pos === false){
                //no decimals   
            } else {
                //decimals
                $dec = substr(round(substr($input,$pos),2),1);
                $input = substr($input,0,$pos);
            }
            $num = substr($input,-3); //get the last 3 digits
            $input = substr($input,0, -3); //omit the last 3 digits already stored in $num
            while(strlen($input) > 0) //loop the process - further get digits 2 by 2
            {
                $num = substr($input,-2).",".$num;
                $input = substr($input,0,-2);
            }
            return $num . $dec;
        }


        if ($curr == "INR"){    
            return formatinr($floatcurr);
        } else {
            return number_format($floatcurr,$currencies[$curr][0],$currencies[$curr][1],$currencies[$curr][2]);
        }
    

}
	
	
	
	
	
}
?>