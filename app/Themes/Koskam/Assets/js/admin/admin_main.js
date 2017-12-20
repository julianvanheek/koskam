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

	$('#formCreateProduct').on('click', '.submit', function(e){
		e.preventDefault();
		var data = $(this.form).serialize();
		sendRequest({url: 'addProduct', data: data}, function(data){
			defaultMessageHandling(data);
			if(!data['error']){
				loadProducts();
				$('#formCreateProduct')[0].reset();
				$('#createProduct').modal('toggle');
			}
		});
	});

	$('#producten').on('click', '.editProduct', function(e){
		e.preventDefault();
		var data = {};
		data['data-id'] = $(this).attr('data-id');
		sendRequest({url: 'getProduct', data: data}, function(data){
			defaultMessageHandling(data);
			$('#formEditProduct .title').val(data['titel']);
			$('#formEditProduct .description').val(data['beschrijving']);
			$('#formEditProduct .price').val(data['prijs']);
			$('#formEditProduct .hidden-id').val(data['id']);
			$('#editProduct .deleteProduct').attr('data-id', data['id']);
			$('formEditProduct .editProduct').attr('data-id', data['id']);
		});
	});

	$('#formEditProduct').on('click', '.editProduct', function(e){
		e.preventDefault();
		var data = $(this.form).serialize();
		sendRequest({url: 'updateProduct', data: data}, function(data){
			defaultMessageHandling(data);
			if(!data['error']){
				$('#editProduct').modal('toggle');
			}
		});
	});	

	$('#editProduct').on('click', '.deleteProduct', function(e){
		e.preventDefault();
		var data = {};
		data['data-id'] = $(this).attr('data-id');
		sendRequest({url: 'deleteProduct', data: data}, function(data){
			defaultMessageHandling(data);
			if(!data['error']){
				loadProducts();
				$('#editProduct').modal('toggle');
			}
		});
	});

	// data tables
	$('#producten').DataTable();
});