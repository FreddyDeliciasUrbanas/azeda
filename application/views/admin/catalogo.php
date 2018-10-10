<style type="text/css">
	.nodisplay{
		display:none;
	}
</style>

<div class="row">
	<div class="col-8">
		<h2>Catalogo</h2>
	</div>
	<div class="col-4">
		<button class="btn btn-success float-right" data-toggle="modal" data-target="#agregarProductoModal">Agregar Producto</button>
	</div>
	
	
</div>
<input type="hidden" id="base_url" value="<?php echo base_url(); ?>">

<div class="container">
	<table class="table table striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Descripcion</th>
				<th>Precio</th>
				<th>Acciones</th>
			</tr>
		</thead>

		<tbody>
			<?php echo $filas_producto_admin;//var con celdas de tabla?>
		</tbody>
	</table>
</div>



<style type="text/css">
      .form{
        background:#FFFFFF;
        border-radius: 15px;
        padding:20px;
        /*background:linear-gradient(to right, #FF76E4, #FFCDF5);*/
      }

      .form input{
        margin-bottom: 20px;
        
      }

      </style>


<!--MODALS-->
<?php echo $modal_agregar; ?>

