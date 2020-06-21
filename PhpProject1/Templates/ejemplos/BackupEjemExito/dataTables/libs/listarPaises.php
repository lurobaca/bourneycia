<?php 
	require_once('conexion.php');
	$cn=  Conectarse();
	$listado=  mysql_query("SELECT * FROM Articulos ORDER BY ItemCode DESC",$cn);
?>

<script type="text/javascript" language="javascript" src="js/jslistadopaises.js"></script>
       <table cellpadding="0" cellspacing="0" border="0" class="display" id="tabla_lista_paises">
          <thead>
          <tr>
            <th>Descripcion</th>
            <th>Cod Articulo</th><!--Estado-->
            <th>Cod Barras</th>
            <th>Disonibles</th>
            <th>Foto</th>
             <th>Agregar</th>
          </tr>
          </thead>
          <tfoot>
           <tr>
           <th></th>
           <th></th>
           </tr>
          </tfoot>
          <tbody>
            <?php
			//recorre la lista que se le envia creando los obejtos
              while($reg=  mysql_fetch_array($listado))
                   {
					echo '<tr>';
					echo '<td>'.mb_convert_encoding($reg['ItemName'], "UTF-8").'</td>';
                    echo '<td >'.mb_convert_encoding($reg['ItemCode'], "UTF-8").'</td>';
                  	echo '<td>'.mb_convert_encoding($reg['codbarras'], "UTF-8").'</td>';
					echo '<td>'.mb_convert_encoding(number_format($reg['existencia'], 0, ",", ""), "UTF-8").'</td>';
					echo '<td ><img src="images/DSC00735.JPG" width="100" height="100"></td>';
					 echo"<td><a href='#'> <div id='Add'> Agregar</div></a></td>";
                    echo '</tr>';               
                    }
            ?>
          <tbody>
        </table>
