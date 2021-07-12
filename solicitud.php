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
      <input type="hidden" id="sucursal" value="1" readonly>
      <input type="hidden" id="usuario"  value="1" readonly>
    </div>
    <div class="col l6 m12 s12">
      <label>Folio</label>
      <input type="text" id="folio" value="2000" readonly>
    </div>
    <div class="col l6 m12 s12">
      <label>Sucursal</label>
      <select class="browser-default" id="sucursal_para">
        <option value="#">Selecciona una sucursal</option> 
        
      </select>
    </div>
    <br>
    <br>
    <div class="col l12 m12 s12">
      <label>Código</label>
      <input type="text" id="cod_prod">
    </div>
    <div class="col l6 m12 s12">
      <label>Cantidad</label>
      <input type="text" id="cant_prod">
    </div>
    
    <div class="col l3 m12 s12" style="margin-top: 2em">
      <a href="#" id="obt_prod_en" class="btn blue white-text">Agregar<i class="material-icons left">add</i></a>
    </div>
    <div class="col l3 m12 s12" style="margin-top: 2em">
      <a href="#" id="busqueda_prod_en" class="btn amber white-text modal-trigger">Buscar<i class="material-icons left">search</i></a>
    </div>
    
    <div class="col l12 m12 s12" style="margin-top: 2em; width: 900px;height: 300px;overflow: auto;">
      <table class="responsive-table" id="t_tabla">
          <thead>
            <tr>
              <th>Articulo</th>
              <th>Cantidad</th>
              <th>Precio Unitario</th>
              <th>Total</th>
              <th>Cancelar</th>
              </tr>
          </thead>
            <tbody id="lista_ticke"> 
              
            </tbody>
      </table>
    </div>
    
    <div class="col l6 m12 s12" style="margin-top: 2em">
      <a href="#" id="crear_venta" class="btn green white-text">Venta<i class="material-icons left">point_of_sale</i></a>
    </div>
    <div class="col l6 m12 s12" style="margin-top: 2em">
      <a href="#" id="cancelar_venta" class="btn red white-text">Cancelar Venta<i class="material-icons left">cancel_presentation</i></a>
    </div>
  </div>


</body>
<?php include "footer/footer.php"; ?>
<?php include "modals/buscar_producto.php"; ?>
</html>
<script >
  $(document).ready(function(){ 
    sucursales_solicitud();
    });
</script>