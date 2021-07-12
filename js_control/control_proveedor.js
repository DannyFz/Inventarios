$(document).ready(function(){ 

//OBTENER PROVEEDORES
 proveedores();
 //$('#modal_crear_proveedor').modal('open');
 function proveedores()
 {
  let sucursal    = $('#sucursal').val();  
  var datos = {
      'sucursal' : sucursal,
      'metodo'   : 'obtener_proveedor'
    };
    $.ajax({
      url : 'control/control_proveedor.php',
      data : datos,
      type : 'post',
      success : function(result){
       if(result == 'clear'){
        
       }else{
        $('#lista_proveedor_tabla').append(result);
       } 
      }
    });
 }
//TERMINA OBTENER PROVEEDORES  

//GUARDAR PROVEEDOR
	$('#crear_proveedor').click(function(){
  let sucursal      = $('#sucursal').val();  
	let nombre        = $('#nombre').val();
  let razon_social  = $('#razon_social').val();
  let estado        = $('#selector_estado').val();
	let ciudad        = $('#selector_ciudad').val();
	let cp            = $('#cp').val();
	let colonia       = $('#colonia').val();
	let calle         = $('#calle').val();
  let num_ext       = $('#num_ext').val();
	let num_int       = $('#num_int').val();
  let tel           = $('#tel').val();
  let url           = $('#url').val();
  let correo        = $('#correo').val();
  if(nombre==''||estado=='#'||ciudad=='#'||cp==''||colonia==''||tel==''){
    alert('Por favor llena los campos'); 
  }
  else{
	if(razon_social==''){
    razon_social=nombre;
  }else{}
  var datos = {
      'sucursal'     : sucursal,
      'nombre' 		   : nombre,
      'razon_social' : razon_social,
      'estado' 		   : estado,
      'ciudad'   	   : ciudad,
      'colonia'      : colonia,
      'calle'        : calle,
      'cp'  		     : cp,
      'num_ext'		   : num_ext,
      'num_int'  		 : num_int,
      'tel'          : tel,
      'url'          : url,
      'correo'       : correo,
      'metodo'       :'crear_proveedor'
    };
    $.ajax({
      url : 'control/control_proveedor.php',
      data : datos,
      type : 'post',
      success : function(result){

       console.log(result);
       if(result == 'exito'){
       	//alert('creado exito');       	
        M.toast({html: 'Proveedor Agregado!'});
        location.reload(); 
       }else{
       	//alert('error');
        M.toast({html: 'Ocurrió un problema, vuelve a intentarlo.'}); 
       }
       
      }
    });
  }
});
//TERMINA GUARDAR PROVEEDOR

//VER PROVEEDOR
$(document).on('click', '.ver_proveedor', function(){
  let id   = $(this).attr("id");
  //alert(id);
  var datos = {
      'id' : id,
      'metodo' : 'ver_proveedor'
    };
    $.ajax({
      url : 'control/control_proveedor.php',
      data : datos,
      type : 'post',
      success : function(result){
       $('#ver_proveedor').empty();
       $('#ver_proveedor').append(result);
       $('#modal_ver_proveedor').modal('open');
      }
    });
 });
//TERMINA VER PROVEEDOR

//MODAL EDITAR PROVEEDOR
$(document).on('click', '.modal_editar_proveedor', function(){
  let id   = $(this).attr("id");
  var datos = {
      'id' : id,
      'metodo' : 'modal_editar_proveedor'
    };
    $.ajax({
      url : 'control/control_proveedor.php',
      data : datos,
      type : 'post',
      success : function(result){
       $('#editar_proveedor').empty();
       $('#editar_proveedor').append(result);
       $('#modal_editar_proveedor').modal('open');
      }
    });
 }); 


 $(document).on('click', '.editar_proveedor', function(){
  let id              = $(this).attr("id");
  let e_nombre        = $('#e_nombre').val();
  let e_razon_social  = $('#e_razon_social').val();
  let e_estado        = $('#e_estado').val();
  let e_ciudad        = $('#e_ciudad').val();
  let e_colonia       = $('#e_colonia').val();
  let e_calle         = $('#e_calle').val();
  let e_cp            = $('#e_cp').val();
  let e_num_ext       = $('#e_num_ext').val();
  let e_num_int       = $('#e_num_int').val();
  let e_tel           = $('#e_tel').val();
  let e_correo        = $('#e_correo').val();
  let e_url           = $('#e_url').val();
  //alert(e_nombre+''+e_razon_social+''+e_estado+''+e_ciudad+''+e_colonia+''+e_calle+''+e_cp+''+e_num_ext+''+e_num_int+''+e_tel+''+e_correo);
 if(e_nombre==''||e_razon_social==''||e_estado==''||e_ciudad==''||e_colonia==''||e_calle==''||e_cp==''||e_num_ext==''||e_num_int==''||e_tel==''||e_correo==''){
    alert('Por favor llene los campos!');
  }
  else{
  var datos = {
      'id'            : id,
      'nombre'        : e_nombre,
      'razon_social'  : e_razon_social,
      'estado'        : e_estado,
      'ciudad'        : e_ciudad,
      'colonia'       : e_colonia,
      'calle'         : e_calle,
      'cp'            : e_cp,
      'num_ext'       : e_num_ext,
      'num_int'       : e_num_int,
      'tel'           : e_tel,
      'correo'        : e_correo,
      'url'           : e_url,
      'metodo'        : 'editar_proveedor'
    };
    $.ajax({
      url : 'control/control_proveedor.php',
      data : datos,
      type : 'post',
      success : function(result){
       console.log(result);
       if(result == 'exito'){
        alert('Proveedor editado con éxito');  
        location.reload(); 
        $('#modal_ver_proveedor').modal('close');         
        $('#modal_editar_proveedor').modal('close');       
       }else{
        alert('Ocurrió un error');
       } 
      }
    });
  } 
});
//TERMINA MODAL EDITAR PROVEEDOR

//ELIMINAR PROVEEDORES
$(document).on('click', '.eliminar_proveedor', function(){
  
  let id = $(this).attr("id");
  let elim_nombre        = $('#elim_nombre').val();
  let elim_razon_social  = $('#elim_razon_social').val();
  let elim_estado        = $('#elim_estado').val();
  let elim_ciudad        = $('#elim_ciudad').val();
  let elim_colonia       = $('#elim_colonia').val();
  let elim_calle         = $('#elim_calle').val();
  let elim_cp            = $('#elim_cp').val();
  let elim_num_ext       = $('#elim_num_ext').val();
  let elim_num_int       = $('#elim_num_int').val();
  let elim_tel           = $('#elim_tel').val();
  let elim_correo        = $('#elim_correo').val();
  let elim_url           = $('#elim_url').val();

  $(this).closest("tr").remove();
  var datos = {
      'id'            : id,
      'nombre'        : elim_nombre,
      'razon_social'  : elim_razon_social,
      'estado'        : elim_estado,
      'ciudad'        : elim_ciudad,
      'colonia'       : elim_colonia,
      'calle'         : elim_calle,
      'cp'            : elim_cp,
      'num_ext'       : elim_num_ext,
      'num_int'       : elim_num_int,
      'tel'           : elim_tel,
      'correo'        : elim_correo,
      'url'           : elim_url,
      'metodo'        : 'eliminar_proveedor'
    };
    $.ajax({
      url : 'control/control_proveedor.php',
      data : datos,
      type : 'post',
      success : function(result){
        console.log(result);
        if(result == 'exito'){
         alert('Proveedor eliminado con éxito');       
        }else{
         alert('Ocurrió un error');
        }
      
      }
    });
});
//TERMINA ELIMINAR PROVEEDORES


//TERMINA ARCHIVO JS
});