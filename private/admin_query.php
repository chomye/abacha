<?php 
// function to validate Admin Details
function validateAdmin($admin_details) {
    $errors = [];

    // admin_name
    if(is_blank($admin_details['name'])) {
      $errors[] = "Name cannot be blank.";
    } 

    if(is_blank($admin_details['email'])) {
      $errors[] = "Email cannot be blank.";
    } 
     if (!has_valid_email_format($admin_details['email'])) {
      $errors[] = "Email must be a valid format.";
    }
    if (!has_unique_email($admin_details['email'], $admin_details['id'] ?? 0)) {
        $errors[] = "Email not allowed. Try another.";
      }

    
      if(is_blank($admin_details['password'])) {
        $errors[] = "Password cannot be blank.";
      } if (!has_length($admin_details['password'], array('min' => 5))) {
        $errors[] = "Password must contain  5 or more characters";
      } if (!preg_match('/[A-Z]/', $admin_details['password'])) {
        $errors[] = "Password must contain at least 1 uppercase letter";
      } if (!preg_match('/[a-z]/', $admin_details['password'])) {
        $errors[] = "Password must contain at least 1 lowercase letter";
      } if (!preg_match('/[0-9]/', $admin_details['password'])) {
        $errors[] = "Password must contain at least 1 number";
      } if (!preg_match('/[^A-Za-z0-9\s]/', $admin_details['password'])) {
        $errors[] = "Password must contain at least 1 symbol";
      }

      if(is_blank($admin_details['confirm_password'])) {
        $errors[] = "Confirm password cannot be blank.";
      } if ($admin_details['password'] !== $admin_details['confirm_password']) {
        $errors[] = "Password and confirm password must match.";
      }
    
    return $errors;
}


//function to insert Admin Details
function insertAdmin($admin_details){
    global $db;
   //First hash your password very important
    $hashed_password = password_hash($admin_details['password'], PASSWORD_BCRYPT);
  
    //query to submit to database
    $sql = "INSERT INTO admin ";
    $sql .= "(name,email,password)";
    $sql .= "VALUES (";
    $sql .= "'". db_escape($db,$admin_details['name']). "'," ;
    $sql .= "'". db_escape($db,$admin_details['email']). "'," ;
    $sql .= "'". db_escape($db,$hashed_password). "'" ;
    $sql .= ")";

    //submit the query above to database
    $result = mysqli_query($db,$sql);

    //to check if there is an error in sql query
    confirm_result_set($result);

    if($result){
        return true;
    }
    else{
        echo mysqli_error($db);
        $db_disconnect($db);
        exit;
    }
}

function find_admin_by_email($email){
    global $db;

    $sql = "SELECT * FROM admin ";
    $sql .= "WHERE email= '".db_escape($db, $email). "'";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $admin= mysqli_fetch_assoc($result);
     mysqli_free_result($result);
     return $admin;
     

}

function find_all_orders(){
  global $db;

  $sql = "SELECT * FROM orders ";
  $sql .= "ORDER BY id ASC";
  $order = mysqli_query($db, $sql);
  confirm_result_set($order);
  return $order;
}


function find_all_feedbacks(){
  global $db;

  $sql = "SELECT * FROM contactus ";
  $sql .= "ORDER BY id ASC";
  $feedback = mysqli_query($db, $sql);
  confirm_result_set($feedback);
  return $feedback;
}


function find_all_admin(){
  global $db;

  $sql = "SELECT * FROM admin ";
  $sql .= "ORDER BY id ASC";
  $admin = mysqli_query($db, $sql);
  confirm_result_set($admin);
  return $admin;
}

function delete_order($id){
  global $db;

  $sql = "DELETE FROM orders ";
  $sql .= "WHERE id='" . db_escape($db,$id) . "'";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db , $sql);
  confirm_result_set($result);

  if($result){
    return true;

  }
  else{

    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function find_one_order($id){
  global $db;

  $sql = "SELECT * FROM orders ";
  $sql .= "WHERE id='" . db_escape($db,$id) . "'";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $order = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $order;


}
function delete_admin($id){
  global $db;

  $sql = "DELETE FROM admin ";
  $sql .= "WHERE id='" . db_escape($db,$id) . "'";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db , $sql);
  confirm_result_set($result);

  if($result){
    return true;

  }
  else{

    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function find_one_admin($id){
  global $db;

  $sql = "SELECT * FROM admin ";
  $sql .= "WHERE id='" . db_escape($db,$id) . "'";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $admin = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $admin;


}

function updateAdmin($admin_details,$id){
  global $db;
 //First hash your password very important
  $hashed_password = password_hash($admin_details['password'], PASSWORD_BCRYPT);

  //query to submit to database
  $sql = "UPDATE  admin SET ";
  $sql .= "name='". db_escape($db,$admin_details['name']). "'," ;
  $sql .= "email='". db_escape($db,$admin_details['email']). "'," ;
  $sql .= "password='". db_escape($db,$hashed_password). "'" ;
  $sql .= "WHERE id='" . $id ."'";
  $sql .= "LIMIT 1";
  

  //submit the query above to database
  $result = mysqli_query($db,$sql);

  //to check if there is an error in sql query
  confirm_result_set($result);

  if($result){
      return true;
  }
  else{
      echo mysqli_error($db);
      $db_disconnect($db);
      exit;
  }
}

?>
