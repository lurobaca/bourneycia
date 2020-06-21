

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>

<script type="text/javascript" src="Jquery.js"></script>
<script type="text/javascript" src="js.js"></script>
<script type="text/javascript" >
$(document).ready(function() 
{ 
/*1,50 significa los LIMITES QUE INCIA EN 0 Y MUESTRA 50 REGISTROS*/
//ObtieneDatosDePagia(0,50);
ObtienePaginas(1,10);

});
</script>
<link rel="stylesheet" type="text/css" href="stilos.css"/>
<link rel="stylesheet" type="text/css" href="Clases.css"/>
</head>

<body>

<section>
<div id="DatosDePagina"></div>
</section>
<div id="NavPaginas"></div>

<div id="loading" ></div>
<div id="container" ></div>

</body>
</html>
