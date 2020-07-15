	<?php 
	include('base_url.php');
	include('style.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Customer : : <?php echo $_SESSION['name'] ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
 	<?php 
 	if (!logged_in()) {
 		redirect(base_url().'index.php');
 	}
 	 ?>
</head>
<body>
<?php include('header.php'); ?>
<div class="container mt-5">
	<div  id="error"></div>
  <div class="row">
  	<div class="col-md-2 col-lg-3"></div>
  	<div class="col-md-8 col-lg-6">
  		<div class="card p-5">
  			<center><h3><b>Add Customer</b></h3></center>
  			<form method="POST" id="add_customer_form" action="#">	
  				<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['id']; ?>">
  				<div class="form-group m-4">
				 	<input type="text" name="customer_name" id="customer_name" class="form-control" placeholder="Customer Name">
				</div>
				<div class="form-group m-4">
				 	<input type="text" name="customer_mobile" id="customer_mobile" class="form-control" placeholder="Customer Mobile">
				</div>
				<div class="form-group m-4">
					<input type="text"  name="customer_address"  class="form-control" id="customer_address" placeholder="Address">
				 	
				</div>
				<div class="form-group m-4">
				 	<center><input type="submit" class="btn btn-success" value="Add Customer"></center>
				</div>
				
  			</form>
  		</div>
  	</div>
  	<div class="col-md-2 col-lg-3"></div>
  </div>
</div>

</body>
</html>
<script type="text/javascript">
	$(function(){

		$('#add_customer_form').on('submit',function(e){
			e.preventDefault();
			var valid = true;
			if($('#customer_name').val() == ""){
				$('#customer_name').css('border','2px solid red');
				valid = false;
			}
			if($('#customer_mobile').val() == ""){
				$('#customer_mobile').css('border','2px solid red');
				valid = false;
			}
			if($('#customer_address').val() == ""){
				$('#customer_address').css('border','2px solid red');
				valid = false;
			}
			if (valid) {
				var url = $('#base_url').val() + "api.php";
				var data = $('#add_customer_form').serialize()+"&api_call=insert_customer";
				
				$.ajax({
					url:url,
					data:data,
					method:"POST",
					success:function(res){
						if (res) {
							$('#error').html("<div class='alert alert-success'>Customer Added Succesfully</div>");
						}else{
							$('#error').html("<div class='alert alert-danger'>Something Went Wrong</div>");
						}
					}
				})
			}else{
				$('#error').html("<div class='alert alert-danger'>Please Fill Details</div>");
			}
		})
	})
</script>
