<?php
class enc_sat{
 
    // database connection and table name
    private $conn;
    private $table_name = "enc_sat";
 
    // object properties
    public $id;
    public $num_res1;
    public $num_res2;
    public $num_res3;
    public $num_res4;
    public $num_res5;
    public $num_res6;
    public $num_res7;
    public $id_alumno;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read products
    function read(){
 
        // select all query
        $query = "SELECT
               p. id_almex as id, p.email as email, p.telefono as telefono, p.facebook as facebook, p.id_alumno as ida
            FROM
                " . $this->table_name . " p
            ORDER BY
                p.id_almex DESC";
 
        // prepare query statement
        $stmt = $this->conn->prepare($query);
 
        // execute query
        $stmt->execute();
 
        return $stmt;
    }

    function tableEnc() {

        $query = "SELECT t1.id_alumno as id, t1.nombre_alumno, t1.cif, t1.fecha, t3.nombre_fac, t2.num_res1, t2.num_res2, t2.num_res3, t2.num_res4, t2.num_res5, t2.num_res6, t2.num_res7
        FROM alumnos t1
            inner join  " . $this->table_name . " t2 on t1.id_alumno=t2.id_alumno
            LEFT JOIN facultad t3 on t1.id_facultad=t3.id_facultad
                    group by t1.id_alumno
                order by t1.id_alumno ASC";

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
                num_res1=:num_res1, num_res2=:num_res2, num_res3=:num_res3, num_res4=:num_res4, num_res5=:num_res5, num_res6=:num_res6, num_res7=:num_res7, id_alumno=:id_alumno";
 
        // prepare query
        $stmt = $this->conn->prepare($query);
 
        // sanitize
        $this->num_res1=htmlspecialchars(strip_tags($this->num_res1));
        $this->num_res2=htmlspecialchars(strip_tags($this->num_res2));
        $this->num_res3=htmlspecialchars(strip_tags($this->num_res3));
        $this->num_res4=htmlspecialchars(strip_tags($this->num_res4));
        $this->num_res5=htmlspecialchars(strip_tags($this->num_res5));
        $this->num_res6=htmlspecialchars(strip_tags($this->num_res6));
        $this->num_res7=htmlspecialchars(strip_tags($this->num_res7));
        $this->id_alumno=htmlspecialchars(strip_tags($this->id_alumno));
 
        // bind values
        $stmt->bindParam(":num_res1", $this->num_res1);
        $stmt->bindParam(":num_res2", $this->num_res2);
        $stmt->bindParam(":num_res3", $this->num_res3);
        $stmt->bindParam(":num_res4", $this->num_res4);
        $stmt->bindParam(":num_res5", $this->num_res5);
        $stmt->bindParam(":num_res6", $this->num_res6);
        $stmt->bindParam(":num_res7", $this->num_res7);
        $stmt->bindParam(":id_alumno", $this->id_alumno);
 
        // execute query
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    // used when filling up the update product form
function readOne(){
 
    // query to read single record
    $query = "SELECT
                c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    categories c
                        ON p.category_id = c.id
            WHERE
                p.id = ?
            LIMIT
                0,1";
 
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind id of product to be updated
    $stmt->bindParam(1, $this->id);
 
    // execute query
    $stmt->execute();
 
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    // set values to object properties
    $this->name = $row['name'];
    $this->price = $row['price'];
    $this->description = $row['description'];
    $this->category_id = $row['category_id'];
    $this->category_name = $row['category_name'];
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