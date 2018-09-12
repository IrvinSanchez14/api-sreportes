<?php
class archivos{
 
    // database connection and table name
    private $conn;
    private $table_name = "archivos";
 
    // object properties
    public $id_archivo;
    public $nombre;
    public $size;
    public $tipo;
    public $fecha;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read products
    function read(){
 
        // select all query
        $query = "SELECT
                    t1.id_archivo as id, t1.nombre, ROUND(SUM(t1.size / 1048576),2) as size, date(t1.fecha) as fecha
        FROM 
            archivos t1
        WHERE
            t1.estado = 0
        GROUP BY 
            t1.id_archivo";
 
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
                nombre=:nombre, size=:size, tipo=:tipo";
 
        // prepare query
        $stmt = $this->conn->prepare($query);
 
        // sanitize
        $this->nombre=htmlspecialchars(strip_tags($this->nombre));
        $this->size=htmlspecialchars(strip_tags($this->size));
        $this->tipo=htmlspecialchars(strip_tags($this->tipo));
 
        // bind values
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":size", $this->size);
        $stmt->bindParam(":tipo", $this->tipo);
 
        // execute query
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    // used when filling up the update product form
function readLastId(){
 
    // query to read single record
    $query = "SELECT
                id_alumno as id, p.nombre_alumno as nombre_alumno
            FROM
                " . $this->table_name . " p
            ORDER BY id_alumno 

            DESC LIMIT 1";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
 
    // execute query
    $stmt->execute();

    return $stmt;
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
function search($keywords){
 
    // select all query
    $query = "SELECT
                c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    categories c
                        ON p.category_id = c.id
            WHERE
                p.name LIKE ? OR p.description LIKE ? OR c.name LIKE ?
            ORDER BY
                p.created DESC";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $keywords=htmlspecialchars(strip_tags($keywords));
    $keywords = "%{$keywords}%";
 
    // bind
    $stmt->bindParam(1, $keywords);
    $stmt->bindParam(2, $keywords);
    $stmt->bindParam(3, $keywords);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
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

function deleteArchivo() {

    $query = "UPDATE
            archivos
        SET
            estado = 1
        WHERE
            id_archivo = :id_archivo";

    // prepare query statement
    $stmt = $this->conn->prepare($query);

    $this->id_archivo=htmlspecialchars(strip_tags($this->id_archivo));

    $stmt->bindParam(':id_archivo', $this->id_archivo);

    // execute the query
    if ($stmt->execute()){
        return true;
    }else{
        return false;
    }

}

}