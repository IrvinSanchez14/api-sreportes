<?php 
class Alumnos{
 
    // database connection and table name
    private $conn;
    private $table_name = "alumnos";
 
    // object properties
    public $id;
    public $id_alumno;
    public $nombre_alumno;
    public $cif;
    public $id_facultad;
    public $id_actividad;
 
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

    function bEspecial() {
        $query = "  SELECT 
                        t1.id_alumno as id,  t1.nombre_alumno, t1.cif, EXTRACT(YEAR from t1.fecha) as fecha, t2.email, t2.telefono, t2.facebook, t3.expectativas, t3.ideas, t4.asistencia, t4.nombre_iglesia, t4.anios_es, t5.nombre_fac
            FROM 
                " . $this ->table_name . " t1
            INNER JOIN 
                alum_extra t2 on t1.id_alumno=t2.id_alumno
            INNER JOIN 
                coment_act t3 on t1.id_alumno=t3.id_alumno
            INNER JOIN 
                iglesia_est t4 on t1.id_alumno= t4.id_alumno
            INNER JOIN
            	 facultad t5 on t1.id_facultad = t5.id_facultad
            WHERE
                t1.estado = 0 and t1.id_actividad = 1
            GROUP BY 
                t1.id_alumno
            ORDER BY 
                t1.id_alumno ASC";

        $stmt = $this->conn->prepare($query);

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
            factura t2 on t1.id_alumno=t2.id_alumno
        INNER JOIN
            facultad t3 on t1.id_facultad=t3.id_facultad
        WHERE
            t1.id_actividad = 2 AND t1.estado=0
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
                nombre_alumno=:nombre_alumno, cif=:cif, id_facultad=:id_facultad, id_actividad=:id_actividad;";
 
        // prepare query
        $stmt = $this->conn->prepare($query);
 
        // sanitize
        $this->nombre_alumno=htmlspecialchars(strip_tags($this->nombre_alumno));
        $this->cif=htmlspecialchars(strip_tags($this->cif));
        $this->id_facultad=htmlspecialchars(strip_tags($this->id_facultad));
        $this->id_actividad=htmlspecialchars(strip_tags($this->id_actividad));
 
        // bind values
        $stmt->bindParam(":nombre_alumno", $this->nombre_alumno);
        $stmt->bindParam(":cif", $this->cif);
        $stmt->bindParam(":id_facultad", $this->id_facultad);
        $stmt->bindParam(":id_actividad", $this->id_actividad);
 
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
                alumnos t1, alum_extra t2, iglesia_est t4, coment_act t3
            SET
                t1.nombre_alumno = :nombre_alumno,
                t1.cif = :cif,
                t2.email = :email,
                t2.telefono = :telefono,
                t2.facebook = :facebook,
                t3.expectativas = :expectativas,
                t3.ideas = :ideas,
                t4.asistencia = :asistencia,
                t4.nombre_iglesia = :nombre_iglesia,
                t4.anios_es = :anios_es
            WHERE
                t1.id_alumno=t2.id_alumno AND t1.id_alumno=t3.id_alumno AND 
                t1.id_alumno=t4.id_alumno AND t1.id_alumno = :id_alumno";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->nombre_alumno=htmlspecialchars(strip_tags($this->nombre_alumno));
    $this->cif=htmlspecialchars(strip_tags($this->cif));
    $this->email=htmlspecialchars(strip_tags($this->email));
    $this->telefono=htmlspecialchars(strip_tags($this->telefono));
    $this->facebook=htmlspecialchars(strip_tags($this->facebook));
    $this->expectativas=htmlspecialchars(strip_tags($this->expectativas));
    $this->ideas=htmlspecialchars(strip_tags($this->ideas));
    $this->asistencia=htmlspecialchars(strip_tags($this->asistencia));
    $this->nombre_iglesia=htmlspecialchars(strip_tags($this->nombre_iglesia));
    $this->anios_es=htmlspecialchars(strip_tags($this->anios_es));
    $this->id_alumno=htmlspecialchars(strip_tags($this->id_alumno));
 
    // bind new values
    $stmt->bindParam(':nombre_alumno', $this->nombre_alumno);
    $stmt->bindParam(':cif', $this->cif);
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':telefono', $this->telefono);
    $stmt->bindParam(':facebook', $this->facebook);
    $stmt->bindParam(':expectativas', $this->expectativas);
    $stmt->bindParam(':ideas', $this->ideas);
    $stmt->bindParam(':asistencia', $this->asistencia);
    $stmt->bindParam(':nombre_iglesia', $this->nombre_iglesia);
    $stmt->bindParam(':anios_es', $this->anios_es);
    $stmt->bindParam(':id_alumno', $this->id_alumno);
 
    // execute the query
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }
}

function updateFactura () {

     // update query
     $query = " UPDATE
                    alumnos t1, factura t2
                SET
                    t1.nombre_alumno = :nombre_alumno,
                    t1.cif = :cif,
                    t1.id_facultad = :id_facultad,
                    t2.numero_factura = :numero_factura
                WHERE
                t1.id_alumno=t2.id_alumno AND t1.id_alumno = :id_alumno";

    // prepare query statement
    $stmt = $this->conn->prepare($query);

    // sanitize
    $this->nombre_alumno=htmlspecialchars(strip_tags($this->nombre_alumno));
    $this->cif=htmlspecialchars(strip_tags($this->cif));
    $this->id_facultad=htmlspecialchars(strip_tags($this->id_facultad));
    $this->numero_factura=htmlspecialchars(strip_tags($this->numero_factura));
    $this->id_alumno=htmlspecialchars(strip_tags($this->id_alumno));

    // bind new values
    $stmt->bindParam(':nombre_alumno', $this->nombre_alumno);
    $stmt->bindParam(':cif', $this->cif);
    $stmt->bindParam(':id_facultad', $this->id_facultad);
    $stmt->bindParam(':numero_factura', $this->numero_factura);
    $stmt->bindParam(':id_alumno', $this->id_alumno);

    // execute the query
    if  ($stmt->execute())  {
        return true;    
    } else    {
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

function editDataOne(){
 
    // select all query
    $query = "SELECT t1.id_alumno,  t1.nombre_alumno, t1.cif, EXTRACT(YEAR from t1.fecha) as fecha, t2.email, t2.telefono, t2.facebook, t3.expectativas, t3.ideas, t4.asistencia, t4.nombre_iglesia, t4.anios_es, t1.id_facultad
    FROM alumnos t1
    INNER JOIN alum_extra t2 on t1.id_alumno=t2.id_alumno
    INNER JOIN coment_act t3 on t1.id_alumno=t3.id_alumno
    INNER JOIN iglesia_est t4 on t1.id_alumno= t4.id_alumno
    WHERE t1.id_alumno = ?
        GROUP BY t1.id_alumno
        ORDER BY t1.id_alumno ASC";
 
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
    $this->fecha = $row['fecha'];
    $this->email = $row['email'];
    $this->telefono = $row['telefono'];
    $this->facebook = $row['facebook'];
    $this->expectativas = $row['expectativas'];
    $this->ideas = $row['ideas'];
    $this->asistencia = $row['asistencia'];
    $this->nombre_iglesia = $row['nombre_iglesia'];
    $this->anios_es = $row['anios_es'];
    $this->id_facultad = $row['id_facultad'];
}

function editAmazing () {

    $query = "  SELECT 
                    t1.id_alumno,  t1.nombre_alumno, t1.cif, t1.id_facultad, t2.numero_factura
                FROM 
                    alumnos t1
                INNER JOIN 
                    factura t2 on t1.id_alumno=t2.id_alumno
                WHERE 
                    t1.id_alumno = ?
                GROUP BY 
                    t1.id_alumno
                ORDER BY 
                    t1.id_alumno ASC";
 
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
    $this->numero_factura = $row['numero_factura'];

}

    function deleteId () {

        $query = "UPDATE
                alumnos t1, alum_extra t2, iglesia_est t4, coment_act t3
            SET
                t1.estado = 1
            WHERE
                t1.id_alumno=t2.id_alumno AND t1.id_alumno=t3.id_alumno AND 
                t1.id_alumno=t4.id_alumno AND t1.id_alumno = :id_alumno";
 
        // prepare query statement
        $stmt = $this->conn->prepare($query);

        $this->id_alumno=htmlspecialchars(strip_tags($this->id_alumno));

        $stmt->bindParam(':id_alumno', $this->id_alumno);
 
        // execute the query
        if ($stmt->execute()){
            return true;
        }else{
            return false;
        }

    }

    function deleteFactura () {

        $query = "UPDATE
                alumnos t1, factura t2
            SET
                t1.estado = 1
            WHERE
                t1.id_alumno=t2.id_alumno AND t1.id_alumno = :id_alumno";
 
        // prepare query statement
        $stmt = $this->conn->prepare($query);

        $this->id_alumno=htmlspecialchars(strip_tags($this->id_alumno));

        $stmt->bindParam(':id_alumno', $this->id_alumno);
 
        // execute the query
        if ($stmt->execute()){
            return true;
        }else{
            return false;
        }

    }

    function deleteNice () {
        $query = "UPDATE
                        alumnos t1
                    SET
                        t1.estado = 1
                    WHERE
                        t1.id_alumno = :id_alumno";

                // prepare query statement
                $stmt = $this->conn->prepare($query);

                $this->id_alumno=htmlspecialchars(strip_tags($this->id_alumno));

                $stmt->bindParam(':id_alumno', $this->id_alumno);

                // execute the query
                if ($stmt->execute()){
                    return true;
                }else{
                    return false;
                }
    }

}