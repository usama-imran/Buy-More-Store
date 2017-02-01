<?php
if(isset($_SESSION['admin']))
{
$username = $_SESSION['user_name'];
}
else
{
$username = "";
}
?>
<link rel="stylesheet" href="<?php echo BASE_URL; ?>Public/CSS/hover.css" />
<div class="Container">
<!-- navigarion bar implementation -->
<nav class="navbar navbar-default" >
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="hvr-underline-from-left" ><a href="<?php echo BASE_URL; ?>Categories_Controller/Categories">Categories</a></li>
      <li class="hvr-underline-from-left"><a href="<?php echo BASE_URL; ?>Products_Controller/Products">Products</a></li>
      <li class="hvr-underline-from-left"><a href="<?php echo BASE_URL; ?>Orders_Controller/Orders">Orders</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href=""><span class="glyphicon glyphicon-user"></span> <?php echo $username;?></a></li>
      <li class="hvr-sweep-to-right"><a href="<?php echo BASE_URL; ?>Login_Controller/do_logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav> 
</div>