<?php 
require_once("../../private/initialize.php");
if(is_post_request()) {
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
    $result = insertAdmin($admin_details);
    if($result == true){
      redirect_to('index.php');
    }
    }
    
    
    
    
         
    }


?>
   <!-- -->
<?php include("admin_header.php"); ?>

<div class="container">

<div class="row">

<form action="register.php" method="POST" style="margin-top:150px;"> 
<?php 
    foreach($errors as $error){
        echo "<li>$error</li>";
  } 
  ?>
    <div class="form-group col-md-6">
      <label for="inputname">Name</label>
      <input type="text" class="form-control" id="inputname" placeholder="John Doe" required name="name" >
      </div>
    <div class="form-group col-md-6">
      <label for="inputemail">Email</label>
      <input type="text" class="form-control" id="inputemail" placeholder="name@example.com" required name="email">
    </div>
  
    
  <div class="form-group col-md-6">
    <label for="inputAddress">Password</label>
    <input type="password" class="form-control" id="inputAddress" placeholder=""  name="password">
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress">Confirm_Password</label>
    <input type="password" class="form-control" id="inputAddress" placeholder=""  name="confirm_password">
  </div>
  
    <div class="form-group col-md-6">
        <button type="submit" class="btn btn-primary">Register</button>
  </div>
</form>
</div>

</div>


<?php include("admin_footer.php");  ?>


