<?php

/*
siempre tener en cuenta "config.inc.php" 
*/
require("config.inc.php");

//if posted data is not empty
if (!empty($_POST)) {
    //preguntamos si el ussuario y la contrase�a esta vacia
    //sino muere
    if (empty($_POST['CardCode']) || empty($_POST['contrasenia'])) {
        
        // creamos el JSON
        $response["success"] = 0;
        $response["message"] = "Por favor entre el CardCode y el contrasenia";
        
        die(json_encode($response));
    }
    
    //si no hemos muerto (die), nos fijamos si exist en la base de datos
    $query        = " SELECT 1 FROM Cliente_Proveedores WHERE CardCode = :user";
    
    //acutalizamos el :user
    $query_params = array(
        ':user' => $_POST['CardCode']
    );
    
    //ejecutamos la consulta
    try {
        // estas son las dos consultas que se van a hacer en la bse de datos
        $stmt   = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch (PDOException $ex) {
        // solo para testing
        //die("Failed to run query: " . $ex->getMessage());
        
        $response["success"] = 0;
        $response["message"] = "Database Error1. Please Try Again!";
        die(json_encode($response));
    }
    
    //buscamos la informaci�n
    //como sabemos que el usuario ya existe lo matamos
    $row = $stmt->fetch();
    if ($row) {
        // Solo para testing
        //die("This username is already in use");
        
        $response["success"] = 0;
        $response["message"] = "Lo siento el usuario ya existe";
        die(json_encode($response));
    }
    
    //Si llegamos a este punto, es porque el usuario no existe
    //y lo insertamos (agregamos)
    $query = "INSERT INTO Cliente_Proveedores ( CardCode, contrasenia ) VALUES ( :user, :pass ) ";
    
    //actualizamos los token
    $query_params = array(
        ':user' => $_POST['CardCode'],
        ':pass' => $_POST['contrasenia']
    );
    
    //ejecutamos la query y creamos el usuario
    try {
        $stmt   = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch (PDOException $ex) {
        // solo para testing
        //die("Failed to run query: " . $ex->getMessage());
        
        $response["success"] = 0;
        $response["message"] = "Error base de datos2. Porfavor vuelve a intentarlo";
        die(json_encode($response));
    }
    
    //si hemos llegado a este punto
    //es que el usuario se agregado satisfactoriamente
    $response["success"] = 1;
    $response["message"] = "El usuario se ha agregado correctamente";
    echo json_encode($response);
    
    //para cas php tu puedes simpelmente redireccionar o morir
    //header("Location: login.php"); 
    //die("Redirecting to login.php");
    
    
} else {
?>
 <h1>Register</h1> 
 <form action="register.php" method="post"> 
     CardCode:<br /> 
     <input type="text" name="CardCode" value="" /> 
     <br /><br /> 
     contrasenia:<br /> 
     <input type="contrasenia" name="contrasenia" value="" /> 
     <br /><br /> 
     <input type="submit" value="Register New User" /> 
 </form>
 <?php
}

?>