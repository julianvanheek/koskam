if(debug){
	console.log('admin_functions.js INJECTED');
}

/**
 * Dashboard page
 */

// Load dashboard analytics
function loadAnalytics(){
	sendRequest({url: '/admin/loadAnalytics'}, function(data){
		$('.analyticsTotalVisitors').text(data['totalVisitors']);
		$('.analyticsMobileVisitors').text(data['mobileVisitors']);
		$('.analyticsDesktopVisitors').text(data['desktopVisitors']);
		$('.analyticsTotalUsers').text(data['totalUsers']);
	});
}

/**
 * Log page
 */

// Load log list
function loadLog(){
	sendRequest({url: '/admin/loadLog'}, function(data){
		$('#logList').html(data);
	});
}

/**
 * Project page
 */

// Load project list
function loadProjects(){
	sendRequest({url: '/admin/loadProjects'}, function(data){
		$('#projectList').html(data);
	})
}

/**
 * Testimonial page
 */

// Load testimonial list
function loadTestimonials(){
	sendRequest({url: '/admin/loadTestimonials'}, function(data){
		$('#testimonialList').html(data);
	});
}

/**
 * User page 
 */

// Load user list
function loadUsers(){
	sendRequest({url: '/admin/loadUsers'}, function(data){
		$('#userList').html(data);
	});
}

/**
 * Account page
 */

// Load user details
function loadUserDetails(){
	sendRequest({url: '/admin/loadUserDetails'}, function(data){
		$('.username').val(data['username']);
		$('.firstname').val(data['firstname']);
		$('.lastname').val(data['lastname']);
		$('.email').val(data['email']);
		$('.company').val(data['company']);
	});
}