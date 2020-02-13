<?php
//function that will validate contact details
function validateContact($contact_details){
    $errors= [];
            if(is_blank($contact_details['name'])){
                $errors[] = "Name cannot be blank";
            }
            if(is_blank($contact_details['email'])){
                $errors[] = "Email cannot be blank";
            }
            if(is_blank($contact_details['comments'])){
                $errors[] = "Message box cannot be blank";
            }
    return $errors;
}
//function that will insert contact details
function insertContact($contact_details){
    global $db;
  
        //query to submit to database
        $sql = "INSERT INTO contactus ";
        $sql .= "(name,email,comment)";
        $sql .= "VALUES (";
        $sql .= "'". db_escape($db,$contact_details['name']). "'," ;
        $sql .= "'". db_escape($db,$contact_details['email']). "'," ;
        $sql .= "'". db_escape($db,$contact_details['comments']). "'" ;
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
//function that validate order details
function validateOrder($order_details){
    $errors= [];
    if(is_blank($order_details['name'])){
        $errors[] = "Name cannot be blank";
    }
    if(is_blank($order_details['email'])){
        $errors[] = "Email cannot be blank";
    }
    if(is_blank($order_details['phonenumber'])){
        $errors[] = "Phone Number Cannot be blank";
    }
    if(is_blank($order_details['address'])){
        $errors[] = "Address Cannot be blank";
    }
    if(is_blank($order_details['quantity'])){
        $errors[] = "Quantity Cannot be blank";
    }
    if(is_blank($order_details['price'])){
        $errors[] = "Price Cannot be blank";
    }
    return $errors;

}

//function to Insert Order to database
function insertOrder($order_details){
    global $db;
  
    //query to submit to database
    $sql = "INSERT INTO orders ";
    $sql .= "(name,email,phonenumber,numberofquantity,price,address)";
    $sql .= "VALUES (";
    $sql .= "'". db_escape($db,$order_details['name']). "'," ;
    $sql .= "'". db_escape($db,$order_details['email']). "'," ;
    $sql .= "'". db_escape($db,$order_details['phonenumber']). "'," ;
    $sql .= "'". db_escape($db,$order_details['quantity']). "'," ;
    $sql .= "'". db_escape($db,$order_details['price']). "'," ;
    $sql .= "'". db_escape($db,$order_details['address']). "'" ;
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

function insertDetails($order){
    global $db;
  
    //query to submit to database
    $sql = "INSERT INTO details ";
    $sql .= "(title,content1,content2,content3,content4,price)";
    $sql .= "VALUES (";
    $sql .= "'". db_escape($db,$order['title']). "'," ;
    $sql .= "'". db_escape($db,$order['content_1']). "'," ;
    $sql .= "'". db_escape($db,$order['content_2']). "'," ;
    $sql .= "'". db_escape($db,$order['content_3']). "'," ;
    $sql .= "'". db_escape($db,$order['content_4']). "'," ;
    $sql .= "'". db_escape($db,$order['price']). "'" ;
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

function find_all_details(){
    global $db;
  
    $sql = "SELECT * FROM details ";
    $sql .= "ORDER BY id ASC";
    $order = mysqli_query($db, $sql);
    confirm_result_set($order);
    return $order;
}

function find_order_by_id($id){
    global $db;
  
    $sql = "SELECT * FROM details ";
    $sql .= "WHERE id='" . db_escape($db,$id) . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $order = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $order;

}
?>