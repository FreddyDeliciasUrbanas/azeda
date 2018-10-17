$(document).ready(function(){
	$('#btn-submit-presentacion').click(function(){
		var titulo = $('#titulo_presentacion').val();
		var subtitulo = $('#subtitulo_presentacion').val();
		var img = $('#file_img_presentacion')[0].files[0];
		modificar_presentacion(titulo, subtitulo, img);
	});
});

function modificar_presentacion(titulo, subtitulo, img){
	var base_url = $('#base_url').val();
	var data = new FormData();
	data.append('titulo', titulo);
	data.append('subtitulo', subtitulo);
	data.append('img', img);

	$.ajax({
		data:data,
		type:'post',
		url:'modificar_presentacion',
		processData:false,
		contentType:false,
		cache:false,
		dataType:'json',
		success:function(data){
			if(typeof(data.status) == 'undefined'){}
			else{
				if(data.status == 'ok'){
					$('#btn-submit-presentacion').addClass('nodisplay');
					$('#btn-modificado-presentacion').removeClass('nodisplay');

					setTimeout(function(){
						location.href = base_url + 'admin/presentacion';
					},2000);
				}
			}
		},error:function(a,b,c){
			var error = a.responseText;
			alert(error);
		}
	});
}