$(function() {

	$('#contactForm').validate({

		rules: {
			name: {
				required: true,
				maxlength: 191	
			},
			email: {
				required: true,
				email: true,
				maxlength: 191	
			},
			message: "required"
		},
		messages: {
			name: {
				required: "Please enter your name!",
				maxlength: "Max length name is 191 character!"
			},
			email: {
				required: "Please enter your email!",
				email: "Invalid email!",
				maxlength: "Max length email is 191 character!"
			},
			message: "Please enter your message!"
		},
		submitHandler: function (form) {
			form.submit();
		},
		errorElement: "p",
		errorPlacement: function ( error, element ) {
			error.addClass( "help-block text-danger" );
			if ( element.prop( "type" ) === "checkbox" ) {
				error.insertAfter( element.parent( "label" ) );
			} else {
				error.insertAfter( element );
			}
		}

	});
});