
<style type="text/css">


.etiqueta {
	float: left;
	width: 100px;
}
button {
	width: 80px;
	background: #FFF;
	color: #000;
	padding: 3px 8px;
}
.formulario {
	border: solid 1px #CCC;
	background: #FFFFFF;
	padding: 16px;
	width: 880PX;
}
br { clear: both; }
em { color: red; }  
</style>
    <article>
  
         <H5 class="titulos">CONTACTENOS</H5>
          
       <DIV id="Contactenos">
<img src="BourneNueva/img/General/Contactenos.jpg" alt="Distribuidora Bourne y cia S.A" >
       
       <DIV style="padding-left:5px; position:relative;top:-250px;left:-200px; margin-right:55px;">
<p class="Textos" align="left">
BOURNE Y COMPAÑIA S.A <br><br>
COSTA RICA<br><br>
CAÑAS GUANACASTE<br><br>
EN FRENTE DE LA ESCUELA DE SANDILLAL<br><br>
TEL:(506)2669-6116 - 2669-6153<br><br>
EMAIL:bournecia@hotmail.com<br><br>
</p>

<?php if ($aviso != "") { ?>
<p><em><?php echo $aviso; ?></em></p>
<?php } ?>
              
              </DIV>
              
              
              <DIV style="padding-left:5px; position:relative;top:-210px;left:0px;">
              
              
              <form action="" method="post" class="formulario">


     <input name="nombre" id="nombre" type="text" class="CajaTexto" placeholder="Escribe tu nombre" required /><br />

    <input name="empresa" id="empresa" type="text" class="CajaTexto"  placeholder="Escribe el nombre de tu empresa  (Opcional)"  /><br />


    <input name="email" id="email" type="text" class="CajaTexto" placeholder="Escribe tu correo" required/><br>
    

    <input name="telefono" id="telefono" type="text" class="CajaTexto" placeholder="Escribe tu telefono" required/><br>
    

    <textarea name="mensaje" cols="30" rows="6" class="CajaTexto" >
    Por favor responde las siguientes preguntas
1-¿Te gustaría poder realizar pedidos desde esta página?

2-¿Te interesaría recibir una capacitación sobre el uso de esta
      página?</textarea><br>
    
    <label for="btsend" class="Etiquetas">&nbsp;</label> <br>
    
    <button name="btsend" id="btsendContact" type="submit">Enviar</button>
</form>
              
              
              
              </DIV>
       </DIV>


    </article>