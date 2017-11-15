$('document').ready(function(){
	if(debug){
		console.log('user_main.js INJECTED');	
	}

	// activate account
    $('#login-form').on('click', '.login-button', function(e){
        e.preventDefault();
        console.log('data');
        var data = $(this.form).serialize();
        sendRequest({url: '/sendLogin', data: data}, function(data){
            defaultMessageHandling(data);
        });
    });

    // Send chat message
    $('#chat').on('click', '.sendChatMessage', function(e){
        e.preventDefault();
        var data = $(this.form).serialize();
        sendRequest({url: 'sendMessage', data: data}, function(data){
            defaultMessageHandling(data);
            loadChat();
            $('#chat .chatMessage').val('');
        });
    });

    $('#chat').on('click', '.loadMoreChat', function(e){
        e.preventDefault();
        chatAmountOfRows = chatAmountOfRows + 10;
        loadChat();
    });

    $('#chat').on('click', '.loadLessChat', function(e){
        e.preventDefault();
        chatAmountOfRows = chatAmountOfRows - 10;
        loadChat();
    });
    
});