<?php
/**
 * Transfer Object ejercicio
  */
class ejercicioTO {
    private $idEjercicio;
	private $nombre;
    private $caloriasGastadas;
    private $tipo;
    private $descripcion;
    private $multimedia;
	

/**
 * Constructor del ejercicioTO
 */
    public function __construct($idEjercicio  = null , $nombre = null,
                                $caloriasGastadas = null, $tipo = null,
                                $descripcion = null, $multimedia = null){
      $this->idEjercicio = $idEjercicio;
      $this->nombre = $nombre;
      $this->caloriasGastadas = $caloriasGastadas;
      $this->tipo = $tipo;
      $this->descripcion = $descripcion;
      $this->multimedia = $multimedia;
    }
    
	/**
     * @return mixed
     */
    public function getIdEjercicio()
    {
        return $this->idEjercicio;
    }

    /**
     * @param mixed $idEjercicio
     */
    public function setIdEjercicio($idEjercicio)
    {
        $this->idEjercicio = $idEjercicio;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $idEntrenamiento
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getCaloriasGastadas()
    {
        return $this->caloriasGastadas;
    }

    /**
     * @param mixed $caloriasGastadas
     */
    public function setCaloriasGastadas($caloriasGastadas)
    {
        $this->caloriasGastadas = $caloriasGastadas;
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
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    
    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
    /**
     * @return mixed
     */
    public function getMultimedia()
    {
        return $this->multimedia;
    }
    
    /**
     * @param mixed $multimedia
     */
    public function setMultimedia($multimedia)
    {
        $this->multimedia = $multimedia;
    }
}
?>