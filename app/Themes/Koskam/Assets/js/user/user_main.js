$('document').ready(function(){
	if(debug){
		console.log('user_main.js INJECTED');	
	}

	// Login
    $('#login-form').on('click', '.login-button', function(e){
      e.preventDefault();
      var data = $(this.form).serialize();
      sendRequest({url: '/sendLogin', data: data}, function(data){
          defaultMessageHandling(data);
      });
    });

    // Register
    $('#register-form').on('click', '.register-button', function(e){
      e.preventDefault();
      var data = $(this.form).serialize();
      sendRequest({url: '/sendRegister', data: data}, function(data){
          defaultMessageHandling(data);
      });
    });

    // Change password
    $('#changePassword').on('click', '.postPassword', function(e){
      e.preventDefault();
      var data = $(this.form).serialize();
      sendRequest({url: '/sendPassword', data: data}, function(data){
          defaultMessageHandling(data);
      });
    });

    // Change account
    $('#userDetails').on('click', '.postAccount', function(e){
      e.preventDefault();
      var data = $(this.form).serialize();
      sendRequest({url: '/sendAccount', data: data}, function(data){
        defaultMessageHandling(data);
        loadUserDetails();
      });
    });
    
    var lastScrollTop = 0;
    $(window).scroll(function(event){
       var st = $(this).scrollTop();
       if (st > lastScrollTop){
           $('.menu').fadeOut(100);
       } else {
          $('.menu').fadeIn(100);
       }
       lastScrollTop = st;
    });
});