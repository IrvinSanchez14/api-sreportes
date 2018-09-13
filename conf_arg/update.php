<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/conf_arg.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare product object
$product = new conf_arg($db);
 
// get id of product to be edited
$data = json_decode(file_get_contents("php://input"));
 
// set ID property of product to be edited
$product->id_alumno = $data->id_alumno;
 
// set product property values
$product->nombre_alumno = $data->nombre_alumno;
$product->cif = $data->cif;
$product->id_facultad = $data->id_facultad;
$product->email = $data->email;
$product->telefono = $data->telefono;
$product->facebook = $data->facebook;
$product->benf_adq = $data->benf_adq;
$product->opn_con = $data->opn_con;
$product->desc_est = $data->desc_est;
$product->asistencia = $data->asistencia;
$product->nombre_iglesia = $data->nombre_iglesia;
$product->valor = $data->valor; 


// update the product
if($product->update()){
    echo '{';
        echo '"message": "Product was updated."';
    echo '}';
}
 
// if unable to update the product, tell the user
else{
    echo '{';
        echo '"message": "Unable to update product."';
    echo '}';
}
?>