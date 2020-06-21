<script language="JavaScript" src="js/jquery-1.5.1.min.js"></script>
<script language="JavaScript" src="js/jquery-ui-1.8.13.custom.min.js"></script>
<script type="text/javascript" src="js/Funcion.js"></script>
<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.13.custom.css" rel="stylesheet" />


<!--<link rel="stylesheet" type="text/css" href="../css/Clases.css"/>-->


<?php
	//include("conexion.php");//se incluyen los datos para realizar la conexion a su base de datos
	//require_once('../Class/Articulos.class.php');
	$objArticulo=new Articulos;
	$query = $objArticulo->Select_ListAutoCompletar()
	//$con = "select  ItemName from Articulos LIMIT 50 ";//consulta para seleccionar las palabras a buscar, esto va a depender de su base de datos
	//$query = mysql_query($con);
?>
    
<script>
	$(function() {
				<?php
					while($row= mysql_fetch_array($query)) {//se reciben los valores y se almacenan en un arreglo
				      $elementos[]= '"'.$row['ItemName'].'"';
	  					}
					$arreglo= implode(", ", $elementos);//junta los valores del array en una sola cadena de texto
				?>	
		
				var availableTags=new Array(<?php echo $arreglo; ?>);//imprime el arreglo dentro de un array de javascript
				
				$( "#tags1" ).autocomplete({
					source: availableTags,
					select: function( event, ui ) {
					         var selectedObj = ui.item;              
    						 ObtieneDatosDePagia(0,15,<?php 
			   													 if (trim($_SESSION ['usuario']) <> "")
																     echo trim("'".$_SESSION ['usuario']."'"); 
																  else 
																     echo "0"; 
																  ?>,selectedObj.value);
								$("#tags1").val("");
							
								$("#EliminarBusqueda").css("display","block");
								
                           						
					                },
        				 minLength: 4						 
				}).keyup(function (e) {
       			 if(e.which === 13) {
           			 $(".ui-menu-item").hide();
					 
					 if($("#tags1").val()!="")
					 	{
								$("#EliminarBusqueda").css("display","block");
								$("#tags").css("weight","30%");
							}
								$("#tags1").val("");
        			}            
    			});
				
				
				
	
		});
</script>

<br />
    <form method="post" action="Paginacion/ObtieneDatosDePagia.php" onsubmit="ObtieneDatosDePagia(0,15,<?php 
			   																									  if (trim($_SESSION ['usuario']) <> "")
																												     echo trim("'".$_SESSION ['usuario']."'"); 
																												  else 
																												     echo "0"; 
																												  ?>,''); return false">
	<div> 

	<input id="tags1" name="nombre" class="CajaTextoBuscarArticulo" placeholder="Busca AQUI" style="float:left; width:90%; margin-top:-10px;" onclick="this.value=''" >
    <br />
    
   <input name="Enviar" type="submit" value="Buscar"  style=" border: 1px solid #fbcb09; background:  #F90;  border-radius:5px; font-weight: bold; font-size:14px; color:  #FFF; height:30px; width:95%; zoom:1;float:left;;" /> 
   
   <br />
  <!-- <input name="VerFotos" type="submit" value="Ver Fotos"  style=" border: 1px solid #fbcb09; background:  #F90;  border-radius:5px; font-weight: bold; font-size:11px; color:  #FFF; height:30px; width:90%; zoom:1;float:left;;" />-->
  
   
     
   <br />
   <a  style='border: 1px solid #fbcb09; background:  #F90;  border-radius:5px; font-weight: bold; font-size:14px; color:  #FFF; height:25px; width:95%; zoom:1; cursor:pointer; display:none;float:left;margin-top:2px; padding-top:4px; display:none; text-align:center; '  id ='EliminarBusqueda'  onclick="ObtieneDatosDePagia(0,15,<?php 
			   																									  if (trim($_SESSION ['usuario']) <> "")
																												     echo trim("'".$_SESSION ['usuario']."'"); 
																												  else 
																												     echo "0"; 
																												  ?>,'','NOMostrarRutero'); return false">Limpiar</a>
     </div>
  
  
</form>
