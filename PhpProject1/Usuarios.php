
  <?php echo"
  <h2 align='center'>Usuarios</h2>
 <div><a href='#'' onclick='Menu()'><img  id='Regresar' class='icon' src='img/Regresar.jpg' width='25' height='25' align='center'>
   </a></div>
  <form id='Formulario' name='Formulario' class='Formulario'> 
  <div>
    <label >Nombre: </label><br/>
        <input type='text' id = 'Txt_Nombre' class='CajaTexto' placeholder='' value='' required/>
        <span class='icon-search' onclick='MuestraArticulos(oID); return false' ></span>
  </div>

    <div>
    <label >Usuario: </label><br/>
        <input type='text' id = 'Txt_Usuario' class='CajaTexto'  placeholder='' value='' required/>
    </div>
   <div>Clave: </label><br/>
        <input type='text' id = 'Txt_Clave' class='CajaTexto'  placeholder='' value='' required/>
  </div>
   <div>
    <label >Nivel: </label><br/>
      <input type='text' id = 'Txt_Seguridad' class='CajaTexto'  placeholder='' value='' required/>
      <select name='Nivel'>
      <option value='1'>Con Privilegios</option>
      <option value='2'>Solo Ver</option>
       
    </select>
  </div>
   <div>
    <label >Distribuidor: </label><br/>
       <input type='checkbox' id='Chbx_Bourne' class='Checkbox' value='Bourne' />Bourne
       <input type='checkbox' id='Chbx_Grumeca' class='Checkbox' value='Grumeca' />Grumeca
    </div>

  <div id='Acciones'>   
    <input type='button' name ='Guardar' class='myButton' value='Guardar' id='btn_Guardar' onclick='GuardarDistribuidor($(\"#Txt_Codigo\").val(), $(\"#Txt_Nombre\").val(),$(\"#Txt_Telefo\").val(),$(\"#Txt_Zonas\").val() ); return false' />
  <input type='button' name ='eliminar' class='myButton' value='Eliminar' id='btn_Eliminar' onclick='EliminarArticulo($(\"#Txt_Codigo\").val()); return false' />
  </div>

  
      
  </form> ";
  ?>