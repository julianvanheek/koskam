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

});