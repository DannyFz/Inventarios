$(document).ready(function(){

//OBTENER ESTADOS AL ENTRAR A LA VISTA
  $.ajax({
       url: 'control/obtener_estado.php',
       data: {},
       type: 'post',
       success: function(result){       
        $('#selector_estado').empty();
        $('#selector_estado').append(result);
       }  
    });
//TERMINA OBTENER ESTADOS AL ENTRAR A LA VISTA 

//OBTENER MUNICIPIOS AL SELECCIONAR UN ESTADO
$('#selector_estado').change(function(){
      var id =$(this).find('option:selected').attr("state");
      if(id == "seleccione"||id == "#")
      {
        $('#selector_ciudad').html('<option value="seleccione">Seleccione Un Estado Primero ...</option>');
      }        
      else{
        $.ajax
        ({
          url: 'control/obtener_municipio.php',
          data: {"id":id},
          type: 'post',
          success: function(result)
          {
            $('#selector_ciudad').empty();
            $('#selector_ciudad').append(result);
          }
        });
      }
    });
//TERMINA OBTENER MUNICIPIOS AL SELECCIONAR ESTADO

});