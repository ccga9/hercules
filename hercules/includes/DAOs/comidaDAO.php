<?php

require_once(__DIR__.'/DAO.php');
require_once(__DIR__.'/../TOs/comidaTO.php');

class comidaDAO extends DAO
{    
    public function __construct(){
        parent::__construct();
    }
    
    public function inserta(comida $c)
    {
        $query = "INSERT INTO comida(dia, tipo, usuario, comida) VALUES ('".$c->get_dia()."'".$c->get_tipo()."'".$c->get_usuario()."'".$c->get_comida()."') where idComida = '".$c->get_idComida()."'";
        
        return $this->insertar($query);
    }
    
    public function modifica(comida $c)
    {
        $query = "UPDATE comida(dia, tipo, usuario, comida) VALUES ('".$c->get_dia()."'".$c->get_tipo()."'".$c->get_usuario()."'".$c->get_comida()."') where idComida = '".$c->get_idComida()."'";
        
        return $this->modificar($query);
    }

    public function elimina(comida $c)
    {
        $query = "DELETE comida where idComida = '".$c->get_idComida()."'";
        
        return $this->eliminar($query);
    }
    
    public function consulta($idComida)
    {
        $query = "SELECT * from comida where idComida = '".$idComida."'";
        
        //...

        return $this->consultar($query);
    }

    public function listarComidas() // ¿ ?
    {
        // ...
    }
}
?>
