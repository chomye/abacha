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
    $result = delete_order($id);
    var_dump($result);
    if($result){
        $_SESSION['message'] =" Order Deleted Successfully";
        redirect_to('index.php');
    }
    else{
        $errors = $result;
    }
}else{
$order = find_one_order($id);
}



?>
<?php include("../../includes/header.php"); ?>


<div class="container" style="margin-top:150px;">
    <div class="row">

<h3 class="text-danger">Are You Sure You Want To Delete</h3>
<h3><?php echo $order['email']?></h3>
<form action="<?php echo 'delete.php?id='. h($order["id"]); ?>" method="POST">
<input type="submit" value="Delete Order" style="margin:0px 10px 0px 0px">
<button class="btn btn-info"> <a href="index.php">No</a></button>

</form>

<div class= "btn btn-danger" style="float:right">
    <a href='<?php echo "../logout.php" ?>' style="color:white; text-decoration:none">Click To Logout</a>
</div>



<?php include("../../includes/footer.php"); ?>

