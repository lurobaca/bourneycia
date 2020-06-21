<?php
include_once("conexion.class.php");
class Class_Ofertas{
	//constructor	
	var $con;
 	function Class_Ofertas(){
 		$this->con=new conexion;
 	}

 function GuardaOferta($CodigoSCA,$CodigoDisc,$Descrpcion,$Tipo,$Precio,$Foto,$FechaIni,$FechaFin){
    try{
	     if($this->con->conectar()==true){
			$Res=$this->ExisteOferta($$CodigoSCA);
			if($Res=="NOEXISTE"){
              $Estado=mysql_query("INSERT INTO `arquitect_bourne`.`SCA_OF` (`id`, `Cod_SCA`, `Cod_Distribuidor`, `Descripcion`, `Precio`, `Foto`, `Tipo`, `Activa`, `FechaCreacion`, `FechaFinalizacion`) VALUES (NULL, '074002564', '074002564', 'OFERTA PRUEBA', '1000', 'img/074002564.jpg', 'Flash', '1', '2017-05-13', '2017-05-31');")or die ("Problema con query");
			}else{

			 $Estado=mysql_query("UPDATE `arquitect_bourne`.`SCA_OF` SET `Cod_SCA`='".$CodigoSCA."',`Cod_Distribuidor`='".$CodigoDisc."',`Descripcion`='".$Descrpcion."',`Precio`='".$Precio."',`Foto`='".$Foto."',`Tipo`='".$Tipo."',`Activa`='1',`FechaCreacion`='".$FechaIni."',`FechaFinalizacion`='".$FechaFin."' WHERE `id`='".$nombre."'") or die ("Problema con query");
			}
        return "Guardado Correctamente";
	     }else
			   return "Error al conectar";
     } catch(Exception $e){
                return "Error al agrega GuardaOferta " . $e;
         }
}
function ExisteOferta($CodigoSCA){
 	try{
		$respuesta=0;
  		if($this->con->conectar()==true){
		$Resultado = mysql_query("SELECT count(`id`) as conto FROM `arquitect_bourne`.`SCA_OF` WHERE id='".$id."';") or die("No se pudo conectar: " . mysql_error()); 
     	

		if($Resultado){
			while($Tabla = mysql_fetch_array($Resultado)){
				$Tabla['conto'];
             	if((int) $Tabla['conto']>0)
             		$respuesta= "EXISTE";
	 			else
	 				$respuesta= "NOEXISTE";
			}
		}else $respuesta= "NOEXISTE";
	
	}else $respuesta= "No conecto";		
		
	
	}catch(Exception $e){
		$respuesta= "error ".$Returna;
	}

return $respuesta;
	
 }

}

?>