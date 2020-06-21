  <?php echo"
 <div><a href='#'' onclick='Menu()'><img  id='Regresar' class='RegresarRegresarRegresar' src='img/Regresar.jpg' width='25' height='25' align='center'>
   </a></div>
  <form id='Formulario' name='Formulario' class='Formulario'> 
  <div>
    <label >Codigo: </label><br/>
        <input type='text' id = 'Txt_Codigo' class='CajaTexto' placeholder='' value='' required/>
        <span class='icon-search' onclick='MuestraArticulos(oID); return false' ></span>
  </div>

    <div>
    <label >Nombre: </label><br/>
        <input type='text' id = 'Txt_Nombre' class='CajaTexto'  placeholder='' value='' required/>
    </div>
  <div>
    <label >Telefo: </label><br/>
        <input type='text' id = 'Txt_Telefo' class='CajaTexto'  placeholder='' value='' required/>
  </div>
   <div>
    <label >Zonas: </label><br/>
      <input type='text' id = 'Txt_Zonas' class='CajaTexto'  placeholder='' value='' required/>
  </div>
  <div id='Acciones'>   
    <input type='button' name ='Guardar' class='myButton' value='Guardar' id='btn_Guardar' onclick='GuardarDistribuidor($(\"#Txt_Codigo\").val(), $(\"#Txt_Nombre\").val(),$(\"#Txt_Telefo\").val(),$(\"#Txt_Zonas\").val() ); return false' />
  <input type='button' name ='eliminar' class='myButton' value='Eliminar' id='btn_Eliminar' onclick='EliminarArticulo($(\"#Txt_Codigo\").val()); return false' />
  </div>

  
      
  </form> ";
  ?>





