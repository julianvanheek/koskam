if(debug){
	console.log('user_functions.js INJECTED');
}

function addClassToBody(classToAdd){
	$('body').attr('class', classToAdd + ' ingelogd1');
}

function loadAccDetails(){
	sendRequest({url: '/loadAccountDetails' },function(data){
		if(!data['error']){
			$('.debiteurNummer').text('KvK nummer: ' + data['debiteurNummer']);
			$('.bedrijf').text(data['bedrijf']);
			$('.straat').text(data['straat']);
			$('.postcode').text(data['postcode']);
			$('.plaats').text(data['plaats']);
			$('.telefoon').text(data['telefoon']);
			$('.c_name').text(data['bedrijf']);
			$('.m_name').text(data['m_name']);
			$('.m_email').text(data['m_email']);
		}
	});
}

function loadCompanyDetails(){
	sendRequest({url: '/loadCompanyDetails' },function(data){
		if(!data['error']){
			$('.kvk').val(data['kvk']);
			$('.bnaam').val(data['bedrijf']);
			$('.eigenaar').val(data['eigenaar']);
			$('.adres').val(data['adres']);
			$('.postcode').val(data['postcode']);
			$('.plaats').val(data['plaats']);
			$('.iban').val(data['iban']);
		}
	});
}

function loadProducts(){
	var data = {};
	data['product'] = pathArray[3];
	$('#productsLoader').show();
	sendRequest({url: '/loadProducts', data: data}, function(data){
		defaultMessageHandling(data);
		$('#products').html(data);
		$('#productsLoader').hide();
	});
}

function loadCart(){
	sendRequest({url: '/loadCart'}, function(data){
		$('#winkelwagen').html(data);
	})
}

function countCartItems(){
	sendRequest({url: '/countCartItems'}, function(data){
		$('.winkelwagen-aantal').text(data['items']);
	});
}

// function loadMessages(){
// 	sendRequest({url: '/loadAccountMessages' }, function(data){
// 		if(!data['error']){

// 		}else{
// 			$('.berichten-aantal-button').text('0');
// 		}
// 	});
// }