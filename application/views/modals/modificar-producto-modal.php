<div class="modal fade" id="modificarProductoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar Producto </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form">
        	<input class="form-control" placeholder="Nombre producto">
        	<input class="form-control" placeholder="Descripcion producto">
        	<input class="form-control" placeholder="Precio">
        </div>

        <div class="carta" >
        	<div style="max-height:150px; overflow:auto">
        		<table class="table table-striped">
        		<thead>
        			<tr>
        				<th>ID</th>
        				<th>Nombre Archivo</th>
        				<th>Eliminar</th>
        			</tr>
        		</thead>
        		<tbody>
        			<tr>
        				<td>1</td>
        				<td>imagen.jpg</td>
        				<td><button type="button" class="close" >&times;</button></td>
        			</tr>
        			<tr>
        				<td>1</td>
        				<td>imagen.jpg</td>
        				<td><button type="button" class="close" >&times;</button></td>
        			</tr>

        			
        		</tbody>
        	</table>
        	</div>
        	
        	<input type="file" class="file_img_producto" data-id-producto="1">
        	<button class="btn btn-primary">Agregar imagen</button>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Modificar</button>
        <button class="btn btn-success nodisplay"><span class="fa fa-check-circle"></span>Modificado</button>
      </div>
    </div>
  </div>
</div>