<html>
	<head>
		<title>Add Category</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
		<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" ></script> -->
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo BASE_URL; ?>Public/CSS/form_style.css" />  
		
		<script type="text/javascript" src="<?php echo BASE_URL; ?>Public/JS/cat_form_validation.js"></script>
		<link rel="stylesheet" href="<?php echo BASE_URL; ?>Public/CSS/form_validation.css" /> 		
	</head>
	<body>
	<div class="container">
	<div class="row">
		<!-- including the navigation bar template -->
		<?php include 'views/templates/navbar.php';?>			
	</div>
	<fieldset class="well">
		<legend class="well" style="width:180px ">Add Category</legend>
		
		<!-- Form Started -->
		<form action="<?php echo BASE_URL; ?>Categories_Controller/Add_Category" method="post" id="cat_form" >
			<table>
				<tr>
					<td>Name:</td><td><input type="text" class="input_fields" name="name" id="name" ></td><td><i><p id="name_detail" class="error_text"></p></i></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td>Description:&nbsp;</td><td><textarea rows="4" cols="23" name="description" id="description" class="input_fields" style="resize:none"></textarea></td><td><i><p id="description_detail" class="error_text"></p></i></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td>Active:</td><td><input class="chekbox_click" type="checkbox" name="is_active" value="1" id="is_active"></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td></td><td><input type="hidden" name="created_by" value="<?php echo htmlspecialchars($logged_in_userID); ?>"></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<button type="submit" class="btn btn-info" aria-label="Left Align">
							<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Add
						</button>
						<a href="<?php echo BASE_URL; ?>Categories_Controller/Categories" class="btn btn-warning">
							<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Cancel
						</a>
					</td>
				</tr>
			</table>
		</form>
	</fieldset>
	</div>
	</body>
</html>