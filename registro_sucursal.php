<!DOCTYPE html>
<html>
<head>
  <?php include "header/header.php"; ?>
  <title>Crear Sucursal</title>
</head>
<body>
  <link rel="stylesheet" href="header/estilos.css"/>
  <?php include "header/menu.php"; ?>

  <!--DATOS DEL ADMINISTRADOR-->
  <div class="row container"> 
    <div class="col l12 m12 s12">
      <h4>Datos del Administrador</h4>
    </div>
    <div class="col l6 m12 s12">
      <label>Nombre</label>
      <input type="text" id="ad_nombre">
    </div>
    <div class="col l6 m12 s12">
      <label>Apellido Paterno</label>
      <input type="text" id="ad_ape_p">
    </div>
    <div class="col l6 m12 s12">
      <label>Apellido Materno</label>
      <input type="text" id="ad_ape_m">
    </div> 
    <div class="col l6 m12 s12">
      <label>Correo</label>
      <input type="text" id="ad_correo">
    </div>
    <div class="col l6 m12 s12">
      <label>Password</label>
      <input type="password" id="ad_pass">
    </div>
  </div>
<!--DATOS DEL ADMINISTRADOR-->

  <div class="row container"> 
    <div class="col l6 m12 s12">
      <h4>Registro de Matriz</h4>
    </div>
    <div class="col l8 m12 s12">
      <label>Nombre</label>
      <input type="text" id="nombre" required>
    </div>
    <div class="col l6 m12 s12">
      <label>Estado</label>
      <select class="browser-default black-text center" id="selector_estado" required>      
      </select>
    </div>
    <div class="col l6 m12 s12">
      <label>Ciudad</label>
      <select class="browser-default black-text center" id="selector_ciudad" required>
      </select>
    </div>
    <div class="col l6 m12 s12">
      <label>Código Postal</label>
      <input type="number" id="cp" required>
    </div>
    <div class="col l6 m12 s12">
      <label>Colonia</label>
      <input type="text" id="colonia" required>
    </div>
    <div class="col l6 m12 s12">
      <label>Calle</label>
      <input type="text" id="calle" required>
    </div>
    <div class="col l6 m12 s12">
      <label>Número Exterior</label>
      <input type="number" id="n_ext" required>
    </div>
    <div class="col l6 m12 s12">
      <label>Número Interior</label>
      <input type="number" id="n_int" required>
    </div>
    <div class="col l6 m12 s12" style="margin-top: 2em">
      <a href="#" id="registrar_sucursal" class="btn blue black-text">Agregar<i class="material-icons left">add</i></a>
    </div>
  </div>
</body>
<?php include "footer/footer.php"; ?>
</html>