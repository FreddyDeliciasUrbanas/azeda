<style type="text/css">
	
	.borde{
		border:1px solid red;
	}

	.carta{
		border:1px solid #AFAFAF;
		border-radius: 10px;
		box-shadow: 0px 0px 20px 2px rgba(0,0,0,.4);
		margin-top: 10px;
		padding:30px 10px;
	}

	.btn{
		padding:10px;
	}
</style>

<section class="container-fluid">
	<div class="row text-center" style="display:block;font-size: 2em">
		<div class="col-8">Administracion del sitio</div>
		<div class="col-4">
			<a  style="font-size:17px" href="<?php echo base_url() ?>login/logout_user">Cerrar sesion</a>
		</div>
	</div>
	<hr><!--==========================================================================================-->
	<div class="row">
		<div class="col-12 col-md-3">
			<div id="list-example" class="list-group">
			  <a class="list-group-item list-group-item-action <?php echo $carrusel_active; ?>" href="<?php echo base_url(); ?>admin">Carrusel</a>
			  <a class="list-group-item list-group-item-action <?php echo $presentacion_active; ?>" href="<?php echo base_url(); ?>admin/presentacion">Presentacion</a>
			  <a class="list-group-item list-group-item-action <?php echo $catalogo_active; ?>" href="<?php echo base_url(); ?>admin/catalogo">Catalogo</a>
			  <a class="list-group-item list-group-item-action <?php echo $contacto_active; ?>" href="<?php echo base_url(); ?>admin/contacto">Contacto</a>
			  <a class="list-group-item list-group-item-action" href="http://azeda.cl:2095">Acceder al webmail Jessica</a>
			  <a class="list-group-item list-group-item-action" href="http://azeda.cl:2095">Acceder al webmail Ventas</a>
			</div>
		</div>
		<div class="col-12 col-md-8">
			<?php echo $admin_var; ?>
		</div>		
	</div>

	
	<hr><!--=============================================================================================-->

	<div class="row">
		
	</div>
</section>