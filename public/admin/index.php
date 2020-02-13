<?php 
require_once("../../private/initialize.php");

require_login();

?>


<?php include("admin_header.php"); ?>


<div class="container">
    <div class="row">
    <table class="table" style="margin-top:150px;">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Orders</th>
      <th scope="col">Customer's FeedBack</th>
      <th scope="col">Admin</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td><a href="order/index.php">click to view</a></td>
      <td><a href="feedback/index.php">click to view</a></td>
      <td><a href="admin/index.php">click to view</a></td>
    </tr>
    
  </tbody>
</table>

<div class= "btn btn-danger" style="float:right">
    <a href='<?php echo "logout.php" ?>' style="color:white; text-decoration:none">Click To Logout</a>
</div>


    </div>
</div>




    <?php include("admin_footer.php");  ?>
