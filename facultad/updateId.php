<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/facultad.php';
 

session_start();
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare product object
$product = new facultad($db);
 
// set ID property of product to be edited
$product->id_alumno = isset($_GET['id_alumno']) ? $_GET['id_alumno'] : die();
 
// read the details of product to be edited
$product->updateId();
 
// create array
$product_arr = array(
    "id_alumno" =>  $product->id_alumno,
    "nombre_alumno" =>  $product->nombre_alumno,
    "cif" =>  $product->cif,
    "id_facultad" =>  $product->id_facultad,
    "estado"=> $product->estado,
 
);
// make it json format
print_r(json_encode($product_arr));
?>