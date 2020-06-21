<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php
/*
* autor: Abraham Zenteno Sánchez
* mail:  abzenteno@gmail.com

* page: http://abzenteno.blogspot.com
*/
$host = "69.162.154.57:330";
$user = "arquitect_bourne";
$passwd = "SoporteBourne2013";
$database = "arquitect_bourne";


//provando conexion con mysql
$db = mysql_connect($host,$user,$passwd);

//provando conexion con la base de datos
@mysql_select_db($database,$db);

$rows_for_page = 1; //numero de registros a mostra
$sql = "SELECT * FROM page_next_previus";
$result = mysql_query($sql, $db);
//total de registros existentes en la tabla
$total_records = @mysql_num_rows($result);

//total de paginas
$pages = ceil($total_records / $rows_for_page);

@mysql_free_result($result);

//si no existe por GET la var screen coloca por defecto el valor de 0
if (!isset($_GET['screen']))
  $screen = 0;
//de lo contrario asigna el valor por get a $position
else
  $position = (int)$_GET['screen'];

//comenzando el paginado
$start = $screen * $rows_per_page;
//consulta ala db por limites
$sql = "SELECT * FROM page_next_previus order by id ASC LIMIT ".$position.",".$rows_for_page;
//ejecuta el query
$result = mysql_query($sql, $db);
//resultados de la consulta (total)
$rows = @mysql_num_rows($result);






// -----------------------------------------------------------
// AQUI SE IMPRIMEN LOS REGISTROS EN FORMA DE TABLA, HAY QUE TRATAR DE PASARLO A FORMA DE DIV
//---------------------------------------------------------
for ($i = 0; $i < $rows; $i++) {
  $title = mysql_result($result,$i,1);
  $content = mysql_result($result,$i,2);
  echo "<h1> $title </h1>
      <br>
      <p>$content</p><br>";
}


//comienza el paginado
echo '<p><hr></p>
<div style="width:100%; text-align:center;">';
//si posicion es mayor o igual a 1 quiere decir que muestre la parte Primero y Anterior de la paginación
if ($position >= 1) {
  $url = "pag_next.php?screen=0";
  echo "<a href=\"$url\">Primero</a>\n";
  //para que el preius no termine con valor 0
   $url = "pag_next.php?screen=" .($position-1);
  echo "<a href=\"$url\">Anterior</a>\n";
}
//sirve para expandir el prollecto para poder paginar de la manera (Primero Anterior | 0 | 1 | 2 | 3 | Siguiente Ultimo)
/*for ($i = 0; $i < $pages; $i++) {
  $url = "pag_next.php?screen=" . $i;
  echo " | <a href=\"$url\">$i</a> | ";
}*/



//muestra total de resultados 1 de N
echo '<strong>'.($position+1).' de '.$pages.' </strong>';



//si position es menor a el valor entre los parentesis muestra la parte (Siguiente Ultimo)
if ($position < ($pages-1)) {
  $url = "pag_next.php?screen=" . ($position+1);
  echo "<a href=\"$url\">Siguiente</a>\n";
  $url = "pag_next.php?screen=" . ($pages-1);
  echo "<a href=\"$url\">Ultimo</a>\n";
}
echo '</div>';
?>
</body>
</html>
