<?php
include_once("Class/Inventario_Login2.php");
$obj_dbmodel_login=new Inventario;

if($_GET["Accion"] =="Actualiza"){
 //manda a llamar el conteo de la linea segun el codigo del inventario que hace falta
 $Resultado=$obj_dbmodel_login->ObtieneDetLinea($_GET["CodArticulo"],$_GET["Grupo"],$_GET["Conteo"]);
 if(mysql_num_rows($Resultado)){
    while( $Articulos = mysql_fetch_array($Resultado) ) {
    ?>
<!doctype html>
<html lang="es">
	<head>
	 <title></title>
	 <meta charset="utf-8">
	 <meta http-equiv="Expires" content="0" />
	 <meta http-equiv="Pragma" content="no-cache" />
     <meta name"viewport" content"width=divice-with,initial-scale=1,maximum-scale=1"/>
    <link rel="stylesheet" type="text/css" href="css/Normalyse.css"> 
    <link rel="stylesheet" type="text/css" href="css/Inventario.css">
     
     <script src="js/Jquery.js"></script>
     <script src="js/Inventario.js"></script>
     <script>
     $( document ).ready(function() {
     $( "#Contaron" ).focus();
   	
				if(history.forward(1)){
				history.replace(history.forward(1));
				}

   
    });
 
    </script>


	</head>

	<body>
		
		
		<section>
			<article>



		<form action="#" method="post" class="formul">
			
            
			<!--<input name="nombre" id="Descripcion"  rows="3"  type="text" class="CajaTexto" placeholder="" required  value="<?php echo $Articulos['Descripcion']; ?>" readonly /><br />-->
				
			<input name="nombre" id="CodArticulo" type="text" class="CajaTexto" placeholder="" required  value="<?php echo $_GET["CodArticulo"]; ?>" readonly /><br />
				<LABEL>Cod Barras</LABEL>
			<input name="nombre" id="CodBarras" type="text" class="CajaTexto" placeholder="" required  value="<?php echo $Articulos['CodBarras'];   ?>" readonly /><br />
            <LABEL>Descripcion</LABEL>
			 <textarea name="Descripcion" id="Descripcion"    class="CajaTextoGrande" rows="3"  readonly   placeholder=""><?php echo $Articulos['Descripcion'];      ?></textarea><br />
				  <LABEL>Cantidad</LABEL>
			<input name="nombre" id="Contaron" type="number" class="CajaTexto" placeholder="Cantidad aqui" required  value="<?php if($Articulos['Contaron']=="0") {echo "";} else echo $Articulos['Contaron'];      ?>"  autocomplete="off" /><br />

			<div style="width:100%;  overflow: auto;">	
		
			<DIV style="float: left; ">
				<button name="btsend" id="btsendContact" type="submit" class="myButton" onclick="Conto($('#CodArticulo').val(),$('#Contaron').val(),$('#Apuntes').val(),$('#Conteo').val(),$('#Costo').val(),$('#Stock').val(),$('#Busqueda').val(),'<?php echo $_GET['Grupo'];?>','<?php echo $_GET['Conteo']?>'); return false">ACEPTAR</button>
				</div>
                	<DIV style="float: left; ">
				
				<button name="btsend" id="btRegresar" type="submit" class="myButton" onclick="Regresar('Lista',$('#Busqueda').val()); return false">REGRESAR</button>
				</div>
			</div>

					
					

					
					<textarea name="Text1" id="Apuntes"  rows="5" class="CajaTextoGrande"   placeholder="Apuntes aquí"><?php echo $Articulos['Apuntes'];      ?></textarea><br />
				
					<br />
					<input name="Costo" id="Costo"  type = "hidden" class="CajaTexto2" placeholder=""  required  value="<?php echo $Articulos['Costo'];?>" readonly /><br />
    				<input name="Stock" id="Stock"  type = "hidden" class="CajaTexto2" placeholder=""  required  value="<?php echo $Articulos['Stock'];?>" readonly /><br />
            		<input name="Conteo" id="Conteo" type = "hidden" class="CajaTexto2" placeholder=""  required  value="<?php echo $_GET["Conteo"];?>" readonly /><br />
           		 	<input name="Busqueda" id="Busqueda" type = "hidden" class="CajaTexto2" placeholder=""  required  value="<?php echo $_GET["Busqueda"];?>" readonly /><br />
					

				</form>
				
			</article>		
		</section>

		<footer>
			
		</footer>
	</body>
</html>

<?php
    } 
  
    }else { echo "No se encontro nada";}
}


?>