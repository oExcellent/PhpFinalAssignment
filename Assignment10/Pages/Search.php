
<?php
//set my title
$title = 'PHP HW';
//set header
/*$header = ' * If the invoice number is found, allow for the invoice header and 
 * details to be edited with unlimited number of items. 
 * 


<br>SHOULD WE HAVE A TEXT BOX WHERE YOU ENTER INVOICE AND DELET IT OR BUTTON
<BR>
SHOULD IT BE ON ONE PAGE?
<BR>
SHOULD THE DNS BE SET UP A CERTAIN WAY BEFORE SUBMISSION?
<BR>
*/
$header = '<br>Manage Invoices';
/*
 * include start structure
 */
include('../Structure/Header.php');

/*
 * A search web page should prompt for an invoice 
 * number. 
 * 
 * If the invoice number is found, allow for the invoice header and 
 * details to be edited with unlimited number of items. 
 * 
 * Also allow for the 
 * invoice number to be deleted if found. If the invoice number is not found 
 * allow for it to be added with unlimited number of items.

 */

$dsn = 'mysql:host=Annies-MacBook-Pro-2.local;dbname=invoice';
$username = 'user1';
$password = '';


try {
	$db = new PDO($dsn, $username, $password);
	//echo '<p>You are connected to the database!</p>';
	
} catch (PDOException $e) {
	$error_message = $e->getMessage();
	echo "<p>An error occurred while connecting to the database: $error_message </p>";
}





?>
<!--  id="SearchForDiv"  -->







   

<?php if(isset($_GET['Search']) && isset($_GET['invSearchBox'])){
	
	
	
	
	$search = $_GET['invSearchBox'];
	
	$query = "SELECT * FROM Invoice_Header_Table WHERE InvoiceNumber = '$search' OR CustomerName = '$search'";
	//SELECT * FROM Invoice_Header_Table WHERE InvoiceNumber = 'Harris' OR CustomerName = 'Harris';
	$invoices = $db->query($query);
	
	echo '<table>
	<tr>
	<th>Invoice Number</th>
	<th>Customer Name</th>
	</tr>
	<tr>';
	
	foreach ($invoices as $invoice) { 
?>

  
 <td><?php echo $invoice['InvoiceNumber']; ?></td>
        
  <td>  <?php echo $invoice['CustomerName']; ?></td>

<br>

  
  
<?php } echo '</tr></table> <h1>Invoice Details</h1>';

$invNumber = $_GET['invSearchBox'];

$query = "SELECT * FROM Invoice_Details_TablE WHERE InvoiceNumber = '$invNumber';";





$details = $db->query($query);
?>


		<table>
  <tr>
  <th>Invoice Number</th>
    <th>Description</th>
    <th>Price</th>
    <th>Quantity</th>
  </tr>
<?php 





	foreach ( $details as $detail){
		?>
		
		<tr>
		<td><?php echo $detail['InvoiceNumber']; ?></td>
		<td><?php echo $detail['description']; ?></td>
    <td><?php echo $detail['price']; ?></td>
    <td><?php echo $detail['quantity']; ?></td>
  </tr>


 
	<?php }  echo '</table>'; } ?>

	
<?php  //Logic for delete        $forDelete = $detail['InvoiceNumber']; ?>
		
<?php





if (isset($_GET['delete']) && isset($_GET['invSearchBox'])){
	
	//isset($forDelete)
	
	$invNumber = $_GET['invSearchBox'];
	
	$query = "SELECT * FROM Invoice_Details_TablE WHERE InvoiceNumber = '$invNumber';";
	
	

		
		//echo $detail['InvoiceNumber'];
		
		//$forDelete = $detail['InvoiceNumber'];
	
	
	
		$query = "DELETE FROM Invoice_Details_TablE WHERE InvoiceNumber = '$invNumber';";
	
	$db->exec($query);
	
	$query = "DELETE FROM Invoice_Header_Table WHERE InvoiceNumber = '$invNumber';";
	
	$db->exec($query);
	
	}


echo '';
/*
 * include end structure
 */
include('../Structure/Footer.php');


?>