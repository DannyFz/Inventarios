$(document).ready(function(){

shortcut.add("F1", function() {
    //alert("F1 pressed");
    window.location.href = "proveedor.php";
});

//OBTENER PROVEEDORES
 lista_proveedores();
 function lista_proveedores()
 {
  let sucursal    = $('#sucursal').val();  
  var datos = {
      'sucursal' : sucursal,
      'metodo' : 'lista_proveedores'
    };
    $.ajax({
      url : 'control/control_producto.php',
      data : datos,
      type : 'post',
      success : function(result){
        $('#lista_proveedor').append(result);
      }
    });
 }
//TERMINA OBTENER PROVEEDORES   

//OBTENER FOLIO
 function folio()
 {
  let sucursal    = $('#sucursal').val();  
  var datos = {
      'sucursal' : sucursal,
      'metodo' : 'lista_proveedores'
    };
    $.ajax({
      url : 'control/control_producto.php',
      data : datos,
      type : 'post',
      success : function(result){
        $('#lista_proveedor').append(result);
      }
    });
 }
//TERMINA OBTENER FOLIO

//CREAR PRODUCTO
	$('#crear_producto').click(function(){

	let proveedor = $('#lista_proveedor').val();
  let sucursal  = $('#sucursal').val();
  let codigo    = $('#codigo').val();
  let nombre    = $('#nombre').val();
	let unidad    = $('#unidad').val();
	let costo     = $('#costo').val();
	let precio    = $('#precio').val();
	let cantidad  = $('#cantidad').val();
	let maximo    = $('#cantidad_max').val();
	let minimo    = $('#cantidad_min').val();
  let espacio   = $('#espacio').val();
  
	var datos = {
      'proveedor'  : proveedor,
      'sucursal'   : sucursal,
      'codigo' 		 : codigo,
      'nombre' 		 : nombre,
      'unidad'   	 : unidad,
      'costo'  		 : costo,
      'precio' 		 : precio,
      'cantidad'	 : cantidad,
      'maximo'  	 : maximo,
      'minimo'     : minimo,
      'espacio'    : espacio,
      'metodo' : 'crear_producto'
    };
    $.ajax({
      url : 'control/control_producto.php',
      data : datos,
      type : 'post',
      success : function(result){
       console.log(result);
       if(result == 'exito'){
       	alert('creado exito');       	
        window.location.reload();
       }else{
       	alert('error');
       }
      }
    });
});
//TERMINA CREAR PRODUCTO


//OBTENER LISTA DE PRODUCTOS
 productos();
 function productos()
 {
  let matriz    = $('#matriz').val();  
  var datos = {
      'matriz' : matriz,
      'metodo' : 'obtener_productos_sucursal'
    };
    $.ajax({
      url : 'control/control_producto.php',
      data : datos,
      type : 'post',
      success : function(result){
       if(result == 'clear'){
        
       }else{
        $('#lista_productos').append(result);
       } 
      }
    });
 }
//TERMINA OBTENER LISTA DE PRODUCTOS   



//OBTENER PRODUCTO
  $('#total').val('');
  $('#obt_prod').click(function(){
  let folio    = $('#folio').val();  
  let codigo   = $('#cod_prod').val();
  let cantidad = $('#cant_prod').val();
  var datos = {
      'folio'    : folio,
      'codigo'   : codigo,
      'cantidad' : cantidad,
      'metodo'   : 'obtener_producto'
    };
    $.ajax({
      url : 'control/control_producto.php',
      data : datos,
      type : 'post',
      success : function(result){
       if(result == 'clear'){
        location.reload(); 
       }else{
        $('#lista_ticket').append(result);
        var total =0;
        $("td.c_total").each(function(){
        total += parseInt($(this).text());
        })
        $('#total').val(total);
        $('#cod_prod').val('');
        $('#cant_prod').val('');  
       } 
      }
    });
});
//TERMINA OBTENER PRODUCTO 


//ABRIR MODAL BUSCAR PRODUCTO
  $('#busqueda_prod').click(function(){
  $('#buscar_nombre').val(''); 
  $('#lista_prod').empty(); 
  $('#modal_buscar_producto').modal('open');
});
//TERMINA ABRIR MODAL BUSCAR PRODUCTO 


//BUSCAR PRODUCTO
  $( "#buscar_nombre" ).keypress(function() {  
  let sucursal = $('#sucursal').val();  
  let nombre   = $('#buscar_nombre').val();
  var datos = {
      'sucursal' : sucursal,
      'nombre'   : nombre,
      'metodo'   : 'buscar_producto'
    };
    $.ajax({
      url : 'control/control_producto.php',
      data : datos,
      type : 'post',
      success : function(result){
       if(result == 'clear'){
       }else{
        $('#lista_prod').empty();
        $('#lista_prod').append(result);
       } 
      }
    });
});
//TERMINA BUSCAR PRODUCTO 


//AÑADIR PRODUCTO DE BÚSQUEDA A LA LISTA
$(document).on('click', '.agregar_prod', function(){
  let folio    = $('#folio').val();  
  let codigo   = $(this).attr("id");
  var datos = {
      'folio'      : folio,
      'codigo'     : codigo,
      'cantidad'   : '',
      'metodo' : 'agregar_busqueda_producto'
    };
    $.ajax({
      url : 'control/control_producto.php',
      data : datos,
      type : 'post',
      success : function(result){
      if(result == 'clear'){
        
       }else{
        $('#lista_ticket').append(result);
        var total =0;
        $("td.c_total").each(function(){
        total += parseInt($(this).text());
        })
        $('#total').val(total);
        
       } 
      }
    });
});
//TERMINA AÑADIR PRODUCTO DE BÚSQUEDA A LA LISTA


//AUMENTAR LA CANTIDAD DEL PRODUCTO
  //$(document).on('keydown', '.n_cant', function(ev){  
  $(document).on('change', '.n_cant td', function(ev){    
    
  //alert('Hello');
  //let idp = $(this).attr("id"); 
  //alert(idp);
  /*  
  let idp = $(this).attr("id");
  let codigo = $(this).attr("codigo");
  var cantidad = $('.n_cant').val();
  var datos = {
      'id' : idp,
      'cantidad' : cantidad,
      'codigo'   : codigo,
      'metodo'   : 'actualizar_producto'
    };
    $.ajax({
      url : 'control/control_producto.php',
      data : datos,
      type : 'post',
      success : function(result){
       $("tr#"+idp).parent().replaceWith(result); 
       //$('#lista_prod').empty();
       // $('#lista_prod').append(result);
       var total =0;
        $("td.c_total").each(function(){
        total += parseInt($(this).text());
        })
        $('#total').val(total);
      }
    });
  */
});
//AUMENTAR LA CANTIDAD DEL PRODUCTO

//QUITAR PRODUCTO DE LA LISTA
$(document).on('click', '.cancelar_prod', function(){
  let id = $(this).attr("id");
  let precio = $(this).attr("precio");
  var total = $('#total').val();
  var nvo_total = total-precio;
  $('#total').val(nvo_total);
  $(this).closest("tr").remove();
  var datos = {
      'id'     : id,
      'metodo' : 'eliminar_producto'
    };
    $.ajax({
      url : 'control/control_producto.php',
      data : datos,
      type : 'post',
      success : function(result){
      
      }
    });
});
//TERMINA QUITAR PRODUCTO DE LA LISTA


//CREAR VENTA
  $('#crear_venta').click(function(){
  let folio     = $('#folio').val();  
  let usuario   = $('#usuario').val();    
  let sucursal  = $('#sucursal').val();  
  var datos = {
      'folio'    : folio,
      'usuario'  : usuario,
      'sucursal' : sucursal,
      'metodo'   : 'crear_venta'
    };
    $.ajax({
      url : 'control/control_producto.php',
      data : datos,
      type : 'post',
      success : function(result){
       if(result == 'exito'){
        alert('Venta realizada');
        location.reload();
       }else{
        alert('Ocurrió un error');
       } 
      }
    });
});
//TERMINA CREAR VENTA


//CANCELAR VENTA
  $('#cancelar_venta').click(function(){
  let folio    = $('#folio').val();  
  var datos = {
      'folio'    : folio,
      'metodo'   : 'cancelar_venta'
    };
    $.ajax({
      url : 'control/control_producto.php',
      data : datos,
      type : 'post',
      success : function(result){
       if(result == 'exito'){
        alert('Venta cancelada');
        location.reload();
       }else{
        alert('Ocurrió un error');
       } 
      }
    });
});
//TERMINA CANCELAR VENTA


//OBTENER SUCURSALES PARA ENVÍO
let sucursal  = $('#sucursal_para').val();
var datos = {
      'sucursal' : sucursal
    };
  $.ajax({
       url: 'control/obtener_sucursal_envio.php',
       data: datos,
       type: 'post',
       success: function(result){       
        $('#selector_sucursal').empty();
        $('#selector_sucursal').append(result);
       }  
    });
//TERMINA OBTENER SUCURSALES PARA ENVÍO

//CREAR ENVIO
  $('#envio').click(function(){
  let folio  = $('#folio').val();  
  let codigo = $('#cod_prod').val();
  var datos = {
      'codigo' : codigo,
      'folio'  : folio,
      'metodo' : 'obtener_producto'
    };
    $.ajax({
      url : 'control/control_producto.php',
      data : datos,
      type : 'post',
      success : function(result){
       if(result == 'clear'){
        
       }else{
        $('#lista_ticket').append(result);  
       } 
      }
    });
});
//TERMINA CREAR ENVIO


//VER ALMACEN
$(document).on('click', '.ver_almacen', function(){
  let id   = $(this).attr("id");
  //alert(id);
  var datos = {
      'id' : id,
      'metodo' : 'ver_almacen'
    };
    $.ajax({
      url : 'control/control_producto.php',
      data : datos,
      type : 'post',
      success : function(result){
       $('#ver_almacen').empty();
       $('#ver_almacen').append(result);
       $('#modal_ver_almacen').modal('open');
      }
    });
 });
//TERMINA VER ALMACEN

//FUNCION NUEVO TOTAL

function Nuevo_total(){
 var total = 0;
  $("td.c_total").each(function(){
    total += parseInt($(this).text());
    })
  $('#total').val(total);
}

//termina funcion nuevo total

//ACTUALIZAR PRECIO PRODUCTO
$(document).on('click', '.total_product', function(){
  //alert('Soy una alerta');
  let id    = $(this).attr("id");
  let a     = $("#cnt_"+id).val();
  let b     = $("#P"+id).val();
  let t     = $("#total"+id).val();
  var total = $('#total').val();
  let c ;
  let d ;
  //alert(a*b);
  c = a*b;
  d = total + c;
  $("#total" + id).html(c);
  Nuevo_total();

  
  //8alert(d);
  //$("#total"+id).val(d);
  //$("#total").val(d);
  //parseInt($(this).text());
  //console.log(id);
});
//TERMINA ACTUALIZAR PRECIO PRODUCTO

});