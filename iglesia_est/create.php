<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// get database connection
include_once '../config/database.php';

// instantiate iglesia object
include_once '../objects/iglesia_est.php';

$database = new Database();
$db = $database->getConnection();
 //new comment 
$iglesia = new iglesia_est($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

// set iglesia property values
$iglesia->id_alumno = $data->id_alumno;
$iglesia->asistencia = $data->asistencia;
$iglesia->nombre_iglesia = $data->nombre_iglesia;
$iglesia->anios_es = $data->anios_es;

// create the iglesia
if($iglesia->create()){
    echo '{';
        echo '"message": "iglesia was created."';
    echo '}';
}

// if unable to create the iglesia, tell the user
else{
    echo '{';
        echo '"message": "Unable to create iglesia."';
    echo '}';
}
?>
