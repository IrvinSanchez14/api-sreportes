<?php
class Login{
 
    // database connection and table name
    private $conn;
    private $table_name = "login";
 
    // object properties
    public $id_login;
    public $username;
    public $pass;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read products
    function read(){
 
        // select all query
        $query = "SELECT
               p. id_alumno as id, p.nombre_alumno as nombre_alumno, p.CIF as cif
            FROM
                " . $this->table_name . " p
            ORDER BY
                p.id_alumno DESC";
 
        // prepare query statement
        $stmt = $this->conn->prepare($query);
 
        // execute query
        $stmt->execute();
 
        return $stmt;
    }

    // create product
    function create(){
 
        // query to insert record
        $query = "INSERT INTO
                " . $this->table_name . "
            SET
                id_alumno=:id_alumno, asistencia=:asistencia, nombre_iglesia=:nombre_iglesia, anios_es=:anios_es;";
 
        // prepare query
        $stmt = $this->conn->prepare($query);
 
        // sanitize
        $this->id_alumno=htmlspecialchars(strip_tags($this->id_alumno));
        $this->asistencia=htmlspecialchars(strip_tags($this->asistencia));
        $this->nombre_iglesia=htmlspecialchars(strip_tags($this->nombre_iglesia));
        $this->anios_es=htmlspecialchars(strip_tags($this->anios_es));
 
        // bind values
        $stmt->bindParam(":id_alumno", $this->id_alumno);
        $stmt->bindParam(":asistencia", $this->asistencia);
        $stmt->bindParam(":nombre_iglesia", $this->nombre_iglesia);
        $stmt->bindParam(":anios_es", $this->anios_es);
 
        // execute query
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

// update the product
function update(){
 
    // update query
    $query = "UPDATE
                " . $this->table_name . "
            SET
                name = :name,
                price = :price,
                description = :description,
                category_id = :category_id
            WHERE
                id = :id";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->price=htmlspecialchars(strip_tags($this->price));
    $this->description=htmlspecialchars(strip_tags($this->description));
    $this->category_id=htmlspecialchars(strip_tags($this->category_id));
    $this->id=htmlspecialchars(strip_tags($this->id));
 
    // bind new values
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':price', $this->price);
    $stmt->bindParam(':description', $this->description);
    $stmt->bindParam(':category_id', $this->category_id);
    $stmt->bindParam(':id', $this->id);
 
    // execute the query
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }
}

// delete the product
function delete(){
 
    // delete query
    $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->id=htmlspecialchars(strip_tags($this->id));
 
    // bind id of record to delete
    $stmt->bindParam(1, $this->id);
 
    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}

// search products
function search(){
 
    // select all query
    $query = "SELECT
    p.id_login, p.username, p.pass, p.estado, p.fecha, p.id_rol
    FROM
    " . $this->table_name . " p
    WHERE
        p.username LIKE ? AND p.pass LIKE ? 
    ORDER BY
        p.username DESC";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind id of product to be updated
    $stmt->bindParam(1, $this->username);
    $stmt->bindParam(2, $this->pass);
 
    // execute query
    $stmt->execute();
 
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    // set values to object properties
    $this->id_login = $row['id_login'];
    $this->username = $row['username'];
    $this->pass = $row['pass'];
    $this->estado = $row['estado'];
    $this->id_rol = $row['id_rol'];
}

// read products with pagination
public function readPaging($from_record_num, $records_per_page){
 
    // select query
    $query = "SELECT
                c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    categories c
                        ON p.category_id = c.id
            ORDER BY p.created DESC
            LIMIT ?, ?";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind variable values
    $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
    $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);
 
    // execute query
    $stmt->execute();
 
    // return values from database
    return $stmt;
}

// used for paging products
public function count(){
    $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "";
 
    $stmt = $this->conn->prepare( $query );
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    return $row['total_rows'];
}

}