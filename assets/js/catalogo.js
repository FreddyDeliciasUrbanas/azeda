$(document).ready(function(){
	$('.btn-agregar-producto-modal').click(function(){
		var nombre = $('#input-agregar-nombre-producto').val();
		var descripcion = $('#input-agregar-descripcion-producto').val();
		var precio = $('#input-agregar-precio-producto').val();

		agregar_nuevo_producto(nombre, descripcion, precio);
	});
});

function agregar_nuevo_producto(nombre, descripcion, precio){
	var base_url = $('#base_url').val();
	var data = new FormData();
	data.append('nombre', nombre);
	data.append('descripcion', descripcion);
	data.append('precio', precio);

	$.ajax({
		data:data,
		url:base_url+'admin/agregar_producto_catalogo',
		type:'post',
		contentType:false,
		processData:false,
		cache:false,
		dataType:'json',
		success:function(data){
			if(typeof(data.status) == 'undefined'){}
			else{
				if(data.status == 'ok'){
					$('.btn-agregar-producto-modal').addClass('nodisplay');
					$('.btn-agregado-producto-modal').removeClass('nodisplay');

					setTimeout(function(){
						location.href = base_url+'admin/catalogo';
					},2000);
				}
			}
		},error:function(a,b,c){
			var err = a.responseText;
			alert(err);
		}
	});
}