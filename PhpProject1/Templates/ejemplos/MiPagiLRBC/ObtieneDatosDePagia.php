<?php
include("Pagina.php");
	//$FilasAMostrarXPagina con esto indicamos el numero de finas a mostrar x pagina , este valor tambine se usa como el LIMIT dek SELECT * FROM Articulos LIMIT 50
	$FilasAMostrarXPagina = 50;

/*Si se envia page es por que se desea mostrar los siguientes 10 link de paginas*/
if($_POST['LimiteINICIO'])
{

$LimiteINICIO = $_POST['LimiteINICIO'];
$LimiteFIN  =  $_POST['LimiteFIN'];

}else{
	$Cont = 1;
	$MaxPaginasAMostrar = 10;
	$LimiteINICIO =0 ;
    $LimiteFIN  =  $FilasAMostrarXPagina;
}
	$objArticulos=new Paginas;
	$result=$objArticulos->ConsultaDatosdePagina($LimiteINICIO,$LimiteFIN);
	$FilasObtenidas = mysql_num_rows($result);
	$Precio = 0;
	 if($FilasObtenidas){
			$row=mysql_fetch_row($result);
			echo "numero de filas obtenidas " . mysql_num_rows($result) . "dato en posicion 0" .$row[0];
	 	    $Cont = 0;
			while ($Cont < $FilasObtenidas){
							
					
					
					
					  echo "     <article>
                              <div id='fila-".$row[0]."' class='ProductoIndex'>
                                  <img src='DSC00735.JPG' width='100' height='752'>
                              	<div class='DescripcionArticulo'>
                                    <h4>" .$row[0]."</h4>
                                    
                                    <div id='InfoArticulo'>
                                      <p><strong>Cod Barras :</strong></p>
                                      <p>".$row[0]." </p>
                                      <p><strong>Precio :</strong> </p>
                                      <p> ₡".$Precio." </p>
                                      <p><strong>Gramaje :</strong>  </p>
                                      <p> 3333 </p>
                                      <p><strong>Disponibles:</strong> </p>
                                      <p> ".number_format($row[0], 0, ",", "") ." </p>                  
                                      <p><strong>Cod Articulo :</strong>  </p>
                                      <p> ".$row[0]." </p>
                                     
                                     </div> ";
									  if (isset($_SESSION ['usuario']))     echo"<a href='#'> <div id='Add'> Agregar</div></a>";
                     echo"     </div>
                           </div>
                        </article>	";
						
						
					$Cont+=1;
		           }
			}


?>



