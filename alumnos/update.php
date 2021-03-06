<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/alumnos.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare product object
$product = new Alumnos($db);
 
// get id of product to be edited
$data = json_decode(file_get_contents("php://input"));
 
// set ID property of product to be edited
$product->id_alumno = $data->id_alumno;
 
// set product property values
$product->nombre_alumno = $data->nombre_alumno;
$product->cif = $data->cif;
$product->email = $data->email;
$product->telefono = $data->telefono;
$product->facebook = $data->facebook;
$product->expectativas = $data->expectativas;
$product->ideas = $data->ideas;
$product->asistencia = $data->asistencia;
$product->nombre_iglesia = $data->nombre_iglesia;
$product->anios_es = $data->anios_es;
 
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