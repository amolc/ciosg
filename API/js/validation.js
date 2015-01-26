function validate()
{
	$("#add_company").validate({
    
        // Specify the validation rules
        rules: {
            company_name: "required",
            company_address: "required",
            company_contact: {
                required: true,
                minlength: 10
            },
            city:  "required",
            state: "required",
			country: "required"
        },
        
        // Specify the validation error messages
        messages: {
            company_name: "company name required",
            company_address: "company address required",
            company_contact: {
                required: "contact number required",
                minlength: "contact number must be 10 characters long"
            },
            city: "Please enter city",
            state: "Please enter state",
			country:"Please enter country"
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

}
