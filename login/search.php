<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/login.php';
 

session_start();
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare product object
$product = new Login($db);
 
// set ID property of product to be edited
$product->username = isset($_GET['username']) ? $_GET['username'] : die();
$product->pass = isset($_GET['pass']) ? $_GET['pass'] : die();
 
// read the details of product to be edited
$product->search();
 
// create array
$product_arr = array(
    "id_login" =>  $product->id_login
 
);

$_SESSION['rol'] = $product_arr['id_login'];
 
// make it json format
print_r(json_encode($_SESSION['rol']));
?>