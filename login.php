<!DOCTYPE html>
<html>
  <head>
   <?php include "header/header.php"; ?>
  <title>Entrar</title>
  </head>
  <!--<body class="#5c6bc0 indigo light-blue darken-4">-->
    <body class="#757575 grey darken-1">
    <div class="row">   
        <div class="col l4 offset-l4 white" style="margin-top:6em; border-radius: 10px; border-top-radius: 10px">
          <div class="row white" style="border-radius:10px">
            <div class="col l12 m12 s12 center">
              <img src="img/poder_logo.png" alt="">
            </div>
            <div class="col l12 m12 s12 center" style="margin-top:2em">
               <select class="browser-default" id="tipo">
                <option value="#">Selecciona un tipo de usuario</option>
                <option value="1">Administrador</option>
                <option value="2">Ventas</option>
              </select>
            </div>
            <div class="col l12 m12 s12 center" style="margin-top:2em">
              <label class="label" style="font-size: 20px">Usuario</label>
              <input class="input center" type="text" id="correo" style="font-size: 20px">
            </div>
            <div class="col l12 m12 s12 center">
              <label class="label" style="font-size: 20px">Contraseña</label>
              <input class="input center" type="password" id="pw" style="font-size:20px"><br><br>
            </div>
            <div class="col l12 m12 s12 center">
              <button id="login" class="btn btn-medium white-text black"> <i class="material-icons left">send</i> Iniciar</button><br><br><br>
            </div>
            <div class="col l12 m12 s12 center">
              <a href="registro.php">Registrarme</a>
            </div>
          </div>
     </div>            
  </body>
  <script>
    $(document).ready(function(){
      $('.input').empty();
    })
  </script>
</html>

