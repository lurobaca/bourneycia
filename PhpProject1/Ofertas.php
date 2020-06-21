<?php
require('Clases/DBOfertas.php');
$obj_Class_Ofertas=new Class_Ofertas;
$Nombre= "";

if(isset($_POST["submit"])){
    
    if($_POST["Accion"] =="Flash"){

      $CodigoSCA=$_POST['CodigoSCA'];
      $CodigoDisc=$_POST['CodigoDisc'];
      $Descrpcion=$_POST['Descrpcion'];
      $Precio=$_POST['Precio'];
      $Foto=$_POST['Foto'];
      $FechaIni=$_POST['FechaIni'];
      $FechaFin=$_POST['FechaFin'];


           $Nombre=  $obj_Class_Ofertas->GuardaOferta($CodigoSCA,$CodigoDisc,$Descrpcion, $Precio, $Foto,$FechaIni,$FechaFin);

    
    }
  }
    ?>