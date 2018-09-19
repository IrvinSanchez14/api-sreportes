<?php
class Facultad{
 
    // database connection and table name
    private $conn;
    private $table_name = "facultad";
 
    // object properties
    public $id;
    public $name;
    public $estado;
    public $fecha;
    /*
    public $category_id;
    public $category_name;
    public $created;*/
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read products
    function read(){
 
        // select all query
        $query = "SELECT
               p. id_facultad as id, p.nombre_fac as name, p.estado as estado, p.fecha as fecha
            FROM
                " . $this->table_name . " p
            ORDER BY
                p.id_facultad DESC";
 
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
            facultad t3 on t1.id_facultad=t3.id_facultad
        WHERE
            t1.id_actividad = 3
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
                name=:name, price=:price, description=:description, category_id=:category_id, created=:created";
 
        // prepare query
        $stmt = $this->conn->prepare($query);
 
        // sanitize
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->price=htmlspecialchars(strip_tags($this->price));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->category_id=htmlspecialchars(strip_tags($this->category_id));
        $this->created=htmlspecialchars(strip_tags($this->created));
 
        // bind values
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":category_id", $this->category_id);
        $stmt->bindParam(":created", $this->created);
 
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

function tablaNice () {
    // select all query
    $query = "  SELECT 
	                t1.id_alumno, t1.nombre_alumno, t1.cif, t2.nombre_fac, if(t1.estado = 1, 'Inactivo', 'Activo')as estado
	            FROM 
		            alumnos t1
	            INNER JOIN 
		            facultad t2 on t1.id_facultad = t2.id_facultad 
	            WHERE
		            t1.id_actividad = 3
	            ORDER BY
		            t1.id_alumno DESC";

    // prepare query statement
    $stmt = $this->conn->prepare($query);

    // execute query
    $stmt->execute();

    return $stmt;
}

    function updateId () {
        $query = "  SELECT 
                        t1.id_alumno,  t1.nombre_alumno, t1.cif, t1.id_facultad
                    FROM 
                        alumnos t1
                    WHERE 
                        t1.id_alumno = ? AND t1.id_actividad = 3
                    GROUP BY 
                        t1.id_alumno";

                // prepare query statement
                $stmt = $this->conn->prepare( $query );

                // bind id of product to be updated
                $stmt->bindParam(1, $this->id_alumno);

                // execute query
                $stmt->execute();

                // get retrieved row
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                // set values to object properties
                $this->id_alumno = $row['id_alumno'];
                $this->nombre_alumno = $row['nombre_alumno'];
                $this->cif = $row['cif'];
                $this->id_facultad = $row['id_facultad'];
    }

    function saveUpdate () {
             // update query
     $query = " UPDATE
                    alumnos t1
                SET
                    t1.nombre_alumno = :nombre_alumno,
                    t1.cif = :cif,
                    t1.id_facultad = :id_facultad
                WHERE
                    t1.id_alumno = :id_alumno";

                // prepare query statement
                $stmt = $this->conn->prepare($query);

                // sanitize
                $this->nombre_alumno=htmlspecialchars(strip_tags($this->nombre_alumno));
                $this->cif=htmlspecialchars(strip_tags($this->cif));
                $this->id_facultad=htmlspecialchars(strip_tags($this->id_facultad));
                $this->id_alumno=htmlspecialchars(strip_tags($this->id_alumno));

                // bind new values
                $stmt->bindParam(':nombre_alumno', $this->nombre_alumno);
                $stmt->bindParam(':cif', $this->cif);
                $stmt->bindParam(':id_facultad', $this->id_facultad);
                $stmt->bindParam(':id_alumno', $this->id_alumno);

                // execute the query
                if  ($stmt->execute())  {
                return true;    
                } else    {
                return false;
                }
                    }


}