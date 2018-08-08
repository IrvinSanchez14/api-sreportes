<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// get database connection
include_once '../config/database.php';

// instantiate alumno object
include_once '../objects/alumnos.php';

$database = new Database();
$db = $database->getConnection();
 //new comment 
$alumno = new Alumnos($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

// set alumno property values
$alumno->nombre_alumno = $data->nombre_alumno;
$alumno->cif = $data->cif;
$alumno->id_facultad = $data->id_facultad;
$alumno->id_actividad = $data->id_actividad;

// create the alumno
if($alumno->create()){
    echo '{';
        echo '"message": "alumno was created."';
    echo '}';
}

// if unable to create the alumno, tell the user
else{
    echo '{';
        echo '"message": "Unable to create alumno."';
    echo '}';
}
?>
