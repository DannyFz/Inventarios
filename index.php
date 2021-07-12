<!DOCTYPE html>
<html>
<head>
  <?php include "header/header.php"; ?>
  <title>Agregar Producto</title>
</head>
<body>
  <link rel="stylesheet" href="header/estilos.css"/>
  <?php include "header/menu.php"; ?>

  <div class="row" style="margin-right: 600px; margin-left: 600px">
    <div class="col l12 m12 s12">
      <label>Código</label>
      <input type="text" id="nombre_producto" name="">
    </div>
    <div class="col l12 m12 s12">
      <label>Nombre</label>
      <input type="text" id="nombre_producto" name="">
    </div>
    <div class="col l12 m12 s12">
      <label>Tipo</label>
      <select class="browser-default">
        <option value="#">Selecciona un tipo</option>
        <option value="pieza">Pieza</option>
        <option value="unidad">Unidad</option>
        <option value="granel">Granel</option>
      </select>
    </div>
    <div class="col l12 m12 s12">
      <label>Costo</label>
      <input type="number" id="costo_producto" name="">
    </div>
    <div class="col l12 m12 s12">
      <label>Precio</label>
      <input type="number" id="costo_producto" name="">
    </div>
    <div class="col l12 m12 s12">
      <label>Mayoreo</label>
      <input type="number" id="costo_producto" name="">
    </div>
    <div class="col l12 m12 s12">
      <label>Saldo inicial</label>
      <input type="number" id="costo_producto" name="">
    </div>
    <div class="col l12 m12 s12">
      <label>Departamento</label>
      <select class="browser-default">
        <option value="#">Selecciona un departamento</option>
        <option value="pieza">Abarrotes</option>
        <option value="unidad">Dulceria</option>
        <option value="granel">Fritura</option>
        <option value="granel">Papas</option>
      </select>
    </div>
    <div class="col l12 m12 s12" style="margin-top: 2em">
      <a href="#" class="btn blue black-text">Agregar <i class="material-icons left">add</i></a>
    </div>
  </div>


</body>
<?php include "footer/footer.php"; ?>
</html>



