<?php
/**
 * Transfer Object entrenamiento
  */
class entrenamientoTO {
    private $idEntrenamiento;
	private $idUsuarioEntrenador;
    private $tipo;
    private $fecha;
	

/**
 * Constructor del entrenamientoTO
 */
     public function __construct($idEntrenamiento  = null , $idUsuarioEntrenador = null,
                                $tipo = null, $fecha = null){
      $this->idEntrenamiento = $idEntrenamiento;
      $this->idUsuarioEntrenador = $idUsuarioEntrenador;
      $this->tipo = $tipo;
      $this->fecha = $fecha;
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
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
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
}
?>