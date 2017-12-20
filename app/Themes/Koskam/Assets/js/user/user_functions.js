if(debug){
	console.log('user_functions.js INJECTED');
}

function addClassToBody(classToAdd){
	$('body').attr('class', classToAdd + ' ingelogd1');
}

function loadAccDetails(){
	sendRequest({url: '/loadAccountDetails' },function(data){
		if(!data['error']){
			$('.debiteurNummer').text('Debiteurnummer: ' + data['debiteurNummer']);
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

// function loadMessages(){
// 	sendRequest({url: '/loadAccountMessages' }, function(data){
// 		if(!data['error']){

// 		}else{
// 			$('.berichten-aantal-button').text('0');
// 		}
// 	});
// }