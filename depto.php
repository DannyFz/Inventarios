<!DOCTYPE html>
<html>
<head>
  <?php include "header/header.php"; ?>
  <title>Crear Departamento</title>
</head>
<body>
  <link rel="stylesheet" href="header/estilos.css"/>
  <?php include "header/menu.php"; ?>
  <div class="row container">
    <div class="col l12 m12 s12">
      <label>Nombre</label>
      <input type="text" id="nombre">
    </div>
    <div class="col l12 m12 s12">
      <label>Sucursal</label>
      <input type="text" id="sucursal" value="1" readonly>
    </div>
    <div class="col l12 m12 s12" style="margin-top: 2em">
      <a href="#" id="crear_depto" class="btn blue black-text">Agregar <i class="material-icons left">add</i></a>
    </div>
  </div>
</body>
<?php include "footer/footer.php"; ?>
</html>



