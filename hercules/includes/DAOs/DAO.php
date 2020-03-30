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
                printf("<hr>Error loading character set utf8 (Err. nº %d): %s\n<hr/>",  $this->mysqli->errno, $this->mysqli->error);
                exit();
            }
        }
        
    }
    
    public function ejecutarConsulta($sql){
        if($sql != ""){
            $consulta = $this->mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__-1));
            $tablaDatos = array();
            if ($consulta) {
                while ($fila = mysqli_fetch_assoc($consulta)){
                    array_push($tablaDatos, $fila);
                }
            }
            return $tablaDatos;
        } else{
            return 0;
        }
    }
    
    //Falta probar
    protected function buscar(){
        return $this->mysqli->query($query);
    }
    //Falta probar
    protected function insertar($query){
        return $this->mysqli->query($query);
    }
    
    //Falta probar
    protected function modificar($query){
        return $this->mysqli->query($query);
    }
    
    //Falta probar
    protected function consultar($query){
        return $this->mysqli->query($query);
    }
     
    //Falta probar
    protected function eliminar($query){
        return '';
    }
}

?>