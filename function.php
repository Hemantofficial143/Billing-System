<?php 

include('connection.php');
function redirect($url){
	header("location:".$url."");
}
function logged_in(){
	if (isset($_SESSION['username'])) {
		return true;
	}else{
		return false;
	}
}
function num_rows($table,$data){
	global $con;
	if (is_array($data)) {
		$sql = "SELECT * FROM ".$table." WHERE ";
		$i = 0;
		foreach ($data as $key => $value) {
			if ($i == count($data)-1) {
				$sql .= $key."='".$value."'";
			}else{
				$sql .= $key."='".$value."' AND ";
			}
			$i++;
		}

		$qry = mysqli_query($con,$sql);
		
		if (mysqli_num_rows($qry)>0) {
			return true;
		}else{
			return false;
		}
	}
	
}
function get_user_detail($email_or_username){
	global $con;
	$sql = "SELECT * FROM users WHERE email='".$email_or_username."' OR username='".$email_or_username."'";
	$qry = mysqli_query($con,$sql);
	return mysqli_fetch_assoc($qry);
}
function check_login($email_or_user,$password){
	global $con;
	$sql = "SELECT * FROM users WHERE email='".$email_or_user."' OR username='".$email_or_user."' AND password='".$password."'";
	$qry = mysqli_query($con,$sql);
	if(mysqli_num_rows($qry)>0){
		return true;
	}else{
		return false;
	}
}
function get_all_record($table,$where = array()){
	global $con;
	$sql = "SELECT * FROM ".$table." ";
	if (!empty($where)) {
		$sql .= " WHERE ";
		$j=0;
		foreach ($where as $key => $value) {
		if ($j == count($where)-1) {
				$sql .= $key."='".$value."'";
			}else{
				$sql .= $key."='".$value."' AND ";
			}
			$j++;
		}
	}

	$qry = mysqli_query($con,$sql);
	print_r($qry);
	return $qry;
}
function get_specific_record($table,$fields = array(),$where = array()){
	global $con;
	$sql = "SELECT ";
	for ($i=0; $i <count($fields) ; $i++) { 
		if ($i == count($fields)-1) {
			$sql .= $fields[$i]." ";
		}else{
			$sql .= $fields[$i].",";
		}
	}
	$sql .= "FROM ".$table." ";
	if (!empty($where)) {
		$sql .= " WHERE ";
		$j=0;
		foreach ($where as $key => $value) {
		if ($j == count($where)-1) {
				$sql .= $key."='".$value."'";
			}else{
				$sql .= $key."='".$value."' AND ";
			}
			$j++;
		}
	}
	$qry = mysqli_query($con,$sql);
	return $qry;
}
function update($table,$data,$where){
	global $con;
	$sql = "UPDATE ".$table." SET ";
	$i=0;
	foreach ($data as $key => $value) {
		if ($i == count($data)-1) {
				$sql .= $key."='".$value."'";
			}else{
				$sql .= $key."='".$value."',";
			}
			$i++;
	}
	$sql .= " WHERE ";
	$j=0;
	foreach ($where as $key => $value) {
		if ($j == count($where)-1) {
				$sql .= $key."='".$value."'";
			}else{
				$sql .= $key."='".$value."',";
			}
			$j++;
	}
	echo $sql;
	$qry = mysqli_query($con,$sql);
	if ($qry) {
		return true;
	}else{
		return false;
	}
}
function insert($table,$column,$values,$return_last_inserted_id = false){
	
		global $con;
		$sql = "INSERT INTO ".$table."(";
		for ($i=0; $i <count($column); $i++) { 
			if ($i == count($column)-1) {
				$sql .= $column[$i];
			}else{
				$sql .= $column[$i].',';
			}
		}
		$sql .= ") VALUES (";
		for ($i=0; $i <count($values); $i++) { 
			if ($i == count($values)-1) {
				$sql .= "'".$values[$i]."'";
			}else{
				$sql .= "'".$values[$i]."',";
			}
		}
		$sql .= ")";
		

		$qry = mysqli_query($con,$sql);
		
		if ($qry) {
			if ($return_last_inserted_id == true ) {
				$last_id = mysqli_insert_id($con);
				return $last_id;
			}else{
				return true;	
			}
		}else{
			return false;
		}
	
}
 ?>

