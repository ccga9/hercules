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
       // $id_r = $_SESSION['id_msg'];
        if($tema != ""){
            $query = "INSERT INTO foro(autor, mensaje, respuestas, id_r, tema) VALUES
          ('".$autor."','".$msg."', '0', '0', '".$tema."')";
            $this->consultar($query);
            
            return true;
        }
        
        else{
            $query1 = "SELECT respuestas FROM foro WHERE id = '".$id_r."'";
            $resps = $this->consultarv2($query1);
            
            $query = "INSERT INTO foro(`autor`, `mensaje`, `respuestas`, `id_r`) VALUES
            ('".$autor."','".$msg."', '0', '".$id_r."')";
            $this->consultar($query);
            
            $valor = $resps[0]['respuestas'];
            $valor++;
            $query2 = "UPDATE foro SET respuestas = '".$valor."' WHERE id = '".$id_r."'";
            $this->consultar($query2);
            
            return true;
        }
        return false;
    }
    
    public function modifica($id, $msg)
    {
        $query = "UPDATE foro SET mensaje = '".$msg."' WHERE id = '".$id."'";
        
        return $this->consultar($query);
    }
    
    public function elimina($id)
    {
        $query = "DELETE FROM foro WHERE id_r = '".$id."'";
        $this->consultar($query);
        
        $query = "SELECT respuestas, id_r FROM foro WHERE id = '".$id."'";
        $resps = $this->consultarv2($query);
        $valor = $resps[0]['respuestas'];
        $valor--;
        $id_tema = $resps[0]['id_r'];
        $query = "UPDATE foro SET respuestas = '".$valor."' WHERE id = '".$id_tema."'";
        $this->consultar($query);
        
        $query = "DELETE FROM foro WHERE id = '".$id."'";
        $this->consultar($query);
    }
    
    public function listarNombresTemas(){
        $query = "SELECT id, tema, autor, fecha, respuestas FROM foro WHERE id_r = 0";
        return $this->consultar($query);
    }
    
    public function mostrarContenidoMensaje($id){
        $query = "SELECT autor, mensaje, fecha, respuestas, tema FROM foro WHERE id = ".$id."";
        $consulta = $this->consultarv2($query);
        return $consulta;
    }
    
    public function mostrarRespuestasMensaje($id_tema){
        $query = "SELECT id, autor, fecha, mensaje FROM foro WHERE id_r = '".$id_tema."'";
        return $this->consultar($query);
    }
}
