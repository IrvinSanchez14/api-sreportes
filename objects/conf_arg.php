<?php
class conf_arg{
 
    // database connection and table name
    private $conn;
    private $table_name = "conf_arg";
 
    // object properties
    public $benf_adq;
    public $opn_con;
    public $desc_est;
    public $id_alumno;
 
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
            conf_arg t2 on t1.id_alumno=t2.id_alumno
        INNER JOIN
            facultad t3 on t1.id_facultad=t3.id_facultad
        WHERE
            t1.id_actividad = 4
        GROUP BY
            t1.id_facultad";
 
        // prepare query statement
        $stmt = $this->conn->prepare($query);
 
        // execute query
        $stmt->execute();
 
        return $stmt;
    }

    function tableConf() {

        $query = "SELECT
            t1.id_alumno as id, t1.nombre_alumno, t1.cif, t5.valor, t2.email, t2.telefono,
            t6.nombre_fac, t2.facebook, t3.benf_adq, t4.asistencia, t4.nombre_iglesia, 
            t3.opn_con, t3.desc_est,t1.id_facultad
        FROM 
            alumnos t1
        INNER JOIN 
            alum_extra t2 on t1.id_alumno=t2.id_alumno
        INNER JOIN 
            " . $this->table_name . "  t3 on t1.id_alumno=t3.id_alumno
        INNER JOIN 
            iglesia_est t4 on t1.id_alumno=t4.id_alumno
        INNER JOIN 
            ciclo t5 on t1.id_alumno=t5.id_alumno
        INNER JOIN 
            facultad t6 on t1.id_facultad=t6.id_facultad
        WHERE 
            t1.estado=0
        GROUP BY 
            t1.id_alumno
        ORDER BY 
            t1.id_alumno ASC";
        
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
                benf_adq=:benf_adq, opn_con=:opn_con, desc_est=:desc_est, id_alumno=:id_alumno";
 
        // prepare query
        $stmt = $this->conn->prepare($query);
 
        // sanitize
        $this->benf_adq=htmlspecialchars(strip_tags($this->benf_adq));
        $this->opn_con=htmlspecialchars(strip_tags($this->opn_con));
        $this->desc_est=htmlspecialchars(strip_tags($this->desc_est));
        $this->id_alumno=htmlspecialchars(strip_tags($this->id_alumno));
 
        // bind values
        $stmt->bindParam(":benf_adq", $this->benf_adq);
        $stmt->bindParam(":opn_con", $this->opn_con);
        $stmt->bindParam(":desc_est", $this->desc_est);
        $stmt->bindParam(":id_alumno", $this->id_alumno);
 
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
    alumnos t1, alum_extra t2, conf_arg t3, iglesia_est t4, ciclo t5
SET
    t1.nombre_alumno = :nombre_alumno,
    t1.cif = :cif,
    t1.id_facultad = :id_facultad,
    t2.email = :email,
    t2.telefono = :telefono,
    t2.facebook = :facebook,
    t3.benf_adq = :benf_adq,
    t3.opn_con = :opn_con,
    t3.desc_est = :desc_est,
    t4.asistencia = :asistencia,
    t4.nombre_iglesia = :nombre_iglesia,
    t5.valor = :valor
WHERE
t1.id_alumno=t2.id_alumno AND t1.id_alumno=t3.id_alumno
     AND t1.id_alumno=t4.id_alumno AND t1.id_alumno=t5.id_alumno AND t1.id_alumno = :id_alumno";
                        
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->nombre_alumno=htmlspecialchars(strip_tags($this->nombre_alumno));
    $this->cif=htmlspecialchars(strip_tags($this->cif));
    $this->id_facultad=htmlspecialchars(strip_tags($this->id_facultad));
    $this->email=htmlspecialchars(strip_tags($this->email));
    $this->telefono=htmlspecialchars(strip_tags($this->telefono));
    $this->facebook=htmlspecialchars(strip_tags($this->facebook));
    $this->benf_adq=htmlspecialchars(strip_tags($this->benf_adq));
    $this->opn_con=htmlspecialchars(strip_tags($this->opn_con));
    $this->desc_est=htmlspecialchars(strip_tags($this->desc_est));
    $this->asistencia=htmlspecialchars(strip_tags($this->asistencia));
    $this->nombre_iglesia=htmlspecialchars(strip_tags($this->nombre_iglesia));
    $this->valor=htmlspecialchars(strip_tags($this->valor));
    $this->id_alumno=htmlspecialchars(strip_tags($this->id_alumno));
 
    // bind new values
    $stmt->bindParam(':nombre_alumno', $this->nombre_alumno);
    $stmt->bindParam(':cif', $this->cif);
    $stmt->bindParam(':id_facultad', $this->id_facultad);
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':telefono', $this->telefono);
    $stmt->bindParam(':facebook', $this->facebook);
    $stmt->bindParam(':benf_adq', $this->benf_adq);
    $stmt->bindParam(':opn_con', $this->opn_con);
    $stmt->bindParam(':desc_est', $this->desc_est);
    $stmt->bindParam(':asistencia', $this->asistencia);
    $stmt->bindParam(':nombre_iglesia', $this->nombre_iglesia);
    $stmt->bindParam(':valor', $this->valor);
    $stmt->bindParam(':id_alumno', $this->id_alumno);
 
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

    function readId() {
 
            // select all query
            $query = "SELECT
            t1.id_alumno, t1.nombre_alumno, t1.cif, t5.valor, t2.email, t2.telefono,
            t6.nombre_fac, t2.facebook, t3.benf_adq, t4.asistencia, t4.nombre_iglesia, 
            t3.opn_con, t3.desc_est,t1.id_facultad
        FROM 
            alumnos t1
        INNER JOIN 
            alum_extra t2 on t1.id_alumno=t2.id_alumno
        INNER JOIN 
            conf_arg  t3 on t1.id_alumno=t3.id_alumno
        INNER JOIN 
            iglesia_est t4 on t1.id_alumno=t4.id_alumno
        INNER JOIN 
            ciclo t5 on t1.id_alumno=t5.id_alumno
        INNER JOIN 
            facultad t6 on t1.id_facultad=t6.id_facultad
        WHERE 
            t1.estado=0 AND t1.id_alumno = ?
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
            $this->email = $row['email'];
            $this->telefono = $row['telefono'];
            $this->facebook = $row['facebook'];
            $this->benf_adq = $row['benf_adq'];
            $this->asistencia = $row['asistencia'];
            $this->nombre_iglesia = $row['nombre_iglesia'];
            $this->id_facultad = $row['id_facultad'];
            $this->opn_con = $row['opn_con'];
            $this->desc_est = $row['desc_est'];

    }

    
    function deleteid () {

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