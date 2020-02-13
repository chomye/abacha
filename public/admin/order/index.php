<?php 
require_once("../../../private/initialize.php");

 if(!is_logged_in()) {
    redirect_to('../login.php');
  } else {
    // Do nothing, let the rest of the page proceed
  }

  $orders = find_all_orders();
  



?>


<?php include("../admin_header.php"); ?>


<div class="container" style="margin-top:150px;">
    <div class="row">
<?php while($order = mysqli_fetch_assoc($orders)) {?>
    <table class="table" >
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone Number</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?php echo $order["id"]?></th>
      <td><?php echo $order["name"]?></a></td>
      <td><?php echo $order["email"]?></a></td>
      <td><?php echo $order["phonenumber"]?></td>
    </tr>
    
  </tbody>
  <thead class="thead-dark">
    <tr>
      
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Address</th>
      <th scope="col">Time</th>
    </tr>
  </thead>
  <tbody>
    <tr>
     
      <td><?php echo h($order["numberofquantity"])?></a></td>
      <td><?php echo h($order["price"])?></a></td>
      <td><?php echo h($order["address"])?></a></td>
      <td><?php echo h($order["time"])?></a></td>
      <td class= "btn btn-danger">
      <a href="<?php echo 'delete.php?id='. h($order["id"]); ?>" style="color:white; text-decoration:none">Click To Delete</a>
      </td>
    </tr>
    
  </tbody>
</table>
<hr> <hr>
<?php }?>


<div class= "btn btn-danger" style="float:right">
    <a href='<?php echo "../logout.php" ?>' style="color:white; text-decoration:none">Click To Logout</a>
</div>



<?php include("../admin_footer.php"); ?>