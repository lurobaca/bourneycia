
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!-- TemplateBeginEditable name="doctitle" -->
<title>Documento sin título</title>
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->

<link rel="stylesheet" type="text/css" href="stilo.css">
<script src="http://code.jquery.com/jquery-latest.min.js"
        type="text/javascript"></script>

<script type="text/javascript" >
$(document).ready(cargarproductos(0));

function cargarproductos(limite)
{
	alert("hola");
	var url = "Class/cargarproductos.php"
	$.post(url,{limite:limite},function (responseText){
		$.("#productos").html();
		});

}

</script>

</head>

<body>

<section id="productos"> 

</section>



 

</body>
</html>
