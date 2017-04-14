
<?

session_start();
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




$errors = 0;

if(isset($_POST['description'])){
$description = $_POST['description'];
}
if(isset($_POST['quantity'])){
$quantity = $_POST['quantity'];
}
if(isset($_POST['price'])){
$price = $_POST['price'];
}
if(isset($_POST['invoiceNumberS'])){
$invoiceNumberS = $_POST['invoiceNumberS'];
}
?>
<!--  id="SearchForDiv"  -->







   

<? if(isset($_GET['Search']) && isset($_GET['invSearchBox']) || (isset($_POST['append']))){
	
	
	if (isset($_POST['append'])){
		$search = $_POST['invoiceNumberS'];
	}
	else{
	$search = $_GET['invSearchBox'];
	}
	
	$_SESSION["query"] = $search;
	
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

  
 <td><? echo $invoice['InvoiceNumber']; ?></td>
        
  <td>  <? echo $invoice['CustomerName']; ?></td>

<br>

  
  
<? } echo '</tr></table>';?>  

<form action="Search.php" method = "GET">

<input  type ="submit" id = "<? echo $_SESSION["query"]?>" value = "Edit">
<input type = "submit" id="<? echo $_SESSION["query"]?>" name="Delete" value ="Delete">
</form>
 <h1>Invoice Details</h1>
<?

if (isset($_POST['append'])){
	$invNumber= $_POST['invoiceNumberS'];
	//echo '<p class="Warning">Refresh to see results.<p>';
}
else{
	$invNumber= $_GET['invSearchBox'];
}

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
<? 

	foreach ( $details as $detail){
		?>
		
		<tr>
		<td><? echo $detail['InvoiceNumber']; ?></td>
		<td><? echo $detail['description']; ?></td>
    <td><? echo $detail['price']; ?></td>
    <td><? echo $detail['quantity']; ?></td>
  </tr>


 
	<? }  echo '</table>'; } ?>

	
	
			
<?





//delet logic
if ( $errors < 1 && (isset($_GET['delete']) && isset($_GET['invSearchBox'] )|| ( isset($_GET['Delete'])))){
	
	//$invNumber = $_SESSION["query"];
	 
	$invNumber = $_GET['invSearchBox'];
	//Check if data exists
//	$query = "SELECT * FROM Invoice_Header_Table WHERE InvoiceNumber = '$invNumber';";
	
//	$result = $db->exec($query);


	//if ($result['InvoiceNumber'] == $invNumber) {
	
//Lynda alternatives
//courseerra
//edx	
		
	$query = "DELETE FROM Invoice_Header_Table WHERE InvoiceNumber = '$invNumber' OR CustomerName = '$invNumber';";
	
	$db->exec($query);
	
	//$Results = '<br><span class = "Success" >Sucessfully Deleted ' . $invNumber. '.</span>';
	//echo $Results;
	
}// else {
//	$Results = '<br><span class = "Warning" >No results matching ' . $invNumber. '.</span>';
	
	//echo $Results;
//}
//}
//}

/*
 * include end structure
 */
?>




<div id = "AddInvoiceDetals">

<form method="post" action="Search.php" class="myFormArea">

<h1>Add Invoice Details
        <span>Please fill all the texts in the fields.</span>
    </h1>
    
<label for="invoiceNumberS">
 <span>Invoice Number </span>
 
  <? if( isset($_POST['append']) && empty($_POST['invoiceNumberS'])){
	echo '<p class="error" >Invoice Number is required.</p>';
$errors++;
}?>

 <input type="text" id="invoiceNumberS" name="invoiceNumberS" placeholder="invoice Number"
 
 <? if($errors >= 1 && isset($_POST['append'])){

 	echo 'value = "' . $invoiceNumberS. '"';
 				
}?>>


 </label>

<label for="description">
<span>Description </span>

 <? if( isset($_POST['append']) && empty($_POST['description'])){
	echo '<p class="error" >Description is required.</p>';
$errors++;
}?>

<input type="text" id="description" name="description" placeholder="Description"

<? if($errors >= 1 && isset($_POST['append'])){

 	echo 'value = "' . $description. '"';
 				
}?>>




</label>



<label for="quantity">
<span> Quantity </span>

 <? if( isset($_POST['append']) && empty($_POST['quantity'])){
	echo '<p class="error" >Quantity is required.</p>';
$errors++;
}?>

<input type="text" id="quantity" name="quantity" placeholder="Quantity"

<? if($errors >= 1 && isset($_POST['append'])){

 	echo 'value = "' . $quantity. '"';
 				
}?>>



</label>



<label for="price">
<span>Price </span>

 <? if( isset($_POST['append']) && empty($_POST['price'])){
	echo '<p class="error" >Price is required.</p>';
$errors++;
}?>


<input type="text" id="price" name="price" placeholder="Price"

<? if($errors >= 1 && isset($_POST['append'])){

 	echo 'value = "' . $price. '"';
 				
}?>>



</label>



<input class="button" type="submit" name="append" id="append" value="Add Item to Invoive">
</form>
</div>


<?php  //Logic for creating invoice table and adding to it.


if ($errors < 1 && isset($_POST['append']) && !empty($_POST['invoiceNumberS']) && !empty($_POST['price']) && !empty($_POST['description']) && !empty($_POST['quantity'])){
	
	$query = "CREATE TABLE Invoice_Details_Table (
description VARCHAR(60) NOT NULL,
quantity VARCHAR(30) NOT NULL,
price VARCHAR(30) NOT NULL ,
InvoiceNumber VARCHAR(30) NOT NULL,
FOREIGN KEY (InvoiceNumber) REFERENCES Invoice_Header_Table(InvoiceNumber)
ON DELETE CASCADE ON UPDATE CASCADE
);";
	
	$db->exec($query);
	
	$description = $_POST['description'];
	$quantity = $_POST['quantity'];
	$price = $_POST['price'];
	$invoiceNumberS = $_POST['invoiceNumberS'];
	
	$query = "INSERT INTO Invoice_Details_Table VALUES('$description', '$quantity', '$price','$invoiceNumberS')";
	
	$db->exec($query);
}
?>

<?


include('../Structure/Footer.php');


?>