
<?php 
include('base_url.php');
include('style.php'); ?>
<?php 
if (!logged_in()) {
 		redirect(base_url());
 	}
if (!isset($_GET['customer_id']) || $_GET['customer_id'] === "") {
	redirect('view_customer.php');
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php include('header.php'); ?>

<div class="container-fluid mt-2">
	<div id="success"></div>
	<div id="error"></div>
	<div class="row">
		<div class="col-md-3" >
			<div class="card p-3">
				<input type="hidden" name="customer_id" id="customer_id" value="<?php echo ($_GET['customer_id'])?$_GET['customer_id']:'' ?>">
					<input type="hidden" name="user_id" id="user_id" value="<?php echo ($_SESSION['id'])?$_SESSION['id']:'' ?>">
				<form id="rec" class="fixed">
					<h5><b>Product Category</b></h5>
					<select class="form-control" id="item_category" name="item_category">
					
					</select>
					
					<h5><b>Product Name</b></h5>
					<input type="text" class="form-control" id="item_name" name="item_name">
					<h5><b>Height</b></h5>
					<input  type="number" step="0.01" class="form-control" id="item_height" name="item_height" onkeyup="Find_Sqft_height_width()">
					<h5><b>Width</b></h5>
					<input type="number" step="0.01" class="form-control" id="item_width" name="item_width" onkeyup="Find_Sqft_height_width()">
					<h5><b>Inch</b></h5>

					<input  type="number" step="0.01" class="form-control" id="item_inch" name="item_inch" placeholder="12 * 12 / 144" onkeyup="Find_Sqft_inch()">
					<h5><b>Sqft</b></h5>
					<input readonly type="number" step="0.01" class="form-control" id="item_sqft" name="item_sqft">
					
					<h5><b>Rate</b></h5>
					<input type="number" class="form-control" id="item_rate" name="item_rate">
					<h5><b>Quantity</b></h5>
					<input type="number" class="form-control" id="item_qty" name="item_qty" onkeyup="find_total()">
					<h5><b>Total</b></h5>
					<input readonly type="number" class="form-control" id="item_total" name="item_total">
					<input type="submit" id="submit" value="ADD" class="mt-2 btn btn-success">
				</form>
			</div>
		</div>
		<div class="col-md-9">
			<div class="card p-3" style="height: 600px;overflow: auto;">
				<table class="table table-hover">
					<thead>
						<tr class="alert alert-success">
							<th>Sr</th>
							<th>Product Name</th>
							<th>Height</th>
							<th>Width</th>
							<th>Inch</th>
							<th>Sqft</th>
							<th>Rate / foot</th>
							<th>Quantity</th>
							<th>Total</th>
							<th colspan="2">Action</th>
						</tr>
					</thead>
					<thead id="load_customer_data"> 
						
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>

  
</body>

<script type="text/javascript">

	function Find_Sqft_height_width(){
		if(document.getElementById('item_inch').value > 0){
			document.getElementById('item_inch').value = 0;
		}
		var height = document.getElementById('item_height').value;
		var width = document.getElementById('item_width').value;
		if(height > 0 || width > 0){
			document.getElementById('item_inch').value = 0;
			document.getElementById('item_inch').disabled = true;	
		}else{
			document.getElementById('item_inch').disabled = false;	
		}
		document.getElementById('item_sqft').value = ((height * width)/144);	
	}
	function Find_Sqft_inch(){	
		if(document.getElementById('item_inch').value > 0){
			document.getElementById('item_height').value = 0;
			document.getElementById('item_height').disabled = true;	
			document.getElementById('item_width').value = 0;
			document.getElementById('item_width').disabled = true;	
			var inch = document.getElementById('item_inch').value;
			document.getElementById('item_sqft').value = ((inch / 12));	
		}else{
			document.getElementById('item_height').disabled = false;
				document.getElementById('item_width').disabled = false;
		}

		
	}
	function find_total(){
		var rate = document.getElementById('item_rate').value;
		var qty = document.getElementById('item_qty').value;
		document.getElementById('item_total').value = ((rate * qty));
	}
	load_category();
	load_cusomer_data_function();
	
	function load_cusomer_data_function(){
		var form_data = "customer_id="+$('#customer_id').val()+"&user_id="+$('#user_id').val();

		$.ajax({
			url : $('#base_url').val()+"fetch_items.php",
			data : form_data,
			method : "POST",
			success:function(res){
				
				$('#load_customer_data').html(res);
			}
		})
	}
	function load_category(){
		$.ajax({
			url : $('#base_url').val()+"api.php",
			data : "api_call=get_category",
			method : "POST",
			success:function(res){
				
				$('#item_category').html(res);
			}
		})	
	}
	$('#rec').on('submit',function(e){
		e.preventDefault();
		var form_data = $(this).serialize()+ "&customer_id="+$('#customer_id').val()+"&user_id="+$('#user_id').val()+"&api_call=insert_product";
		$.ajax({
			url:$('#base_url').val()+"api.php",
			data:form_data,
			method:"POST",
			success:function(res){
					
				if (res) {
					$('#success').html("<div class='alert alert-success'>Data Added</div>");
					load_cusomer_data_function();
				}else{
					$('#error').html("<div class='alert alert-danger'>Something Went Wrong</div>");
				}
			}
		})
	})
</script>
</html>
