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
<link rel="stylesheet" href="../Sources/CSS/hover.css" />
<!-- navigarion bar implementation -->
<nav class="navbar navbar-default" >
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li class="hvr-underline-from-left" ><a href="../Categories_Controller/Categories">Categories</a></li>
      <li class="hvr-underline-from-left"><a href="../Products_Controller/Products">Products</a></li>
      <li class="hvr-underline-from-left"><a href="../Orders_Controller/Orders">Orders</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href=""><span class="glyphicon glyphicon-user"></span> <?php echo $username;?></a></li>
      <li class="hvr-sweep-to-right"><a href="../../../Controller/login_controller/Login_Controller/do_logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav> 