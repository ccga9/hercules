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
            $this->mysqli = new mysqli($servername, $username, $password, $dbname);
        }
        
        //$this->usuarioDAO - new usuarioDAO();
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