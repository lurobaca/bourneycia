<?php
/**
 * Insertar un nuevo gasto en la base de datos
 */
// Constantes para construir la respuesta
const ESTADO = 'estado';
const MENSAJE = 'mensaje';
const ID_GASTO = "idGasto";
const CODIGO_EXITO = '1';
const CODIGO_FALLO = '2';
require '../data/Pedidos.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Decodificando formato Json
    $body = json_decode(file_get_contents("php://input"), true);
    // Insertar gasto
    $Existe = Pedidos::ExisteLinea($body);
    if (strcmp(trim($Existe), "NO EXISTE") == 0){//si no existe la linea la manda a insertar 
        print json_encode(
                array(
                    ESTADO => CODIGO_FALLO,
                    MENSAJE => 'linea [ '.$Existe.' ]')
            );
    }else{//Si existe se debe Eliminar la linea
         //Pedidos::EliminaPedido($body);       
         Pedidos::AnulaPedido($body);
    }
}
?>

