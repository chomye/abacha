<?php require_once("../../private/initialize.php");?>
<?php
$name = '';
$password = '';

if(is_post_request()) {

  $email = $_POST['email'] ?? '';
  $password = $_POST['password'] ?? '';

  // Validations
  if(is_blank($email)) {
    $errors[] = "Email cannot be blank.";
  }
  if(is_blank($password)) {
    $errors[] = "Password cannot be blank.";
  }
  if(empty($errors)){
    $admin = find_admin_by_email($email);
      if($admin){
          if(password_verify($password , $admin['password'])){
              log_in_admin($admin);
              redirect_to('index.php');
          }else{
            //email found but password does not match
            $errors[] = "Please enter the correct email or password";
            
          }
      }
      else{
        //no email was found
         $errors[] = "log in not successful";
            
      }
  }

}



?>
   <!-- -->
<?php include("admin_header.php"); ?>

<div class="container">

<div class="row">

<form action="login.php" method="POST" style="margin-top:150px;"> 
<?php 
    foreach($errors as $error){
        echo "<li>$error</li>";
  } 
  ?>
   
    <div class="form-group col-md-6">
      <label for="inputemail">Email</label>
      <input type="text" class="form-control" id="inputemail" placeholder="name@example.com" name="email">
    </div>
  
    
  <div class="form-group col-md-6">
    <label for="inputAddress">Password</label>
    <input type="password" class="form-control" id="inputAddress" placeholder=""  name="password">
  </div>
  
  
    <div class="form-group col-md-6">
        <button type="submit" class="btn btn-primary">Login</button>
  </div>
</form>
</div>

</div>


<?php include("admin_footer.php");  ?>


