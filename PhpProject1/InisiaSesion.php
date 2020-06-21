<?php
require('Clases/DBLogin.php');
require('Clases/Class_sesiones.php');
	$obj_Class_Login=new Class_Login;
		$obj_Class_sesion=new sesion;
	$Nombre= "";
if(isset($_POST["submit"])){
		
		if($_POST["Accion"] =="Login"){
			$usuario=$_POST['usuario'];
			$clave=$_POST['clave'];
           $Nombre=  $obj_Class_Login->verifica_usuario($usuario,$clave);

			if($Nombre!=""){
					echo $Nombre;
					$obj_Class_sesion->set("usuario", $usuario);
					$obj_Class_sesion->set("NameUsuario", $Nombre);
					
				}
		}
	}
		?>