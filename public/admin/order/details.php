<?php

require_once("../../../private/initialize.php");
if(!is_logged_in()) {
    redirect_to('../login.php');
  } else {
    // Do nothing, let the rest of the page proceed
  }

  if(is_post_request()) {
    $order_details = [];
     $order_details['title'] = h($_POST['title']);
     $order_details['content_1'] = h($_POST['content_1']);
     $order_details['content_2'] = h($_POST['content_2']);
     $order_details['content_3'] = h($_POST['content_3']);
     $order_details['content_4'] = h($_POST['content_4']);
     $order_details['price'] = h($_POST['price']);
    
    //TODO
    //validate errors
      //validate
    // $errors = validateOrder($order_details);
    
    // if(!$errors){
    //submit to database
    
    $result = insertDetails($order_details);
    if($result == true){
      redirect_to('index.php');
    }
    //}
    
    
    
    
         
    }


?>


<?php include("../admin_header.php"); ?>

<div class="container">

<div class="row">

<form action="details.php" method="POST" style="margin-top:150px;"> 



<div class="form-group col-md-6">
      <label for="inputname">Title</label>
      <input type="text" class="form-control" id="inputname" placeholder="John Doe" required name="title" >
      </div>
    <div class="form-group col-md-6">
      <label for="inputemail">Content 1</label>
      <input type="text" class="form-control" id="inputemail" placeholder="" required name="content_1">
    </div>
  
    
  <div class="form-group col-md-6">
    <label for="inputAddress">Content 2</label>
    <input type="text" class="form-control" id="inputAddress" placeholder=""  name="content_2">
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress">Content 3</label>
    <input type="text" class="form-control" id="inputAddress" placeholder=""  name="content_3">
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress">Content 4</label>
    <input type="text" class="form-control" id="inputAddress" placeholder=""  name="content_4">
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress">Price</label>
    <input type="text" class="form-control" id="inputAddress" placeholder=""  name="price">
  </div>
    <div class="form-group col-md-6">
        <button type="submit" class="btn btn-primary">Click</button>
  </div>
</form>
</div>

</div>

<?php include("../admin_footer.php");  ?>









