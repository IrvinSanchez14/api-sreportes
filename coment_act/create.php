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
include_once '../objects/coment_act.php';

$database = new Database();
$db = $database->getConnection();
 //new comment 
$coment = new coment_act($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

// set coment property values
$coment->id_alumno = $data->id_alumno;
$coment->id_actividad = $data->id_actividad;
$coment->expectativas = $data->expectativas;
$coment->ideas = $data->ideas;

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
