<?php 

	include_once("Inventario_Login2.php");
    include_once("sesion.class.php");

	$obj_dbmodel_login=new Inventario;
	$obj_processmodel_sesiones=new sesion;
	$GrupoValido='';

//************************* LLAMADO DESDE iniciar_sesion Inventario.js ************************************************
	if($_POST["Accion"] =="CONSULTA"){

		
		$CodGrupo=$_POST["CodGrupo"];
	
		$GrupoValido= $obj_dbmodel_login->Login(trim($CodGrupo));
		echo $GrupoValido;
		if($GrupoValido!="0"){
	   		$obj_processmodel_sesiones->set("CodGrupo", $CodGrupo);
		}else
		echo "Aceeso Bloqueado";
    }

//*******************************************************************************
	if($_POST["Accion"] =="LISTA"){
		$CodGrupo = $obj_processmodel_sesiones->get("CodGrupo");
		$Resultado= $obj_dbmodel_login->ObtieneLista($CodGrupo,$_POST["Busqueda"]);
		echo $Resultado;
	}
	//*******************************************************************************
	if($_POST["Accion"] =="LISTA2"){
		$CodGrupo = $obj_processmodel_sesiones->get("CodGrupo");
		
		//Grupo,NumConteo,CodProveedor,Busqueda,IdInventario
		$Resultado= $obj_dbmodel_login->ObtieneLista2($CodGrupo,$_POST["Busqueda"],$_POST["CodProveedor"]);
		echo $Resultado;
	}
	//*******************************************************************************
	if($_POST["Accion"] =="ObtieneGrupo"){
		$CodGrupo = $obj_processmodel_sesiones->get("CodGrupo");
		echo $CodGrupo;
	}
	//*******************************************************************************
	if($_POST["Accion"] =="ObtieneCasasEnGrupo"){
		
		$CodGrupo = $obj_processmodel_sesiones->get("CodGrupo");
		
		$Resultado= $obj_dbmodel_login->ObtieneCasasEnGrupo($CodGrupo);
		echo $Resultado;

	}
//*******************************************************************************
	if($_POST["Accion"] =="ACTUALIZA"){
		$CodArticulo=$_POST["CodArticulo"];
		$Contaron=$_POST["Contaron"];
		$Apuntes=$_POST["Apuntes"];
		$Conteo=$_POST["Conteo"];
		$Stock=$_POST["Stock"];
		$Costo=$_POST["Costo"];
		$Grupo=$_POST["Grupo"];
		$ConteoActivo=$_POST["ConteoActivo"];

		$Resultado= $obj_dbmodel_login->ActualizaConteo($CodArticulo,$Contaron,$Apuntes,$Conteo,$Costo,$Stock,$Grupo,$ConteoActivo);
		echo $Resultado;
		//aqui generamos la lista segun los resultados
	}
	

?>