



	$('#form-login').submit(function(e){
		e.preventDefault();

		var username = $('#input-username-login').val();
		var password = $('#input-password-login').val();
		var token = $('#token-login').val();
		
		login_user(username, password, token);
	});

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
		processData:false,
		cache:false,
		dataType:'json',
		beforeSend:function(){
			$('#btn-login-loading').removeClass('nodisplay');
			$('#btn-login').addClass('nodisplay');
		},
		success:function(datajson){
			alert('llega al success');
			$('#btn-login-loading').addClass('nodisplay');
			$('#btn-login').removeClass('nodisplay');

			if(typeof(datajson.response) == 'undefined'){
			}else{
				if(datajson.response == 'valid'){
					//ha ingresado correctamente al login
				}else if (datajson.response == 'err_user'){
					//error de usuario
				}else if(datajson.response == 'err_pass'){
					//error de password
				}
			}


		},
		error:function(xhr, status, error){
			var err = xhr.responseText;
  			alert(err);
		}
	});
}