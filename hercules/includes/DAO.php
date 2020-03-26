<?php


class DAO {
    private $servername = "localhost";
    private $username = "hercules";
    private $password = "iG8hC62acnPrvIeU";
    private $dbname = "hercules";
    
    public $mysqli;
    private $usuarioDAO;
    
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
            
            ini_set('default_charset', 'UTF-8');
        }
        
    }
    
    public function ejecutarConsulta($sql){
        if($sql != ""){
            $consulta = $this->mysqli->query($sql) or die ($mysqli->error. " en la línea ".(__LINE__-1));
            $tablaDatos = array();
            while ($fila = mysqli_fetch_assoc($consulta)){
                array_push($tablaDatos, $fila);
            }
            return $tablaDatos;
        } else{
            return 0;
        }
    }
    
    //Falta probar
    public function buscar(){
        return $this->usuarioDAO->buscarUsuario();
    }
    //Falta probar
    public function insertar($query){
        $this->mysqli->query($query);
    }
    
    //Falta probar
    public function modificar($query){
        $this->mysqli->query($query);
    }
    
    //Falta probar
    public function consultar($query){
        return $this->mysqli->query($query);
    }
     
    //Falta probar
    public function eliminar($query){
        return $this->mysqli->query($query);
    }
}

?>