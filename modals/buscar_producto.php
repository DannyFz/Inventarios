<div id="modal_buscar_producto" class="modal">
  <div class="modal-content">   
    <div class="container center row">
    <div class="col l12 m12 s12">
        <h4>Buscar Producto</h4>
      </div> 
    <div class="col l7 m7 s7">
      <input type="hidden" id="sucursal" value="<?php echo $_SESSION['id']; ?>">
    </div>  
    
    <div class="col l12 m12 s12">
      <label>Nombre</label>
      <input type="text" id="buscar_nombre">
    </div>
    
    <!--
    <div class="col l5 m5 s5" style="margin-top: 2em">
      <a href="#" id="buscar_prod" class="btn amber white-text">Buscar<i class="material-icons left">search</i></a>
    </div>
    --> 

    <div class="col l12 m12 s12" style="margin-top: 2em; overflow: auto;">
      <table class="responsive-table" id="t_tabla">
          <thead>
            <tr>
              <th>Código</th>
              <th>Nombre</th>
              <th>Agregar</th>
              </tr>
          </thead>
            <tbody id="lista_prod"> 
              
            </tbody>
      </table>
    </div>
      
  </div>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-close waves-effect waves-green btn-flat lang" tipo="text" key="Salir">Salir</a>
  </div>
</div>
