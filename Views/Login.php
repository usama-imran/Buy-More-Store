<html>
	<head>
	<title>Login</title>
		<style type="text/css">
			body 
			{
		    background-image: url('<?php echo BASE_URL; ?>Public/Images/login.jpg');
		    background-repeat: no-repeat;
		    background-attachment: fixed;
		    -webkit-background-size: cover;
		  	-moz-background-size: cover;
		  	-o-background-size: cover;
		  	background-size: cover;
			}
		</style>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
		<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" ></script> -->
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>
	<body>
		<center>
			<div style="margin-top:10%">
				<fieldset class="well" style="width:35%">
					<legend class="well" style="width:30%">Login</legend>	
					<form action="do_login" method="post">
					<table>
						<tr>
							<td>Email:</td><td><input type="email" name="email"></td>
						</tr>
						<tr><td>&nbsp;</td></tr>
						<tr class="margin_class">
							<td>Password:&nbsp;&nbsp;</td><td><input type="password" name="password"></td>
						</tr>
						<tr><td>&nbsp;</td></tr>
						<tr>
							<td></td><td><input type="submit" value="Login" class="btn btn-primary"></td>
						</tr>
					</table>
					</form>
				</fieldset>
			</div>
		</center>
	</body>
</html>