$('document').ready(function(){
	if(debug){
		console.log('admin_main.js INJECTED');
	}

	/*********************/
	/*  Request function */
	/*********************/

	$('#ID').on('click', function(e){
		e.preventDefault();
		var data = {};
		data[''] = $(this).attr('data-id');
		sendRequest({url: 'url', data: data}, function(data){
			defaultMessageHandling(data);
		});
	});

	$('#loginForm').on('click', '.submit', function(e){
		e.preventDefault();
		var data = $(this.form).serialize();
		sendRequest({url: 'submitLogin', data: data}, function(data){
			defaultMessageHandling(data);
		});
	});

	$('#loginSmall').on('click', '.submitLogin', function(e){
		e.preventDefault();
		var data = $(this.form).serialize();
		sendRequest({url: 'submitLogin', data: data}, function(data){
			defaultMessageHandling(data);
		});
	});

	$('#registerForm').on('click', '.submit', function(e){
		e.preventDefault();
		var data = $(this.form).serialize();
		sendRequest({url: 'submitRegister', data: data}, function(data){
			defaultMessageHandling(data);
		});
	});

});