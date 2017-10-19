$(function() {

	$('#postForm').validate({

		rules: {
			title: {
				required: true,
				maxlength: 191	
			},
			description: {
				required: true,
				maxlength: 500	
			},
			content: "required"
		},
		messages: {
			title: {
				required: "Please enter your title!",
				maxlength: "Max length title is 191 character!"
			},
			description: {
				required: "Please enter your description!",
				maxlength: "Max length description is 500 character!"
			},
			content: "Please enter your content!"
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