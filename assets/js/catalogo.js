$(document).ready(function(){
	$('.btn-agregar-producto-modal').click(function(){
		var nombre = $('#input-agregar-nombre-producto').val();
		var descripcion = $('#input-agregar-descripcion-producto').val();
		var precio = $('#input-agregar-precio-producto').val();

		agregar_nuevo_producto(nombre, descripcion, precio);
	});

	$('.btn-modificar-producto-modal').click(function(){
		var id = $(this).data('id-producto');
		var nombre = $('#input-modificar-nombre-producto'+id).val();
		var descripcion = $('#input-modificar-descripcion-producto'+id).val();
		var precio = $('#input-modificar-precio-producto'+id).val();
		modificar_producto(id, nombre, descripcion, precio);
	});

	$('.btn-eliminar-producto').click(function(){
		var id = $(this).data('id-producto');
		eliminar_producto(id);
	});

	$('.btn-agregar-img-producto').click(function(){
		//alert('funkas?');
		var id = $(this).data('id-producto');
		var file = '#file_img_producto_'+id;
		var img = $(file)[0].files[0];
		agregar_img_producto(id, img);
	});

	$('.btn-eliminar-img').click(function(){
		var id_img = $(this).data('id-img-producto');
		if(confirm('Esta seguro quedesea eliminar la imagen?')){
			eliminar_img_producto(id_img);
		}
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
		type:'post',
		url:'../productos/agregar_producto_catalogo',
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

function agregar_img_producto(id, img){
	var data = new FormData();
	data.append('id_producto', id);
	data.append('img_producto', img);
	$.ajax({
		url:'../productos/agregar_img_producto',
		data:data,
		type:'post',
		processData:false,
		cache:false,
		contentType:false,
		dataType:'json',
		success:function(data){
			if(typeof(data.status) == 'undefined'){}
			else{
				if(data.status == 'ok'){
					alert('imagen subida ok');
					location.href = 'catalogo'
				}
			}
		}
	});
}

function modificar_producto(id, nombre, descripcion, precio){
	var base_url = $('#base_url').val();
	var data = new FormData();
	data.append('nombre', nombre);
	data.append('descripcion', descripcion);
	data.append('precio', precio);

	$.ajax({
		data:data,
		type:'post',
		url:'../productos/modificar_producto_catalogo/'+id,
		type:'post',
		contentType:false,
		processData:false,
		cache:false,
		dataType:'json',
		success:function(data){
			if(typeof(data.status) == 'undefined'){}
			else{
				if(data.status == 'ok'){
					$('.btn-modificar-producto-modal').addClass('nodisplay');
					$('.btn-modificado-producto-modal').removeClass('nodisplay');

					setTimeout(function(){
						//location.href = base_url+'admin/catalogo';
					},2000);
				}
			}
		},error:function(a,b,c){
			var err = a.responseText;
			alert(err);
		}
	});
}

function eliminar_producto(id){
	var base_url = $('#base_url').val();
	$.ajax({
		url:'../productos/eliminar_producto_catalogo/'+id,
		contentType:false,
		processData:false,
		cache:false,
		dataType:'json',
		success:function(data){
			if (typeof(data.status) == 'undefined'){}
			else{
				if(data.status == 'ok'){
					alert('producto eliminado');
					location.href = base_url+'admin/catalogo';
				}else{
					alert('hubo un error al eliminar el producto');
				}
			}
		}
	})
}

function eliminar_img_producto(id_img){
	$.ajax({
		url:'../productos/eliminar_img_producto/' + id_img,
		success:function(data){
			if(data == 'ok'){
				alert('imagen eliminada correctamente');
			}else{
				alert('hubo un error al eliminar la imagen');
			}
		}
	});
}