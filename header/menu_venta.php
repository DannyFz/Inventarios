<nav>
    <!--<div class="nav-wrapper light-blue darken-4">-->
      <div class="nav-wrapper black">
      <a href="dashboard.php" class="brand-logo"><i class="material-icons">person</i><?php echo $_SESSION['nombre']; ?></a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
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