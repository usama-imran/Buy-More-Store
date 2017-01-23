<?php
?>
<html>
	<head>
		<title>Orders</title>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
		<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" ></script> -->
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script type="text/javascript" src="../Sources/JS/order_status.js"></script>
	</head>
	<body>
	<div class="container">
	<div class="row">
		<?php include 'Views/templates/navbar.php';?>
	</div>
	<fieldset>
	<legend class="well">Orders </legend>
	</fieldset>
	<!-- Requesting categories from the controller and populating the view-->
		<div class="panel-group" id="panel-249471">
		<?php
		foreach ($result[0] as $ord_value)
		{
		?>
			<div class="panel panel-default">
				<div class="panel-heading">
					<a class="panel-title collapsed" data-toggle="collapse"
						data-parent="#panel-249471" href="#panel-element-<?php echo $ord_value['order_id'] ?>">Order Number: <?php echo $ord_value['order_id']?></a>				
				<p style="float: right"> Delivered: <input type="checkbox" <?php if($ord_value['active']==0){echo "checked";}?> value="<?php echo $ord_value['order_id']; ?>"> </p>
				</div>
				<div id="panel-element-<?php echo $ord_value['order_id'] ?>" class="panel-collapse collapse">
					<div class="panel-body">
					<table class="table table-striped table-hover">
					<tr>
						<th>Order ID</th>
						<th>Product Name</th>
						<th>Quantity</th>
						<th>Customer Name</th>
					</tr>
						<?php
						foreach ($result[1] as $var) 
						{
							if($var['order_id'] == $ord_value['order_id'])
							{
							echo "<tr><td>";
							echo $var ['order_id'];
							echo "&nbsp;</td><td>";
							echo $var ['name'];
							echo "&nbsp;</td><td>";
							echo $var ['quantity'];
							echo "&nbsp;</td><td>";
							echo $var ['first_name'];
							echo "&nbsp;</td>";
							}
						}
						?>
						</table>
					</div>
				</div>
			</div>
		<?php 
		}
		?>
		</div>
	</div> <!--Container div ended -->
	</body>
</html>