<?php
class coment_act{
 
    // database connection and table name
    private $conn;
    private $table_name = "coment_act";
 
    // object properties
    public $id_alumno;
    public $id_actividad;
    public $expectativas;
    public $ideas;
    public $nombre_fac;
    public $numero;
 
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

    function readChar(){
 
        // select all query
        $query = "SELECT
                    t3.nombre_fac, COUNT(t1.id_facultad) as numero
        FROM
            alumnos t1
        INNER JOIN
            coment_act t2 on t1.id_alumno=t2.id_alumno
        INNER JOIN
            facultad t3 on t1.id_facultad=t3.id_facultad
        WHERE
            t1.id_actividad = 1
        GROUP BY
            t1.id_facultad";
 
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
                id_alumno=:id_alumno, id_actividad=:id_actividad, expectativas=:expectativas, ideas=:ideas;";
 
        // prepare query
        $stmt = $this->conn->prepare($query);
 
        // sanitize
        $this->id_alumno=htmlspecialchars(strip_tags($this->id_alumno));
        $this->id_actividad=htmlspecialchars(strip_tags($this->id_actividad));
        $this->expectativas=htmlspecialchars(strip_tags($this->expectativas));
        $this->ideas=htmlspecialchars(strip_tags($this->ideas));
 
        // bind values
        $stmt->bindParam(":id_alumno", $this->id_alumno);
        $stmt->bindParam(":id_actividad", $this->id_actividad);
        $stmt->bindParam(":expectativas", $this->expectativas);
        $stmt->bindParam(":ideas", $this->ideas);
 
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

}