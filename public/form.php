 <?php 
require_once("../private/initialize.php");

if(is_post_request()) {
$order_details = [];
 $order_details['name'] = h($_POST['name']);
 $order_details['email'] = h($_POST['email']);
 $order_details['phonenumber'] = h($_POST['number']);
 $order_details['address'] = h($_POST['address']);
 $order_details['quantity'] = h($_POST['quantity']);
 $order_details['price'] = h($_POST['price']);

//TODO
//validate errors
  //validate
$errors = validateOrder($order_details);

if(!$errors){
//submit to database

$result = insertOrder($order_details);
if($result == true){
  redirect_to('index.php');
}

}
    
}else{
 $id =  $_GET['id'];
$order = find_order_by_id($id);
}


?> 


<!-- -->
<?php include("includes/header.php"); ?>

<div class="container">

<div class="row">
<?php 
    foreach($errors as $error){
        echo "<li>$error</li>";
  } 
  ?>
<form action="form.php" method="POST" style="margin-top:100px;"> 
   
    <div class="form-group col-md-6">
      <label for="inputname">Name</label>
      <input type="text" class="form-control" id="inputname" value="<?php echo $order["title"]?>" name="name" >
      </div>
    <div class="form-group col-md-6">
      <label for="inputemail">Email</label>
      <input type="email" class="form-control" id="inputemail" placeholder="name@example.com" name="email">
    </div>
  
    
  <div class="form-group col-md-6">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" id="inputAddress" placeholder=""  name="address">
  </div>
  <div class="form-group col-md-6">
      <label for="inputphonenumber">Phone Number</label>
      <input type="text" class="form-control" id="inputphonenumber" placeholder="08036******"  name="number">
    </div>
  
    <div class="form-group col-md-6">
      <label for="inputquantity">quantity</label>
      <input type="text" class="form-control" id="quantity" name="quantity">
    </div>
    
    <div class="form-group col-md-6">
      <label for="inputprice">Price</label>
      <!-- <input type="text" class="form-control" id="price" value="" name="price"> -->
      <select name="price"  class="form-control">
        <option id="price"><?php echo $order["price"]?></option>
      </select>
    </div>
    <div class="form-group col-md-6">
  <button type="submit" class="btn btn-primary">Order</button>
  </div>
</form>
</div>

</div>


<?php include("includes/footer.php");  ?>

<script>
let quantity = document.getElementById('quantity');
let price = document.getElementById('price');
let initial = price.value;
quantity.addEventListener("change",()=>{
price.innerText = initial;
let total = parseInt(quantity.value, 10) * parseInt(price.value, 10);
price.innerText = total;


});




</script>

