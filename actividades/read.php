<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/actividades.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$actividad = new Actividades($db);
 
// query products
$stmt = $actividad->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $actividad_arr=array();
    $actividad_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $actividad_item=array(
            "id_actividad" => $id,
            "nombre_actividad" => $name,
            "estado" => $estado,
            "fecha" => $fecha
        );
 
        array_push($actividad_arr["records"], $actividad_item);
    }
 
    echo json_encode($actividad_arr);
}
 
else{
    echo json_encode(
        array("message" => "No products found.")
    );
}
?>