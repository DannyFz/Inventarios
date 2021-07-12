$(document).ready(function(){

//OBTENER SUCURSALES
let sucursal  = $('#sucursal').val();
var datos = {
      'sucursal' : sucursal
    };
  $.ajax({
       url: 'control/obtener_sucursal.php',
       data: datos,
       type: 'post',
       success: function(result){       
        $('#selector_sucursal_para').empty();
        $('#selector_sucursal_para').append(result);
       }  
    });
//TERMINA OBTENER SUCURSALES 

//GUARDAR SUCURSAL
	$('#crear_usuario').click(function(){
  let sucursal = $('#selector_sucursal').val();
	let nombre   = $('#nombre').val();
  let ape_p    = $('#ape_p').val();
	let ape_m    = $('#ape_m').val();
	let tipo     = $('#selector_tipo').val();
  let correo   = $('#correo').val();
  let pass     = $('#pass').val();
	var datos = {
      'sucursal'   : sucursal,
      'nombre' 		 : nombre,
      'ape_p' 		 : ape_p,
      'ape_m'   	 : ape_m,
      'tipo'  		 : tipo,
      'correo'     : correo,
      'pass'       : pass,
      'metodo'     : 'crear_usuario'
    };
    $.ajax({
      url : 'control/control_usuario.php',
      data : datos,
      type : 'post',
      success : function(result){
       console.log(result);
       if(result == 'exito'){
       	alert('creado exito');       	
       }
       else if(result == 'exist'){
        alert('El usuario ya existe para la sucursal seleccionada!');        
       }
       else{
       	alert('error');
       }
      }
    });
});
//TERMINA GUARDAR SUCURSAL

});