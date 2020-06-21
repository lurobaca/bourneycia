<?php

/**
 * Representa el data de los gastos
 * almacenados en la base de datos
 */
require 'DatabaseConnection.php';

class Recibos
{

        //------------------- TABLA RECIBO -----------------------
        const TABLE_RECIBOS = "Seller_Recibo";

        //const idRemota = "idRemota";
        const RECIBOS_idRecibo = "idRecibo";
       
        const RECIBOS_DocNum = "DocNum";
        const RECIBOS_Tipo_Documento = "Tipo_Documento";
        const RECIBOS_CodCliente = "CodCliente";
        const RECIBOS_Nombre = "Nombre";
        const RECIBOS_NumFactura = "NumFactura";
        const RECIBOS_Abono = "Abono";
        const RECIBOS_Saldo = "Saldo";
        const RECIBOS_Monto_Efectivo = "Monto_Efectivo";
        const RECIBOS_Monto_Cheque = "Monto_Cheque";
        const RECIBOS_Monto_Tranferencia = "Monto_Tranferencia";
        const RECIBOS_Num_Cheque = "Num_Cheque";
        const RECIBOS_Banco_Cheque = "Banco_Cheque";
        const RECIBOS_Fecha = "Fecha";
        const RECIBOS_Fecha_Factura = "Fecha_Factura";
        const RECIBOS_Fecha_Venci = "Fecha_Venci";
        const RECIBOS_TotalFact = "TotalFact";
        const RECIBOS_Comentario = "Comentario";
        const RECIBOS_Num_Tranferencia = "Num_Tranferencia";
        const RECIBOS_Banco_Tranferencia = "Banco_Tranferencia";
        const RECIBOS_Gastos = "Gastos";
        const RECIBOS_Hora_Abono = "Hora_Abono";
        const RECIBOS_Impreso = "Impreso";
        const RECIBOS_PostFechaCheque = "PostFechaCheque";
        const RECIBOS_DocEntry = "DocEntry";
        const RECIBOS_CodBancocheque = "CodBancocheque";
        const RECIBOS_CodBantranfe = "CodBantranfe";
        const RECIBOS_EnSap = "EnSap";
        const RECIBOS_Agente = "Agente";

    function __construct()
    {


    }

    /**
     * Obtiene todos los gastos de la base de datos
     * @return array|bool Arreglo con todos los gastos o false en caso de error
     */

public static function ExisteLineaRecibo($object){
    try {   
        $Retorno  ='';          
        
        if(isset($object["idRemota"]))
        {
          if($object['idRemota']!='0'){ //si lo que tiene es diferente de 0
       
               $consulta ="SELECT * FROM ". self::TABLE_RECIBOS . " WHERE ".self::RECIBOS_idRecibo." ='" . $object["idRemota"] . "'";
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
    
public static function InsertRecibo($object){
       try {
        
             $pdo = DatabaseConnection::getInstance()->getDb();

  
              
                  // ------------Sentencia INSERT --------------------
           $comando = "INSERT INTO " . self::TABLE_RECIBOS . " ( " .
                self::RECIBOS_DocNum . "," .
                self::RECIBOS_Tipo_Documento . "," .
                self::RECIBOS_CodCliente . "," .
                self::RECIBOS_Nombre . "," .
                self::RECIBOS_NumFactura . "," .
                self::RECIBOS_Abono . "," .
                self::RECIBOS_Saldo . "," .
                self::RECIBOS_Monto_Efectivo . "," .
                self::RECIBOS_Monto_Cheque . "," .
                self::RECIBOS_Monto_Tranferencia . "," .
                self::RECIBOS_Num_Cheque . "," .
                self::RECIBOS_Banco_Cheque . "," .
                self::RECIBOS_Fecha . "," .
                self::RECIBOS_Fecha_Factura . "," .
                self::RECIBOS_Fecha_Venci . "," .
                self::RECIBOS_TotalFact . "," .
                self::RECIBOS_Comentario . "," .
                self::RECIBOS_Num_Tranferencia . "," .
                self::RECIBOS_Banco_Tranferencia . "," .
                self::RECIBOS_Gastos . "," .
                self::RECIBOS_Hora_Abono . "," .
                self::RECIBOS_Impreso . "," .
                self::RECIBOS_PostFechaCheque . "," .
                self::RECIBOS_DocEntry . "," .
                self::RECIBOS_CodBancocheque . "," .
                self::RECIBOS_CodBantranfe . "," .
                self::RECIBOS_EnSap . "," .
                self::RECIBOS_Agente . ")" .
                " VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";  
                
           

                  
              // Preparar la sentencia
                    $sentencia = $pdo->prepare($comando);
                    //----------------ASIGNA VALORES A SENTENCIA--------------          
                    $sentencia->bindParam(1, $RECIBOS_DocNum);
                    $sentencia->bindParam(2, $RECIBOS_Tipo_Documento);
                    $sentencia->bindParam(3, $RECIBOS_CodCliente);
                    $sentencia->bindParam(4, $RECIBOS_Nombre);
                    $sentencia->bindParam(5, $RECIBOS_NumFactura);
                    $sentencia->bindParam(6, $RECIBOS_Abono);
                    $sentencia->bindParam(7, $RECIBOS_Saldo);
                    $sentencia->bindParam(8, $RECIBOS_Monto_Efectivo);
                    $sentencia->bindParam(9, $RECIBOS_Monto_Cheque);
                    $sentencia->bindParam(10, $RECIBOS_Monto_Tranferencia);
                    $sentencia->bindParam(11, $RECIBOS_Num_Cheque);
                    $sentencia->bindParam(12, $RECIBOS_Banco_Cheque);
                    $sentencia->bindParam(13, $RECIBOS_Fecha);
                    $sentencia->bindParam(14, $RECIBOS_Fecha_Factura);
                    $sentencia->bindParam(15, $RECIBOS_Fecha_Venci);
                    $sentencia->bindParam(16, $RECIBOS_TotalFact);
                    $sentencia->bindParam(17, $RECIBOS_Comentario);
                    $sentencia->bindParam(18, $RECIBOS_Num_Tranferencia);
                    $sentencia->bindParam(19, $RECIBOS_Banco_Tranferencia);
                    $sentencia->bindParam(20, $RECIBOS_Gastos);
                    $sentencia->bindParam(21, $RECIBOS_Hora_Abono);
                    $sentencia->bindParam(22, $RECIBOS_Impreso);
                    $sentencia->bindParam(23, $RECIBOS_PostFechaCheque);
                    $sentencia->bindParam(24, $RECIBOS_DocEntry);
                    $sentencia->bindParam(25, $RECIBOS_CodBancocheque);
                    $sentencia->bindParam(26, $RECIBOS_CodBantranfe);
                    $sentencia->bindParam(27, $RECIBOS_EnSAP);
                    $sentencia->bindParam(28, $RECIBOS_Agente);

                   
              //-----------DECODIFICA JSON --------------------------
                    $RECIBOS_DocNum = $object[self::RECIBOS_DocNum];
                    $RECIBOS_Tipo_Documento = $object[self::RECIBOS_Tipo_Documento];
                    $RECIBOS_CodCliente = $object[self::RECIBOS_CodCliente];
                    $RECIBOS_Nombre = $object[self::RECIBOS_Nombre];
                    $RECIBOS_NumFactura = $object[self::RECIBOS_NumFactura];
                    $RECIBOS_Saldo = $object[self::RECIBOS_Saldo];
                    $RECIBOS_Monto_Efectivo = $object[self::RECIBOS_Monto_Efectivo];
                    $RECIBOS_Monto_Cheque = $object[self::RECIBOS_Monto_Cheque];
                    $RECIBOS_Monto_Tranferencia = $object[self::RECIBOS_Monto_Tranferencia];
                    $RECIBOS_Num_Cheque = $object[self::RECIBOS_Num_Cheque];
                    $RECIBOS_Abono = $object[self::RECIBOS_Abono];
                    $RECIBOS_Banco_Cheque = $object[self::RECIBOS_Banco_Cheque];
                    $RECIBOS_Fecha = $object[self::RECIBOS_Fecha];
                    $RECIBOS_Fecha_Factura = $object[self::RECIBOS_Fecha_Factura];
                    $RECIBOS_Fecha_Venci = $object[self::RECIBOS_Fecha_Venci];
                    $RECIBOS_TotalFact = $object[self::RECIBOS_TotalFact];
                    $RECIBOS_Comentario = $object[self::RECIBOS_Comentario];
                    $RECIBOS_Num_Tranferencia = $object[self::RECIBOS_Num_Tranferencia];
                    $RECIBOS_Banco_Tranferencia = $object[self::RECIBOS_Banco_Tranferencia];
                    $RECIBOS_Gastos = $object[self::RECIBOS_Gastos];
                    $RECIBOS_Hora_Abono = $object[self::RECIBOS_Hora_Abono];
                    $RECIBOS_Impreso = $object[self::RECIBOS_Impreso];
                    $RECIBOS_PostFechaCheque = $object[self::RECIBOS_PostFechaCheque];
                    $RECIBOS_DocEntry = $object[self::RECIBOS_DocEntry];
                    $RECIBOS_CodBancocheque = $object[self::RECIBOS_CodBancocheque];
                    $RECIBOS_CodBantranfe = $object[self::RECIBOS_CodBantranfe];
                    $RECIBOS_EnSAP = $object[self::RECIBOS_EnSap];
                    $RECIBOS_Agente = $object[self::RECIBOS_Agente];

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


}

?>