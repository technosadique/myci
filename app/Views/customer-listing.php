<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=1"/>
<link rel="icon" type="image/x-icon" href="<?php echo base_url("public/assets/");?>/images/favicon.ico">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url("public/assets/");?>/css/datatables.css">
<style>
div button{
    display:inline-block;
}
.dataTables_length{margin:5px 0px 20px 0px;}
</style>
    <title>Listing</title>
  </head>
  <body>	
  <div class="container mt-4">
     <div style="width:500px;margin:0px 0px -86px 940px;">
		
		<button class="btn  btn-success" onClick="myFunction()">Add</button>
        <button class="btn btn-danger bulkdeletecustomer">Delete</button>
    </div>								
											
  <input type="hidden" id="selectedid">
  
  	
  <div class="col-md-3 mt-4" style="margin:0px 0px -33px 212px;">
		<div class="form-group">
			<label for="searchtxt"></label>			
			<input type="text" id="searchtxt" name="searchtxt" class="form-control tbl_sort_cls" placeholder="Search by first name, last name, phone">
		</div>
	</div>
<?php echo form_open('', 'id="search_form"'); ?> 
   <table class="table table-striped" id="customer_table">
    <thead>													 
		<tr>															
			<th>
				<label><input class="checkbox_animated" id="chk-ani" type="checkbox" style="position: absolute;left: 10px;top: 10px;"></label>
				<input type="hidden" class="tbl_sort_cls" name="sortcolumn__0" value="id">
			</th>			
			<th>
			First Name<input class="tbl_sort_cls" type="hidden" name="sortcolumn__1" value="first_name">												  
			</th>
			<th>
			Last Name<input class="tbl_sort_cls" type="hidden" name="sortcolumn__2" value="last_name">													  
			</th>														  
			<th>
			Phone<input class="tbl_sort_cls" type="hidden" name="sortcolumn__3" value="phone">														  
			</th>																  
			<th>
			<div>Action</div>
			</th>														 
		</tr>
		</thead>    
  </table>
  <?php echo form_close(); ?>
   </div>           
            
  <?php include_once "common_js.php"; ?>  
<script src="<?php echo base_url();?>/public/assets/js/customer.js"></script>
<script>
	var base_url="<?= BASE_URL; ?>"	
</script>
  </body>  
</html>
