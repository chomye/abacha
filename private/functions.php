<?php 
function h($string=""){
    return htmlspecialchars($string);
}

function redirect_to($location){
    header('location:' . $location);
}
function is_post_request(){
    return $_SERVER["REQUEST_METHOD"] == "POST";
}
function is_get_request(){
    return $_SERVER["REQUEST_METHOD"] == "GET";
}
function url_for($script_part){
   if($script_part[0] != '/'){
    $script_part = "/" . $script_part;
   }
   return WWW_ROOT . $script_part;
}




?>