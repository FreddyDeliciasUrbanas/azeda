$(document).ready(function(){
	$('#btn-seleccionar-ajustes').click(function(){
		$('#btn-seleccionar-mensajes').removeClass('btn-primary');
		$(this).addClass('btn-primary');
		$('#ajustes-contacto-container').removeClass('nodisplay');
		$('#mensajes-contacto-container').addClass('nodisplay');
	});

	$('#btn-seleccionar-mensajes').click(function(){
		$('#btn-seleccionar-ajustes').removeClass('btn-primary');
		$(this).addClass('btn-primary');
		$('#ajustes-contacto-container').addClass('nodisplay');
		$('#mensajes-contacto-container').removeClass('nodisplay');
	});

	$('#btn-guardar-ajustes-contacto').click(function(){
		var reparto = $('#input-reparto-contacto').val();
		var email = $('#input-email-contacto').val();
		var telefono = $('#input-telefono-contacto').val();
		var facebook = $('#input-facebook-contacto').val();
		var twitter = $('#input-twitter-contacto').val();
		var instagram = $('#input-instagram-contacto').val();
		modificar_ajustes_contacto(reparto, email, telefono, facebook, twitter, instagram);

	});

	//$('[data-toggle="tooltip"]').tooltip();
});

function modificar_ajustes_contacto(reparto, email, telefono, facebook, twitter, instagram){
	var base_url = $('#base_url').val();
	var data = new FormData();
	data.append('reparto',reparto);
	data.append('email',email);
	data.append('telefono',telefono);
	data.append('facebook',facebook);
	data.append('twitter',twitter);
	data.append('instagram',instagram);

	$.ajax({
		data:data,
		url:'modificar_ajustes_contacto',
		type:'post',
		contentType:false,
		processData:false,
		cache:false,
		dataType:'json',
		success:function(data){
			if(typeof(data.status) == 'undefined'){}
			else{
				if(data.status == 'ok'){
					$('#btn-guardado-ajustes-contacto').removeClass('nodisplay');
					$('#btn-guardar-ajustes-contacto').addClass('nodisplay');
					/*setTimeout(function(){
						location.href = base_url + 'admin/contacto';
						$('#ajustes-contacto-container').removeClass('nodisplay');
						$('#mensajes-contacto-container').addClass('nodisplay');
					},2000);*/
				}else{
					alert('error al guardar los datos');
				}
			}
		}
	});
}