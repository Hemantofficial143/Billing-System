
<?php 
session_start();
include('base_url.php');

include ('connection.php');
include('function.php');
$i=1;?><?php
if (isset($_POST['user_id']) && isset($_POST['customer_id'])) {
$qry = mysqli_query($con,"SELECT * FROM item WHERE user_id=".$_POST['user_id']." AND customer_id=".$_POST['customer_id']." ORDER BY item_name ASC");
if(mysqli_num_rows($qry)>0){
    while ($item = mysqli_fetch_assoc($qry)) { ?>
      <tr>
        <input type="hidden" name="fetch_item_id" id="fetch_item_id" value="<?php echo ($item['id'])?$item['id']:'' ?>">
        <td><?php echo ($i)?$i:'' ?></td>
        <td id="s_item_name"><?php echo ($item['item_name'])?$item['item_name']:'' ?></td>
        <td id="s_item_height"><?php echo ($item['item_height'])?$item['item_height']:'' ?></td>
        <td id="s_item_width"><?php echo ($item['item_width'])?$item['item_width']:'' ?></td>
        <td id="s_item_inch"><?php echo ($item['item_inch'])?$item['item_inch']:'' ?></td>
        <td id="s_item_sqft"><?php echo ($item['item_sqft'])?$item['item_sqft']:'' ?></td>
        <td id="s_item_rate"> <b><?php echo ($item['item_rate'])?$item['item_rate'].' <i class="fas fa-rupee-sign"></i>':'' ?></b></td>
        <td id="s_item_qty"><?php echo ($item['item_qty'])?$item['item_qty']:'' ?></td>
        <td id="s_item_total"><b><?php echo ($item['item_total'])?$item['item_total'].' <i class="fas fa-rupee-sign"></i>':'' ?></b></td>

        <td><button type="button"  id="edit_item" name="edit_item">Edit</button></td>
        <td><button id="delete_btn" class="btn btn-danger">Delete</button></td>
      </tr>
    <?php $i++; }  ?>

      <tr class="alert alert-info">
        <?php  
          $total = get_specific_record('item',array('item_qty','item_total'),array('user_id' => $_POST['user_id'],'customer_id' => $_POST['customer_id']));
          $qty_sum = array();
          $amt_sum = array();
          while ($it = mysqli_fetch_assoc($total)) {
            array_push($qty_sum, $it['item_qty']);
            array_push($amt_sum, $it['item_total']);
          }
         ?>
        <td colspan="3">Total Items</td>
        <td colspan="3" ><?php echo array_sum($qty_sum); ?> Quantity</td>
        <td colspan="4">Total Bill Amount</td>
        <td colspan="3" ><b><?php echo array_sum($amt_sum); ?> <i class="fas fa-rupee-sign"></i></b></td>
      </tr>
    <?php }else{ ?>
      <tr>
        <td colspan="11" style="background-color: red;color: white">No Items Found !!!</td>
      </tr>
    <?php }}else{
      echo "Invalid Api Called";
    }
 ?>
