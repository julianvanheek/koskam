$('document').ready(function(){
	if(debug){
		console.log('user_main.js INJECTED');	
	}

	// Login
    $('#loginSmall').on('click', '.submitLogin', function(e){
      e.preventDefault();
      var data = $(this.form).serialize();
      sendRequest({url: '/submitLogin', data: data}, function(data){
          defaultMessageHandling(data);
      });
    });

    // Register
    $('#registerForm').on('click', '.submit', function(e){
      e.preventDefault();
      var data = $(this.form).serialize();
      sendRequest({url: '/sendRegister', data: data}, function(data){
          defaultMessageHandling(data);
      });
    });

    $('#formGegevensBewerken').on('click', '.submit', function(e){
      e.preventDefault();
      var data = $(this.form).serialize();
      sendRequest({url: '/submitUserDetails', data: data}, function(data){
        defaultMessageHandling(data);
        loadCompanyDetails();
      });
    });

    $('#frmSearchAlgemeen').on('click', '.submit', function(e){
      e.preventDefault();
      var data = $(this.form).serialize();
      sendRequest({url: '/submitSearch', data: data}, function(data){
        defaultMessageHandling(data);
      });
    });

    $('#products').on('click', '.addProduct', function(e){
      e.preventDefault();
      var data = {};
      data['id'] = $(this).attr('data-id');
      sendRequest({url: '/addProductToCart', data: data}, function(data){
        defaultMessageHandling(data);
        countCartItems();
      });
    });

    $('#winkelwagen').on('click', '.deleteProduct', function(e){
      e.preventDefault();
      var data = {};
      data['id'] = $(this).attr('data-id');
      sendRequest({url: '/deleteProduct', data: data}, function(data){
        defaultMessageHandling(data);
        countCartItems();
        loadCart();
      });
    });

    $('#winkelwagen').on('click', '.bestelWagen', function(e){
      e.preventDefault();
      sendRequest({url: '/orderCart'}, function(data){
        defaultMessageHandling(data);
        countCartItems();
        loadCart();
      });
    });
});