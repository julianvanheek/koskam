if(debug){
	console.log('user_functions.js INJECTED');
}

function loadChat(){
	var data = {};
	data['amount'] = chatAmountOfRows;
	sendRequest({url: 'loadChat', data: data}, function(data){
		$('#messages').html(data['table']);
		$('#messages').css('height','60%');
		$('#chat').css('height','60%');
	});
	reloadChat();
}

function reloadChat(){
	setTimeout(function(){
		loadChat();
	}, 5000);
}

