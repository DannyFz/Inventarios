<!DOCTYPE html>
<html>
<head>
  <?php include "header/header.php"; ?>
  <title>Sucursales</title>
</head>
<body> 
  <link rel="stylesheet" href="header/estilos.css"/>
  <?php include "header/menu.php"; ?>

   <div class="row container"> 
    <div class="col l12 m12 s12">
      <h4>Control Sucursales</h4>
    </div>
    <div class="col l12 m12 s12">
      <input type="text" id="matriz" value="<?php echo $_SESSION['id_sucursal']; ?>" hidden>
    </div>
     <div class="col l12 m12 s12" style="margin-top: 2em">
      <a href="#modal_crear_sucursal" class="btn #1b5e20 green darken-4 white-text modal-trigger">Agregar<i class="material-icons left">add</i></a>
    </div>
    <div class="col l12 m12 s12" style="margin-top: 2em; width: 900px;height: 300px;overflow: auto;">
      <table class="responsive-table" id="t_tabla">
          <thead>
            <tr>
              <th style='text-align:center;'>Nombre</th>
              <th style='text-align:center;'>Estado</th>
              <th style='text-align:center;'>Ciudad</th> 
              <th style='text-align:center;'>Estatus</th> 
              <th style='text-align:center;'>Ver</th> 
              <th style='text-align:center;'>Editar</th> 
              <th style='text-align:center;'>Usuarios</th> 
              <th style='text-align:center;'>Cerrar</th> 
              </tr>
          </thead>
            <tbody id="lista_sucursal">
              
            </tbody>
      </table>
    </div>    
  </div>

</body>
<?php include "footer/footer.php"; ?>
<?php include "matriz/modals/crear_sucursal.php"; ?>
<?php include "matriz/modals/ver_sucursal.php"; ?>
<?php include "matriz/modals/editar_sucursal.php"; ?>
<?php include "matriz/modals/ver_usuarios.php"; ?>
<?php include "matriz/modals/editar_usuario.php"; ?>
</html> 