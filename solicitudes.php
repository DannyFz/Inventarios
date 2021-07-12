<!DOCTYPE html>
<html>
<head>
  <?php include "header/header.php"; ?>
  <title>Solicitudes de envío</title>
</head>
<body>
  <link rel="stylesheet" href="header/estilos.css"/>
  <?php include "header/menu.php"; ?>
  <div class="row container">
    <div class="col l12 m12 s12">
      <input type="hidden" id="sucursal" value="1" readonly>
    </div>
    <div class="col l12 m12 s12">
      <input type="text" id="folio" value="1000" readonly>
    </div>
    <div class="col l3 m3 s3">
      <label>Código</label>
      <input type="text" id="cod_prod">
    </div>
    <div class="col l1 m1 s1">
      <label>Cantidad</label>
      <input type="text" id="cant_prod">
    </div>
    <div class="col l1 m1 s1" style="margin-top: 2em">
      
    </div>
    <div class="col l3 m3 s3" style="margin-top: 2em">
      <a href="#" id="" class="btn blue black-text">Limpiar<i class="material-icons left">add</i></a>
    </div>
    <div class="col l3 m3 s3" style="margin-top: 2em">
      <a href="#" id="obt_prod" class="btn blue black-text">Agregar<i class="material-icons left">add</i></a>
    </div>

    <div class="col l12 m12 s12" style="margin-top: 2em">
      <table class="responsive-table" id="t_tabla">
          <thead>
            <tr>
              <th>Articulo</th>
              <th>Cantidad</th>
              <th>Cancelar</th>
              </tr>
          </thead>
            <tbody id="lista_solicitud"> 
              
            </tbody>
      </table>
    </div>

    <div class="col l12 m12 s12" style="margin-top: 2em">
      <a href="#" id="btn_guardar_venta" class="btn green white-text">Venta<i class="material-icons left">point_of_sale</i></a>
    </div>
  </div>


</body>
<?php include "footer/footer.php"; ?>
</html>