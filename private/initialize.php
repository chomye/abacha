<?php 
// Turning The session on
session_start();


$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT", $doc_root);

//to be required in every page.
require("database.php");
require("functions.php");
require("validations.php");
require("query.php");
require("admin_query.php");
require("auth_functions.php");
$db = db_connect();

$errors=[];















?>