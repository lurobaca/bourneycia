<?php

//carga y se conecta a la base de datos
require("config.inc.php");

if (!empty($_POST)) {
    //obteneos los usuarios respecto a la usuario que llega por parametro
 /*   $query = " 
            SELECT 
                id, 
                username, 
                password
            FROM users 
            WHERE 
                username = :username 
        ";*/
    $query = "SELECT CardCode,CardName,contrasenia FROM `Cliente_Proveedores` WHERE CardCode = :CardCode";
    $query_params = array(':CardCode' => $_POST['CardCode']);
    
    try {
        $stmt   = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch (PDOException $ex) {
        //para testear pueden utilizar lo de abajo
        //die("la consulta murio " . $ex->getMessage());
        
        $response["success"] = 0;
        $response["message"] = "Problema con la base de datos, vuelve a intetarlo";
        die(json_encode($response));
        
    }
    
    //la variable a continuaci�n nos permitirar� determinar 
    //si es o no la informaci�n correcta
    //la inicializamos en "false"
    $validated_info = false;
    
    //bamos a buscar a todas las filas
    $row = $stmt->fetch();
    if ($row) {
        //si el password viene encryptado debemos desencryptarlo ac�
        // ++ DESCRYPTAR ++//

        //encaso que no lo este, solo comparamos como acontinuaci�n
        if ($_POST['contrasenia'] === $row['contrasenia']) {
            $login_ok = true;
        }
    }
    
    // as� como nos logueamos en facebook, twitter etc!
    // Otherwise, we display a login failed message and show the login form again 
    if ($login_ok) {
        $response["success"] = 1;
        $response["message"] = "Login correcto!";
        die(json_encode($response));
    } else {
        $response["success"] = 0;
        $response["message"] = "Login INCORRECTO";
        die(json_encode($response));
    }
} else {
?>
  <h1>Login</h1> 
  <form action="login.php" method="post"> 
      CardCode:<br /> 
      <input type="text" name="CardCode" placeholder="CardCode" /> 
      <br /><br /> 
      contrasenia:<br /> 
      <input type="contrasenia" name="contrasenia" placeholder="contrasenia" value="" /> 
      <br /><br /> 
      <input type="submit" value="Login" /> 
  </form> 
  <a href="register.php">Register</a>
 <?php
}

?> 