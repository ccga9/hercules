<?php

require_once(__DIR__.'/DAO.php');
//require_once(__DIR__.'/../TOs/alimentoDAO.php');

class foroDAO extends DAO
{
    public function __construct(){
        parent::__construct();
    }
    
    public function inserta($autor, $msg, $id_r, $tema)
    {
        if($tema != ""){
          $query = "INSERT INTO foro(autor, mensaje, respuestas, id_r, tema) VALUES 
          ('".$autor."','".$msg."', '0', '0', '".$tema."')";
        }
        
        else{
            $query1 = "SELECT id, respuestas FROM foro WHERE id = ".$id_r.""; 
            $tema = $this->consultarv2($query1);
            $i = 0;
            
            $id_tema = $tema[$i]['id'];
            $resp_tema = $tema[$i]['respuestas'];
            
            $query = "INSERT INTO foro(autor, mensaje, respuestas, id_r) VALUES 
            ('".$autor."','".$msg."', '0', '".$id_tema."')";
            
            $resp_tema++;
            $query2 = "UPDATE foro(respuestas) VALUES ('".$resp_tema."') WHERE id = '".$id_tema."'";
            $this->consultar($query2);
        }
        return $this->consultar($query);
    }
    
    public function modifica($msg, $fecha, $id)
    {
        $query = "UPDATE foro(mensaje, fecha) VALUES ('".$msg."','".$fecha."') WHERE '".$id."' = id";
        
        return $this->consultar($query);
    }
    
    public function elimina($id)
    {
        $query = "DELETE foro WHERE id = '".$id."' AND id_r = '".$id."'";
        
        return $this->consultar($query);
    }
    
   public function listarNombresTemas(){
       $query = "SELECT id, tema, autor, fecha, respuestas FROM foro WHERE id_r = 0";
       return $this->consultar($query);
    }
    
    public function mostrarContenidoMensaje($id){
        $query = "SELECT autor, mensaje, fecha, respuestas, tema FROM foro WHERE id = ".$id."";
        $consulta = $this->consultarv2($query);
        
       /* $ret = array();
        while($fila = mysqli_fetch_assoc($consulta))
        {
            array_push($ret, $fila);
        }
        return $ret;*/return $consulta;
    }
    
    public function mostrarRespuestasMensaje($id_tema){
        $query = "SELECT autor, fecha, mensaje FROM foro WHERE id_r = '".$id_tema."'";
        return $this->consultar($query);
    }
}
