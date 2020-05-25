<?php

require_once(__DIR__.'/DAO.php');
require_once(__DIR__.'/../TOs/ejercicioTO.php');

class ejercicioDAO extends DAO
{
	public function __construct(){
        parent::__construct();
    }

    public function listarNombresEjercicios(){
        $query = "SELECT nombre from ejercicio";
        
        return $this->consultar($query);
    }

    public function listarEjercicios($idEntrenamiento)
    {
        $query = "SELECT idEjercicio from entrenamientoejercicio WHERE idEntrenamiento = '". $idEntrenamiento ."'";

    	return $this->consultar($query);
    }
    public function buscarIdEjercicio($nombre){

        $query = "SELECT * from ejercicio WHERE nombre = '". $nombre ."'";
        return $this->consultar($query);
    }

    public function listarEntrenamientoEjercicio($idEntrenamiento)
    {

        $query= "SELECT idEjercicio FROM entrenamientoejercicio where idEntrenamiento = '".$idEntrenamiento."'";
        return $this->consultarv2($query);

    }

    public function agregarEjercicioaEntrenamiento($idEntrenamiento, $idEjercicio){
        //echo 'idEntrenamiento'.$idEntrenamiento."<br>";
        //echo 'idEjercicio'.$idEjercicio."<br>";
        $query= "INSERT INTO `entrenamientoejercicio` (`idEntrenamiento`, `idEjercicio`) VALUES(
        ".$idEntrenamiento."
         , 
        '".$idEjercicio."'
        )";

        $this->consultar($query);

    }

    public function eliminarEntrenamientoEjercicio($idEntrenamiento)
    {

        $query= "DELETE FROM entrenamientoejercicio where idEntrenamiento = '".$idEntrenamiento."'";
        
        $this->consultar($query);

    }

    public function cargarEjercicio($idEjercicio) 
    {   
        $query = "SELECT * FROM ejercicio WHERE idEjercicio = '". $idEjercicio ."'";
 
        $res = $this->consultar($query);
        
        $fila = $res->fetch_assoc();
        $ejercicio = new ejercicioTO();
        $ejercicio->setIdEjercicio($fila['idEjercicio']);
        $ejercicio->setNombre($fila['nombre']);
        $ejercicio->setCaloriasGastadas($fila['caloriasGastadas']);
        $ejercicio->setTipo($fila['tipo']);
        $ejercicio->setDescripcion($fila['descripcion']);
        $ejercicio->setMultimedia($fila['multimedia']);

        return $ejercicio;
    }

    public function listarTodosEjercicios($col){
        $query = "";
        $query = "SELECT ".$col." FROM ejercicio";

        return $this->consultarv2($query);
    }

    public function buscarEjercicio($col, $cond){
        $query = "";
        $query = "SELECT ".$col." FROM ejercicio WHERE nombre LIKE '%".$cond."%' OR tipo LIKE '%".$cond."%' ORDER BY nombre ASC";
        return $this->consultarv2($query);
    }
    
    public function select($col, $cond){
        $query = "";
        if ($col == "") {
            $col = "*";
        }
        if ($cond == "") {
            $query = "SELECT ".$col." FROM ejercicio";
        }
        else {
            $query = "SELECT ".$col." FROM ejercicio WHERE ".$cond;
        }
        
        return $this->consultarv2($query);
    }
    
    public function insert($col, $values){
        $query = "";
        $query = "INSERT INTO ejercicio(".$col.") VALUES (".$values.")";
        
        return $this->consultarv2($query);
    }
    
    public function update($set, $cond){
        $query = "";
        if ($cond != "") {
            $query = "UPDATE ejercicio SET ".$set." WHERE ".$cond;
        }
        return $this->consultarv2($query);
    }
    
    public function delete($cond){
        $query = "";
        if ($cond != "") {
            $query = "DELETE FROM ejercicio WHERE ".$cond;
        }
        
        return $this->consultarv2($query);
    }

}
