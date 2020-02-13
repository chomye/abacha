<?php 
require_once("../../../private/initialize.php");

 if(!is_logged_in()) {
    redirect_to('../login.php');
  } else {
    // Do nothing, let the rest of the page proceed
  }

  $feedbacks = find_all_feedbacks();
  



?>


<?php include("../admin_header.php"); ?>
<div class="container" style="margin-top:150px;">
    <div class="row">
<?php while($feedback = mysqli_fetch_assoc($feedbacks)) {?>
    <table class="table" >
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Comment</th>
      <th scope="col">Time</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?php echo $feedback["id"]?></th>
      <td><?php echo $feedback["name"]?></a></td>
      <td><?php echo $feedback["email"]?></a></td>
      <td><?php echo $feedback["comment"]?></td>
      <td><?php echo $feedback["time"]?></td>
    </tr>
    
  </tbody>
</table>
<hr> <hr>
<?php }?>

<div class= "btn btn-danger" style="float:right">
    <a href='<?php echo "../logout.php" ?>' style="color:white; text-decoration:none">Click To Logout</a>
</div>



<?php include("../admin_footer.php"); ?>