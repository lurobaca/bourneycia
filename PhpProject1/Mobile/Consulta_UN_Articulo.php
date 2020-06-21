<link rel="stylesheet" type="text/css" href="../../1Bourneycia New/Plantilla/css/EstiloPlantilla.css"/>

<?php


require('Class/Articulos.class.php');
$objArticulos=new Articulos;
$consulta=$objArticulos->mostrar_Articulos();

require('Class/Usuarios.class.php');
$objUsuarios=new Usuarios;
if (isset($_SESSION ['usuario']))
$PrecioSegunCliente=$objUsuarios->Precio_SegunCliente ($_SESSION ['usuario']);
else 
 $Precio = ""

?>

<?php 

$objArticulos=new Articulos;

if(isset($_POST['submit'])){
	
	//Busqueda por FAMILIA
	if (isset($_POST['FAMILIA'])){
		 $FAMILIA = htmlspecialchars_decode(trim($_POST['FAMILIA']));
	     $ARTICULOS_BUSCADOS=$objArticulos->mostrar_Articulo_familia($FAMILIA);
	     $cont = 0;
     	 if(mysql_num_rows($ARTICULOS_BUSCADOS)){
		  while( $Articulos = mysql_fetch_array($ARTICULOS_BUSCADOS) ) {	 
		   echo "
			 <div id='fila-".$Articulos['ItemCode']." style='	margin:5px;
				height:200PX;
				border-bottom:thin solid #CCC;
				text-align:center;
				width: 800PX;
				padding:5px;
				margin-top:10px;'>
			    <DIV style='float:left; width:19%;'>
			    <img src='img/Proveedores/P005.gif' >
		        </DIV>
		       <div style='float:left; width:80%;'>
			   <strong style='font-size:12px;'>  Descipcion:</strong> ' '" .$Articulos['ItemName']."<br>
			   <strong>  Cod:</strong> ' '".$Articulos['ItemCode']." <br>
			   <strong>  Bar Cod:</strong>  ' '".$Articulos['codbarras']."<br>
			   <strong>  Unidades Disponibles:</strong>  ' '".number_format($Articulos['existencia'], 0, ",", "") ." <br>
			   <strong>  Precio:</strong> ' '".number_format($Articulos['Price'], 2, ",", "")."<br>
			  <button class='Botones' name='btsend' id='btsend' type='submit'> Agregar </button><br>
			  </div>
			 </div>
				";
	    } }else { echo "No se encontro nada";}
		}
	
	
			//Busqueda por CATEGORIA	
	if (isset($_POST['CATEGORIA'])){ 
	    $CATEGORIA = htmlspecialchars_decode(trim($_POST['CATEGORIA']));
	    $ARTICULOS_BUSCADOS=$objArticulos->mostrar_Articulo_categoria($CATEGORIA);
	     $cont = 0;
     	 if(mysql_num_rows($ARTICULOS_BUSCADOS)){
		  while( $Articulos = mysql_fetch_array($ARTICULOS_BUSCADOS) ) {	 
		   echo "
			 <div id='fila-".$Articulos['ItemCode']." style='	margin:5px;
				height:200PX;
				border-bottom:thin solid #CCC;
				text-align:center;
				width: 800PX;
				padding:5px;
				margin-top:10px;'>
			    <DIV style='float:left; width:19%;'>
			    <img src='img/Proveedores/P005.gif' >
		        </DIV>
		       <div style='float:left; width:80%;'>
			   <strong style='font-size:12px;'>  Descipcion:</strong> ' '" .$Articulos['ItemName']."<br>
			   <strong>  Cod:</strong> ' '".$Articulos['ItemCode']." <br>
			   <strong>  Bar Cod:</strong>  ' '".$Articulos['codbarras']."<br>
			   <strong>  Unidades Disponibles:</strong>  ' '".number_format($Articulos['existencia'], 0, ",", "") ." <br>
			   <strong>  Precio:</strong> ' '".number_format($Articulos['Price'], 2, ",", "")."<br>
			  <button class='Botones' name='btsend' id='btsend' type='submit'> Agregar </button><br>
			  </div>
			 </div>
				";
	    } }else { echo "No se encontro nada";}	
	}
	
	
	//Busqueda por MARCA	
	if (isset($_POST['MARCA'])){ 
	    $MARCA = htmlspecialchars_decode(trim($_POST['MARCA']));
	    
		 $ARTICULOS_BUSCADOS=$objArticulos->mostrar_Articulo_marca($MARCA);
	     $cont = 0;
     	 if(mysql_affected_rows($ARTICULOS_BUSCADOS)){
		  while( $Articulos = mysql_fetch_array($ARTICULOS_BUSCADOS) ) {	 
		   echo "
			 <div id='fila-".$Articulos['ItemCode']." style='	margin:5px;
				height:200PX;
				border-bottom:thin solid #CCC;
				text-align:center;
				width: 800PX;
				padding:5px;
				margin-top:10px;'>
			    <DIV style='float:left; width:19%;'>
			    <img src='img/Proveedores/P005.gif' >
		        </DIV>
		       <div style='float:left; width:80%;'>
			   <strong style='font-size:12px;'>  Descipcion:</strong> ' '" .$Articulos['ItemName']."<br>
			   <strong>  Cod:</strong> ' '".$Articulos['ItemCode']." <br>
			   <strong>  Bar Cod:</strong>  ' '".$Articulos['codbarras']."<br>
			   <strong>  Unidades Disponibles:</strong>  ' '".number_format($Articulos['existencia'], 0, ",", "") ." <br>
			   <strong>  Precio:</strong> ' '".number_format($Articulos['Price'], 2, ",", "")."<br>
			  <button class='Botones' name='btsend' id='btsend' type='submit'> Agregar </button><br>
			  </div>
			 </div>
				";
	    } }else { echo "No se encontro nada";}	
	}

	
	//Busqueda por DESCRIPCION
	if (isset($_POST['DESCRIPCION'])){ 
		$DESCRIPCION = htmlspecialchars_decode(trim($_POST['DESCRIPCION']));
		$ARTICULOS_BUSCADOS=$objArticulos->mostrar_Articulo($DESCRIPCION);
		$cont = 0;
		if($ARTICULOS_BUSCADOS){
		 while( $Articulos = mysql_fetch_array($ARTICULOS_BUSCADOS) ) {
		 
		 
		/*echo " <article>
              <div id='fila-".$Articulos['ItemCode']."' class='Producto'>
              <img src='img/Articulos/P005/DSC00735.JPG' width='1003' height='752'>
              <div class='DescripcionArticulo'>
              <h4>" .$Articulos['ItemName']."</h4>
              <div id='InfoArticulo'>
              <div >    
	  		       <p><strong>Cod Barras :</strong>  '".$Articulos['codbarras']."</p>
		           <p><strong>Precio     :</strong> ".number_format($Articulos['Price'], 2, ",", "")."</p>
		      </div>
        
		      <div > 
        	 	 <p><strong>Gramaje :</strong> 30g </p>
	        	 <p><strong>Disponibles:</strong>  ".number_format($Articulos['existencia'], 0, ",", "") ."</p>
	         </div>
           </div>     
         <a href='#'> <div id='Add'> Agregar</div></a>  
     </div>
     </div>
              </article>";*/
			  
			  
			   echo "     <article>
                              <div id='fila-".$Articulos['ItemCode']."' class='ProductoIndex'>
                                <img src='img/Articulos/P005/DSC00735.JPG' width='100' height='752'>
                              	<div class='DescripcionArticulo'>
                                    <h4>" .$Articulos['ItemName']."</h4>
                                    
                                    <div id='InfoArticulo'>
                                      <p><strong>Cod Barras :</strong></p>
                                      <p>".$Articulos['codbarras']." </p>
                                      <p><strong>Precio :</strong> </p>
                                      <p> ₡".$Precio." </p>
                                      <p><strong>Gramaje :</strong>  </p>
                                      <p> 3333 </p>
                                      <p><strong>Disponibles:</strong> </p>
                                      <p> ".number_format($Articulos['existencia'], 0, ",", "") ." </p>                  
                                      <p><strong>Cod Articulo :</strong>  </p>
                                      <p> ".$Articulos['ItemCode']." </p>
                                     
                                     </div> ";
									  if (isset($_SESSION ['usuario']))     echo"<a href='#'> <div id='Add'> Agregar</div></a>";
                     echo"     </div>
                           </div>
                        </article>	";
		 
	    }   
		}else { echo "No se encontro nada";}}
}
?>