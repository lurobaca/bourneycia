<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>CSS Lightbox</title>
<script type="text/javascript">
function showLightbox() {
	document.getElementById('over').style.display='block';
	document.getElementById('fade').style.display='block';
}
function hideLightbox() {
	document.getElementById('over').style.display='none';
	document.getElementById('fade').style.display='none';
}
</script>
<style type="text/css">

.fadebox {
	display: none;
	position: absolute;
	top: 0%;
	left: 0%;
	width: 100%;
	height: 100%;
	background-color: black;
	z-index:1001;
	-moz-opacity: 0.8;
	opacity:.80;
	filter: alpha(opacity=80);
}
.overbox {
	display: none;
	position: absolute;
	top: 25%;
	left: 25%;
	width: 50%;
	height: 50%;
	z-index:1002;
	overflow: auto;
}
#content {
	background: #FFFFFF;
	border: solid 3px #CCCCCC;
	padding: 10px;
}
</style>
</head>
<body>

<p>
<a href="javascript:showLightbox();">INICIAR SESION</a>
</p>

<div id="over" class="overbox" style="display: none;">
	
    <div id="content">
	Ventana creada con CSS<br>
	como ejemplo de <strong>Lightbox</strong>.<br><br>
	<a href="javascript:hideLightbox();">Hide LightBox</a>
	</div>
    
</div>
<div id="fade" class="fadebox" style="display: none;">&nbsp;</div>


</body></html>