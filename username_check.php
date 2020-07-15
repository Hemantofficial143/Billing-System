<?php include('connection.php'); ?>
<?php 
if (isset($_POST['username'])) {
	$username = $_POST['username'];
}else{
	$username = "";
}

$sql = "SELECT * FROM users WHERE username='".$username."'";
$qry = mysqli_query($con,$sql);
if (mysqli_num_rows($qry)>0){
	echo trim("true");
}
else
{
	echo  trim("false");
}	
exit();
 ?>
