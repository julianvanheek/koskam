if(debug){
	console.log('admin_functions.js INJECTED');
}

function loadProducts(){
	sendRequest({url: 'loadProducts'}, function(data){
		$('#producten').html(data);
	});
}