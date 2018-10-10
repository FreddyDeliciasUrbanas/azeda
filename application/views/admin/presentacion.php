<style type="text/css">
	.img-fluid{
		padding-bottom:50px;
	}
	.nodisplay{
		display:none;
	}
</style>


<div class="row">
		<h2>Presentacion</h2>
	</div>
	<input type="hidden" id="base_url" value="<?php echo base_url(); ?>">

	<!--PRIMER ITEM CARRUSEL-->
	<div class="row carta">
		<div class="col-12"><h3></h3></div>
		<div class="col-3">
			<img src="<?php echo base_url(); ?>assets/img/<?php echo $img_presentacion; ?>" class="img-fluid" />
			<br>
			<input type="file" id="file_img_presentacion">
			<br>
		</div>			
		

		<div class="col-8">

			<div class="input-group">
				<input id="titulo_presentacion" class="form-control" type="text" value="<?php echo $titulo_presentacion; ?>" placeholder="Titulo presentacion">
				
			</div>
			<br>
			<div class="input-group">
				<input id="subtitulo_presentacion" class="form-control" type="text" value="<?php echo $subtitulo_presentacion; ?>" placeholder="Subtitulo presentacion">
				
			</div>			
		</div>

		<div class="col-12">
			<button id="btn-modificado-presentacion" class="btn btn-success nodisplay float-right"><span class="fa fa-check-circle"></span>Modificado</button>
			<button id="btn-submit-presentacion" class="btn btn-outline-secondary float-right">Modificar</button>
		</div>
		
	</div>