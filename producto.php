<!DOCTYPE html>
<html>
<head>
  <?php include "header/header.php"; ?>
  <title>Agregar Producto</title>
</head>
<body>
  <link rel="stylesheet" href="header/estilos.css"/>
  <?php include "header/menu.php"; ?>
  <div class="row container">
    <div class="col l12 m12 s12">
      <h4>Crear Producto</h4>
    </div>
    <div class="col l12 m12 s12">
      <input type="hidden" id="sucursal" value="<?php echo $_SESSION['id_sucursal']; ?>" readonly>
    </div>
    <br>
     <div class="col l12 m12 s12">
      <label></label>
      <select class="browser-default" id="lista_proveedor">
        
      </select>
    </div>
    <div class="col l12 m12 s12">
      <label>Código</label>
      <input type="text" id="codigo" name="">
    </div>
    <div class="col l12 m12 s12">
      <label>Nombre</label>
      <input type="text" id="nombre" name="">
    </div>
    <div class="col l12 m12 s12">
      <label>Unidad de medida</label>
      <input type="text" id="unidad" name="">
      </select>
    </div>
    <div class="col l12 m12 s12">
      <label>Costo</label>
      <input type="number" id="costo" name="">
    </div>
    <div class="col l12 m12 s12">
      <label>Precio</label>
      <input type="number" id="precio" name="">
    </div>
    <div class="col l12 m12 s12">
      <label>Cantidad</label>
      <input type="number" id="cantidad" name="">
    </div>
    <div class="col l12 m12 s12">
      <label>Cantidad Maxima</label>
      <input type="number" id="cantidad_max" name="">
    </div>
    <div class="col l12 m12 s12">
      <label>Cantidad Minima</label>
      <input type="number" id="cantidad_min" name="">
    </div> 
    
    <div class="col l12 m12 s12" style="margin-top: 2em">
      <a href="#" id="crear_producto" class="btn #1b5e20 green darken-4 white-text">Agregar <i class="material-icons left">add</i></a>
    </div>
  </div>


</body>
<?php include "footer/footer.php"; ?>
</html>



