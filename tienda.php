<!DOCTYPE html>
<html>
<head>
  <?php include "header/header.php"; ?>
  <title>Tienda</title>
</head>
<body>
  <link rel="stylesheet" href="header/estilos.css"/>
  <?php include "header/menu.php"; ?>
  <br>
  <br>
  <br>
  <div class="row container">
   
   <div class="col l12 m12 s12">
      <label></label>
      <select class="browser-default" id="depto">
        <option value="#">Selecciona un depto. de tienda</option>
        <option value="1">Bebidas</option>
      </select>
    </div>
    <div class="col l12 m12 s12">
      <label>Código de producto</label>
      <input type="text" id="codigo">
    </div>
    <div class="col l12 m12 s12">
      <label>Cantidad</label>
      <input type="text" id="cantidad">
    </div>
    
    <div class="col l12 m12 s12" style="margin-top: 2em">
      <a href="#" id="subir_producto" class="btn blue black-text">Agregar <i class="material-icons left">add</i></a>
    </div>
  </div>
</body>
<?php include "footer/footer.php"; ?>
</html>



