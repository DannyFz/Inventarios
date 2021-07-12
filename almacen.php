<html>
<head>
  <?php include "header/header.php"; ?>
  <title>Almacén</title>
</head>
<?php include "header/menu.php"; ?>
<body>
	<div class="row container">
	<div class="col l12 m12 s12">
      <h4>Almacen</h4>
    </div>	
	<div class="col l12 m12 s12">
      <input type="text" id="matriz" value="<?php echo $_SESSION['id_sucursal']; ?>" hidden>
    </div> 

		<div class="col l12 m12 s12">
	      <table class="responsive-table">
	        <thead>
	          <tr>
	              <th class="center">Código</th>
	              <th class="center">Nombre</th>
	              <th class="center">Existencias</th> 
				  <th class="center">Ver</th> 
	              <!--<th>Agregar</th>
	              <th>Quitar</th>
	              <th>Editar</th>-->
	          </tr>
	        </thead>

	        <tbody id="lista_productos">
	          
	        </tbody>
	      </table>
		</div>
	</div>
</body>
<?php include "footer/footer.php"; ?>
<?php include "matriz/modals/ver_almacen.php"; ?>
</html>