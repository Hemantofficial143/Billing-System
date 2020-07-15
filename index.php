<?php include('base_url.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 	<?php include('style.php'); ?>
 	<?php 
 	if (logged_in()) {
 		redirect(base_url().'home.php');
 	}
 	 ?>
</head>
<body>
<?php include('header.php'); ?>
<?php 
$error_email_user = "";
$error_password = "";
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$ok = 1;
	if(empty($_POST['email_or_username'])){
		$error_email_user = "border:2px solid red";
		$ok = 0;
	}
	if(empty($_POST['password'])){
		$error_password = "border:2px solid red";
		$ok = 0;
	}	
	if ($ok == 1) {
		if (check_login($_POST['email_or_username'],$_POST['password'])) {
			$user = get_user_detail($_POST['email_or_username']);
			$_SESSION['id'] = $user['id'];
			$_SESSION['name'] = $user['name'];
			$_SESSION['username'] = $user['username'];
			$_SESSION['email'] = $user['email'];
			$_SESSION['mobile'] = $user['mobile'];
			$_SESSION['role'] = $user['role'];

			$url =  base_url().'home.php';
			redirect($url);
		}else{
			$error = "<div class='alert alert-danger'>Invalid Email Username or Password</div>";	
		}
	}else{
		$error = "<div class='alert alert-danger'>Please Enter Details</div>";
	}
}
 ?>
<div class="container mt-5">
	<?php echo isset($error)?$error:'' ?>
  <div class="row">
  	<div class="col-md-2 col-lg-3"></div>
  	<div class="col-md-8 col-lg-6">
  		<div class="card p-5">
  			<form method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
  				<div class="form-group m-4">
				  <input type="text" name="email_or_username" class="form-control" placeholder="Email or Username" style="<?php echo $error_email_user ?>">
				</div>
				<div class="form-group m-4">
				  <input type="password" name="password" class="form-control" placeholder="Password" style="<?php echo $error_password ?>">
				</div>
				<div class="form-group m-4">
				  <center><input type="submit" value="Login" class="btn btn-success"></center>
				</div>
				<div class="form-group m-4">
				  <center>Don't Have an Account!! <a href="<?php echo base_url() ?>registration.php">Register Here</a></center>
				</div>
  			</form>
  		</div>
  	</div>
  	<div class="col-md-2 col-lg-3"></div>
  </div>
</div>

</body>
</html>
