<style type="text/css">
	.nodisplay{
		display:none;
	}

	.btn{
		text-transform: none;
		letter-spacing: .1rem
	}
</style>


<div class="row">
	<h2>Contacto</h2>
</div>
<input type="hidden" id="base_url" value="<?php echo base_url(); ?>">

<div class="row">
	<div class="col-6">
		<button id="btn-seleccionar-mensajes" class="btn btn-primary btn-block btn-lg">Mensajes</button>
	</div>
	<div class="col-6">
		<button id="btn-seleccionar-ajustes" class="btn btn-block btn-lg">Ajustes</button>
	</div>
	
	
</div>
<div id="mensajes-contacto-container" class="row">
	<div class="col-12">
		<?php echo $cards_mensajes; ?>

	</div>
</div>
<!--LECTOR DE MENSAJES + MODAL MENSAJE-->


<style type="text/css">
      .form{
        background:#FFFFFF;
        border-radius: 15px;
        padding:20px;
        margin-top:20px;
        box-shadow:0px 0px 20px rgba(0,0,0,.4);
        /*background:linear-gradient(to right, #FF76E4, #FFCDF5);*/
      }

      .form input{
        margin-top: 20px;  }

        .texto-contacto{
            color:#000000 !important;
        }
        .btn-ajustes{
          margin-top:20px;   
          border-radius:20px !important;
        }

        .danger-input{
            border:2px solid red !important;
            background:#fda3a3 !important;
        }
        input, textarea
        {
            /*background:linear-gradient(to right, #b85f04, #fffb95) !important;*/
            border:2px solid #6f6f6f !important;
            color:#000000 !important;
            border-radius:30px !important;
            padding:20px !important;
        }

        /* enable absolute positioning */
      .inner-addon { 
          position: relative !important; 
      }

      /* style icon */
      .inner-addon .fa {
        position: absolute !important;
        padding-left: 20px !important;
        pointer-events: none !important;
        top:15px;
        color:#ffca9d;
      }

      /* align icon */
      .left-addon .fa  { left:  0px !important;}
      .right-addon .fa { right: 0px !important;}

      /* add padding  */
      .left-addon input  { padding-left:  50px !important; }
      .right-addon input { padding-right: 50px !important; }
        
    
    </style>

<!--AJUSTES DE CONTACTO-->

<div id="ajustes-contacto-container" class="row nodisplay ">
	<div class="col-xs-12 col-md-6 mx-auto">
		<div class="form card">
			<input id="input-reparto-contacto" type="text" class="form-control" placeholder="Campo entregas" value="<?php echo $reparto_contacto; ?>">
			<input id="input-email-contacto" type="text" class="form-control" placeholder="Campo Email" value="<?php echo $email_contacto; ?>">
			<input id="input-telefono-contacto" type="text" class="form-control" placeholder="Campo Telefono" value="<?php echo $telefono_contacto; ?>">
			<input id="input-facebook-contacto" type="text" class="form-control" placeholder="Campo Facebook" value="<?php echo $facebook_contacto; ?>">
			<input id="input-twitter-contacto" type="text" class="form-control" placeholder="Campo Twitter" value="<?php echo $twitter_contacto; ?>">
			<input id="input-instagram-contacto" type="text" class="form-control" placeholder="Campo Instagram" value="<?php echo $instagram_contacto; ?>">
			<button id="btn-guardar-ajustes-contacto" class="btn btn-primary btn-ajustes">Guardar</button>
			<button id="btn-guardado-ajustes-contacto" class="btn btn-success btn-ajustes nodisplay"><span class="fa fa-check-circle"></span>Guardado</button>
		</div>
	</div>
</div>