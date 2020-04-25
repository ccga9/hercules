<?php

class DAO {
    private $servername = "localhost";
    private $username = "hercules";
    private $password = "iG8hC62acnPrvIeU";
    private $dbname = "hercules";
    
    private $mysqli = null;
    
    public function __construct(){
        if(!$this->mysqli){
            //Crear conexion base de datos
            $this->mysqli = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            if ( $this->mysqli->connect_errno) {
                echo "Fallo al conectar a MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error ;
            }
            
            if(!$this->mysqli->set_charset("utf8")) {
                printf("<hr>Error loading character set utf8 (Err. n� %d): %s\n<hr/>",  $this->mysqli->errno, $this->mysqli->error);
                exit();
            }
        }
        
    }
    
    protected function consultarv2($sql){
        if ($sql != "") {
            $consulta = $this->mysqli->query($sql) or die ($this->mysqli->error. " en la linea ".(__LINE__-1));
            $tablaDatos = array();
            if (substr($sql, 0, 6) == "SELECT") {
                if ($consulta) {
                    while ($fila = mysqli_fetch_assoc($consulta)){
                        array_push($tablaDatos, $fila);
                    }
                }
            }
            return $tablaDatos; 
        }
        else {
            return 0;
        }
    }
    
    protected function consultar($sql){
        return $this->mysqli->query($sql);
    }
 
}

?>