<?php
/**
 * Obtiene todos los gastos de la base de datos
 */

/**
 * Constantes para construcción de respuesta
 */
const ESTADO = "estado";
const DATOS = "Pedidos";//debe ser igual en Android para poder obtener la decodificacion enviada por este archivo el codigo java seria response.getJSONArray(Constantes.PEDIDOS); en el SycAdapter en la funcion actualizarDatosLocales_Pedidos
const MENSAJE = "mensaje";

const CODIGO_EXITO = 1;
const CODIGO_FALLO = 2;

require '../data/Gastos.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

try {
     // Decodificando formato Json
     $body = json_decode(file_get_contents("php://input"), true);

     $DocNumUne1 = $body["DocNumUne"];
	 $ItemCode1 = $body["ItemCode"];
  	 $Porc_Desc1 = $body["Porc_Desc"];


  	 if(isset($DocNumUne1) && isset($ItemCode1) && isset($Porc_Desc1)){
		// Obtiene todos los pedidos de la base de datos
    	$gastos = Gastos::Obtiene_Un_Pedidos($DocNumUne1,$ItemCode1,$Porc_Desc1);
 	 }else{
		// Obtiene todos los pedidos de la base de datos
    	$gastos = Gastos::getAll_Pedidos();
	 }
	   // Definir tipo de la respuesta
     header('Content-Type: application/json');
	 //Verifica si la consulta devolvio datos
     if ($gastos) {
	 	//$datos es un vector con 2 datos, 
        $datos[ESTADO] = CODIGO_EXITO;	//El primero seria el datos del ESTADO el cual amacena un CODIGO_EXITO = 1  Ó CODIGO_FALLO = 2
        $datos[DATOS] = $gastos;	//El segundo almacena el conjunto de datos devueltos por la consulta almacenados en $gastos
		echo $gastos;
        print json_encode($datos); //por ultimo imprime la codificacion en formato JSON el vectoe  $datos por lo que quedaria algo asi: {estado:1,gastos:[Registros consultados]}
		
     } else { // si no devolvio datos es por que fallo algo
	
        print json_encode(array(
            ESTADO => CODIGO_FALLO,
            MENSAJE => "Datos no existe"
        )); // imprime en datos JSON del ESTADO de ERRR junto a un datos de mensaje por lo que el json quedaria {estado:2,mensaje:ha ocurrido un error}
    }
	
} catch (Exception $e) {
  
    print json_encode(array(
            ESTADO => CODIGO_FALLO,
            MENSAJE => 'Excepción capturada: ',  $e->getMessage(), "\n"
        ));

}

	 


	
	



}

?>

