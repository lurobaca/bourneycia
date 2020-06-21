<?php
require '../data/DatabaseConnection.php';

class Prueba{

  const TABLE_PEDIDOS = "pedido";

 	function Prueba(){
 	
 	}

     function ExisteLinea($DocNumUne,$ItemCode ,$Porc_Desc){
        try {   
                    
            $consulta = "SELECT * FROM " . self::TABLE_PEDIDOS . " WHERE DocNumUne ='" . $DocNumUne . "' and ItemCode='" . $ItemCode . "' and Porc_Desc='" . $Porc_Desc . "'";

            $comando = DatabaseConnection::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
           $comando->execute();

             $Resultado= $comando->fetch(PDO::FETCH_BOTH);

            if($Resultado){
                  $DocNumUne = $Resultado["Nombre"];
                  echo "Nombre = " .$DocNumUne;
            }else
            {
              echo "No Existe";
            }


           // return $comando->fetchAll(PDO::FETCH_ASSOC);
            return "DocNumUne = " .$DocNumUne;

        } catch (PDOException $e) {

            echo "ERROR ";
            return false;
        }
          
    }

    function inserta($DocNumUne,$ItemCode ,$Porc_Desc)
    {
      $this->ExisteLinea($DocNumUne,$ItemCode ,$Porc_Desc);

    }

 }



$objPrueba=new Prueba;

$objPrueba->inserta("12052190","006001000" ,"0");


?>