<div class="modal fade" id="modificarProductoModal<?php echo $id_producto; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        	<input id="input-modificar-nombre-producto<?php echo $id_producto; ?>" class="form-control input-modificar-nombre-producto" placeholder="Nombre producto" value="<?php echo $nombre_producto; ?>">
        	<input id="input-modificar-descripcion-producto<?php echo $id_producto; ?>" class="form-control input-modificar-descripcion-producto" placeholder="Descripcion producto" value="<?php echo $descripcion_producto; ?>">
        	<input id="input-modificar-precio-producto<?php echo $id_producto; ?>" class="form-control input-modificar-precio-producto" placeholder="Precio" value="<?php echo $precio_producto; ?>">
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
        			<?php echo $imgs_producto; ?>

        			
        		</tbody>
        	</table>
        	</div>
        	
        	<input type="file" id="file_img_producto_<?php echo $id_producto; ?>">
        	<button id="" class="btn btn-primary btn-agregar-img-producto" data-id-producto="<?php echo $id_producto; ?>">Agregar imagen</button>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary btn-modificar-producto-modal" data-id-producto="<?php echo $id_producto; ?>">Modificar</button>
        <button class="btn btn-success nodisplay btn-modificado-producto-modal"><span class="fa fa-check-circle"></span>Modificado</button>
      </div>
    </div>
  </div>
</div>