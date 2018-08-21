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
include_once '../objects/enc_sat.php';

$database = new Database();
$db = $database->getConnection();
 //new comment 
$coment = new enc_sat($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));


// set coment property values
$coment->num_res1 = $data->num_res1;
$coment->num_res2 = $data->num_res2;
$coment->num_res3 = $data->num_res3;
$coment->num_res4 = $data->num_res4;
$coment->num_res5 = $data->num_res5;
$coment->num_res6 = $data->num_res6;
$coment->num_res7 = $data->num_res7;
$coment->id_alumno = $data->id_alumno;

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
