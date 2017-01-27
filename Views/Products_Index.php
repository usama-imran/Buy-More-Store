<html>
	<head>
		<title>Products</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>
	<body>
	<div class="container">
	<div class="row">
		<?php include_once $_SERVER['DOCUMENT_ROOT'].'/BuyMore/Views/Templates/navbar.php';?>
	</div>
	<fieldset class="">
	<legend class="well">Products - <a href="<?php echo BASE_URL; ?>Products_Controller/Add"><button class="btn btn-primary" ><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Add New</button></a></legend>
	</fieldset>
	<!-- Requesting categories from the controller and populating the view-->
	<table width = 100% class="table table-striped table-hover">
		<tr>
			<th>Name</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Description</th>
			<th>Category</th>
			<th>Date Created</th>
			<th>Created By</th>
			<th>Edit</th>
		</tr>
		<?php
		//Looping through the array to create list of products
		foreach ($result as $key=>$var) 
		{
			echo "<tr><td>";
			echo $var['name'];
			echo "&nbsp;</td><td>";
			echo $var['price'];
			echo "&nbsp;</td><td>";
			echo $var['quantity'];
			echo "&nbsp;</td><td>";
			echo $var['description'];
			echo "&nbsp;</td><td>";
			echo $var['cname'];
			echo "&nbsp;</td><td>";
			echo $var['date_created'];
			echo "</td><td>";
			echo $var['first_name'];
			echo "&nbsp;</td><td>";
		?>
		<a href="Edit/<?php echo $var['product_id']?>" class="hvr-pop"><span class="glyphicon glyphicon-edit"></span> </a>
		<?php 
		}
		?>
	</table>
	</div>
	</body>
</html>