



	$('#form-login').submit(function(e){
		e.preventDefault();

		var username = $('#input-username-login').val();
		var password = $('#input-password-login').val();
		var token = $('#token-login').val();
		
		login_user(username, password, token);
	});

function login_user(username, password, token){
	var base_url = $('#base_url').val();
	var url = 'login/login_user';

	var data = new FormData();
	data.append('user_email', username);
	data.append('user_password', password);
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
			
			$('#btn-login-loading').addClass('nodisplay');

			if(typeof(datajson.response) == 'undefined'){
			}else{
				if(datajson.response == 'valid'){
					$('#btn-login-success').removeClass('nodisplay');
					setTimeout(function(){
						location.href = base_url + 'admin';
					},2000);
				}else if (datajson.response == 'err_user'){
					$('#btn-login').removeClass('nodisplay');
					$('#alert-user').toggle(1000);
					setTimeout(function(){
						$('#alert-user').toggle(1000);
					},2000);
				}else if(datajson.response == 'err_pass'){
					$('#btn-login').removeClass('nodisplay');
					$('#alert-password').toggle(1000);
					setTimeout(function(){
						$('#alert-password').toggle(1000);
					},2000);
				}
			}

			if(typeof(datajson.err_user_email) == 'undefined'){}
			else{
				if(datajson.err_user_email == 'err1'){
					$('#btn-login').removeClass('nodisplay');
					$('#alert-required-email').toggle(1000);
					setTimeout(function(){
						$('#alert-required-email').toggle(1000);
					},2000);
				}else if(datajson.err_user_email == 'err2'){
					$('#btn-login').removeClass('nodisplay');
					$('#alert-email').toggle(1000);
					setTimeout(function(){
						$('#alert-email').toggle(1000);
					},2000);
				}
			}

			if(typeof(datajson.err_user_password) == 'undefined'){}
			else{
				if(datajson.err_user_password == 'err1'){
					$('#btn-login').removeClass('nodisplay');
					$('#alert-required-password').toggle(1000);
					setTimeout(function(){
						$('#alert-required-password').toggle(1000);
					},2000);
				}
			}


		},
		error:function(xhr, status, error){
			var err = xhr.responseText;
  			alert(err);
  			$('#btn-login-loading').addClass('nodisplay');
			$('#btn-login').removeClass('nodisplay');
		}
	});
}