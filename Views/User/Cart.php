<?php

?>
<html>
	<head>
		<title>Cart</title>
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
		<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" ></script> -->
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    	<script type="text/javascript" src="../Sources/JS/cart.js"></script>
		<style>
		.total_sum
		{
		text-align: center;
		font-size: 16;
		}
		hr
		{  
		 border: 0;
		 height: 0; /* Firefox... */
		 box-shadow: 0 0 10px 1px black;
		}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<?php include 'Views/templates/page_header.php';?>
			</div>
			<hr>
			<div class="row" id="cart">
			<fieldset class="well" style="background-color: rgba(106, 44, 175, 0.1);" >
				<legend class="well">Your Cart</legend>
				<table class="table table-hover">
				<th>#</th>
				<th>Name</th>
				<th>P.P.U</th>
				<th>Quantity</th>
				<th>Total</th>
				<th>Remove</th>
				<?php 
				$total_sum = 0;
				$arrays = $_SESSION['pro_array'];
				$number =1;
				foreach ($arrays as $key => $array)
				{
					echo '<tr><td>';
					echo $number++;
					echo '</td>';
					echo '<td>';
					echo $array['product_name'];
					echo '</td><td>';
					echo $array['product_price'];
					echo '</td><td>';
					echo $array['product_quantity'];
					echo '</td><td>';
					echo $array['product_total'];
					echo '</td>';
					echo '<td>';
					echo '<button class="btn btn-danger" data-name="';
					echo $array['product_name'];
					echo '" data-id="';
					echo $array['product_id'];
					echo '">Remove</button>';
					echo '</td></tr>';
					$total_sum = $total_sum + $array['product_total'];
				}
				?>
				<tr>
				<td></td><td></td><td></td><td></td>
				<td>
				<p>
				<i>
				<?php echo $total_sum;?>
				</i>
				</p>
				<button class="btn btn-warning" id="checkout">
				  <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> 
				Check Out
				</button>
				<!-- Check if user is logged in -->
				<script type="text/javascript">
				$(function(){
				$("#checkout").on('click',function(){
					$.get('../../../View/session_state.php', function(data) {
					     if( data == "no" ) {
					    	 var retVal = confirm("Please Login to proceed with your request");
								if(retVal == true)
								{
									window.location.href = '../../../Controller/login_controller/Login_Controller/login';
								}	    	 
					     } else if (data == "yes" ) {
					    	 $.post("../../../Controller/cart_controller/Cart_Controller/check_out", 
							    	 function(status){
						    	 window.location.href = '../../../Controller/cart_controller/Cart_Controller/reset_cart';
						    	 });
					     }
					 });
					});
				});
				</script>
				</td>
				<td>
				</td>
				</tr>
				</table>
				<a href="../Index_Controller/Index"><b>Back To Products</b></a>
			</fieldset>
			</div>
		</div>
	</body>
</html>