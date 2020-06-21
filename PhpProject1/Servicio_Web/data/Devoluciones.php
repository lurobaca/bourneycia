<?php

/**
 * Representa el data de los gastos
 * almacenados en la base de datos
 */
require 'DatabaseConnection.php';

class Devoluciones
{
 
	//------------------- TABLA PEDIDOS -----------------------
		const TABLE_DEVOLUCIONES = "Seller_Devoluciones";

        const idRemota = "idRemota";
        const idDevolucion = "idDevolucion";
	  	const DocNumUne = "DocNumUne";
		const DocNum = "DocNum";
		const CodCliente = "CodCliente";
		const Nombre = "Nombre";
		const Fecha = "Fecha";
		const Credito = "Credito";
		const ItemCode = "ItemCode";
		const ItemName = "ItemName";
		const Cant_Uni = "Cant_Uni";
		const Porc_Desc = "Porc_Desc";
		const Mont_Desc = "Mont_Desc";
		const Porc_Imp = "Porc_Imp";
		const Mont_Imp = "Mont_Imp";
		const Sub_Total = "Sub_Total";
		const Total = "Total";
		const Cant_Cj = "Cant_Cj";
		const Empaque = "Empaque";
		const Precio = "Precio";
		const PrecioSUG = "PrecioSUG";
		const Hora_Nota = "Hora_Nota";
		const Impreso = "Impreso";
		const UnidadesACajas = "UnidadesACajas";
		const Transmitido = "Transmitido";
		const Proforma = "Proforma";
		const Porc_Desc_Fijo = "Porc_Desc_Fijo";
		const Porc_Desc_Promo = "Porc_Desc_Promo";
		const EnSAP = "EnSAP";
        const Anulado = "Anulado";
        const Motivo = "Motivo";
   
    function __construct()
    {


    }

    /**
     * Obtiene todos los gastos de la base de datos
     * @return array|bool Arreglo con todos los gastos o false en caso de error
     */

    public static function getAll()
    {
        $consulta = "SELECT * FROM " . self::TABLE_GASTO;
        try {
            // Preparar sentencia
            $comando = DatabaseConnection::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();
 


            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }







	public static function Obtiene_Una_Devolucion($DocNumUne,$ItemCode ,$Porc_Desc )
	{
	
	//Aqui debe selecciona segun el $idLocal,Codigo del articulo y Descuento para diferencialo de las bonificaciones
       $consulta = "SELECT * FROM " . self::TABLE_DEVOLUCIONES . " WHERE DocNumUne ='" . $DocNumUne . "' and ItemCode='" . $ItemCode . "' and Porc_Desc='" . $Porc_Desc . "'";
        try {
            // Preparar sentencia
            $comando = DatabaseConnection::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);



        } catch (PDOException $e) {
            return false;
        }
	}
	
	
    public static function getAll_Devoluciones()
    {

        $consulta = "SELECT * FROM " . self::TABLE_DEVOLUCIONES;
        try {
            // Preparar sentencia
            $comando = DatabaseConnection::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }

    }


 public static function ExisteLineaDevolucion($object){
    try {   
        $Retorno  ='';
        
        if(isset($object["idRemota"]))
        {  
            if($object['idRemota']!='0'){ //si lo que tiene es diferente de 0
       
                $consulta ="SELECT * FROM ". self::TABLE_DEVOLUCIONES . " WHERE idDevolucion ='" . $object["idRemota"] . "'";

         

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

/*---------------------------------------------------------------------------------------------------
                                    FUNCIONES PARA PEDIDOS                                          
---------------------------------------------------------------------------------------------------*/

public static function InsertDevolucion($object){
        try {


        
             $pdo = DatabaseConnection::getInstance()->getDb();
                  // ------------Sentencia INSERT --------------------
            $comando = "INSERT INTO " . self::TABLE_DEVOLUCIONES . " ( " .
                self::DocNumUne . "," .
                self::DocNum . "," .
                self::CodCliente . "," .
                self::Nombre . "," .
                self::Fecha . "," .
                self::Credito . "," .
                self::ItemCode . "," .
                self::ItemName . "," .
                self::Cant_Uni . "," .
                self::Porc_Desc . "," .
                self::Mont_Desc . "," .
                self::Porc_Imp . "," .
                self::Mont_Imp . "," .
                self::Sub_Total . "," .
                self::Total . "," .
                self::Cant_Cj . "," .
                self::Empaque . "," .
                self::Precio . "," .
                self::PrecioSUG . "," .
                self::Hora_Nota . "," .
                self::Impreso . "," .
                self::UnidadesACajas . "," .
                self::Transmitido . "," .
                self::Proforma . "," .
                self::Porc_Desc_Fijo . "," .
                self::Porc_Desc_Promo . "," .
                self::Anulado . "," .
                self::Motivo . "," .
                self::EnSAP . ")" .
                " VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";   

      
            // Preparar la sentencia
            $sentencia = $pdo->prepare($comando);
            //----------------ASIGNA VALORES A SENTENCIA--------------          
            $sentencia->bindParam(1, $DocNumUne);
            $sentencia->bindParam(2, $DocNum);
            $sentencia->bindParam(3, $CodCliente);
            $sentencia->bindParam(4, $Nombre);
            $sentencia->bindParam(5, $Fecha);
            $sentencia->bindParam(6, $Credito);
            $sentencia->bindParam(7, $ItemCode);
            $sentencia->bindParam(8, $ItemName);
            $sentencia->bindParam(9, $Cant_Uni);
            $sentencia->bindParam(10, $Porc_Desc);
            $sentencia->bindParam(11, $Mont_Desc);
            $sentencia->bindParam(12, $Porc_Imp);
            $sentencia->bindParam(13, $Mont_Imp);
            $sentencia->bindParam(14, $Sub_Total);
            $sentencia->bindParam(15, $Total);
            $sentencia->bindParam(16, $Cant_Cj);
            $sentencia->bindParam(17, $Empaque);
            $sentencia->bindParam(18, $Precio);
            $sentencia->bindParam(19, $PrecioSUG);
            $sentencia->bindParam(20, $Hora_Nota);
            $sentencia->bindParam(21, $Impreso);
            $sentencia->bindParam(22, $UnidadesACajas);
            $sentencia->bindParam(23, $Transmitido);
            $sentencia->bindParam(24, $Proforma);
            $sentencia->bindParam(25, $Porc_Desc_Fijo);
            $sentencia->bindParam(26, $Porc_Desc_Promo);
            $sentencia->bindParam(27, $Anulado);
            $sentencia->bindParam(28, $Motivo);
            $sentencia->bindParam(29, $EnSAP);


      //-----------DECODIFICA JSON --------------------------
            $DocNumUne = $object[self::DocNumUne];
            $DocNum = $object[self::DocNum];
            $CodCliente = $object[self::CodCliente];
            $Nombre = $object[self::Nombre];
            $Fecha = $object[self::Fecha];
            $Credito = $object[self::Credito];
            $ItemCode = $object[self::ItemCode];
            $ItemName = $object[self::ItemName];
            $Cant_Uni = $object[self::Cant_Uni];
            $Porc_Desc = $object[self::Porc_Desc];
            $Mont_Desc = $object[self::Mont_Desc];
            $Porc_Imp = $object[self::Porc_Imp];
            $Mont_Imp = $object[self::Mont_Imp];
            $Sub_Total = $object[self::Sub_Total];
            $Total = $object[self::Total];
        
            $Cant_Cj = $object[self::Cant_Cj];
         
            $Empaque = $object[self::Empaque];
            $Precio = $object[self::Precio];

            $PrecioSUG = $object[self::PrecioSUG];
         
            $Hora_Nota = $object[self::Hora_Nota];
            $Impreso = $object[self::Impreso];
            $UnidadesACajas = $object[self::UnidadesACajas];
            $Transmitido = $object[self::Transmitido];

            $Proforma = $object[self::Proforma];
               
            $Porc_Desc_Fijo = $object[self::Porc_Desc_Fijo];
            $Porc_Desc_Promo = $object[self::Porc_Desc_Promo];
            $Anulado = $object[self::Anulado];
            $Motivo = $object[self::Motivo];
            $EnSAP = $object[self::EnSAP];


            $sentencia->execute();
 
            // Retornar en el último id insertado
            return $pdo->lastInsertId();
       /* 
                   print json_encode(
                array(
                    ESTADO => CODIGO_FALLO,
                    MENSAJE => 'Insert: '. $object[self::Proforma] )
            );*/
            } catch (PDOException $e) {
            //return false;
            print json_encode(
                array(
                    ESTADO => CODIGO_FALLO,
                    MENSAJE => 'Creación fallida [ '.$e.' ]')
            );
            }
    }





public static function ActualizaDevolucion($object){
 try {  
        $pdo = DatabaseConnection::getInstance()->getDb();
        // ------------Sentencia INSERT --------------------
        $comando = "UPDATE " . self::TABLE_DEVOLUCIONES . " SET " .
            self::DocNumUne . "=?," .
            self::DocNum . "=?," .
            self::CodCliente . "=?," .
            self::Nombre . "=?," .
            self::Fecha . "=?," .
            self::Credito . "=?," .
            self::ItemCode . "=?," .
            self::ItemName . "=?," .
            self::Cant_Uni . "=?," .
            self::Porc_Desc . "=?," .
            self::Mont_Desc . "=?," .
            self::Porc_Imp . "=?," .
            self::Mont_Imp . "=?," .
            self::Sub_Total . "=?," .
            self::Total . "=?," .
            self::Cant_Cj . "=?," .
            self::Empaque . "=?," .
            self::Precio . "=?," .
            self::PrecioSUG . "=?," .
            self::Hora_Nota . "=?," .
            self::Impreso . "=?," .
            self::UnidadesACajas . "=?," .
            self::Transmitido . "=?," .
            self::Proforma . "=?," .
            self::Porc_Desc_Fijo . "=?," .
            self::Porc_Desc_Promo . "=?," .
            self::Anulado . "=?," .
            self::Motivo . "=?," .
            self::EnSAP . "=?" .
            " WHERE ". self::idDevolucion ."=?" ;   

            // Preparar la sentencia
            $sentencia = $pdo->prepare($comando);
            //----------------ASIGNA VALORES A SENTENCIA--------------          
            $sentencia->bindParam(1, $DocNumUne);
            $sentencia->bindParam(2, $DocNum);
            $sentencia->bindParam(3, $CodCliente);
            $sentencia->bindParam(4, $Nombre);
            $sentencia->bindParam(5, $Fecha);
            $sentencia->bindParam(6, $Credito);
            $sentencia->bindParam(7, $ItemCode);
            $sentencia->bindParam(8, $ItemName);
            $sentencia->bindParam(9, $Cant_Uni);
            $sentencia->bindParam(10, $Porc_Desc);
            $sentencia->bindParam(11, $Mont_Desc);
            $sentencia->bindParam(12, $Porc_Imp);
            $sentencia->bindParam(13, $Mont_Imp);
            $sentencia->bindParam(14, $Sub_Total);
            $sentencia->bindParam(15, $Total);
            $sentencia->bindParam(16, $Cant_Cj);
            $sentencia->bindParam(17, $Empaque);
            $sentencia->bindParam(18, $Precio);
            $sentencia->bindParam(19, $PrecioSUG);
            $sentencia->bindParam(20, $Hora_Nota);
            $sentencia->bindParam(21, $Impreso);
            $sentencia->bindParam(22, $UnidadesACajas);
            $sentencia->bindParam(23, $Transmitido);
            $sentencia->bindParam(24, $Proforma);
            $sentencia->bindParam(25, $Porc_Desc_Fijo);
            $sentencia->bindParam(26, $Porc_Desc_Promo);
            $sentencia->bindParam(27, $Anulado);
            $sentencia->bindParam(28, $Motivo);
            $sentencia->bindParam(29, $EnSAP);
            $sentencia->bindParam(30, $idDevolucion);
         
            //-----------DECODIFICA JSON --------------------------
            $DocNumUne = $object[self::DocNumUne];
            $DocNum = $object[self::DocNum];
            $CodCliente = $object[self::CodCliente];
            $Nombre = $object[self::Nombre];
            $Fecha = $object[self::Fecha];
            $Credito = $object[self::Credito];
            $ItemCode = $object[self::ItemCode];
            $ItemName = $object[self::ItemName];
            $Cant_Uni = $object[self::Cant_Uni];
            $Porc_Desc = $object[self::Porc_Desc];
            $Mont_Desc = $object[self::Mont_Desc];
            $Porc_Imp = $object[self::Porc_Imp];
            $Mont_Imp = $object[self::Mont_Imp];
            $Sub_Total = $object[self::Sub_Total];
            $Total = $object[self::Total];
            $Cant_Cj = $object[self::Cant_Cj];
            $Empaque = $object[self::Empaque];
            $Precio = $object[self::Precio];
            $PrecioSUG = $object[self::PrecioSUG];
            $Hora_Nota = $object[self::Hora_Nota];
            $Impreso = $object[self::Impreso];
            $UnidadesACajas = $object[self::UnidadesACajas];
            $Transmitido = $object[self::Transmitido];
            $Proforma = $object[self::Proforma];
            $Porc_Desc_Fijo = $object[self::Porc_Desc_Fijo];
            $Porc_Desc_Promo = $object[self::Porc_Desc_Promo];
            $Anulado = $object[self::Anulado];
            $Motivo = $object[self::Motivo];
            $EnSAP = $object[self::EnSAP];
            $idDevolucion = $object[self::idRemota];
                   
            $sentencia->execute();
            print json_encode(
            array(
                ESTADO => CODIGO_FALLO,
                MENSAJE => 'Actualizo Devolucion ')
            );

          } catch (PDOException $e) {
            //return false;
            print json_encode(
                array(
                    ESTADO => CODIGO_FALLO,
                    MENSAJE => 'Actualizacion fallida [ '.$e.' ] '. $comando )
            );
        }
}



public static function EliminaDevolucion($object){
 try {  
        $pdo = DatabaseConnection::getInstance()->getDb();
        // ------------Sentencia INSERT --------------------
        $comando = "DELETE FROM " . self::TABLE_DEVOLUCIONES . " WHERE ". self::idDevolucion ."=?" ;   

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
public static function AnulaDevolucion($object){
 try {  
        $pdo = DatabaseConnection::getInstance()->getDb();
        // ------------Sentencia INSERT --------------------
        $comando = "UPDATE " . self::TABLE_DEVOLUCIONES . " SET Anulado='1' WHERE ". self::idDevolucion ."=?" ;   

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
                MENSAJE => 'Anulado Correctamente')
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
/*---------------------------------------------------------------------------------------------------
                                    FUNCIONES PARA RECIBOS                                          
---------------------------------------------------------------------------------------------------

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
                self::RECIBOS_EnSap . ")" .
                " VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";  
                
           

                  
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


    ---------------------------------------------------------------------------------------------------
                                    FUNCIONES PARA DEPOSITO                                          
---------------------------------------------------------------------------------------------------

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



 ---------------------------------------------------------------------------------------------------
                                    FUNCIONES PARA DEPOSITO                                          
---------------------------------------------------------------------------------------------------

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
*/
}

?>