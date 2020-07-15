<?php 
include('base_url.php');
include('style.php'); ?>
<?php 
 	if (!logged_in()) {
 		redirect(base_url().'index.php');
 	}
 	 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 	
</head>
<body>
<?php include('header.php'); ?>
<div class="container mt-5">
	<?php echo isset($error)?$error:'' ?>
  <div class="row">
  	<div class="col-md-2 col-lg-3"></div>
  	<div class="col-md-8 col-lg-6">
  		<div class="card p-5">
  			<form method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
  				<div class="form-group m-4">
				  
				</div>
				<div class="form-group m-4">
				 
				</div>
				<div class="form-group m-4">
				  
				</div>
				
  			</form>
  		</div>
  	</div>
  	<div class="col-md-2 col-lg-3"></div>
  </div>
</div>

</body>
</html>
