<?php

class test extends Thread{ 
   private $file;
    private $filename;
   public function __construct($file1,$filename1){
        $this->file = $file1;
        $this->filename = $filename1;
    }
    public function run(){ 
      Descargar(); // PRINT -> NULL 
    } 
} 




  if (isset($_GET["Clave"])) { 
    try
    {   
       $file = 'XMLs/FE/'.$_GET["Clave"].'/'.$_GET["Clave"].'.pdf';
       $filename = $_GET["Clave"].'.pdf';
       $workers=new test($file,$filename); 
       $workers->start();
     }catch(Exception $e){
        $Returna= "error ".$e;
    }
 /*
    // Descarga la representacion grafica
    $file = 'XMLs/FE/'.$_GET["Clave"].'/'.$_GET["Clave"].'.pdf';
     $filename = $_GET["Clave"].'.pdf';
      if (file_exists($file)) {
        Descargar($file,$filename);
    } else {
        echo "El fichero  $fileo no existe";
    }
     


 // Descarga el XML de la FE para que sea aprobada
     $file = 'XMLs/FE/'.$_GET["Clave"].'/'.$_GET["Clave"].'.xml';
     $filename = $_GET["Clave"].'.xml';
    if (file_exists($file)) {
        Descargar($file,$filename);
    } else {
        echo "El fichero  $fileo no existe";
    }
   
     

    // Descarga el xml de la respuesta de hacienda
     $file = 'XMLs/RH/'.$_GET["Clave"].'/'.$_GET["Clave"].'_RH.xml';
     $filename = $_GET["Clave"].'_RH.xml';
     Descargar($file,$filename);*/
  }else
  {
    echo "Defina la clave a descargar";
  }

function Descargar($file,$filename)
{
  if (is_file($file)) {
          //header("Content-Type: application/octet-stream");
          header("Content-Type: application/force-download");
          header("Content-Disposition: attachment; filename=\"$filename\"");
          readfile($file);
      } else {
        die("Error: no se encontró el archivo '$file'");
      }
   
 
}


?>