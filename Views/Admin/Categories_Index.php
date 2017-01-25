
<html>
	<head>
		<title>Categories</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
		<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" ></script> -->
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script type="text/javascript" src="<?php echo BASE_URL; ?>Public/JS/edit.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="row"><?php include 'Views/Templates/navbar.php';?></div>
			<fieldset>
				<legend class="well">Categories - 
					<a href="<?php echo BASE_URL; ?>Categories_Controller/Add"><button class="btn btn-primary" id="add_new_cat"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Add New</button></a>
				</legend>
			</fieldset>
			<!-- Requesting categories from the controller and populating the view-->
			<table width = 100% class="table table-striped table-hover ">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Description</th>
					<th>Date Created</th>
					<th>Created By</th>
					<th>Edit</th>
				</tr>
				<?php
				//Looping through the array to create the list
				foreach ($result as $var) 
				{
					echo '<tr><td>';
					echo $var['cat_id'];
					echo '</td><td>';
					echo $var['cname'];
					echo '&nbsp;</td><td>';
					echo $var['description'];
					echo '&nbsp;</td><td>';
					echo $var['date_created'];
					echo '&nbsp;</td><td>';
					echo $var['first_name'];
					echo '</td><td>';
					echo '<a value="';echo $var['cat_id']; echo '" class="hvr-pop"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>';
					echo '</td>';
				}
				?>
			</table>
		</div> 
	</body>
</html>