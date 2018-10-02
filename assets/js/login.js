$('#form-login').submit(function(e){
	e.preventDefault();

	var username = $('#input-username-login').val();
	var password = $('#input-password-login').val();
	var token = $('#token-login').val();
	//alert('funciona el button y el submit');
	login_user(username, password, token);
})

function login_user(username, password, token){

	var url = 'login/login_user';

	var data = new FormData();
	data.append('username', username);
	data.append('password', password);
	data.append('token', token);

	$.ajax({
		url:url,
		data:data,
		type:'post',
		contentType:false,
		ProcessData:false,
		cache:false,
		dataType:'json',
		beforeSend:function(){

		},
		success:function(datajson){
			if(typeof(datajson.valid) == 'undefined'){
			}else{
				if(datajson.valid == 'ok'){
					//ha ingresado correctamente al login
				}
			}
		},
		error:function(){

		}
	});
}