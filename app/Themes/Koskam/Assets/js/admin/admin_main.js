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
			$('#formEditProduct .merk').val(data['brand']);
			$('#formEditProduct .type').val(data['type']);
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
				loadProducts();
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

	$('#formCreateCompany').on('click', '.submit', function(e){
		e.preventDefault();
		var data = $(this.form).serialize();
		sendRequest({url: 'addCompany', data: data}, function(data){
			defaultMessageHandling(data);
			if(!data['error']){
				loadCompanies();
				$('#formCreateCompany')[0].reset();
				$('#createCompany').modal('toggle');
			}
		});
	});

	$('#bedrijven').on('click', '.editCompany', function(e){
		e.preventDefault();
		var data = {};
		data['data-id'] = $(this).attr('data-id');
		sendRequest({url: 'getCompany', data: data}, function(data){
			defaultMessageHandling(data);
			$('#editCompany .naam').val(data['naam']);
			$('#formEditCompany .kvk').val(data['kvk']);
			$('#formEditCompany .eigenaar').val(data['eigenaar']);
			$('#formEditCompany .adres').val(data['adres']);
			$('#formEditCompany .postcode').val(data['postcode']);
			$('#formEditCompany .plaats').val(data['plaats']);
			$('#formEditCompany .telefoon').val(data['telefoon']);
			$('#formEditCompany .mobiel').val(data['mobiel']);
			$('#formEditCompany .email').val(data['email']);
			$('#formEditCompany .hidden-id').val(data['id']);
			$('#formEditCompany .editCompany').attr('data-id', data['id']);
			$('#editCompany .deleteCompany').attr('data-id', data['id']);
			$('#editCompany .addUser').attr('data-id', data['id']);
		});
	});

	$('#bedrijven').on('click', '.usersList', function(e){
		e.preventDefault();
		var data = {};
		data['data-id'] = $(this).attr('data-id');
		sendRequest({url: 'getCompanyUsers', data: data}, function(data){
			defaultMessageHandling(data);
			$('#listOfUsers').html(data);
			$('#listOfUsers').dataTable();
		});
	});

	$('#formEditCompany').on('click', '.editCompany', function(e){
		e.preventDefault();
		var data = $(this.form).serialize();
		sendRequest({url: 'updateCompany', data: data}, function(data){
			defaultMessageHandling(data);
			if(!data['error']){
				loadCompanies();
				$('#editCompany').modal('toggle');
			}
		});
	});	

	$('#editCompany').on('click', '.deleteCompany', function(e){
		e.preventDefault();
		var data = {};
		data['data-id'] = $(this).attr('data-id');
		sendRequest({url: 'deleteCompany', data: data}, function(data){
			defaultMessageHandling(data);
			if(!data['error']){
				loadCompanies();
				$('#editCompany').modal('toggle');
			}
		});
	});

	$('#editCompany').on('click', '.addUser', function(e){
		e.preventDefault();
		var data = $(this).attr('data-id');
		$('#formCreateUser .hidden-id').val(data);
		console.log($('#formCreateUser .hidden-id').val());
	});

	$('#formCreateUser').on('click', '.submit', function(e){
		e.preventDefault();
		var data = $(this.form).serialize();
		sendRequest({url: 'companyCreateUser', data: data}, function(data){
			defaultMessageHandling(data);
			if(!data['error']){
				loadCompanies();
				$('#formCreateUser')[0].reset();
				$('#createUser').modal('toggle');
			}
		});
	});	


	$('#producten').DataTable();
	$('#bedrijven').DataTable();
	$('#accounts').DataTable();
});