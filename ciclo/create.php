<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// get database connection
include_once '../config/database.php';

// instantiate ciclo object
include_once '../objects/ciclo_actual.php';

$database = new Database();
$db = $database->getConnection();
 //new comment 
$ciclo = new ciclo($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

// set ciclo property values
$ciclo->valor = $data->valor;
$ciclo->id_actividad = $data->id_actividad;
$ciclo->id_alumno = $data->id_alumno;

// create the ciclo
if($ciclo->create()){
    echo '{';
        echo '"message": "ciclo was created."';
    echo '}';
}

// if unable to create the ciclo, tell the user
else{
    echo '{';
        echo '"message": "Unable to create ciclo."';
    echo '}';
}
?>
