<?php
/**
 * Transfer Object Entrenador
 * Con atributos especificos para usuarios que son entrenadores
 */

class TOEntrenador {
    private $nif;
    private $titulacion;
    private $especialidad;
    private $experiencia;
    
    
/**
* Constructor del TOEntrenador
*/
    private function __construct($nif, $titulacion, $especialidad, $experiencia){
        $this->nif = $nif;
        $this->titulacion = $titulacion;
        $this->especialidad = $especialidad;
        $this->experiencia = $experiencia;
    }
    
    /**
     * @return mixed
     */
    public function getNif()
    {
        return $this->nif;
    }

    /**
     * @param mixed $nif
     */
    public function setNif($nif)
    {
        $this->nif = $nif;
    }

    /**
     * @return mixed
     */
    public function getTitulacion()
    {
        return $this->titulacion;
    }

    /**
     * @param mixed $titulacion
     */
    public function setTitulacion($titulacion)
    {
        $this->titulacion = $titulacion;
    }

    /**
     * @return mixed
     */
    public function getEspecialidad()
    {
        return $this->especialidad;
    }

    /**
     * @param mixed $especialidad
     */
    public function setEspecialidad($especialidad)
    {
        $this->especialidad = $especialidad;
    }

    /**
     * @return mixed
     */
    public function getExperiencia()
    {
        return $this->experiencia;
    }

    /**
     * @param mixed $experiencia
     */
    public function setExperiencia($experiencia)
    {
        $this->experiencia = $experiencia;
    }
    
}

?>