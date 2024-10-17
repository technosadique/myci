function go_back(url){
	swal({
		title: "Leave this form?",
		text: "Changes that you made may not be saved.",
		buttons: ["Cancel", "Leave"],
		dangerMode: false,
	})
	.then((willDelete) => {
		if (willDelete) {
		window.location.href = url;
		} 
	});
}	

function customer_save() {
    error = 0;
     var customer_id = $("#customer_id").val();
     var first_name = $("#first_name").val();
     first_name = first_name.trim(); 
	
	 var last_name = $("#last_name").val();
     last_name = last_name.trim(); 

	 var phone = $("#phone").val();
     phone = phone.trim(); 

   
	
    if (first_name == "") {
        $("#first_name_error").html("First Name is required.");
        error = 1;
    }   else {
        $("#first_name_error").html("");
    }
	
	
	if (last_name == "") {
        $("#last_name_error").html("Last Name is required.");
        error = 1;
    }   else {
        $("#last_name_error").html("");
    }
	
	if (phone == "") {
        $("#phone_error").html("Phone is required.");
        error = 1;
    }  else {
        $("#phone_error").html("");
    }


    if (error == 1) {
        $('.btn-primary').attr('disabled', false);
        $("#error_message").hide();
        $("#success_message").hide();
        $("#error_message_main").show();
        $("#error_message_main").addClass("alert alert-danger outline").html('<span class="text-danger">Please complete / update the required fields.</span>');

        window.scrollTo(0, 0);
    } else {
        $('.btn-primary').attr('disabled', true);
        $("#error_message").hide();
        $("#success_message").hide();
        $(".btn-primary").attr('disabled', true);
        $.ajax({
            type: 'POST',
            url: base_url + '/customer/save_data',
            data: {
                first_name: first_name,              
                last_name: last_name,              
                phone: phone,               
                customer_id: customer_id
            },

            success: function(response) {

              if ($.isNumeric(response)) {
                        $('.btn-primary').attr('disabled', true);
                        $("#error_message_2").hide();
                        $("#error_message_main").hide();
                        $("#error_message").hide();
                        $("#success_message").show();
                        $("#success_message").addClass("alert alert-success outline").html('<span class="text-success">Updated customer data successfully.</span>');
                        window.scrollTo(0, 0); 
                    } else {
                        $('.btn-primary').attr('disabled', false);
                        $("#error_message").show();
                        $("#error_message").html(response);
                    }

            }
        });
    }
}