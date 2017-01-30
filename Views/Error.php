<html>
  <head>
    <title>Home</title>
    <style type="text/css">
    body 
    	{
       background-image: url('<?php echo BASE_URL; ?>/Public/Images/wall.jpg');
       background-repeat: no-repeat;
       background-attachment: fixed;
       -webkit-background-size: cover;
       -moz-background-size: cover;
       -o-background-size: cover;
       background-size: cover;
    	}
    hr
    {  
     border: 0;
     height: 0; /* Firefox... */
     box-shadow: 0 0 10px 1px black;
    }
    .hr_two {
        border: 0;
        height: 1px;
        background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
    }
    li:hover
    {
      cursor:pointer;
    }
    a:hover
    {	
      cursor: pointer;
      text-decoration: none;
    }
    .cart_div:hover
    {
      cursor: pointer;
      background-color: rgba(10, 112, 219, 0.2);
      border-radius: 3px;
      -webkit-transition-duration: .5s;
      transition-duration: .5s; 
    }
    img
    {
      height: 142px ;
      max-height:142;
      width: 250px ;
    }
    .cart_details
    {
      background-color: rgba(56, 149, 167, 0.1);
      transition: .5s
      outline: none;
    }
    .cart_details:HOVER
    {
      background-color: rgba(100, 150, 219, 0.2);
      -webkit-transition-duration: .5s;
      transition-duration: .5s; 
    }
    .badge_prop
    {
    position: absolute; 
    right: 30px;
    color: blue;
    }
    .center_text
    {
    text-align: center
    }
    .footer_social
    {
    background-color: rgba(52, 47, 44, 0.3);
    border-radius: 3px;
    height: 150px;
    }
    .social:hover 
    {
         -webkit-transform: scale(1.1);
         -moz-transform: scale(1.1);
         -o-transform: scale(1.1);
     }
     .social 
     {
         -webkit-transform: scale(0.8);
         /* Browser Variations: */
         -moz-transform: scale(0.8);
         -o-transform: scale(0.8);
         -webkit-transition-duration: 0.5s;
         -moz-transition-duration: 0.5s;
         -o-transition-duration: 0.5s;
     }
    /*
        Multicoloured Hover Variations
    */
     #social-fb:hover 
     {
         color: #3B5998;
     }
     #social-tw:hover {
         color: #4099FF;
     }
     #social-gp:hover 
     {
         color: #d34836;
     }
     #social-em:hover 
     {
         color: #f39c12;
     }
    </style>
    	<link rel="stylesheet" href="<?php echo BASE_URL; ?>Public/CSS/hover.css" />
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
		<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" ></script> -->
		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    	<script type="text/javascript" src="<?php echo BASE_URL; ?>Public/JS/get_product_by_category.js"></script>
    	
  </head>
  <body>
    <div class="container">
    <div class="row">
      <!-- Including the header page at the top -->
      <?php include_once $_SERVER['DOCUMENT_ROOT'].'/BuyMore/Views/Templates/page_header.php';?>
    </div>
    <hr > <!--  Underline on header  -->
    <div class="row">
   		<div class="col-md-12">
   			<div class="jumbotron">
				<h2>
					404 Not Found :(
				</h2>
				<p>
					Sory the page you are looking for cannot be found. 
				</p>
				<p>
					<a class="btn btn-primary btn-large" href="<?php echo BASE_URL?>/Index_Controller/Index">Buy More?</a>
				</p>
			</div>
   		</div>
    </div> <!-- 2nd row ended -->
    <hr>
    <div class="row"> <!-- 3rd row for footer started -->
      <?php include_once $_SERVER['DOCUMENT_ROOT'].'/BuyMore/Views/Templates/footer.php';?>
    </div> <!-- 3rd row for footer Ended-->
    </div> <!-- container div ended -->
  </body>
</html>