$(document).ready(function(){

//REGISTRAR SUCURSAL MATRIZ
  $('#registrar_sucursal_matriz').click(function(){
  let ad_nombre  = $('#ad_nombre').val();
  let ad_ape_p   = $('#ad_ape_p').val();
  let ad_ape_m   = $('#ad_ape_m').val(); 
  let correo     = $('#ad_correo').val();
  let pass       = $('#ad_pass').val();
  let nombre   = $('#nombre').val();
  let estado   = $('#selector_estado').val();
  let ciudad   = $('#selector_ciudad').val();
  let cp       = $('#cp').val();
  let colonia  = $('#colonia').val();
  let calle    = $('#calle').val();
  let num_ext  = $('#n_ext').val();
  let num_int  = $('#n_int').val();
  if(ad_nombre==''||ad_ape_p==''||ad_ape_p==''||correo==''||pass==''||ciudad==''||
    cp==''||colonia==''||calle==''){
    alert('Por favor llene los campos!');
  }
  else{
  var datos = {
      'ad_nombre'  : ad_nombre, 
      'ad_ape_p'   : ad_ape_p,
      'ad_ape_m'   : ad_ape_m,
      'correo'     : correo,
      'pass'       : pass,
      'nombre'   : nombre,
      'estado'   : estado,
      'ciudad'   : ciudad,
      'colonia'  : colonia,
      'calle'    : calle,
      'cp'       : cp,
      'num_ext'  : num_ext,
      'num_int'  : num_int,
      'metodo'   : 'registrar_sucursal_matriz'
    };
    $.ajax({
      url : 'control/control_sucursal.php',
      data : datos,
      type : 'post',
      success : function(result){
       console.log(result);
       if(result == 'exito'){
        alert('Matriz creada con éxito');         
       }else{
        alert('error');
       } 
      }
    });
  }  
});
//TERMINA REGISTRAR SUCURSAL MATRIZ


//OBTENER SUCURSALES
 sucursales();
 function sucursales()
 {
  let matriz    = $('#matriz').val();  
  var datos = {
      'matriz' : matriz,
      'metodo' : 'obtener_sucursales'
    };
    $.ajax({
      url : 'control/control_sucursal.php',
      data : datos,
      type : 'post',
      success : function(result){
       if(result == 'clear'){
        
       }else{
        $('#lista_sucursal').append(result);
       } 
      }
    });
 }
//TERMINA OBTENER SUCURSALES   


//VER SUCURSAL
 $(document).on('click', '.ver_sucursal', function(){
  let id   = $(this).attr("id");
  //alert(id);
  var datos = {
      'id' : id,
      'metodo' : 'ver_sucursal'
    };
    $.ajax({
      url : 'control/control_sucursal.php',
      data : datos,
      type : 'post',
      success : function(result){
       $('#ver_sucursal').empty();
       $('#ver_sucursal').append(result);
       $('#modal_ver_sucursal').modal('open');
      }
    });
 });
//TERMINA VER SUCURSAL


//MODAL EDITAR SUCURSAL
 $(document).on('click', '.modal_editar_sucursal', function(){
  let id   = $(this).attr("id");
  var datos = {
      'id' : id,
      'metodo' : 'modal_editar_sucursal'
    };
    $.ajax({
      url : 'control/control_sucursal.php',
      data : datos,
      type : 'post',
      success : function(result){
       $('#editar_sucursal').empty();
       $('#editar_sucursal').append(result);
       $('#modal_editar_sucursal').modal('open');
      }
    });
 }); 


 $(document).on('click', '.editar_sucursal', function(){
  let id          = $(this).attr("id");
  let ed_nombre   = $('#ed_nombre').val();
  let ed_cp       = $('#ed_cp').val();
  let ed_colonia  = $('#ed_colonia').val();
  let ed_calle    = $('#ed_calle').val();
  let ed_num_ext  = $('#ed_ne').val();
  let ed_num_int  = $('#ed_ni').val();
  if(ed_nombre==''||ed_cp==''||ed_colonia==''||ed_calle==''){
    alert('Por favor llene los campos!');
  }
  else{
  var datos = {
      'id'       : id,
      'nombre'   : ed_nombre,
      'cp'       : ed_cp,
      'colonia'  : ed_colonia,
      'calle'    : ed_calle,
      'num_ext'  : ed_num_ext,
      'num_int'  : ed_num_int,
      'metodo'   : 'editar_sucursal'
    };
    $.ajax({
      url : 'control/control_sucursal.php',
      data : datos,
      type : 'post',
      success : function(result){
       console.log(result);
       if(result == 'exito'){
        alert('Sucursal editada con éxito');         
       }else{
        alert('Ocurrió un error');
       } 
      }
    });
  }  
});
//TERMINA MODAL EDITAR SUCURSAL


//VER USUARIOS
 $(document).on('click', '.ver_usuarios', function(){
  let id   = $(this).attr("id");
  //alert(id);
  var datos = {
      'id' : id,
      'metodo' : 'ver_usuarios'
    };
    $.ajax({
      url : 'control/control_sucursal.php',
      data : datos,
      type : 'post',
      success : function(result){
       $('#ver_usuarios').empty();
       $('#ver_usuarios').append(result);
       $('#modal_ver_usuarios').modal('open');
      }
    });
 });
//TERMINA VER USUARIOS


//MODAL EDITAR USUARIO
 $(document).on('click', '.modal_editar_usuario', function(){
  let id   = $(this).attr("id");
  //alert(id);
  var datos = {
      'id' : id,
      'metodo' : 'modal_editar_usuario'
    };
    $.ajax({
      url : 'control/control_sucursal.php',
      data : datos,
      type : 'post',
      success : function(result){
       $('#editar_usuario').empty();
       $('#editar_usuario').append(result);
       $('#modal_editar_usuario').modal('open');
      }
    });
 }); 

 $(document).on('click', '.editar_usuario', function(){
  let id          = $(this).attr("id");
  let ed_nombre   = $('#ed_nombre_u').val();
  let ed_ape_p    = $('#ed_ape_p').val();
  let ed_ape_m    = $('#ed_ape_m').val();
  let ed_correo   = $('#ed_correo').val();
  if(ed_nombre==''||ed_ape_p==''||ed_ape_m==''||ed_correo==''){
    alert('Por favor llene los campos!');
  }
  else{
  var datos = {
      'id'       : id,
      'nombre'   : ed_nombre,
      'ape_p'    : ed_ape_p,
      'ape_m'    : ed_ape_m,
      'correo'   : ed_correo,
      'metodo'   : 'editar_usuario'
    };
    $.ajax({
      url : 'control/control_sucursal.php',
      data : datos,
      type : 'post',
      success : function(result){
       console.log(result);
       if(result == 'exito'){
        alert('Usuario editado con éxito');
        $('#modal_ver_usuarios').modal('close');         
        $('#modal_editar_usuario').modal('close');
       }else{
        alert('Ocurrió un error');
       } 
      }
    });
  }  
});
//TERMINA MODAL EDITAR USUARIO


//CERRAR SUCURSAL
$(document).on('click', '.cerrar_sucursal', function(){
  let id          = $(this).attr("id");
  var datos = {
      'id'       : id,
      'metodo'   : 'cerrar_sucursal'
    };
    $.ajax({
      url : 'control/control_sucursal.php',
      data : datos,
      type : 'post',
      success : function(result){
       console.log(result);
       if(result == 'cerrar'){
        alert('Sucursal cerrada!');
        window.location.reload();
       }else if(result == 'abrir'){
        alert('Sucursal abierta!');
        window.location.reload();
       } 
       else{
        alert('Ocurrió un error!');
       } 
      }
    });
});
//TERMINA CERRAR SUCURSAL

//NUEVA SUCURSAL
  $('#nueva_sucursal').click(function(){
  let nombre   = $('#nombre').val();
  let estado   = $('#selector_estado').val();
  let ciudad   = $('#selector_ciudad').val();
  let cp       = $('#cp').val();
  let colonia  = $('#colonia').val();
  let calle    = $('#calle').val();
  let num_ext  = $('#n_ext').val();
  let num_int  = $('#n_int').val();
  let matriz   = $('#matriz').val();
  //alert(nombre+estado+ciudad+cp+colonia+calle+num_int+num_ext+matriz);
  if(nombre==''||estado==''||ciudad==''||cp==''||colonia==''||calle==''){
    alert('Por favor llene los campos!');
  }
  else{
  var datos = {
      'matriz'   : matriz,
      'nombre'   : nombre,
      'estado'   : estado,
      'ciudad'   : ciudad,
      'colonia'  : colonia,
      'calle'    : calle,
      'cp'       : cp,
      'num_ext'  : num_ext,
      'num_int'  : num_int,
      'metodo'   : 'nueva_sucursal'
    };
    $.ajax({
      url : 'control/control_sucursal.php',
      data : datos,
      type : 'post',
      success : function(result){
       console.log(result);
       if(result == 'exito'){
        alert('Nueva sucursal creada con éxito');         
        location.reload();
       }else{
        alert('error');
       } 
      }
    });
  }  
});
//TERMINA NUEVA SUCURSAL


//CREAR ESPACIO
  $('#crear_espacio').click(function(){
  let sucursal    = $('#sucursal').val();
  let descripcion = $('#descripcion').val();
  
  var datos = {
      'id_sucursal' : sucursal,
      'descripcion'  : descripcion,
      'metodo'   : 'crear_espacio'
    };
    $.ajax({
      url : 'control/control_sucursal.php',
      data : datos,
      type : 'post',
      success : function(result){
       console.log(result);
       if(result == 'exito'){
        alert('Espacio creado con éxito');         
       }else{
        alert('error');
       } 
      }
    });
});
//TERMINA CREAR ESPACIO


//CREAR DEPARTAMENTO
  $('#crear_depto').click(function(){
  let sucursal = $('#sucursal').val();
  let nombre   = $('#nombre').val();
  
  var datos = {
      'id_sucursal' : sucursal,
      'nombre'  : nombre,
      'metodo'   : 'crear_depto'
    };
    $.ajax({
      url : 'control/control_sucursal.php',
      data : datos,
      type : 'post',
      success : function(result){
       console.log(result);
       if(result == 'exito'){
        alert('Departamento creado con éxito');         
       }else{
        alert('error');
       } 
      }
    });
});
//TERMINA CREAR DEPARTAMENTO


//SUBIR PRODUCTO A TIENDA
  $('#subir_producto').click(function(){
  let depto   = $('#depto').val();
  let codigo   = $('#codigo').val();
  let cantidad = $('#cantidad').val();
  
  var datos = {
      'depto'    : depto,
      'codigo'   : codigo,
      'cantidad' : cantidad,
      'metodo'   : 'subir_producto'
    };
    $.ajax({
      url : 'control/control_sucursal.php',
      data : datos,
      type : 'post',
      success : function(result){
       console.log(result);
       if(result == 'exito'){
        alert('Producto enviado a tienda!');         
       }else{
        alert('error');
       } 
      }
    });
});
//TERMINA SUBIR PRODUCTO A TIENDA 

//OBTENER SUCURSALES PARA SOLICITUD
 function sucursales_solicitud()
 {
  let sucursal    = $('#sucursal').val();  
  var datos = {
      'sucursal' : sucursal,
      'metodo' : 'obtener_sucursales_solicitud'
    };
    $.ajax({
      url : 'control/control_sucursal.php',
      data : datos,
      type : 'post',
      success : function(result){
       if(result == 'clear'){
        
       }else{
        $('#sucursal_para').append(result);
       } 
      }
    });
 }
//TERMINA OBTENER SUCURSALES PARA SOLICITUD

});