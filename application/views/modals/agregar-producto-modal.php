<div class="modal fade" id="agregarProductoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo Producto </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form">
        	<input id="input-agregar-nombre-producto" class="form-control" placeholder="Nombre producto">
        	<input id="input-agregar-descripcion-producto" class="form-control" placeholder="Descripcion producto">
        	<input id="input-agregar-precio-producto" class="form-control" placeholder="Precio">
        </div>
        <div>Las imagenes se pueden agregar despues de crear el producto.</div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-agregar-producto-modal">Agregar</button>
        <button class="btn btn-success nodisplay btn-agregado-producto-modal"><span class="fa fa-check-circle"></span>Producto agregado</button>
      </div>
    </div>
  </div>
</div>