$('document').ready(function(){
	if(debug){
		console.log('admin_main.js INJECTED');
	}

	/*********************/
	/*    Testimonials
	/*********************/

	// Disable / Enable testimonial
	$('#testimonialList').on('click', '.testimonialSwitch', function(e){
		e.preventDefault();
		var data = {};
		data['data-id'] = $(this).attr('data-id');
		sendRequest({url: 'testimonialsSwitch', data:data}, function(data){
			defaultMessageHandling(data);
            loadTestimonials();
        });
	});
 
    // Load testimonial details to edit
	$('#testimonialList').on('click', '.testimonialEdit', function(e){
		e.preventDefault();
		var data = {};
		data['data-id'] = $(this).attr('data-id');
		sendRequest({url: 'getTestimonialEdit', data:data}, function(data){
            $('#editTestimonial .id').val(data['id']);
            $('#editTestimonial .firstname').val(data['firstname']);
            $('#editTestimonial .company').val(data['company']);
            $('#editTestimonial .message').val(data['message']);
        });
	});

    // Remove testimonial
	$('#testimonialList').on('click', '.testimonialRemove', function(e){
		e.preventDefault();
		alertify.defaults.glossary.ok = alertifyOkText;
		alertify.defaults.glossary.cancel = alertifyCancelText;
		var data = {};
		data['data-id'] = $(this).attr('data-id');
			alertify.confirm("Recensie verwijderen", "Weet u zeker dat u deze wil verwijderen?",
  				function(){
    				sendRequest({url: 'removeTestimonial', data: data}, function(data){
						defaultMessageHandling(data);
						loadTestimonials();
					});
  				},
  				function(){
    				alertify.error('Geannuleerd');
  				});
	});

    // Create new testimonial
	$('#createTestimonial').on('click', '.saveTestimonial', function(e){
		e.preventDefault();
		var data = $(this.form).serialize();
		sendRequest({url: 'testimonials/add', data:data}, function(data){
			defaultMessageHandling(data);
			if(!data['error']){
				loadTestimonials();
				$('#createTestimonial').modal('toggle');
			}
		});
	});

    // Save edited testimonial
	$('#editTestimonial').on('click', '.saveEditTestimonial', function(e) {
		e.preventDefault();
		var data = $(this.form).serialize();
		sendRequest({url: 'testimonials/edit', data: data}, function(data){
			defaultMessageHandling(data);
			if(!data['error']){
				loadTestimonials();
				$('#editTestimonial').modal('toggle');
			}
		});
	});

    // Refresh testimonial list
	$('.refreshTestimonialList').on('click', function(e){
		e.preventDefault();
		$('.refreshTestimonialList i').addClass('fa-spin');
		loadTestimonials();
		$('.refreshTestimonialList i').removeClass('fa-spin');
		var data = {};
		data['success'] = 'Succesvol geladen';
		defaultMessageHandling(data);
	});

	/*************************/
	/*    End testimonials
	/*************************/

	/**************/
	/*    Users
	/**************/	

	// Disable / enable user
	$('#userList').on('click', '.userSwitch', function(e){
		e.preventDefault();
		var data = {};
		data['data-id'] = $(this).attr('data-id');
		sendRequest({url: 'usersSwitch', data: data}, function(data){
			defaultMessageHandling(data);
            loadUsers();
        });
	});

	// Load user details to edit
	$('#userList').on('click', '.userEdit', function(e){
		e.preventDefault();
		var data = {};
		data['data-id'] = $(this).attr('data-id');
		sendRequest({url: 'getUserEdit', data:data}, function(data){
            $('#editUser .id').val(data['id']);
            $('#editUser .username').val(data['username']);
            $('#editUser .firstname').val(data['firstname']);
            $('#editUser .lastname').val(data['lastname']);
            $('#editUser .email').val(data['email']);
            $('#editUser .company').val(data['company']);
            $('#editUser .message').val(data['message']);
        });
	});

	// Save user edit
	$('#editUser').on('click', '.saveEditUser', function(e){
		e.preventDefault();
		var data = $(this.form).serialize();
		sendRequest({url: 'saveEditUser', data: data}, function(data){
			defaultMessageHandling(data);
			if(!data['error']){
				$('#editUser').modal('toggle');
				loadUsers();
			}
		});
	});

	// Remove user
	$('#userList').on('click', '.userRemove', function(e){
		e.preventDefault();
		alertify.defaults.glossary.ok = alertifyOkText;
		alertify.defaults.glossary.cancel = alertifyCancelText;
		var data = {};
		data['data-id'] = $(this).attr('data-id');
			alertify.confirm("Gebruiker verwijderen", "Weet u zeker dat u deze gebruiker wil verwijderen?",
  				function(){
    				sendRequest({url: 'removeUser', data: data}, function(data){
						defaultMessageHandling(data);
						loadUsers();
					});
  				},
  				function(){
    				alertify.error('Geannuleerd');
  				});
	});

	// Create user
	$('#createUser').on('click', '.createUser', function(e){
		e.preventDefault();
		var data = $(this.form).serialize();
		sendRequest({url: 'users/add', data: data}, function(data){
			defaultMessageHandling(data);
			if(!data['error']){
				loadUsers();
				$('#createUser').modal('toggle');
			}
		});
	})

	// Refresh user list
	$('.refreshUserList').on('click', function(e){
		e.preventDefault();
		$('.refreshUserList i').addClass('fa-spin');
		loadUsers();
		$('.refreshUserList i').removeClass('fa-spin');
		var data = {};
		data['success'] = 'Succesvol geladen';
		defaultMessageHandling(data);
	});

	/******************/
	/*    End users
	/******************/

	/******************/
	/*    Projects
	/******************/

	// Disable / Enable project
	$('#projectList').on('click', '.switchProject', function(e){
		e.preventDefault();
		var data = {};
		data['data-id'] = $(this).attr('data-id');
		sendRequest({url: 'projectSwitch', data: data}, function(data){
			defaultMessageHandling(data);
			loadProjects();
		});
	});

	// Load project details to edit
	$('#projectList').on('click', '.editProject', function(e){
		e.preventDefault();
		var data = {};
		data['data-id'] = $(this).attr('data-id');
		sendRequest({url: 'getEditProject', data: data}, function(data){
			$('#editProject .id').val(data['id']);
			$('#editProject .title').val(data['title']);
			$('#editProject .tag').val(data['tag']);
			$('#editProject .url').val(data['url']);
		});
	});

	// Save edited project
	$('#editProject').on('click', '.saveEditProject', function(e){
		e.preventDefault();
		var data = $(this.form).serialize();
		sendRequest({url: 'saveEditProject', data: data}, function(data){
			defaultMessageHandling(data);
			loadProjects();
			$('#editProject').modal('toggle');
		});
	});

	// Create new project
	$('#createProject').on('click', '.saveProject', function(e){
		e.preventDefault();
		var data = $(this.form).serialize();
		sendRequest({url: 'createProject', data: data}, function(data){
			defaultMessageHandling(data);
			if(!data['error']){
				loadProjects();
				$('#createProject').modal('toggle'); 
			}
		});
	});

	// Upload image to project
	$('#projectList').on('click', '.projectImage', function(e){
		e.preventDefault();
		var data = {};
		data['id'] = $(this).attr('data-id');
		$('#uploadPicture .id').val(data['id']);

		$("#test-upload").fileinput({
	        uploadUrl: siteUrl + "/admin/projects", // server upload action
	    	uploadAsync: true,
	    	uploadExtraData:data
	    }).on('fileuploaded', function(event, data, id, index) {
            loadProjects();
        });
	});

	// Remove project
	$('#projectList').on('click', '.projectRemove', function(e){
		e.preventDefault();
		alertify.defaults.glossary.ok = alertifyOkText;
		alertify.defaults.glossary.cancel = alertifyCancelText;
		var data = {};
		data['data-id'] = $(this).attr('data-id');
			alertify.confirm("Project verwijderen", "Weet u zeker dat u dit project wil verwijderen?",
  				function(){
    				sendRequest({url: 'removeProject', data: data}, function(data){
						defaultMessageHandling(data);
						loadProjects();
					});
  				},
  				function(){
    				alertify.error('Geannuleerd');
  				});
	});

	// Refresh project list
	$('.refreshProjectList').on('click', function(e){
		e.preventDefault();
		$('.refreshProjectList i').addClass('fa-spin');
		loadProjects();
		$('.refreshProjectList i').removeClass('fa-spin');
		var data = {};
		data['success'] = 'Succesvol geladen';
		defaultMessageHandling(data);
	});

	/*********************/
	/*    End projects
	/*********************/

    /*********************/
	/*    Account
	/*********************/

	// Update account
	$('#editPersoonlijkeGegevens').on('click', '.submit', function(e){
		e.preventDefault();
		var data = $(this.form).serialize();
		sendRequest({url: 'saveUserDetails', data: data}, function(data){
			defaultMessageHandling(data);
			if(!data['error']){
				loadUserDetails();
			}
		});
	});

	// Update password
	$('#editPassword').on('click', '.submit', function(e){
		e.preventDefault();
		var data = $(this.form).serialize();
		sendRequest({url: 'editPassword', data: data}, function(data){
			defaultMessageHandling(data);
			if(!data['error']){
				loadUserDetails();
			}
		});
	});

});