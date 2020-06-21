<?php

/**
 * Representa el data de los gastos
 * almacenados en la base de datos
 */
require 'DatabaseConnection.php';

class Depositos
{

        //------------------- TABLA RECIBO -----------------------
        const TABLE_DEPOSITOS = "Seller_Depositos";       
        const DEPOSITOS_idDeposito = "idDeposito";
        const DEPOSITOS_DocNum = "DocNum";
        const DEPOSITOS_NumDeposito = "NumDeposito";
        const DEPOSITOS_Fecha = "Fecha";
        const DEPOSITOS_FechaDeposito = "FechaDeposito";
        const DEPOSITOS_Banco = "Banco";
        const DEPOSITOS_Monto = "Monto";
        const DEPOSITOS_Agente = "Agente";
        const DEPOSITOS_Comentario = "Comentario";
        const DEPOSITOS_Boleta = "Boleta";
        const DEPOSITOS_Transmitido = "Transmitido";
        const DEPOSITOS_EnSAP = "EnSAP";

    function __construct()
    {
    }

    /**
     * Obtiene todos los gastos de la base de datos
     * @return array|bool Arreglo con todos los gastos o false en caso de error
     */

    
public static function ExisteLineaDeposito($object){
    try {   
        $Retorno  ='';

            
        
        if(isset($object["idRemota"]))
        {
          if($object['idRemota']!='0'){ //si lo que tiene es diferente de 0
       
               $consulta ="SELECT * FROM ". self::TABLE_DEPOSITOS . " WHERE ".self::DEPOSITOS_idDeposito." ='" . $object["idRemota"] . "'";
               $comando = DatabaseConnection::getInstance()->getDb()->prepare($consulta);
               // Ejecutar sentencia preparada
               $comando->execute();
               $Resultado= $comando->fetch(PDO::FETCH_BOTH);

               if($Resultado){
                  $EnSAP = $Resultado["EnSAP"];
                  $Retorno=$EnSAP;
                }else{
                  $Retorno="NO EXISTE";       
                }
          }else{//id es cer0
                    $Retorno="NO EXISTE"; 
          }

        }else{//si no tiene nada
            print json_encode(
            array(
                ESTADO => CODIGO_FALLO,
                MENSAJE => 'id vacio ')
            ); 
       }

     
        // return $comando->fetchAll(PDO::FETCH_ASSOC);
    return $Retorno;
         
        } catch (PDOException $e) {
            //echo "ERROR ExisteLinea [ ".$e." ]";
            print json_encode(
                    array(ESTADO => CODIGO_FALLO,
                          MENSAJE => "ERROR ExisteLinea [ ".$e." ]")
                        );
            //return false;
        }
         
    }



//---------------------------------------------------------------------------------------------------
//                                    FUNCIONES PARA DEPOSITO                                          
//---------------------------------------------------------------------------------------------------

public static function InsertDeposito($object){
       try {
        
             $pdo = DatabaseConnection::getInstance()->getDb();

  
              
                  // ------------Sentencia INSERT --------------------
           $comando = "INSERT INTO " . self::TABLE_DEPOSITOS . " ( " .
                self::DEPOSITOS_DocNum . "," .
                self::DEPOSITOS_NumDeposito . "," .
                self::DEPOSITOS_Fecha . "," .
                self::DEPOSITOS_FechaDeposito . "," .
                self::DEPOSITOS_Banco . "," .
                self::DEPOSITOS_Monto . "," .
                self::DEPOSITOS_Agente . "," .
                self::DEPOSITOS_Comentario . "," .
                self::DEPOSITOS_Boleta . "," .
                self::DEPOSITOS_Transmitido . "," .
                self::DEPOSITOS_EnSAP . ")" .
                " VALUES(?,?,?,?,?,?,?,?,?,?,?)";  
                
           

                  
              // Preparar la sentencia
                    $sentencia = $pdo->prepare($comando);
                    //----------------ASIGNA VALORES A SENTENCIA--------------          
                    $sentencia->bindParam(1, $DEPOSITOS_DocNum);
                    $sentencia->bindParam(2, $DEPOSITOS_NumDeposito);
                    $sentencia->bindParam(3, $DEPOSITOS_Fecha);
                    $sentencia->bindParam(4, $DEPOSITOS_FechaDeposito);
                    $sentencia->bindParam(5, $DEPOSITOS_Banco);
                    $sentencia->bindParam(6, $DEPOSITOS_Monto);
                    $sentencia->bindParam(7, $DEPOSITOS_Agente);
                    $sentencia->bindParam(8, $DEPOSITOS_Comentario);
                    $sentencia->bindParam(9, $DEPOSITOS_Boleta);
                    $sentencia->bindParam(10, $DEPOSITOS_Transmitido);
                    $sentencia->bindParam(11, $DEPOSITOS_EnSAP);
                                      
              //-----------DECODIFICA JSON --------------------------
                    $DEPOSITOS_DocNum = $object[self::DEPOSITOS_DocNum];
                    $DEPOSITOS_NumDeposito = $object[self::DEPOSITOS_NumDeposito];
                    $DEPOSITOS_Fecha = $object[self::DEPOSITOS_Fecha];
                    $DEPOSITOS_FechaDeposito = $object[self::DEPOSITOS_FechaDeposito];
                    $DEPOSITOS_Banco = $object[self::DEPOSITOS_Banco];
                    $DEPOSITOS_Monto = $object[self::DEPOSITOS_Monto];
                    $DEPOSITOS_Agente = $object[self::DEPOSITOS_Agente];
                    $DEPOSITOS_Comentario = $object[self::DEPOSITOS_Comentario];
                    $DEPOSITOS_Boleta = $object[self::DEPOSITOS_Boleta];
                    $DEPOSITOS_Transmitido = $object[self::DEPOSITOS_Transmitido];
                    $DEPOSITOS_EnSAP = $object[self::DEPOSITOS_EnSAP];
                  
                    $sentencia->execute();

                    // Retornar en el último id insertado
                    return $pdo->lastInsertId();
                    
            } catch (PDOException $e) {
            //return false;
            print json_encode(
                array(
                    ESTADO => CODIGO_FALLO,
                    MENSAJE => 'Creación fallida [ '.$e.' ]')
            );
        }
    }


    public static function EliminaDeposito($object){
 try {  
        $pdo = DatabaseConnection::getInstance()->getDb();
        // ------------Sentencia INSERT --------------------
        $comando = "DELETE FROM " . self::TABLE_DEPOSITOS . " WHERE ". self::DEPOSITOS_idDeposito ."=?" ;   

            // Preparar la sentencia
            $sentencia = $pdo->prepare($comando);
            //----------------ASIGNA VALORES A SENTENCIA--------------          
            $sentencia->bindParam(1, $idPedido);
           //-----------DECODIFICA JSON --------------------------
            $idPedido = $object[self::idRemota];
                   
            $sentencia->execute();
            print json_encode(
            array(
                ESTADO => CODIGO_FALLO,
                MENSAJE => 'Eliminado Correctamente')
            );

          } catch (PDOException $e) {
            //return false;
            print json_encode(
                array(
                    ESTADO => CODIGO_FALLO,
                    MENSAJE => 'Eliminacion fallida [ '.$e.' ] '. $comando )
            );
        }
}

}

?>