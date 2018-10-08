$(document).ready(function(){
	$('#btn-submit-carrusel-1').click(function(){
		var titulo = $('#titulo_carrusel_1').val();
		var subtitulo = $('#subtitulo_carrusel_1').val();
		var img = $('#file_img_carrusel_1')[0].files[0];	
		modificar_carrusel( 1, titulo, subtitulo, img);
	});

	$('#btn-submit-carrusel-2').click(function(){
		var titulo = $('#titulo_carrusel_2').val();
		var subtitulo = $('#subtitulo_carrusel_2').val();
		var img = $('#file_img_carrusel_2')[0].files[0];	
		modificar_carrusel( 2, titulo, subtitulo, img);
	});

	$('#btn-submit-carrusel-3').click(function(){
		var titulo = $('#titulo_carrusel_3').val();
		var subtitulo = $('#subtitulo_carrusel_3').val();
		var img = $('#file_img_carrusel_3')[0].files[0];	
		modificar_carrusel( 3, titulo, subtitulo, img);
	});

});

function modificar_carrusel( id, titulo, subtitulo, img){
	var base_url = $('#base_url').val();
	var data = new FormData();
	data.append('titulo_carrusel', titulo);
	data.append('subtitulo_carrusel', subtitulo);
	data.append('img_carrusel', img);

	$.ajax({
		data:data,
		type:'post',
		url:base_url + 'admin/modificar_carrusel/' + id,
		processData:false,
		contentType:false,
		cache:false,
		dataType:'json',
		success:function(data){
			if(typeof(data.status) == 'undefined'){}
			else{
				if(data.status == 'ok'){
					$('#btn-submit-carrusel-'+id).addClass('nodisplay');
					$('#btn-modificado-'+id).removeClass('nodisplay');

					setTimeout(function(){
						location.href = base_url + 'admin';
					},2000);
				}
			}
		},error:function(xhr,b,c){
			var err = xhr.responseText;
  			alert(err);
		}
	});
}