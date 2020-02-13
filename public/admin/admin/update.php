<?php 
require_once("../../../private/initialize.php");

 if(!is_logged_in()) {
    redirect_to('../login.php');
  } else {
    // Do nothing, let the rest of the page proceed
  }

  if(!isset($_GET['id'])){
      redirect_to('index.php');
  };
  $id = $_GET['id'];
if(is_post_request()){
    $admin_details = [];
    $admin_details['name'] = h($_POST['name']);
    $admin_details['email'] = h($_POST['email']);
    $admin_details['password'] = h($_POST['password']);
    $admin_details['confirm_password'] = h($_POST['confirm_password']);
    
   
   //TODO
   //validate errors
     //validate
   $errors = validateAdmin($admin_details);
   
   if(!$errors){
   //submit to database
   $result = updateAdmin($admin_details,$id);
   if($result == true){
    $_SESSION['message'] =" Admin Updated Successfully";
     redirect_to('index.php');
   }
   }


}else{
$admin = find_one_admin($id);
}



?>
<?php include("../admin_header.php"); ?>


<div class="container" style="margin-top:150px;">
    <div class="row">


    <form action="<?php echo 'update.php?id='. h($admin["id"]); ?>" method="POST" style="margin-top:150px;"> 
<?php 
    foreach($errors as $error){
        echo "<li>$error</li>";
  } 
  ?>
    <div class="form-group col-md-6">
      <label for="inputname">Name</label>
      <input type="text" class="form-control" id="inputname" placeholder="<?php echo h($admin['name'])?>" required name="name" >
      </div>
    <div class="form-group col-md-6">
      <label for="inputemail">Email</label>
      <input type="text" class="form-control" id="inputemail" placeholder="<?php echo h($admin['email'])?>" required name="email">
    </div>
  
    
  <div class="form-group col-md-6">
    <label for="inputAddress">Password</label>
    <input type="password" class="form-control" id="inputAddress" placeholder=""  name="password" required>
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress">Confirm_Password</label>
    <input type="password" class="form-control" id="inputAddress" placeholder=""  name="confirm_password" required>
  </div>
  
    <div class="form-group col-md-6">
        <button type="submit" class="btn btn-primary">Update</button>
  </div>
</form>

<div class= "btn btn-danger" style="float:right">
    <a href='<?php echo "../logout.php" ?>' style="color:white; text-decoration:none">Click To Logout</a>
</div>



<?php include("../admin_footer.php"); ?>

