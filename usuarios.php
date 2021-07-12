<!DOCTYPE html>
<html>
<head>
  <?php include "header/header.php"; ?>
  <?//php include "clases/sesion_sucursal.php"; ?>
  <title>Registrar Usuarios</title>
</head>
<body>
  <link rel="stylesheet" href="header/estilos.css"/>
  <?php include "header/menu.php"; ?>

  <div class="row container">
    <div class="col l12 m12 s12">
      <input type="hidden" id="sucursal" value="<?php echo $_SESSION['id']; ?>" readonly>
    </div>
    <div class="col l12 m12 s12">
      <label>Sucursal</label>
      <select class="browser-default" id="selector_sucursal">
        <option value="#">Selecciona una sucursal</option>
      </select>
    </div>
    <div class="col l12 m12 s12">
      <label>Nombre</label>
      <input type="text" id="nombre">
    </div>
    <div class="col l12 m12 s12">
      <label>Apellido Paterno</label>
      <input type="text" id="ape_p" >
    </div>
    <div class="col l12 m12 s12">
      <label>Apellido Materno</label>
      <input type="text" id="ape_m">
    </div>
    <div class="col l12 m12 s12">
      <label>Tipo</label>
      <select class="browser-default" id="selector_tipo">
        <option value="#">Selecciona un tipo</option>
        <option value="2">Gerente</option>
        <option value="3">Venta</option>
      </select>
    </div>
    <div class="col l12 m12 s12">
      <label>Correo</label>
      <input type="text" id="correo">
    </div>
    <div class="col l12 m12 s12">
      <label>Password</label>
      <input type="password" id="pass">
    </div>
    
    <div class="col l12 m12 s12" style="margin-top: 2em">
      <a href="#" id="crear_usuario" class="btn blue black-text">Agregar <i class="material-icons left">add</i></a>
    </div>
  </div>


</body>
<?php include "footer/footer.php"; ?>
</html>



