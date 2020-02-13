<?php 
require_once("../../../private/initialize.php");

 if(!is_logged_in()) {
    redirect_to('../login.php');
  } else {
    // Do nothing, let the rest of the page proceed
  }

  $admins = find_all_admin();
  



?>


<?php include("../admin_header.php"); ?>


<div class="container" style="margin-top:150px;">
    <div class="row">
<?php while($admin = mysqli_fetch_assoc($admins)) {?>
    <table class="table" >
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Time</th>

      
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?php echo $admin["id"]?></th>
      <td><?php echo $admin["name"]?></a></td>
      <td><?php echo $admin["email"]?></a></td>
      <td><?php echo $admin["time"]?></a></td>
      <td class= "btn btn-danger" style="margin:0px 10px 0px 0px">
      <a href="<?php echo 'delete.php?id='. h($admin["id"]); ?>" style="color:white; text-decoration:none">Click To Delete</a>
      </td>
      <td class= "btn btn-info" style="margin:0px 10px 0px 0px">
      <a href="<?php echo 'update.php?id='. h($admin["id"]); ?>"
       style="color:white; text-decoration:none">Click To Update</a>
      </td>
      <td class= "btn btn-success">
      <a href="../register.php" style="color:white; text-decoration:none;">Register New Admin</a>
      </td>
    </tr>
    
  </tbody>
  
</table>
<hr> <hr>
<?php } if($admins === null){?>
  <h1>No Registered Admin</h1>
  
<?php } ?>


<div class= "btn btn-danger" style="float:right">
    <a href='<?php echo "../logout.php" ?>' style="color:white; text-decoration:none">Click To Logout</a>
</div>



<?php include("../admin_footer.php"); ?>