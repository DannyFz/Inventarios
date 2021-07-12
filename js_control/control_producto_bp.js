
$(document).ready(function(){

	$('#btn_guardar_producto').click(function(){

	let codigo = $('#codigo_producto').val();
	let nombre = $('#nombre_producto').val();
	let tipo   = $('#tipo').val();
	let costo  = $('#costo_producto').val();
	let precio = $('#precio_producto').val();
	let mayoreo= $('#mayoreo_producto').val();
	let saldo  = $('#saldo_inicial').val();
	let departamento = $('#departamento').val();

	var datos = {
      'codigo' 		 : codigo,
      'nombre' 		 : nombre,
      'tipo'   		 : tipo,
      'costo'  		 : costo,
      'precio' 		 : precio,
      'mayoreo'		 : mayoreo,
      'saldo'  		 : saldo,
      'departamento' : departamento,
      'metodo' : 'guardar_nuevo_producto'
    };

    $.ajax({
      url : 'control/control_producto.php',
      data : datos,
      type : 'post',
      success : function(result){

       console.log(result);
       if(result == 'exito'){
       	alert('creado exito');       	
       }else{
       	alert('error');
       }
       
      }
    });
});
});



