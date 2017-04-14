
<?php
//set my title
$title = 'PHP HW';
//set header
$header = 'Create Invoice';
/*
 * include start structure
 */
include('../Structure/Header.php');

/*
 * 
 * padding left breaks add invoice form
 * 
 * css wont link externally
 * 
 * 
 * Write a simple web application in PHP and MySQL using PHP Data Objects
 *  that allows a company to enter invoice items. The web application has 
 *  two tables, invoiceheader and invoicedetails. 
 *  
 *  The invoiceheader table 
 *  has information about the invoice number and the customer name only 
 *  
 *  while the invoicedetails table has information about the description, 
 *  quantity and price only for multiple items related to the invoice 
 *  number.

 * The web application should create the invoices database and the two 
 * tables mentioned above. 
 */


// invoice header = invoice number + customer name.

// invoice details =  description + quantity + price

$errors = 0;
$dsn = 'mysql:host=Annies-MacBook-Pro-2.local;dbname=invoice';
$username = 'user1';
$password = '';

// creates PDO object
try {
	$db = new PDO($dsn, $username, $password);
	//echo '<p>You are connected to the database!</p>';
	
} catch (PDOException $e) {
	$error_message = $e->getMessage();
	echo "<p>An error occurred while connecting to the database: $error_message </p>";
}



if(isset($_POST['Add']) && (isset($_POST['invoiceNumber']) && isset($_POST['customerName']))){
	
	if(isset($_POST['invoiceNumber'])){
		$invoiceNumber = $_POST['invoiceNumber'];
	}
	
	
	if(isset($_POST['customerName'])){
		$customerName= $_POST['customerName'];
	}
	
	$query = "CREATE TABLE Invoice_Header_Table (InvoiceNumber VARCHAR(30) NOT NULL PRIMARY KEY ,CustomerName VARCHAR(40) NOT NULL)";
	
	//$query = "DROP TABLE Invoice_Header_Table";
	
	$db->exec($query);
	
	
	//if (isset($invoiceNumber) && isset($customerName)){
	
		$query = "INSERT INTO Invoice_Header_Table VALUES ('$invoiceNumber', '$customerName')";
		$db->exec($query);
}







?>
<div id = "AddInvoice">

<form method="post" action="Assignment.php" class="myFormArea">

<h1>Add Invoice 
<span>Please fill all the texts in the fields.</span>
    </h1>
<label for="invoiceNumber">
            <span>Invoice Number </span>
            
            
<input type="text" id="invoiceNumber" name="invoiceNumber" placeholder="invoice Number"

<? if($errors >= 1 || isset($_POST['Add'])){

 	echo 'value = "' . $invoiceNumber. '"';
 				
}?>>


</label>
<? if( isset($_POST['Add']) && empty($_POST['invoiceNumber'])){
	echo '<span class="error" >Invoice Number is required.</span><br>';
$errors++;
}?>
  

<label for="customerName">

        <span>Customer Name</span>
 
<input type="text" id="customerName" name="customerName" placeholder="Customer Name"

<? if($errors >= 1 || isset($_POST['customerName'])){

 	echo 'value = "' . $customerName. '"';
 				
}?>>
</label>

<? if( isset($_POST['Add']) && empty($_POST['customerName'])){
	echo '<span class="error" >Customer Name is required.</span><br>';
$errors++;
}?>

<label>
        <span>&nbsp;</span> 
<input class="button"  type="submit" name="Add" id="Add" value="Add Invoice">
</label>    

</form>
</div> 

<!--  


-->



<?php


echo '<br>';
/*
 * include end structure
 */
include('../Structure/Footer.php');


?>