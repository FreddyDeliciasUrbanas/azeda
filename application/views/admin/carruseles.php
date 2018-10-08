<style type="text/css">
	.img-fluid{
		padding-bottom:50px;
	}
	.nodisplay{
		display:none;
	}
</style>


<div class="row">
		<h2>Carruseles</h2>
	</div>
	<input type="hidden" id="base_url" value="<?php echo base_url(); ?>">

	<!--PRIMER ITEM CARRUSEL-->
	<div class="row carta">
		<div class="col-12"><h3>Carrusel 1</h3></div>
		<div class="col-3">
			<img src="<?php echo base_url(); ?>assets/img/<?php echo $img_carrusel_1; ?>" class="img-fluid" />
			<br>
			<input type="file" id="file_img_carrusel_1">
			<br>
		</div>			
		

		<div class="col-8">

			<div class="input-group">
				<input id="titulo_carrusel_1" class="form-control" type="text" value="<?php echo $titulo_carrusel_1; ?>" placeholder="Titulo carrusel">
				
			</div>
			<br>
			<div class="input-group">
				<input id="subtitulo_carrusel_1" class="form-control" type="text" value="<?php echo $subtitulo_carrusel_1; ?>" placeholder="Subtitulo carrusel">
				
			</div>			
		</div>

		<div class="col-12">
			<button id="btn-modificado-1" class="btn btn-success nodisplay float-right"><span class="fa fa-check-circle"></span>Modificado</button>
			<button id="btn-submit-carrusel-1" class="btn btn-outline-secondary float-right">Modificar</button>
		</div>
		
	</div>


<!--SEGUNDO ITEM CARRUSEL-->
	<div class="row carta">
		<div class="col-12"><h3>Carrusel 2</h3></div>
		<div class="col-3">
			<img src="<?php echo base_url(); ?>assets/img/<?php echo $img_carrusel_2; ?>" class="img-fluid" />
			<br>
			<input type="file" id="file_img_carrusel_2">
			<br>
		</div>			
		

		<div class="col-8">

			<div class="input-group">
				<input id="titulo_carrusel_2" class="form-control" type="text" value="<?php echo $titulo_carrusel_2; ?>" placeholder="Titulo carrusel">
				
			</div>
			<br>
			<div class="input-group">
				<input id="subtitulo_carrusel_2" class="form-control" type="text" value="<?php echo $subtitulo_carrusel_2; ?>" placeholder="Subtitulo carrusel">
				
			</div>			
		</div>

		<div class="col-12">
			<button id="btn-modificado-2" class="btn btn-success nodisplay float-right"><span class="fa fa-check-circle"></span>Modificado</button>
			<button id="btn-submit-carrusel-2" class="btn btn-outline-secondary float-right">Modificar</button>
		</div>
		
	</div>

	<!--TERCER ITEM CARRUSEL-->
	<div class="row carta">
		<div class="col-12"><h3>Carrusel 3</h3></div>
		<div class="col-3">
			<img src="<?php echo base_url(); ?>assets/img/<?php echo $img_carrusel_3; ?>" class="img-fluid" />
			<br>
			<input type="file" id="file_img_carrusel_3">
			<br>
		</div>			
		

		<div class="col-8">

			<div class="input-group">
				<input id="titulo_carrusel_3" class="form-control" type="text" value="<?php echo $titulo_carrusel_3; ?>" placeholder="Titulo carrusel">
				
			</div>
			<br>
			<div class="input-group">
				<input id="subtitulo_carrusel_3" class="form-control" type="text" value="<?php echo $subtitulo_carrusel_3; ?>" placeholder="Subtitulo carrusel">
				
			</div>			
		</div>

		<div class="col-12">
			<button id="btn-modificado-3" class="btn btn-success nodisplay float-right"><span class="fa fa-check-circle"></span>Modificado</button>
			<button id="btn-submit-carrusel-3" class="btn btn-outline-secondary float-right">Modificar</button>
		</div>
		
	</div>