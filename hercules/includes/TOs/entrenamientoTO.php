<?php
/**
 * Transfer Object entrenamiento
  */
class entrenamientoTO {
    private $id;
	private $tipo;
	
/**
 * Constructor del entrenamientoTO
 */
    public function __construct($id = null, $tipo = null){
      $this->id = $id;
      $this->tipo = $tipo;
    }

/**
 * Constructor del entrenamientoTO
 */
    public function __construct($id, $tipo){
      $this->id = $id;
      $this->tipo = $tipo;
    }
    
	/**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
}
?>