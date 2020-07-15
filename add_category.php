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
 		redirect(base_url());
 	}
 	if ($_SESSION['role'] != 0) {
 		redirect(base_url().'home.php');	
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
  			<center><h3><b>Add Category</b></h3></center>
  			<form method="POST" id="add_category_form" action="#">	
  				<div class="form-group m-4">
				 	<input type="text" name="category_name" id="category_name" class="form-control" placeholder="Category Name">
				</div>
				<div class="form-group m-4">
				 	<input type="text" name="category_code" id="category_code" class="form-control" placeholder="Category Code">
				</div>
				<div class="form-group m-4">
				 	<center><input type="submit" class="btn btn-success" value="Add Category"></center>
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
	
		$('#add_category_form').on('submit',function(e){
			e.preventDefault();
			var valid = true;
			if($('#category_name').val() == ""){
				$('#category_name').css('border','2px solid red');
				valid = false;
			}
			if($('#category_code').val() == ""){
				$('#category_code').css('border','2px solid red');
				valid = false;
			}
			var url = $('#base_url').val() + "api.php";
			var data = $('#add_category_form').serialize()+"&api_call=insert_category";
			if (valid) {
				$.ajax({
					url:url,
					data:data,
					method:"POST",
					success:function(res){
						if (res) {
							$('#error').html("<div class='alert alert-success'>Category Added Succesfully</div>");
						}else{
							$('#error').html("<div class='alert alert-danger'>Something Went Wrong</div>");
						}
					}
				})
			}else{
				$('#error').html("<div class='alert alert-danger'>Please Fill Details</div>");
			}
		})
	
	
</script>
