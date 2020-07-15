<?php 
include ('connection.php');

if (isset($_POST['id'])) {
	$customer_id = $_POST['id'];
	$sql = "DELETE FROM customer WHERE id=".$customer_id."";
	$qry = mysqli_query($con,$sql);
	if ($qry) {
		echo "ok";
	}else{
		echo "fail";
	}	
}else{
	echo "Invalid Api Called";
}

exit();
  ?>