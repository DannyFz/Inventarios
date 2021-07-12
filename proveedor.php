<!DOCTYPE html>
<html>
<head>
  <?php include "header/header.php"; ?>
  <title>Proveedores</title>
</head>
<body>
  <link rel="stylesheet" href="header/estilos.css"/>
  <?php include "header/menu.php"; ?>

  <div class="row container"> 
    <div class="col l12 m12 s12">
      <h4>Control Proveedores</h4>
    </div>
     <div class="col l12 m12 s12" style="margin-top: 2em">
      <a href="#modal_crear_proveedor" class="btn #1b5e20 green darken-4 white-text modal-trigger">Agregar<i class="material-icons left">add</i></a>
    </div>
    <div class="col l12 m12 s12" style="margin-top: 2em; width: 900px;height: 300px;overflow: auto;">
      <table class="responsive-table" id="t_tabla">
          <thead>
            <tr>
              <th style='text-align:center;'>Nombre</th>
              <th style='text-align:center;'>Telefono</th>
              <th style='text-align:center;'>Correo</th>
              <th style='text-align:center;'>URL</th>
              <th style='text-align:center;'>Ver</th>
              <th style='text-align:center;'>Eliminar</th>
              
              </tr>
          </thead>
            <tbody id="lista_proveedor_tabla"> 
              
            </tbody>
      </table>
    </div>    
  </div>

</body>
<?php include "footer/footer.php"; ?>
<?php include "matriz/modals/crear_proveedor.php"; ?>
<?php include "matriz/modals/ver_proveedor.php"; ?>
<?php include "matriz/modals/editar_proveedor.php"; ?>




</html>

<script>
$(document).ready(function(){
M.AutoInit();
});
</script>