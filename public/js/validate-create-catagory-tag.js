$(function() {

	$('#formName').validate({

		rules: {
			name: {
				required: true,
				maxlength: 191	
			}
		},
		messages: {
			name: {
				required: "Please enter your name!",
				maxlength: "Max length name is 191 character!"
			}
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