<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=1" />
	<link rel="icon" type="image/x-icon" href="<?php echo base_url();?>/public/assets/images/favicon.ico">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/public/assets/css/datatables.css">
    <title>Edit</title>
  </head>
  <body>
  
  <div class="container mt-4">
                            <div class="row">

                                <div class="col-sm-12">
								<form class="form theme-form">
								<div class="row">
									<div class="col-md-4">
										<center>
										<div style="color:green;margin-bottom:10px;" id="success_message"><?php echo !empty($message) ? $message : "";?></div>
										<div style="color:red;margin-bottom:10px;" id="error_message"></div>
										<div style="" id="error_message_main"></div>
										<div style="" id="error_message_2"></div>
										</center>	
									</div>
								</div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="first_name"><strong>First Name</strong> <span class="text-danger">*</span></label>
                                                                <div class="input-group">
                                                                    <input class="form-control" type="text" placeholder="Enter First Name" data-original-title="" id="first_name" value="<?= $customer['first_name']; ?>" name="first_name">
																	
																	<input type="hidden" name="customer_id" id="customer_id" value="<?= $customer['id']; ?>">
                                                                    
                                                                </div>
																<span id="first_name_error" style="color:red;"></span>	
																
                                                            </div>
                                                        </div>
													</div>
													  <div class="row">
														<div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="last_name"><strong>Last Name</strong> <span class="text-danger">*</span></label>
                                                                <div class="input-group">
                                                                    <input class="form-control" type="text" placeholder="Enter Last Name" data-original-title="" id="last_name" value="<?= $customer['last_name']; ?>" name="last_name">                                                                    
                                                                </div>
																<span id="last_name_error" style="color:red;"></span>	
																
                                                            </div>
                                                        </div>
													</div>
													<div class="row">
														<div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="phone"><strong>Phone</strong> <span class="text-danger">*</span></label>
                                                                <div class="input-group">
                                                                    <input class="form-control" type="text" placeholder="Enter Phone" data-original-title="" id="phone" value="<?= $customer['phone']; ?>" name="phone">																	
                                                                   
                                                                </div>
																<span id="phone_error" style="color:red;"></span>	
																
                                                            </div>
                                                        </div>
                                                    </div>
                                        <div class="">
                                            <button class="btn btn-primary btn-pill btn-air-primary" type="button" onclick="customer_save()">Save</button>
											<button class="btn btn-light btn-pill btn-air-light" type="button" onclick="go_back('<?php echo base_url();?>');">Cancel</button>
                                        </div>
                                  
									 </form>
                                </div>
                            </div>
                            
                        </div>         
            
<?php include_once "common_js.php"; ?> 
<script src="<?php echo base_url();?>/public/assets/js/customer-edit.js"></script>
<script>
var base_url="<?= base_url(); ?>"
</script>
</body>  
</html>
