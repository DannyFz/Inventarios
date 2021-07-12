<?php include "clases/sesion_admin.php"; ?>
<nav>
    <!--<div class="nav-wrapper light-blue darken-4">-->
      <div class="nav-wrapper black">
      <a href="dashboard.php" class="brand-logo"><i class="material-icons">person</i><?php echo $_SESSION['nombre']; ?></a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="sucursal.php"><i class="material-icons">store</i></a></li>

        <li><a href="proveedor.php"><i class="material-icons">local_shipping</i></a></li>
        <li><a href="producto.php"><i class="material-icons">add</i></a></li>
        <li><a href="almacen.php"><i class="material-icons">view_module</i></a></li>
        <li><a href="usuarios.php"><i class="material-icons">account_circle</i></a></li>
       <li><a href="venta.php"><i class="material-icons">monetization_on</i></a></li>
        <!--<li><a href="collapsible.html"><i class="material-icons">refresh</i></a></li>-->
        <li><a href="logout.php" class="red accent-4"><i class="material-icons">power_settings_new</i></a></li>
        <!--<li><a href="mobile.html"><i class="material-icons">more_vert</i></a></li>-->
       
      </ul>
    </div>
  </nav>
  <ul class="sidenav" id="mobile-demo">
    <li><a href="sass.html">Sass</a></li>
    <li><a href="badges.html">Components</a></li>
    <li><a href="collapsible.html">Javascript</a></li>
    <li><a href="mobile.html">Mobile</a></li>
  </ul>         