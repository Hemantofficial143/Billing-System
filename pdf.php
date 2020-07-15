
<?php 
session_start();
include ('connection.php');
require_once("vendor/autoload.php");

$customer_name = $_GET['customer_name'];
$timestamp = $_GET['time'];
$customer_id = $_GET['customer_id'];
$user_id = $_GET['user_id'];

$mpdf = new \Mpdf\Mpdf();
$sqql = "SELECT * FROM item WHERE customer_id=".$customer_id." AND user_id=".$user_id." ORDER BY item_name ASC";
$qrry = mysqli_query($con,$sqql);

$content = '<h1 style="float:right">Invoice</h1>';
$content .= "<table class='table table-striped' class='bor' style='width:100%;'  > 
				<tr style='border:2px solid black'>
					<th> From </th>
					<td> : </td>
					<td > ".$_SESSION['name']." </td>
					<th > To </th>
					<td> : </td>
					<td > ".$_GET['customer_name']." </td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td> ".$_SESSION['mobile']." </td>
					<td></td>
					<td></td>
					<td> ".$_GET['customer_mobile']." </td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>".$_GET['customer_addr']."</td>
				</tr>
			</table><br><br>"; 
$content .= '<table cellpadding="20px" style="border:2px solid black;width:100%">
				<tr>
					<th>Sr</th>
					<th>Product</th>
					<th>Inch</th>
					<th>Sqft</th>
					<th>Rate/ft</th>
					<th>Qty</th>
					<th>Total</th>
				</tr>';
				$i =1;

if(mysqli_num_rows($qrry)>0){
while ($data = mysqli_fetch_assoc($qrry)) {
	$content .= "<tr>
					<td>".$i."</td>
					<td>".$data['item_name']."</td>
					<td>".$data['item_inch']."</td>
					<td>".$data['item_sqft']."</td>
					<td>".$data['item_rate']."</td>
					<td>".$data['item_qty']."</td>
					<td>".$data['item_total']."</td>
				</tr>";
				$i++;
}
$content .= '</table>';
}else{
	$content .= "<tr><td colspan='7'><center>No Record Found</center></td></tr></table>";
}

$mpdf->WriteHTML($content);
$mpdf->SetDisplayMode('fullpage');
$mpdf->SetWatermarkText('Jangid');
$mpdf->showWatermarkText = true;
$mpdf->watermarkTextAlpha = 0.1;
$mpdf->Output($customer_name." (".$timestamp.").pdf",'D');

?>