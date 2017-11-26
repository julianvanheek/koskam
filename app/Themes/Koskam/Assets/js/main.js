if(debug){
	console.log('main.js INJECTED');
}

$('#loginForm').on('click', '.submit', function(e){
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