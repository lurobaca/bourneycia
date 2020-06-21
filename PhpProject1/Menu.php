
<?php

require('Clases/Class_sesiones.php');
$obj_processmodel_sesiones=new sesion;
$user=$obj_processmodel_sesiones->get("usuario");
$Nombre_user=$obj_processmodel_sesiones->get("NameUsuario");






echo"
<ul id='Menu'>
    <li>
    	<a href='#' onclick='Distribuidora()'><div class='Opcion'> 
    		<div><img class='icon' src='img/Distribuidor.jpg'  ></div>
    		<div>Distribuidores</div>  
    	</div>
    	</a>
        <a href='#'>
        <div class='Opcion' onclick='Usuarios()'> 
            <div><img class='icon' src='img/Usuarios.jpg'  ></div>
            <div>Usuarios</div>  
        </div>
        </a>
    	
    </li>
    <li>
    <a href='#'onclick='AddOferta(\"Mes\")'>
    	<div class='Opcion'> 
    		<div><img class='icon' src='img/OfMes.jpg'  ></div>
    		<div>Of del Mes</div>  
    	</div>
    		</a>
            <a href='#' onclick='AddOferta(\"Flash\")'>
        <div class='Opcion'> 
        <div><img class='icon' src='img/OfFlash.jpg' ></div>
        <div>Ofertas Flash </div>
        </div>
        </a>
    	
    </li> 
    <li>
    <a href='#'>
    	<div class='Opcion' onclick='Revista()'> 
    		<div><img class='icon' src='img/Revista.jpg'  ></div>
    		<div>Revista</div>  
    	</div>
    	</a> 
        <a href='#'onclick='AddOferta(\"Armados\")'>
        <div class='Opcion'> 
        <div><img class='icon' src='img/armado.jpg' ></div>
        <div>Armados </div>
        </div>
            </a>
    	
    </li> 
   
   
    </ul>";
    ?>