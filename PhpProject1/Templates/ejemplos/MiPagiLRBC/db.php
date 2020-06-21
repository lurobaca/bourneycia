<?php


function Conectarse(){
$servidor="69.162.154.57:3307";
$basededatos="arquitect_bourne";
$usuario="arquitect_bourne";
$clave="SoporteBourne2013";
$cn=mysql_connect($servidor,$usuario,$clave) or die ("Error conectando a la base de datos");
mysql_select_db($basededatos ,$cn) or die("Error seleccionando la Base de datos");
mysql_query ("SET NAMES 'utf8'");
return $cn;}
?>