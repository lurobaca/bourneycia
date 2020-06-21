<?php

/**
 * Representa el data de los gastos
 * almacenados en la base de datos
 */
require 'DatabaseConnection.php';

class Gastos
{

        //------------------- TABLA RECIBO -----------------------
        const TABLE_GASTOS = "Seller_Gastos";

        //const idRemota = "idRemota";
        const GASTOS_idGasto = "idGasto";
        const GASTOS_DocNum = "DocNum";
        const GASTOS_Tipo = "Tipo";
        const GASTOS_NumFactura = "NumFactura";
        const GASTOS_Total = "Total";
        const GASTOS_Fecha = "Fecha";
        const GASTOS_Comentario = "Comentario";
        const GASTOS_FechaGasto = "FechaGasto";
        const GASTOS_Transmitido = "Transmitido";
        const GASTOS_idRemota = "idRemota";
        const GASTOS_estado = "estado";
        const GASTOS_pendiente_insercion = "pendiente_insercion";
        const GASTOS_EnSAP = "EnSAP";

    function __construct()
    {


    }

    /**
     * Obtiene todos los gastos de la base de datos
     * @return array|bool Arreglo con todos los gastos o false en caso de error
     */

public static function ExisteLineaGasto($object){
    try { 

  
        $Retorno  ='';

        if(isset($object["idRemota"]))
        {
   
          if($object['idRemota']!='0'){ //si lo que tiene es diferente de 0
           
               $consulta ="SELECT * FROM ". self::TABLE_GASTOS . " WHERE ".self::GASTOS_idGasto." ='" . $object["idRemota"] . "'";
    
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

    /* 
        // return $comando->fetchAll(PDO::FETCH_ASSOC);*/
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
//                                   FUNCIONES PARA DEPOSITO                                          
//---------------------------------------------------------------------------------------------------

public static function InsertGasto($object){
       try {
        
             $pdo = DatabaseConnection::getInstance()->getDb();
              
                  // ------------Sentencia INSERT --------------------
           $comando = "INSERT INTO " . self::TABLE_GASTOS . " ( " .
                self::GASTOS_DocNum . "," .
                self::GASTOS_Tipo . "," .
                self::GASTOS_NumFactura . "," .
                self::GASTOS_Total . "," .
                self::GASTOS_Fecha . "," .
                self::GASTOS_Comentario . "," .
                self::GASTOS_FechaGasto . "," .
                self::GASTOS_Transmitido . "," .
                self::GASTOS_EnSAP . ")" .
                " VALUES(?,?,?,?,?,?,?,?,?)";  
                                   
                
 
                // Preparar la sentencia
               $sentencia = $pdo->prepare($comando);
                //----------------ASIGNA VALORES A SENTENCIA--------------          
               

                $sentencia->bindParam(1, $GASTOS_DocNum);
                $sentencia->bindParam(2, $GASTOS_Tipo);
                $sentencia->bindParam(3, $GASTOS_NumFactura);
                $sentencia->bindParam(4, $GASTOS_Total);
                $sentencia->bindParam(5, $GASTOS_Fecha);
                $sentencia->bindParam(6, $GASTOS_Comentario);
                $sentencia->bindParam(7, $GASTOS_FechaGasto);
                $sentencia->bindParam(8, $GASTOS_Transmitido);
                $sentencia->bindParam(9, $GASTOS_EnSAP);
                                      
              //-----------DECODIFICA JSON --------------------------
                $GASTOS_DocNum = $object[self::GASTOS_DocNum];
                $GASTOS_Tipo = $object[self::GASTOS_Tipo];
                $GASTOS_NumFactura = $object[self::GASTOS_NumFactura];
                $GASTOS_Total = $object[self::GASTOS_Total];
                $GASTOS_Fecha = $object[self::GASTOS_Fecha];
                $GASTOS_Comentario = $object[self::GASTOS_Comentario];
                $GASTOS_FechaGasto = $object[self::GASTOS_FechaGasto];
                $GASTOS_Transmitido = $object[self::GASTOS_Transmitido];
                $GASTOS_EnSAP = $object[self::GASTOS_EnSAP];
     
  
               
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


public static function EliminaGasto($object){
 try {  


        $pdo = DatabaseConnection::getInstance()->getDb();
        // ------------Sentencia INSERT --------------------
        $comando = "DELETE FROM " . self::TABLE_GASTOS . " WHERE ". self::GASTOS_idGasto ."=?" ;   



   // Preparar la sentencia
            $sentencia = $pdo->prepare($comando);
            //----------------ASIGNA VALORES A SENTENCIA--------------          
            $sentencia->bindParam(1, $idGasto);
           //-----------DECODIFICA JSON --------------------------
            $idGasto = $object["idRemota"];
            

            $sentencia->execute();
      
    print json_encode(
                array(
                    ESTADO => CODIGO_EXITO,
                    MENSAJE => 'Eliminado Correctamente',
                    ID_GASTO => $idGasto)

            );


          } catch (PDOException $e) {
            //return false;
            print json_encode(
                array(
                    ESTADO => CODIGO_FALLO,
                    MENSAJE => 'Eliminacion fallida [ '.$e.' ] ')
            );
        }
}

}

?>