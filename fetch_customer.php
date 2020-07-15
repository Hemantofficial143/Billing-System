<?php 
session_start();
include('base_url.php');


include ('connection.php');
if (isset($_SESSION['id'])) {
$i=1;
$qry = mysqli_query($con,"SELECT * FROM customer WHERE user_id=".$_SESSION['id']);
if(mysqli_num_rows($qry) > 0){
    while ($cus = mysqli_fetch_assoc($qry)) { ?>
      <tr>
        <td><?php echo ($i)?$i:'' ?></td>
        <td><?php echo ($cus['customer_name'])?$cus['customer_name']:'' ?></td>
        <td><?php echo ($cus['customer_mobile'])?$cus['customer_mobile']:'' ?></td>
        <td><?php echo ($cus['customer_address'])?$cus['customer_address']:'' ?></td>
        <td><?php echo ($cus['created_at'])?date("d/m/Y",strtotime($cus['created_at'])):'' ?></td>
        <td>
          <a href="<?php echo base_url() ?>Edit.php?customer_id=<?php echo ($cus['id'])?$cus['id']:''; ?>"  class="btn btn-info">EDIT</a>
        </td>
        <td>
          <a href="<?php echo base_url() ?>pdf.php?customer_id=<?php echo ($cus['id'])?$cus['id']:''; ?>&user_id=<?php echo ($_SESSION['id'])?$_SESSION['id']:''; ?>&customer_name=<?php echo ($cus['customer_name'])?$cus['customer_name']:''; ?>&time=<?php  echo ($cus['created_at'])?date("d/m/Y",strtotime($cus['created_at'])):'' ?>&customer_mobile=<?php echo ($cus['customer_mobile'])?$cus['customer_mobile']:''; ?>&customer_addr=<?php echo ($cus['customer_address'])?$cus['customer_address']:''; ?>" class="btn btn-success">PDF</a>
        </td>
        <td>
         <button onClick="delete_rec(<?php echo $cus['id'] ?>)" class="btn btn-danger">DELETE</button>
        </td>
      </tr>
    <?php $i++; } }else{ ?>
        <tr >
          <td colspan="8" style="background-color: red;color: white">No Result Found !!!</td>
        </tr>
    <?php }}else{
      echo "Invalid Api Called";
    }
 ?>