<?php
/**
 * Obtiene todos los gastos de la base de datos
 */

/**
 * Constantes para construcción de respuesta
 */
const ESTADO = "estado";
const DATOS = "gastos";
const MENSAJE = "mensaje";

const CODIGO_EXITO = 1;
const CODIGO_FALLO = 2;

require '../data/Gastos.php';


if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // Obtiene todos los pedidos de la base de datos
    //$gastos = Gastos::getAll_Pedidos();

    $json = file_get_contents('https://ubicaciones.paginasweb.cr/provincias.json');
    $obj1 = json_decode($json);
    $jsondata = array();
    $Conteo=0;
    
    foreach($obj1 as $obj){//Recorre las procincias y las almacena en un array
        $jsondata[$Conteo] = $obj;
        $Conteo=$Conteo+1;
    }


    // Definir tipo de la respuesta
    header('Content-Type: application/json');
    
    //Verifica si la consulta devolvio datos
    if (count($jsondata[0])>0 ) {
    //$datos es un vector con 2 datos, 
        $datos[ESTADO] = CODIGO_EXITO;  //El primero seria el datos del ESTADO el cual amacena un CODIGO_EXITO = 1  Ó CODIGO_FALLO = 2
        $datos[DATOS] =$jsondata[0];    //El segundo almacena el conjunto de datos devueltos por la consulta almacenados en $gastos

        print json_encode($datos); //por ultimo imprime la codificacion en formato JSON el vectoe  $datos por lo que quedaria algo asi: {estado:1,gastos:[Registros consultados]}
        
    } else { // si no devolvio datos es por que fallo algo
    
    
        print json_encode(array(
            ESTADO => CODIGO_FALLO,
            MENSAJE => "Ha ocurrido un error-" .$jsondata[0]
        )); // imprime en datos JSON del ESTADO de ERRR junto a un datos de mensaje por lo que el json quedaria {estado:2,mensaje:ha ocurrido un error}
    }
}

?>

