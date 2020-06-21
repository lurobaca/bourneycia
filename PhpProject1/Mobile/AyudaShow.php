<?php 
if(isset($_POST["submit"])){
	
	if($_POST["Dato"] =="INGRESA"){
		echo " 
		<div>
          <div class='CuadroAyuda' >
          <a href='javascript:Regresar(\"Regresar\");' >Regresar a la lista de pasos</a>
            <H5 class='titulos'>PASO 1 [INICIAR]</h5>
            <P>Para iniciar Sesion Solo debes ingresar los datos que nuestros agente de ventas le a brindado , en caso de aun no tener esta informacion la puede solicitar al agente o llamar a nuestras oficinas o contactarnos por medio de esta pagina.
            </P>
           
            <P>
            Para ingresar los datos solo hay que ir a la parte superior izquierda de la pagina y precionar el boton Iniciar sesion, ingresas los datos y listo
            </P>
            <div align='center'>
          		<img src='img/General/InisiarSesion.gif' width='205' height='163' />
            </div>
          
             <P>
            Luego de iniciar sesion y dar click al nombre de su negocio en la parte Superior izquierda podras tener ver:
             </P>
             <div align='center'>
        		<img src='img/General/MiCuenta.png' width='216' height='193' />
        		<br />
        		<img src='img/General/InfoCuenta.gif' width='435' height='56' />
            </div>
              
             <P>
            * Informacion registrada (Nombre contacto,direccion,telefono, etc...)
             </P>
              <P>
            * Facturas Pendientes de pago o vencidas(Si posee facturas vencidas no podra realizar pedido)
             </P>
              <P>
            * Pagos Efectuados a las facturas pendientes (Dando le click al boton ver pagos)
             </P>
              <P>
            * Pedidos hechos en Pagina web (Este se borrara luego de ser facturado)
             </P>
        </div>
       </div>";
		}
	if($_POST["Dato"] =="AGREGA"){
		echo "
		<div class='CuadroAyuda' >
		<a href='javascript:Regresar(\"Regresar\");' >Regresar a la lista de pasos</a>
		  <H5 class='titulos'>PASO 2 [AGREGAR]</h5>
	    	<P>Luego de Iniciar sesión podrás empezar a realizar tu pedido, en la página principal podrás ver todas nuestras OFERTAS del mes o podrás ingresar en el Menú PRODUCTOS para ver todos nuestros productos.
            </P>
          <div align='center'>
		   <img src='img/General/Productos.gif' width='394' height='191' />
	      </div>
          <P>
		    Si has iniciado sesión cada artículo mostrara el precio en caso de no iniciar sesión este no aparecerá, además podrán ver la foto, descripción y el botón de Agregar .</P>
    
	     <div align='center'>
		  <img src='img/General/Articulo.gif' width='173' height='231' />
		 </div>
		 <p>Al precionar este boton se abrira una ventana en la que se le permitirá agregar las UNIDADES que deseen de ese artículo.</p>
		
		 <div align='center'>
 			<img src='img/General/SolicitaUnidades.gif' width='365' height='180' />
		 </div>
		 
		 <p>Al precionar aceptar se iniciara el proceso de calculo del montototal del pedido el cual podra ver al lado izquierdo de la pagina.</p>
		  <div align='center'>
 		   <img src='img/General/Calculando.gif' width='89' height='283' />
		  </div>
  
     		<P>
		    Podras indentificar facilmente que articulo ya han sido agregados a tu pedido (Carrito) ya que aparesera la cantidad solicitada, el boton para modificar la cantidad solicitada y el boton de Eliminar el articulo del pedido
     		</P>
     		<div align='center'>
				<img src='img/General/ArticuloAgregado.gif' width='173' height='235' />
		   </div>
<br />
</div>";
		}
	if($_POST["Dato"] =="ENVIA"){
		
		}
	if($_POST["Dato"] =="Regresar"){
		
		echo "  
		   <div  class='IndexAyuda'>
            <a href='javascript:Help(\"INGRESA\");'>
            <H5 class='titulos'>INGRESA</H5>
            <P> Inicia Sesion con los datos que nuestro agente de ventas le ha brindado ,si aun no tiene esta informacion puede solicitarla al agente de ventas.     DE CLICK AQUI PARA MAS INFORMACION <br /></P>
            </a>
          </div>
         <br />
          <div  class='IndexAyuda'>
            <a href='javascript:Help(\"AGREGA\");'>
            <H5 class='titulos'>AGREGA</H5>
            <P> Agrega Todas las unidades de todos los articulos que desee , luego podra ver la cantidad y modificarlas o eliminar el articulo del pedido.    DE CLICK AQUI PARA MAS INFORMACION <br /></P>
            </a>
            </div>
         <br />
         <div  class='IndexAyuda'>
            <a href='javascript:Help(\"ENVIA\");'>
                <H5 class='titulos'>ENVIA</H5>
              <P> Luego de aver agregado el primer articulo , aparesera el boton de enviar pedido el cual hara que su pedido llegue hasta la puerta de su negocio.    DE CLICK AQUI PARA MAS INFORMACION <br /></P>
               </a>
          </div>
         <br />";
		
		}
	}

?>