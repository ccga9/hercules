<?php

require_once(__DIR__.'/DAO.php');
require_once(__DIR__.'/../TOs/comidaTO.php');
//require_once(__DIR__.'/../TOs/alimentoDAO.php');

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
    public function registrarComida(/*string*/$alimento_1, $alimento_2, $alimento_3, $tipo, $nif)
    {
        $query_numComidas = "SELECT count(*) from comida";
        $consulta_idComidas = query($query_numComidas); // ¿me devuelve el numero de ids?
        $num_idComidas = mysqli_fetch_assoc($consulta_idComida); // ¿se puede quitar?
        //$n = $num_idComidas['count(*)']; ¿?
        $nuevo_num_id = $num_idComidas + 1; //¿n+1?


        if ($alimento_1 != null)
        {
            $query_c_a1 = "SELECT idAlimento, nombre from alimento where nombre = '".$alimento_1."'";
            $consultaA1 = query($query_c_a1);
            $a1 = mysqli_fetch_assoc($consultaA1);
            $a1_id = $a1['idAlimento'];
            $a1_nombre = $a1['nombre'];
            $query_i_ac1 = "INSERT into alimentocomida(idComida, idAlimento) values ('".$a1_id."','".$nuevo_num_id."')";
        }

        if ($alimento_2 != null)
        {
            $query_c_a2 = "SELECT idAlimento, nombre from alimento where nombre = '".$alimento_2."'";
            $consultaA2 = query($query_c_a2);
            $a2 = mysqli_fetch_assoc($consultaA2);
            $a2_id = $a2['idAlimento'];
            $a2_nombre = $a2['nombre'];
            $query_i_ac2 = "INSERT into alimentocomida(idComida, idAlimento) values ('".$a2_id."','".$nuevo_num_id."')";
        }

        if ($alimento_3 != null)
        {
            $query_c_a3 = "SELECT idAlimento, nombre from alimento where nombre = '".$alimento_3."'";        
            $consultaA3 = query($query_c_a3);
            $a3 = mysqli_fetch_assoc($consultaA3);
            $a3_id = $a3['idAlimento'];
            $a3_nombre = $a3['nombre'];
            $query_i_ac3 = "INSERT into alimentocomida(idComida, idAlimento) values ('".$a3_id."','".$nuevo_num_id."')";
        }

        if (($alimento_1 != null) && ($tipo != null))
        {
            $fecha = getdate();
            //$fecha = getdate ([ int $timestamp = time() ] ) : array;
            
            $query_i_comida = "INSERT into comida(dia, tipo, usuario) values (/*'sysdate'*/'".$fecha."','".$tipo."','".$nif."')";
            // where idComida = '".$nuevo_num_id."'";

            //comida->set(...);
        }
        else
            echo "ERROR: Introduzca datos válidos en los campos '".$alimento_1."' y '".$tipo."'";
        
    }

    // el usuario ve TODAS las comidas que ha registrado en la aplicación
    public function verComidas()
    {
        $query = "SELECT /*a.*/nombre from comida c
                                  join alimentocomida ac on c.idComida = ac.idComida
                                  join alimento a on a.idAlimento = ac.idAlimento";

        $filas = query($query);
        
        $comidas = array();
        $i = 0;
        while($fila = mysqli_fetch_assoc($consulta))
        {
            $comidas[$i] = $fila['nombre'];
            $i++;
        }
        return $comidas;
    }

}
?>
