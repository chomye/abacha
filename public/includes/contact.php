<?php
require_once("../private/initialize.php");

if(is_post_request()) {
$contact_details = [];
 $contact_details['name'] = h($_POST['name']);
 $contact_details['email'] = h($_POST['email']);
 $contact_details['comments'] = h($_POST['comments']);

//TODO
//validate errors
  //validate
$errors = validateContact($contact_details);

if(!$errors){
//submit to database
$result = insertContact($contact_details);
}




     
}
    
?>

<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid bg-grey">
  <h2 class="text-center">CONTACT</h2>
  
  <div class="form-row">
    <div class="col-sm-5">
      <p>Contact us and we'll get back to you within 24 hours.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Lagos, Nigeria</p>
      <p><span class="glyphicon glyphicon-phone"></span> +2348033658456</p>
      <p><span class="glyphicon glyphicon-envelope"></span> myemail@something.com</p>
      <p> <i class="fab fa-instagram"></i> instagram</p>
      <p><i class="fab fa-facebook"></i> facebook</p>
      <p><i class="fab fa-twitter-square"></i> twitter</p>
    </div>
    <div class="col-sm-7 slideanim">
      <div class="row">
      <?php 
    foreach($errors as $error){
        echo "<li>$error</li>";
  } 
  ?>
      <form action="index.php" method="POST">
      <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" >
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" >
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-default pull-right" type="submit">Send</button>
        </div>
      </div>
      </form>
        
    </div>
  </div>
</div>