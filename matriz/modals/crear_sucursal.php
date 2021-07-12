<div id="modal_crear_sucursal" class="modal">
  <div class="modal-content">   
    <div class="container center row">
    <div class="col l12 m12 s12">
        <h4>Registrar Sucursal</h4>
      </div>
    <div class="col l12 m12 s12">
      <input type="hidden" id="matriz" value="<?php echo $_SESSION['id_sucursal']; ?>">
    </div> 
    <div class="col l12 m12 s12">
      <label>Nombre</label>
      <input type="text" id="nombre" required>
    </div>
    <div class="col l6 m12 s12">
      <label>Estado</label>
      <select class="browser-default black-text center" id="selector_estado" required>      
      </select>
    </div>
    <div class="col l6 m12 s12">
      <label>Ciudad</label>
      <select class="browser-default black-text center" id="selector_ciudad" required>
      </select>
    </div>
    <div class="col l6 m12 s12">
      <label>Código Postal</label>
      <input type="number" id="cp" required>
    </div>
    <div class="col l6 m12 s12">
      <label>Colonia</label>
      <input type="text" id="colonia" required>
    </div>
    <div class="col l6 m12 s12">
      <label>Calle</label>
      <input type="text" id="calle" required>
    </div>
    <div class="col l6 m12 s12">
      <label>Número Exterior</label>
      <input type="number" id="n_ext" required>
    </div>
    <div class="col l6 m12 s12">
      <label>Número Interior</label>
      <input type="number" id="n_int" required>
    </div>
    
    <div class="col l6 m12 s12" style="margin-top: 2em">
      <a href="#" id="nueva_sucursal" class="btn #1b5e20 green darken-4 white-text">Agregar<i class="material-icons left">add</i></a>
    </div>
  </div>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-close waves-effect waves-green btn-flat lang" tipo="text" key="Salir">Salir</a>
  </div>
</div>
