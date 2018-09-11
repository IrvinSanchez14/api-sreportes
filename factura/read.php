<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/factura.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$alumnos = new factura($db);
 
// query products
$stmt = $alumnos->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $alumnos_arr=array();
    $alumnos_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $alumno_item=array(
            "id_alumno" => $id_alumno,
            "nombre_alumno" => $nombre_alumno,
            "cif" => $cif,
            "numero_factura" => $numero_factura,
            "nombre_fac" => $nombre_fac

        );
 
        array_push($alumnos_arr["records"], $row);
    }
 
    echo json_encode($alumnos_arr);
}
 
else{
    echo json_encode(
        array("message" => "No products found.")
    );
}
?>