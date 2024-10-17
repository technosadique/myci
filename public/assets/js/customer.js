
$(document).ready(function() { 
$(document).on('click', '.mcheck', function(){
	var txtid = '';
	
	$('.mcheck:checked').each(function() {
		txtid += $(this).attr('data-id') + ',';	
	});
	$("#selectedid").val(txtid);	
});

$('#chk-ani').click(function(event){
	if(this.checked) {
		var txtid = '';
		var txtmobile = '';
		$('.mcheck').each(function() {
			txtid += $(this).attr('data-id') + ',';
			txtmobile += $(this).attr('data-mobile') + ',';
			$("#selectedid").val(txtid);			
			$(this).prop("checked", true);
			$(this).parents('span').addClass("checked");
		});
	} else {
		$('.mcheck').each(function() {
			$(this).prop("checked", false);			
			$(this).parents('span').removeClass("checked");
			$('#selectedid').val('');			
		});
	}
});
	
		
$(document).on('click', '.delete', function() {
		var id = $(this).attr("id");
		if (confirm("Are you sure you want to remove this?")) {
				$.ajax({
						url: base_url + "/customer/delete_customer",
						method: "POST",
						data: {
								id: id
						},
						success: function(data) {                                   
								$("#success_message_delete").show();
								$('#chk-ani').prop('checked', false);
								$('#' + id).parents("tr").animate({
										backgroundColor: "#fff"
								}, 1000).animate({
										opacity: "hide"
								}, 1000);
								$("#success_message_delete").addClass("alert alert-success outline").html('<img src="' + base_url + '/assets/images/correct.png" /> <span class="text-success">Deleted successfully.</span>').animate({
										opacity: "hide"
								}, 2000);
						}
				});
				setInterval(function() {
						$('#alert_message').html('');
				}, 5000);
		}
});


$(document).on('click', '.bulkdeletecustomer', function() {
		error = 0;
		var selectedid = $("#selectedid").val();
		selectedid = selectedid.trim();
		if (selectedid == "") {
				error = 1;
		} else {}
		if (error == 1) {
				alert('Please select atleast one customer');
				return false;
		} else {
				var post_arr = selectedid.split(',');
				var cnf = confirm('Are you sure to delete selected records?')
				if (cnf) {
						$.ajax({
								type: 'POST',
								url: base_url + "/customer/bulkdeletecustomer",
								data: {
										selectedid: selectedid
								},
								success: function(response) {
										if (response) {
												$("#success_message_delete").show();
												$('#chk-ani').prop('checked', false);
												$.each(post_arr, function(i, l) {
														$('#' + l).parents("tr").animate({
																backgroundColor: "#fff"
														}, 1000).animate({
																opacity: "hide"
														}, 1000);
														$("#success_message_delete").addClass("alert alert-success outline").html('<img src="' + base_url + '/assets/images/correct.png" /> <span class="text-success">Deleted successfully.</span>').animate({
																opacity: "hide"
														}, 200);
												});
										}
								}
						});
				}
		}
});
load_data();

$("#searchtxt").keyup(function(){	
	$("#customer_table").DataTable().destroy();
	load_data();	
});

function load_data(column, value, type) {
		var form_data = $("#search_form").serialize()
		$('.tbl_sort_cls').each(function() {
				form_data += '&' + this.name + '=' + this.value;
		});
		var dataTable = $('#customer_table').DataTable({
				"processing": true,
				"serverSide": true,
				"pageLength": 10,
				"aLengthMenu": [10,25, 50, 100],
				"order": [],
				"sDom": 'lrtip',
				"ajax": {
						url: base_url + "/customer/get_customer",
						type: "POST",
						data: {
								form_data: form_data
						}
				},
				"columnDefs": [{
						"targets": [0,4],
						"orderable": false,
				}, ],
		});                
}    
});


function show_sweetalert() {
        $("#error_message_1").hide();
        swal({
                icon: "success",
                text: "Updated successfully",
        });
}

function gotoedit(id) {
	window.location = base_url + '/customer_edit/' + id;
}

function myFunction() {
	window.location = base_url + '/customer_add';
}


