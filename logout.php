<?php 
include('base_url.php');
include('style.php');

unset($_SESSION['name']);
unset($_SESSION['username']); 
unset($_SESSION['emailname']) ;
unset($_SESSION['mobile']);
$url = base_url().'index.php';
redirect($url);	

exit();
?>
