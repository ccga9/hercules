<?php

require_once(__DIR__.'/DAO.php');
//require_once(__DIR__.'/../TOs/alimentoDAO.php');

class foroDAO extends DAO
{
    public function __construct(){
        parent::__construct();
    }
    
    public function inserta($id, $autor, $msg, $fecha, $resp, $id_r, $tema)
    {
        if($tema != null){
          $query = "INSERT INTO foro(id, autor, mensaje, fecha, id_r, tema) VALUES 
          ('".$id."','".$autor."','".$msg."','".$fecha."', '0', '".$tema."')";
        }
        
        else{
            $query1 = "SELECT id, respuestas FROM foro WHERE '".$id_r."' = id"; 
            $tema = $this->consultar($query1);
            $id_tema = $tema['id'];
            $resp_tema = $tema['respuestas'];
            
            $query = "INSERT INTO foro(id, autor, mensaje, fecha, id_r) VALUES 
            ('".$id."','".$autor."','".$msg."','".$fecha."', '".$id_tema."')";
            
            $query2 = "UPDATE foro(respuestas, ult_respuesta) VALUES ('".$resp_tema + '1'."', '".$fecha."') WHERE '".$id_tema."' = id";
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
        $query = "DELETE foro WHERE '".$id."' = id AND id_r = '".$id."'";
        
        return $this->consultar($query);
    }
    
   public function listarNombresTemas(){
       $query = "SELECT id, tema, autor, fecha, respuestas FROM foro WHERE id_r = 0";
       return $this->consulta($query);
    }
    
    public function mostrarContenidoMensaje($id){
        $query = "SELECT tema, autor, fecha, mensaje, respuestas FROM foro WHERE '".$id."' = id";
        return $this->consulta($query);
    }
    
    public function mostrarRespuestasMensaje($id_tema){
        $query = "SELECT autor, fecha, mensaje FROM foro WHERE '".$id_tema."' = id_r";
        return $this->consulta($query);
    }
}
?>
