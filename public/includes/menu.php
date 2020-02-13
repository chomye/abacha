<?php

$orders = find_all_details();


?>


<!-- Container (Menu Section) -->
<div id="menu" class="container-fluid">
  <div class="text-center">
    <h2>Menu</h2>
    <h4>Price List</h4>
  </div>
  <div class="row slideanim">
  <?php while($order = mysqli_fetch_assoc($orders)) {?>
  
    <div class="col-sm-3 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1><?php echo $order["title"]?></h1>
        </div>
        <div class="panel-body">
          <p><strong><?php echo $order["title"]?></strong></p>
          <p><?php echo $order["content1"]?></p>
          <p><?php echo $order["content2"]?></p>
          <p><?php echo $order["content3"]?></p>
          <p><?php echo $order["content4"]?></p> 
        </div>
        <div class="panel-footer">
          <h3><strike>N</strike><?php echo $order["price"]?></h3>
          <h4>per head</h4>
          <button class="btn btn-lg"><a href="<?php echo 'form.php?id='. h($order["id"]); ?>">Order</a></button>
        </div>
      </div>      
    </div>     
  
  <?php }?>
  </div>
  </div>