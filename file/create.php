<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// get database connection
include_once '../config/database.php';

// instantiate coment object
include_once '../objects/archivo.php';

$database = new Database();
$db = $database->getConnection();
 //new comment 
$coment = new archivos($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));


// set coment property values
$coment->nombre = $data->nombre;
$coment->size = $data->size;
$coment->tipo = $data->tipo;

// create the coment
if($coment->create()){
    echo '{';
        echo '"message": "coment was created."';
    echo '}';
}

// if unable to create the coment, tell the user
else{
    echo '{';
        echo '"message": "Unable to create coment."';
    echo '}';
}
?>
