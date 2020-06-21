<?php
/*
 * paging.php
 * 
 * Elaborado por: Moisés Icaza
 * Fecha: 01/08/2013
 * 
 * Paginación de registros utilizando PHP (5.4)
 * y componentes de Bootstrap.
 * 
 */

/* constantes */
const HOST = '69.162.154.57:3307';
const USER = 'arquitect_bourne';
const PASSWD = 'SoporteBourne2013';
const DB = 'arquitect_bourne';
const TABLE = 'Articulos';

/* variables */
$order="ItemCode ASC";
$url = basename($_SERVER ["PHP_SELF"]);
/*Mostrara 20 elementos por pagina*/
$limit_end = 50;
/*Crea las variables de limites para cada pagina*/
$init = ($ini-1) * $limit_end;

/* CUENTA LOS REGISTROS */
$count="SELECT COUNT(*) FROM ".TABLE."";
/* SELECCIONTA TODO DE LA TABLA segun los limites*/
$select = "SELECT *FROM ".TABLE." ORDER BY $order LIMIT $init, $limit_end";

/* conexión al servidor de base de datos */
$mysql = new mysqli(HOST, USER, PASSWD, DB);

if ($mysql->connect_error) 
{
  die("Error al conectarse al servidor");
   
}else{
   /*$num optubo el numero de registros*/
  $num = $mysql->query($count);
  /*obtiene los resultados en el arreglo $x*/
  $x = $num->fetch_array();
 
 /*ceil redonde el numero de filas $x[0] entre el numero de registros a mostrar $limit_end, para obtener el numero de paginas a mostrar $total  en un valor entero*/
  $total = ceil($x[0]/$limit_end);

  echo "<table border='1' class='table table-bordered table-hover'>";
  echo "<thead>";
  echo "<tr>";
  echo "<th><b>ItemCode</b></th>";
  echo "<th><b>ItemCode</b></th>";
  echo "<th><b>ItemCode</b></th>";
  echo "<th><b>ItemCode</b></th>";
  echo "<th><b>ItemCode</b></th>";
  echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
 
 /*Ejecuta la consulta y $c obtiene el resultado de la consulta */
  $c = $mysql->query($select);
  /* recorre los resultado y crea el arreglo para ir mostrando los resultados por cada llamad a la pagina*/
  while($rows = $c->fetch_array())
  {
    echo "<tr>";
    echo "<td>".$rows['ItemCode']."</td>";
    echo "<td>".$rows['ItemCode']."</td>";
    echo "<td>".$rows['ItemCode']."</td>";
    echo "<td>".$rows['ItemCode']."</td>";
    echo "<td>".$rows['ItemCode']."</td>";
    echo "</tr>";
  }
 
  echo "</tbody>";
  echo "<table>";
 
 
 /* ---------------  AQUI SE CREA LOS NUMEROS DE LAS PAGINAS -----------------------*/
  /* numeración de registros [importante]*/
  echo "<div class='pagination'>";
  echo "<ul>";
  /****************************************/
  if(($ini - 1) == 0)
  {
    echo "<li><a href='#'>&laquo;</a></li>";
  }
  else
  {
    echo "<li><a href='$url?pos=".($ini-1)."'><b>&laquo;</b></a></li>";
  }
  /****************************************/
  for($k=1; $k <= $total; $k++)
  {
    if($ini == $k)
    {
      echo "<li><a href='#'><b>".$k."</b></a></li>";
    }
    else
    {
      echo "<li><a href='$url?pos=$k'>".$k."</a></li>";
    }
  }
  /****************************************/
  if($ini == $total)
  {
    echo "<li><a href='#'>&raquo;</a></li>";
  }
  else
  {
    echo "<li><a href='$url?pos=".($ini+1)."'><b>&raquo;</b></a></li>";
  }
  /*******************END*******************/
  echo "</ul>";
  echo "</div>";
}
?>