<!doctype html>
<html lang="en">
<head>

    <title><?php echo $title; ?></title>

    <meta charset="UTF-8">
    <meta name="desription" content="A page where we search a database for a invoice and we can add and modify invoices">
    <meta name="keyword" content="Sql, Php, hw">
    <meta name="author" content="Max Walters">
    
	<link rel="icon" href="../Assets/MWFAVICON.JPG">
    <link rel="stylesheet" type="text/css" href="../Styles/style1.css">

    <style>
    #ht{
    color: pink;
    text-align: center;
    }
    body{
    margin: 0px;
    color:#ADD8E6;
    background-color: #ADD8E6;
    text-shadow: 0 0 5px black;
    background-image: url("../Assets/bg2.jpg");
    background-position: center;
    background-repeat: no-repeat;
     background-attachment: fixed;
    background-size: cover;
	}
	
	body, html {
    height: 100%;
	}
	
	.bg { 
    /* The image used */
    
    /* Full height */
    height: 100%; 

    /* Center and scale the image nicely */
    
	}
	
	 #SearchForDiv {
	 padding-left:40%;
    display: inline-block;
    text-align: center;
    }
    
    footer{
    text-align: center;
    padding-top: 50%;
    }
    

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
    opacity: 0.7;
}

li {
    /*display: inline;*/
    float: left;
    border-right: 1px solid #bbb;
}

li a {
    display: block;
    color: #ADD8E6;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: Pink;
}

li:last-child {
    border-right: none;
}

#AddInvoiceDetals{
position: absolute;
left:39%;

top: 28%;
 opacity: 0.8;
}

#AddInvoice{
position: absolute;
padding-right:4%;
left:15%;
 opacity: 0.8;
 
}

.error{
color: red;
text-align: right;
text-shadow: 1px 1px 1px #FFE477;
	font-weight: bold;
}

h1{
color:#ADD8E6;
}



/*
css form stuff
*/

.myFormArea {
	margin-left: auto;
	margin-right: auto;
	max-width: 500px;
	background: #555;
	padding: 20px 30px 20px 30px;
	font: 12px "Helvetica Neue", Helvetica, Arial, sans-serif;
	color: #ADD8E6;
	text-shadow: 1px 1px 1px #444;
	border: none;
	border-radius: 5px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
}
.myFormArea h1 {
    padding: 0px 0px 10px 40px;
    display: block;
    border-bottom: 1px solid #444;
    margin: -10px -30px 30px -30px;
}
.myFormArea h1>span {
    display: block;
    font-size: 11px;
}
.myFormArea label {
    display: block;
    margin: 0px 0px 5px;
}
.myFormArea label>span {
    float: left;
    width: 20%;
    text-align: right;
    padding-right: 10px;
    margin-top: 10px;
    font-weight: bold;
}
 .myFormArea input[type="text"], .myFormArea select {
	border: none;
	color: pink;
	height: 25px;
	line-height:15px;
	margin-bottom: 16px;
	margin-right: 6px;
	margin-top: 2px;
	outline: 0 none;
	padding: 5px 0px 5px 5px;
	width: 70%;
	border-radius: 2px;
	-webkit-border-radius: 2px;
	-moz-border-radius: 2px;
	-moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
	background: #DFDFDF;
}
.active input[type="text"]{
	border: none;
	color: pink;
	height: 25px;
	line-height:15px;
	margin-bottom: 16px;
	margin-right: 6px;
	margin-top: 2px;
	outline: 0 none;
	padding: 1px 0px 1px 1px;
	width: 50%;
	border-radius: 2px;
	-webkit-border-radius: 2px;
	-moz-border-radius: 2px;
	-moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
	background: #DFDFDF;
}



.myFormArea select {
    background: #DFDFDF url('down-arrow.png') no-repeat right;
    background: #DFDFDF url('down-arrow.png') no-repeat right;
    appearance:none;
    -webkit-appearance:none; 
    -moz-appearance: none;
    text-indent: 0.01px;
    text-overflow: '';
    width: 70%;
    height: 35px;
	color: #525252;
	line-height: 25px;
}

.myFormArea .button {
	background: pink;
	border: none;
	padding: 10px 25px 10px 25px;
	color: #585858;
	border-radius: 4px;
	-moz-border-radius: 4px;
	-webkit-border-radius: 4px;
	text-shadow: 1px 1px 1px #ADD8E6;
	font-weight: bold;
	box-shadow: 1px 1px 1px #ADD8E6;
	-webkit-box-shadow:1px 1px 1px #3D3D3D;
	-moz-box-shadow:1px 1px 1px #ADD8E6;
}

.myFormArea .button:hover {
    color: #333;
    background-color: #EBEBEB;
}


.myFooter{
	background-color: #292c2f;
	box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.12);
	box-sizing: border-box;
	width: 100%;
	font: bold 16px sans-serif;
	text-align: left;

	padding: 50px 60px;
	margin-top: 80px;
	overflow: hidden;
}

/* Footer left */

.myFooter .footer-left{
	float: left;
}

.myFooter .footer-links{
	color:  #ffffff;
	margin: 0 0 10px;
	padding: 0;
}

.myFooter .footer-links a{
	display:inline-block;
	line-height: 1.8;
	text-decoration: none;
	color:  inherit;
}

.myFooter .myOrganaizationName{
	color:  #8f9296;
	font-size: 14px;
	font-weight: normal;
	margin: 0;
}


/* Footer right */

.myFooter .footer-right{
	float: right;
}

/* The search form */

.myFooter form{
	position: relative;
}

.myFooter form input{
	display: block;
	border-radius: 3px;
	box-sizing: border-box;
	background-color:  #1f2022;
	box-shadow: 0 1px 0 0 rgba(255, 255, 255, 0.1);
	border: none;

	font: inherit;
	font-size: 14px;
	font-weight: normal;
	color:  #d1d2d2;

	width: 500px;
	padding: 18px 50px 18px 18px;
}

.myFooter form input:focus{
	outline: none;
}

/* Changing the placeholder color */

.myFooter form input::-webkit-input-placeholder {
	color:  #5c666b;
}

.myFooter form input::-moz-placeholder {
	opacity: 1;
	color:  #5c666b;
}

.myFooter form input:-ms-input-placeholder{
	color:  #5c666b;
}

/* The magnify glass icon */

.myFooter form i{
	width: 18px;
	height: 18px;
	position: absolute;
	top: 16px;
	right: 18px;

	color: #d1d2d2;
	font-size: 18px;
}

/* If you don't want the footer to be responsive, remove these media queries */

@media (max-width: 1000px) {

	.myFooter form input{
		width: 300px;
	}

}

@media (max-width: 800px) {

	.myFooter{
		padding: 30px;
		text-align: center;
		font: bold 14px sans-serif;
	}

	.myFooter .myOrganaizationName{
		margin-top: 10px;
		font-size: 12px;
	}

	.myFooter .footer-left,
	.myFooter .footer-right{
		float: none;
		max-width: 300px;
		margin: 0 auto;
	}

	.myFooter .footer-left{
		margin-bottom: 20px;
	}

	.myFooter form input{
		width: 100%;
	}

}
.Warning{
color: yellow;
}

.Success{
color: green;
}

.Success, Warning{
text-align: center;
padding-left:30%;
}

    </style>
</head>
<nav>

<ul>
  <li><a href="Assignment.php">Add Invoices</a></li>
  <li><a href="Search.php">Manage Invoices</a></li>
  <li><a href="mailto:waltm3@mail.broward.edu">Contact us</a></li>
  
  
  <li style="float:right"><form class="active" method ="GET" Action="Search.php">
<input type ="text" name ="invSearchBox" id="invSearchBox" placeholder="Search.."><input type ="submit" value ="LookUp" name ="Search"><input type = "submit" value = "Remove" name ="delete" id = "delete">
</form>
</li>
</ul>

</nav>

<header>
    <h1 id="ht"><?php echo $header?></h1>
</header>

<body>
<main>