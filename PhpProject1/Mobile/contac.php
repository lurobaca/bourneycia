
<?php
$aviso = "";
// check form  
if (isset($_POST['email']) != "") {
	// email de destino
	$email = "lurobaca@bourneycia.net,amartinez@bourneycia.net,ivette.bonilla@bourneycia.net,ricardo.barrios@bourneycia.net";
	
	// asunto del email
	$subject = "Contacto";
	
	// Cuerpo del mensaje
	$mensaje = "---------------------------------- \n";
	$mensaje.= "            Contacto               \n";
	$mensaje.= "---------------------------------- \n";
	$mensaje.= "NOMBRE:   ".$_POST['nombre']."\n";
	$mensaje.= "EMPRESA:  ".$_POST['empresa']."\n";
	$mensaje.= "EMAIL:    ".$_POST['email']."\n";
	$mensaje.= "TELEFONO: ".$_POST['telefono']."\n";
	$mensaje.= "FECHA:    ".date("d/m/Y")."\n";
	$mensaje.= "HORA:     ".date("h:i:s a")."\n";
	$mensaje.= "IP:       ".$_SERVER['REMOTE_ADDR']."\n\n";
	$mensaje.= "---------------------------------- \n\n";
	$mensaje.= $_POST['mensaje']."\n\n";
	$mensaje.= "---------------------------------- \n";
	$mensaje.= "Enviado desde http://blog.unijimpe.net \n";
	
	// headers del email
	$headers = "From: ".$_POST['email']."\r\n";
	
	// Enviamos el mensaje
	if (mail($email, $subject, $mensaje, $headers)) {
		$aviso = "Su mensaje fue enviado correctamente";
	} else {
		$aviso = "Error de envío";
	}
}
?>
<style type="text/css">

.CajaTexto{
	float: left;
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #333;
	padding: 2px;
	width:100%;
height:50px;
	
	margin-bottom: 4px;
	margin:0px auto;
}
label {
	float: left;
	width: 100%;
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 22px;
}
button {
	width: 80px;
	background: #FFF;
	color: #000;
	padding: 3px 8px;
	font-size: 22px;
}
.formulario {
	border: solid 1px #CCC;
	background: #FFFFFF;
	padding: 16px;
	max-width:100%;

	min-width:auto;
}
br { clear: both; }
em { color: red; }  
</style>
<DIV style="padding-left:5px; background-color:#FFF;"> 


<div style="height:30px;   margin-bottom:5px; border-bottom:thin solid #C0C0C0; " align="center">
        <H1 class="titulos" > CONTACTENOS </H1>
        </div>
        
  <H3 align="center">
  <img src="img/General/Contactenos_mobil.jpg" width="303" height="205" /></H3>

BOURNE Y COMPAÑIA S.A <br><br>
COSTA RICA<br><br>
CAÑAS GUANACASTE<br><br>
EN FRENTE DE LA ESCUELA DE SANDILLAL<br><br>
TEL:(506)2669-6116 - 2669-6153<br><br>
EMAIL:info@bourneycia.net - bournecia@hotmail.com<br><br>
</DIV>
<?php if ($aviso != "") { ?>
<p><em><?php echo $aviso; ?></em></p>
<?php } ?>
<div id="Contactenos" >
<form action="" method="post" class="formulario">

    <label for="nombres"  style="float: left;
	width: 100%;
	font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	font-size: 22px;">Nombres</label> <br> <input name="nombre" id="nombre" type="text" class="CajaTexto" /><br />
    <label for="empresa"  >Empresa</label> <br> <input name="empresa" id="empresa" type="text" class="CajaTexto" /><br />
    <label for="email" >Email</label><br> <input name="email" id="email" type="text" class="CajaTexto"/><br />
    <label for="telefono" >Telefono</label><br> <input name="telefono" id="telefono" type="text" class="CajaTexto" /><br />
    <label for="mensaje" >Mensaje</label><br> <textarea name="mensaje" cols="30" rows="6" class="CajaTexto"></textarea><br />
    <label for="btsend" >&nbsp;</label> <br><button name="btsend" id="btsend" type="submit">Enviar</button><br />
</form>
     </div>