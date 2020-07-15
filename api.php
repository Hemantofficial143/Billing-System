<?php
session_start();
include('base_url.php');
include('connection.php');
include('function.php');
if ($_SESSION['role'] != 0) {
	redirect(base_url());
}
if (isset($_POST['api_call'])) {
	$scase = $_POST['api_call'];
	switch ($scase) {


		// insert category
		case 'insert_category':
			$ins_cat = insert('categories',array('category_name','category_code'),array($_POST['category_name'],$_POST['category_code']));
			if ($ins_cat) {
				return true;
			}
			return false;
			break;


			//get Categoy
		case 'get_category':
			$get_cat = get_all_record('categories');
			while ($cate = mysqli_fetch_assoc($get_cat)) { ?>
				<option value="<?php echo ($cate['category_code'])?$cate['category_code']:'' ?>"><?php echo ($cate['category_name'])?$cate['category_name']:'' ?></option>
			<?php }
			break;


			// insert customer
		case 'insert_customer':
			$ins_cust = insert('customer',array('user_id','customer_name','customer_mobile','customer_address'),array($_POST['user_id'],$_POST['customer_name'],$_POST['customer_mobile'],$_POST['customer_address']));
			if ($ins_cust) {
				return true;
			}
			return false;
			break;

			// insert product
		case 'insert_product':
					$customer_id = $_POST['customer_id'];
					$user_id = $_POST['user_id'];
					$item_name = $_POST['item_name'];

					if (isset($_POST['item_height'])) {
						$item_height = $_POST['item_height'];
					}else{
						$item_height = 0;
					}

					if (isset($_POST['item_width'])) {
						$item_width = $_POST['item_width'];
					}else{
						$item_width = 0;
					}

					if (isset($_POST['item_inch'])) {
						$item_inch= $_POST['item_inch'];
					}else{
						$item_inch= 0;
					}

					$item_sqft= $_POST['item_sqft'];
					$item_rate= $_POST['item_rate'];
					$item_qty= $_POST['item_qty'];
					$item_total= $_POST['item_total'];
			
			$ins_prod = insert('item',array('customer_id',
							'user_id',
							'item_name',
							'item_height',
							'item_width',
							'item_inch',
							'item_sqft',
							'item_rate',
							'item_qty',
							'item_total'),array($customer_id,
							$user_id,
							$_POST['item_category']." - ".$item_name,
							$item_height,
							$item_width,
							$item_inch,
							$item_sqft,
							$item_rate,
							$item_qty,
							$item_total));
			if ($ins_prod) {
				return true;
			}

			return false;
			break;


		default:
			# code...
			break;
	}	
}else{
	echo "Invalid Api Called";
}




 ?>