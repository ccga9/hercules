<?php 

class aplicacion {
    private static $instance = null;
    private $datos_bd;
    private $iniciado = false;
    private $conn;

    private function __construct(){}

    public static function getInstance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function init($datosBD) {
    	if (!$this->iniciado) {
    		$this->datos_bd = $datosBD;
    		$this->iniciado = true;
    	}
    }

    public function conexionBD() {
    	if ($this->iniciado) {
    		if (!$this->conn) {
    			$host = $this->datos_bd['host'];
    			$bd = $this->datos_bd['bd'];
    			$user = $this->datos_bd['user'];
    			$pass = $this->datos_bd['pass'];

    			$this->conn= new mysqli($host, $user, $pass, $bd);
    			if ( $this->conn->connect_errno ) {
					echo "Error de conexión a la BD: (" . $this->conn->connect_errno . ") " . utf8_encode($this->conn->connect_error);
					exit();
				}
				if ( ! $this->conn->set_charset("utf8mb4")) {
					echo "Error al configurar la codificación de la BD: (" . $this->conn->errno . ") " . utf8_encode($this->conn->error);
					exit();
				}
    		}
    	}
		return $this->conn;
    }
}
?>