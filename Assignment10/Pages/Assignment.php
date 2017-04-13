
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


if ( isset($_POST['append']) && isset($_POST['invoiceNumberS']) && isset($_POST['price']) && isset($_POST['description']) && isset($_POST['quantity'])){
	
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
<div id = "AddInvoiceDetals">

<form method="post" action="Assignment.php" class="myFormArea">

<h1>Add Invoice Details
        <span>Please fill all the texts in the fields.</span>
    </h1>
    
<label for="invoiceNumberS">
 <span>Invoice Number </span>
 <input type="text" id="invoiceNumberS" name="invoiceNumberS" placeholder="invoice Number"
 
 <? if($errors >= 1 || isset($_POST['append'])){

 	echo 'value = "' . $invoiceNumberS. '"';
 				
}?>>

 </label>
 
 <? if( isset($_POST['append']) && empty($_POST['invoiceNumberS'])){
	echo '<span class="error" >Invoice Number is required.</span><br>';
$errors++;
}?>

<label for="description">
<span>Description </span>

<input type="text" id="description" name="description" placeholder="Description"

<? if($errors >= 1 || isset($_POST['append'])){

 	echo 'value = "' . $description. '"';
 				
}?>>


</label>

 <? if( isset($_POST['append']) && empty($_POST['description'])){
	echo '<span class="error" >Description is required.</span><br>';
$errors++;
}?>

<label for="quantity">
<span> Quantity </span>

<input type="text" id="quantity" name="quantity" placeholder="Quantity"

<? if($errors >= 1 || isset($_POST['append'])){

 	echo 'value = "' . $quantity. '"';
 				
}?>
>
</label>

 <? if( isset($_POST['append']) && empty($_POST['quantity'])){
	echo '<span class="error" >Quantity is required.</span><br>';
$errors++;
}?>

<label for="price">
<span>Price </span>
<input type="text" id="price" name="price" placeholder="Price"

<? if($errors >= 1 || isset($_POST['append'])){

 	echo 'value = "' . $price. '"';
 				
}?>>
</label>

 <? if( isset($_POST['append']) && empty($_POST['price'])){
	echo '<span class="error" >Price is required.</span><br>';
$errors++;
}?>

<input class="button" type="submit" name="append" id="append" value="Add Item to Invoive">
</form>
</div>




<?php


echo '<br>';
/*
 * include end structure
 */
include('../Structure/Footer.php');


?>