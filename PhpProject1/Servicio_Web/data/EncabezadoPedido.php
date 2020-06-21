<?php

/**
 * Representa el data de los gastos
 * almacenados en la base de datos
 */
require 'DatabaseConnection.php';

class EncabezadoPedido
{
    // Nombre de la tabla asociada a esta clase
    const TABLE_NAME = "pedido_encabezado";

    const DocNum = "DocNum";
    const CardCode = "CardCode";
    const Date = "Date";
    const Hora = "Hora";
	const CondicionPago = "CondicionPago";
	const SalesPersonCode = "SalesPersonCode";
	
    function __construct()
    {
    }

    /**
     * Obtiene todos los gastos de la base de datos
     * @return array|bool Arreglo con todos los gastos o false en caso de error
     */
    public static function getAll()
    {
        $consulta = "SELECT * FROM " . self::TABLE_NAME;
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

    public static function insertRow($object)
    {
        try {

            $pdo = DatabaseConnection::getInstance()->getDb();

            // Sentencia INSERT
            $comando = "INSERT INTO " . self::TABLE_NAME . " ( " .
                self::MONTO . "," .
                self::ETIQUETA . "," .
                self::FECHA . "," .
                self::DESCRIPCION . ")" .
                " VALUES(?,?,?,?)";

            // Preparar la sentencia
            $sentencia = $pdo->prepare($comando);

            $sentencia->bindParam(1, $DocNum);
            $sentencia->bindParam(2, $CardCode);
            $sentencia->bindParam(3, $Date);
            $sentencia->bindParam(4, $Hora);
		    $sentencia->bindParam(5, $CondicionPago);
		    $sentencia->bindParam(3, $SalesPersonCode);
	  
            $DocNum = $object[self::DocNum];
            $CardCode = $object[self::CardCode];
            $Date = $object[self::Date];
            $Hora = $object[self::Hora];
			$CondicionPago = $object[self::CondicionPago];
			$SalesPersonCode = $object[self::SalesPersonCode];
  
            $sentencia->execute();

            // Retornar en el último id insertado
            return $pdo->lastInsertId();
        } catch (PDOException $e) {
            return false;
        }

    }
}

?>