<html>
	<head>
		<title>Add Product</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>Public/JS/bootstrap-filestyle.min.js"> </script>
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<!-- Script to enable and disable the associated product dropdown list -->
		<link rel="stylesheet" href="<?php echo BASE_URL; ?>Public/CSS/form_style.css" />  
		<script type="text/javascript" src="<?php echo BASE_URL; ?>Public/JS/pro_form_validation.js"></script>
		<!-- Javascript to enable & disable associated products  -->
	</head>
	<body>
	<div class="container">
	<div class="row">
		<?php include_once BASE_PATH.'/Views/Templates/navbar.php';?>
	</div>
	<fieldset class="well">
		<legend class="well" style="width: 160px">Add Product</legend>
		<form action="<?php echo BASE_URL; ?>Products_Controller/Add_Product" method="post" id="pro_form" enctype="multipart/form-data"> 
			<table>
				<tr>
					<td>Name:</td><td><input type="text" name="name" id="name" class="input_fields"></td>
					<td><i><p id="name_detail" class="error_text"></p></i></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td>Price:</td><td><input type="number" name="price" id="price" class="input_fields"></td>
					<td><i><p id="price_detail" class="error_text"></p></i></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td>Quantity:</td><td><input type="number" name="quantity" id="quantity" class="input_fields"></td>
					<td><i><p id="quantity_detail" class="error_text"></p></i></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td>Image:</td><td><input type="file" name="pro_image" id="pro_image" class="input_fields filestyle"  data-classButton="btn btn-primary" data-input="false" data-classIcon="icon-plus" data-buttonText="Select Image."></td>
					<td><i><p id="image_detail" class="error_text"></p></i></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td>Description:</td><td><textarea rows="4" cols="23" class="input_fields" name="description" style="resize:none" id="description"></textarea></td>
					<td><i><p id="description_detail" class="error_text"></p></i></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td>Category</td>
					<td>
						<select name="category" id="category" class="input_fields">
						<option value="null" >--Select Category--</option>
						<?php 
						foreach ($categories as $value)
						{ 
						?>
						<option value="<?php echo $value['cat_id'] ;?>">
						<?php 
							echo $value['cname'];
							echo "</option>";
						}
						?>
						</select>
					</td>
				<td><i><p id="category_detail" ></p></i></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td>Associated Product</td>
					<td>
						<input type="hidden" name="associated_product_enable"  value="0">
						<input type="checkbox"  name="associated_product_enable" id="associated_product_enable" value="1">
						<select name="associated_product" id="associated_product"  class="hidden_dropdowns" >
						<option>--Select Product--</option>
						<?php 
							foreach ($products as $value)
							{ 
							?>
							<option value="<?php echo $value['product_id'] ;?>">
							<?php 
								echo $value['name'];
								echo "</option>";
							}
							?>
						</select>
					</td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td>
					Active:</td><td><input type="checkbox"  name="is_active" value="1">
					</td><td><input type="hidden" name="is_active" value="0">
					</td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td></td><td><input type="hidden" name="created_by" value="<?php echo htmlspecialchars($logged_in_userID); ?>"></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td></td>
					<td>
						<button type="submit" class="btn btn-info" aria-label="Left Align">
							<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>Add
						</button>
						<a href="<?php echo BASE_URL; ?>Products_Controller/Products" class="btn btn-warning">
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