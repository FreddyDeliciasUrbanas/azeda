<tr>
	<td><?php echo $id_producto; ?></td>
	<td><?php echo $nombre_producto; ?></td>
	<td><?php echo $descripcion_producto; ?></td>
	<td><?php echo $precio_producto; ?></td>
	<td><button class="btn btn-info" data-toggle="modal" data-target="#modificarProductoModal<?php echo $id_producto; ?>" data-id-producto="<?php echo $id_producto; ?>">Modificar</button></td>
	<td><button class="btn btn-danger" data-toggle="modal" data-target="#eliminarProductoModal<?php echo $id_producto?>" data-id-producto="<?php echo $id_producto; ?>">Eliminar</button></td>
</tr>