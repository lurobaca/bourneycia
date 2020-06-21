<?php 
require('Class/Articulos.class.php');
$objArticulo=new Articulos;
/* Activa o desactiva mostrar las fotos para dar mejor rendimiento*/
if(isset($_POST['Accion'])=="Mostrar")
  $objArticulo->OcultaMuestraFotos(trim($_POST['usuario']),trim($_POST['Accion']));

/* DESActiva  mostrar las fotos para dar mejor rendimiento*/
if(isset($_POST['Accion'])=="Ocultar")
  $objArticulo->OcultaMuestraFotos(trim($_POST['usuario']),trim($_POST['Accion']));

if(isset($_POST['Accion'])=="Select")
  $objArticulo->SELECTOcultaMuestraFotos();

?>