
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 	<?php 
 	include('base_url.php');
 	include('style.php'); ?>
</head>
<body>
<?php include('header.php'); ?>
<?php 
$name_error = "";
$email_error = "";
$mobile_error = "";
$password_error = "";
$username_error = "";
$error = "";
$email_not_available = "";
$mobile_not_available = "";
$user_not_available = "";
$success = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$ok = 1;
	if (empty($_POST['name'])) {
		$name_error = "border:2px solid red";
		$ok=0;
	}
	if (empty($_POST['username'])) {
		$username_error = "border:2px solid red";
		$ok=0;
	}else if(!empty($_POST['username'])){
		if(num_rows('users',array('username'=>$_POST['username']))){
			$user_not_available = "Username Not Available";
			$ok = 0;
		}
	}
	if (empty($_POST['email'])) {
		$email_error = "border:2px solid red";
		$ok=0;
	}else if(!empty($_POST['email'])){
		if(num_rows('users',array('email'=>$_POST['email']))){
			$email_not_available = "Email Already Exist";
			$ok = 0;
		}
	}
	if (empty($_POST['mobile'])) {
		$mobile_error = "border:2px solid red";
		$ok=0;
	}else if(!empty($_POST['mobile'])){
		if(num_rows('users',array('mobile'=>$_POST['mobile']))){
			$mobile_not_available = "Mobile Already Exist";
			$ok = 0;
		}
	}
		$_POST['mobile'] = "+91".$_POST['mobile'];
	
	if (empty($_POST['password'])) {
		$password_error = "border:2px solid red";
		$ok=0;
	}
	if ($ok == 1) {
		if(insert('users',array('name','username','email','mobile','password'),array($_POST['name'],$_POST['username'],$_POST['email'],$_POST['mobile'],$_POST['password']))){
			$success = "<div class='alert alert-success'>Registered Successfully <a href='".base_url()."index.php'>Login Here</a></div>";	
		}else{
			$error = "<div class='alert alert-danger'>Something Went Wrong Please Try Again !!</div>";
		}
	}else{
		$error = "<div class='alert alert-danger'>Please Fill Details</div>";
	}
}
?>
<div class="container mt-5">
	<div id="error_div"><?php echo ($error)?$error:'' ?></div>
	<div id="success_div"><?php echo ($success)?$success:'' ?></div>
  <div class="row">
  	<div class="col-md-2 col-lg-3"></div>
  	<div class="col-md-8 col-lg-6">
  		<div class="card p-5">
  			<form method="post" id="signup_form" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
  				<div class="form-group m-4">
				  <input type="text" name="name" id="name" class="form-control" placeholder="Name" style="<?php echo $name_error ?>">
				</div>
				<div class="form-group m-4">
				  <input type="text" name="username" id="username" class="form-control" placeholder="Username" style="<?php echo $username_error ?>">
				  <span class="text-danger" > <?php echo ($user_not_available)?$user_not_available:'' ?></span>
				</div>
				<div class="form-group m-4">
				  <input type="text" name="email" id="email" class="form-control" placeholder="Email" style="<?php echo $email_error ?>">
				   <span class="text-danger" > <?php echo ($email_not_available)?$email_not_available:'' ?></span>
				</div>
				
				<div class="form-group m-4">
				  <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile number" style="<?php echo $mobile_error ?>">
				  <span class="text-danger" > <?php echo ($mobile_not_available)?$mobile_not_available:'' ?></span>
				</div>
				<div class="form-group m-4">
				  <input type="password" name="password" id="password" class="form-control" placeholder="Password" style="<?php echo $password_error ?>">
				</div>
				<div class="form-group m-4">
				  <center><input type="submit" value="Register" class="btn btn-primary"></center>
				</div>
				<div class="form-group m-4">
				  <center>Already Have an Account!! <a href="<?php echo base_url() ?>index.php">Login Here</a></center>
				</div>
  			</form>
  		</div>
  	</div>
  	<div class="col-md-2 col-lg-3"></div>
  </div>
</div>

</body>
</html>
<!-- <script type="text/javascript">
	
	/*$(document).ready(function(){*/
		

		$('#mobile').keypress(function (event) {
	    var keycode = event.which;
	    if (!(event.shiftKey == false && (keycode == 46 || keycode == 8 || keycode == 37 || keycode == 39 || (keycode >= 48 && keycode <= 57)))) {
	        event.preventDefault();
	    }else if($(this).val().length == 10){
	    	event.preventDefault();
	    }
	});
	
	$('#signup_form').on('submit',function(e){
		$('#error_div').html('');
		$('#name').css('border','');
		$('#email').css('border','');
		$('#mobile').css('border','');
		$('#password').css('border','');
		var valid = true;
		var mailpattern = /^w+([.-]?w+)*@w+([.-]?w+)*(.w{2,3})+$/;
		var mobilepattern = /^([+][9][1]|[9][1]|[0]){0,1}([7-9]{1})([0-9]{9})$/;
		e.preventDefault();
		if ($('#name').val() == ""){
			$('#name').css('border','2px solid red');
			valid = false;
		}
		
		if ($('#email').val() == ""){
			$('#email').css('border','2px solid red');
			valid = false;
		}
		
		
		
		if ($('#mobile').val() == ""){
			$('#mobile').css('border','2px solid red');
			valid = false;
		}else if(!$('#mobile').val().match(mobilepattern)){
			$('#mobile').css('border','2px solid red');
			$('#mobile_error').text('Please Enter valid Mobile Number');
			valid = false;
		}

		if ($('#password').val() == ""){
			$('#password').css('border','2px solid red');
			valid = false;
		}
		if (valid) {
			var url = $('#base_url').val() + 'register_submit.php';
			var data = $('#signup_form').serialize();
			$.ajax({
				url:url,
				data:data,
				method:"post",
				success:function(res){
					if (res) {
						$('#success_div').html("<div class='alert alert-success'>Thank you for Register Please Login</div>");
					}else{
						$('#success_div').html("<div class='alert alert-danger'>Something is wrong</div>");
					}
				}
			})
		}else{
			$('#error_div').html("<div class='alert alert-danger'>Please Enter Your Details</div>");
		}
		
		
	})
</script> -->
