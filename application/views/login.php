<style>
.login-background{
	background-image: url('assets/img/login-background.png');
	background-size: cover;
}
	.formulario
	{
		padding:30px;
		box-shadow:0px 0px 50px 10px rgba(0,0,0,.4);
		background: #FFFFFF;
		border-radius:20px;
	}

	.formulario input{
		margin-top:20px;
		border-radius: 50px;
		background: linear-gradient(to right, #b85f04, #fffb95);
		
		color:#471500;

	}

	.formulario input:focus{
		outline:none !important;
	}
	input{
		outline-width:0px;
		outline: none;

	}

	input:focus{
		outline-width:0px;
		outline:none;
		outline-style: none;
	}
	.formulario input::placeholder{
		color:#ffffff;

	}

	.btn-login{
		margin-top:20px;
		background:linear-gradient(to bottom, #b85f04, #fffb95, #b85f04);
		border-radius:20px;
		color:#422201;
	}

	.inner-addon { 
    position: relative !important; 
	}

	/* style icon */
	.inner-addon .fa {
	  position: absolute !important;
	  padding-left: 20px !important;
	  pointer-events: none !important;
	  top:12px;
	  color:#ffca9d;
	}

	/* align icon */
	.left-addon .fa  { left:  0px !important;}
	.right-addon .fa { right: 0px !important;}

	/* add padding  */
	.left-addon input  { padding-left:  50px !important; }
	.right-addon input { padding-right: 50px !important; }
</style>


<section class="container-fluid login-background">
	<div class="col-md-4 offset-md-4 formulario">
		<img src="assets/img/logo-navbar.png" alt="" class="img-fluid mx-auto d-block">
		<form action="" id="form-login">
			<div class="inner-addon left-addon">
				<i class="fa fa-envelope"></i>
				<input type="email" class="form-control" id="input-username-login" placeholder="Email">
			</div>

			<div class="inner-addon left-addon">
				<i class="fa fa-key"></i>
				<input type="password" class="form-control" id="input-password-login" placeholder="Contraseña">
			</div>

			<input type="hidden" value="<?php echo $token ?>" id="token-login">
			
			<button class="btn btn-login btn-block" type="submit">Ingresar</button>
			
		</form>
	</div>
</section>