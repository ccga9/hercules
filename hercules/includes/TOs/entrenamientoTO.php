<?php
/**
 * Transfer Object entrenamiento
  */
class entrenamientoTO {
    private $idEntrenamiento;
	private $idUsuarioEntrenador;
    private $nombre;
    private $fecha;
    private $repeticiones;
	

/**
 * Constructor del entrenamientoTO
 */
     public function __construct($idEntrenamiento = null, $idUsuarioEntrenador = null,
                                $nombre = null, $fecha= null, $repeticiones = null){
      $this->idEntrenamiento = $idEntrenamiento;
      $this->idUsuarioEntrenador = $idUsuarioEntrenador;
      $this->nombre = $nombre;
      $this->fecha = $fecha;

      $this->repeticiones = $repeticiones;
    }
    
	/**
     * @return mixed
     */
    public function getIdEntrenamiento()
    {
        return $this->idEntrenamiento;
    }

    /**
     * @param mixed $idEntrenamiento
     */
    public function setIdEntrenamiento($idEntrenamiento)
    {
        $this->idEntrenamiento = $idEntrenamiento;
    }

    /**
     * @return mixed
     */
    public function getIdUsuarioEntrenador()
    {
        return $this->idUsuarioEntrenador;
    }

    /**
     * @param mixed $idEntrenamiento
     */
    public function setIdUsuarioEntrenador($id)
    {
        $this->idUsuarioEntrenador = $id;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $tipo
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

     /**
     * @return mixed
     */
    public function getRepeticiones()
    {
        return $this->repeticiones;
    }

    /**
     * @param mixed $tipo
     */
    public function setRepeticiones($repeticiones)
    {
        $this->repeticiones = $repeticiones;
    }
}
?>