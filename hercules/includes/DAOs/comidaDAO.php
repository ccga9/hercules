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
        $query = "INSERT INTO comida(dia, tipo, usuario) VALUES ('".$c->get_dia()."','".$c->get_tipo()."','".$c->get_usuario()."','".$c->get_comida()."') where idComida = '".$c->get_idComida()."'";
        
        return $this->insertar($query);
    }
    
    public function modifica(comida $c)
    {
        $query = "UPDATE comida(dia, tipo, usuario) VALUES ('".$c->get_dia()."','".$c->get_tipo()."','".$c->get_usuario()."','".$c->get_comida()."') where idComida = '".$c->get_idComida()."'";
        
        return $this->modificar($query);
    }

    public function elimina(comida $c)
    {
        $query = "DELETE comida where idComida = '".$c->get_idComida()."'";
        
        return $this->eliminar($query);
    }

    //public function consulta($idComida)
    


    public function listar1comida($idComida) // ¿?
    {
        /*$query = "SELECT tipo, alimento_1, alimento_2, alimento_3 from comida inner join alimentocomida on comida.idComida = alimentocomida.idComida where idComida = '".$idComida."'";
        
        query($query);*/
    }

    // esta función se ejecuta cuando el usuario elige los alimentos que quiere añadir a una comida y el tipo de comida que elige (desayuno, comida o cena).
    public function registrarComida($alimento_1, $alimento_2,/*string*/$alimento_3, $tipo, $nif)
    //insertarAlimentosen1comida?
    {
        $query = "INSERT into alimentocomida(alimento_1, alimento_2, alimento_3) values ('".$alimento_1."','".$alimento_2."','".$alimento_3."') where alimento_1 = null"; // ¿?

        $query = "INSERT into comida(dia, tipo, usuario) values ('"sysdate"','"$tipo"','"$nif"') where idComida = max(idComida)"; //¿idComida + 1?

        // alimentoComida y comida tienen que tener siempre el mismo número de idComida(s), y por tanto, el mismo número de filas en sus respectivas tablas.

        query($query);
    }

    // el usuario ve TODAS las comidas que ha registrado en la aplicación
    public function verComidas()
    {
        $query = "SELECT * from alimentocomida";

        $filas = query($query);
        
        //$fila = mysqli_fetch_assoc($consulta);

    }
}
?>
