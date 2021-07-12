<div id="modal_crear_proveedor" class="modal">
  <div class="modal-content">   
    <div class="container center row">
    <div class="col l12 m12 s12">
        <h4>Registrar Proveedor</h4>
      </div>
    <div class="col l12 m12 s12">
      <input type="hidden" id="sucursal" value="<?php echo $_SESSION['id_sucursal']; ?>">
    </div> 
    <div class="col l12 m12 s12">
      <label>Nombre</label>
      <input type="text" id="nombre">
    </div>
    <div class="col l12 m12 s12">
      <label>Razón Social</label>
      <input type="text" id="razon_social">
    </div>
    <div class="col l12 m12 s12">
      <label>Estado</label>
      <select class="center browser-default" id="selector_estado">      
      </select>
    </div>
    <div class="col l12 m12 s12">
      <label>Ciudad</label>
      <select class="center browser-default" id="selector_ciudad">
      </select>
    </div>
    <div class="col l12 m12 s12">
      <label>Colonia</label>
      <input type="text" id="colonia">
    </div>
    <div class="col l12 m12 s12">
      <label>Calle</label>
      <input type="text" id="calle">
    </div>
    <div class="col l12 m12 s12">
      <label>Código Postal</label>
      <input type="number" id="cp">
    </div>
    <div class="col l12 m12 s12">
      <label>Número Exterior</label>
      <input type="text" id="num_ext">
    </div>
    <div class="col l12 m12 s12">
      <label>Número Interior</label>
      <input type="text" id="num_int">
    </div>
    <div class="col l12 m12 s12">
      <label>Telefono</label>
      <input type="text" id="tel">
    </div>
    <div class="col l12 m12 s12">
      <label>Correo</label>
      <input type="text" id="correo">
    </div>
    <div class="col l12 m12 s12">
      <label>Página web</label>
      <input type="text" id="url">
    </div>
    <div class="col l12 m12 s12" style="margin-top: 2em">
      <a href="#" id="crear_proveedor" class="btn #1b5e20 green darken-4 white-text">Agregar<i class="material-icons left">add</i></a>
    </div>  
      
  </div>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-close waves-effect waves-green btn-flat lang" tipo="text" key="Salir">Salir</a>
  </div>
</div>
