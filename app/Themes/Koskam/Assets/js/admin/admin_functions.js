if(debug){
	console.log('admin_functions.js INJECTED');
}

function loadDashboard(){
	sendRequest({url: 'loadDashboard'}, function(data){
		$('.producten').text(data['producten']);
		$('.bedrijven').text(data['bedrijven']);
	});
}

function loadProducts(){
	sendRequest({url: 'loadProducts'}, function(data){
		$('#producten').html(data);
	});
}

function loadCompanies(){
	sendRequest({url: 'loadCompanies'}, function(data){
		$('#bedrijven').html(data);
	});
}

function loadAccounts(){
	sendRequest({url: 'loadAccounts'}, function(data){
		$('#accounts').html(data);
	});
}