<?php 
               if (isset( $_SESSION ['usuario'])==false)
                   /*echo "
                        <div id='InfoUserLogeado'>
                          <a href='../BourneNueva/MiCuenta.php'> " . $sesion->get("NameUsuario") . " </a>
                      <br>
                          <a href='../BourneNueva/MiCuenta.php'> Ver Mi Informacion </a>
                        <br>
                          <a href='../BourneNueva/MiCuenta.php'> Ver Mis Facturas </a>
                        </div>
                        <div>
                          <a  href='../BourneNueva/Class/cerrarsesion.php'> Cerrar Sesion </a>
                       </div>
                       <div>
                        <a href='../BourneNueva/Carrito.php' style='position:absolute; top:-24px; right:-50px; width:50px;'>
                         [2]         <img id='imgCarrito' src='../BourneNueva/img/General/Carrito.png'>
                        </a>
                       </div>";
               else 
           echo "  
		   <form id='frmLogin' name='frmLogin' action='Login.php' method='POST' >
			 
      		   <div> 
			   <label class='EtiquetasLogin' style='border-bottom:thin solid #F60; width:100%; margin-left:-5PX;color:#F60;font:bold;font-size:14px;'><H5 class=titulos´´>INICIAR SESION</H5></label>
                <label class='EtiquetasLogin' >CodCliente: </label><br/>
                <input type='text' name = 'usuario' class='CajaTextoLogin' placeholder='Escribe AQUI tu Codigo' required/><br/>
                </div>
				
             <div>
	         <label class='EtiquetasLogin'>Contraseña: </label><br/>
             <input type='password' name = 'contrasenia' class='CajaTextoLogin'  placeholder='Escribe AQUI  tu contraseña' required/>
             </div>
             <input type='submit' name ='iniciar' value='Iniciar Sesion' id='btsendLoginIndex'/>
             
             <DIV >
               <div >
               <a href='javascript:showLightboxAyuda();' class='Etiquetas' align='center' style='margin-left:55px;' >Ayuda</a>
               </div>
               <div id='ErrorLogin'>
               </div>
            </DIV>
          </form> "*/
             ?>    
<section>
  <article>
	<!--este over es el que esta encima del cuadro de fondo oscuto-->  
	
    <div id="over" class="overbox" style="display: none;" >
	<!--content es el cuadro con el contenido-->  
    <div id="content">
      <div id="LoginUser">
       <DIV style="border-bottom:thin solid #999;">
        <H5 class="titulos">INICIAR SESION</H5>
       </DIV>
	 <form name="frmLogin" action="Login.php" method="POST">
	  <div>
       <div> 
       
        <label class="Etiquetas">CodCliente: </label><br/>
        <input type="text" name = "usuario" class="CajaTexto" placeholder="Escribe AQUI tu Codigo" required/>
       </div>
     <div>
     <label class="Etiquetas">Contraseña: </label><br/>
     <input type="password" name = "contrasenia" class="CajaTexto"  placeholder="Escribe AQUI tu contraseña" required/>
    </div>
  </div>
   
 <input type="submit" name ="iniciar" value="Iniciar Sesion" id="btsendLogin"/>
    
 <DIV id="OpLogin">
 	

 <div >
<a href="#" class="Etiquetas" >Llamar al Tel:(506)2669-6103 para optener ó Recuperar Contraseña</a>
</div>
   <div id="ErrorLogin">
   </div>
    
   </DIV>
   <div id="CerrarVentana">
     <a href="javascript:hideLightbox();"><img src="img/General/Cerrar.png" width="25" height="25" /></a>
   </div>
</form>
</div>


	</div>  
</div>

<!--este Fade es el cuadro oscuro de fondo-->
<a href="javascript:hideLightboxDetalle();" style="text-decoration:none; ">
<div id="fade" class="fadebox" style="display: none;" >&nbsp;</div>
</a>
 </article>
   	</section>