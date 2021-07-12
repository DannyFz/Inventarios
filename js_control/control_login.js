$(document).ready(function(){

//EVENTO CLICK PARA INICIO DE SESIÓN
$('#login').click(function(event){ 
  var metodo  = 'login';
  var correo  = $('#correo').val(); 
  var pw      = $('#pw').val(); 
  var tipo    = $('#tipo').val(); 
  if(correo==''){   
    alert('Por favor ingresa un correo');
  }
  else if(pw==''){    
    alert('Por favor ingresa un password');
  }  
  else if(tipo==''){    
    alert('Por favor selecciona un tipo de usuario');
  }  
  if (tipo=='1'){
  $.ajax({
    data: {"metodo":metodo, "correo":correo, "pw":pw},
    url: "control/control_login.php",
    type: "post",
    success: function(result){
      if(result == "exito"){
        location.replace("dashboard.php");     
      }
      else{
        alert('error');
      }
    }
  });
  }
  else{
    $.ajax({
    data: {"metodo":metodo, "correo":correo, "pw":pw},
    url: "control/control_login.php",
    type: "post",
    success: function(result){
      if(result == "exito"){
        location.replace("venta.php");     
      }
      else{
        alert('error');
      }
    }
  });
  }
  });  
//FIN EVENTO CLICK PARA INICIO DE SESIÓN



});