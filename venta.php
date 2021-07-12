<!DOCTYPE html>
<html>
<head>
  <?php include "header/header.php"; ?>
  <?php include "clases/sesion_admin.php"; ?>
  <title>Agregar Producto</title>
</head>
<body>
  <link rel="stylesheet" href="header/estilos.css"/>
  <?php 
  if($tipo_usuario == '1'){ 
    include "header/menu.php";
  }else{
    include "header/menu_venta.php";
  }
  ?>
  <div class="row container">
    <div class="col l12 m12 s12">
      <input type="hidden" id="sucursal" value="1" readonly>
      <input type="hidden" id="usuario"  value="1" readonly>
    </div>
    <div class="col l12 m12 s12">
      <label>Folio</label>
      <input type="text" id="folio">
    </div>
    <div class="col l2 m2 s2">
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
      <a href="#" id="obt_prod" class="btn #1b5e20 green darken-4 white-text">Agregar<i class="material-icons left">add</i></a>
    </div>
    <div class="col l2 m2 s2" style="margin-top: 2em">
      <a href="#" id="busqueda_prod" class="btn amber white-text modal-trigger">Buscar<i class="material-icons left">search</i></a>
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
            <tbody id="lista_ticket"> 
              
            </tbody>
      </table>
    </div>
    

    <div class="col s5 offset-s7" style="margin-top: 2em">
     TOTAL: $<input type="text" style="width: 70px" id="total">
    </div>
    
    <div class="col l2 m2 s2" style="margin-top: 2em">
      <a href="#" id="crear_venta" class="btn green white-text">Venta<i class="material-icons left">point_of_sale</i></a>
    </div>
    <div class="col l3 m3 s3" style="margin-top: 2em">
      <a href="#" id="cancelar_venta" class="btn red white-text">Cancelar Venta<i class="material-icons left">cancel_presentation</i></a>
    </div>
  </div>


</body>
<?php include "footer/footer.php"; ?>
<?php include "modals/buscar_producto.php"; ?>
</html>