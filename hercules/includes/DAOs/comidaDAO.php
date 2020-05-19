<?php

require_once(__DIR__.'/DAO.php');
require_once(__DIR__.'/../TOs/comidaTO.php');
//require_once(__DIR__.'/../TOs/alimentoDAO.php');

class comidaDAO extends DAO
{
    public function __construct(){
        parent::__construct();
    }

    public function modifica(comida $c)
    {
        $query = "UPDATE comida set dia = '".$c->get_dia()."', tipo = '".$c->get_tipo()."', usuario = '".$c->get_usuario()."' where idComida = '".$c->get_idComida()."'";

        return $this->consultar($query);
    }

    public function eliminarComida($fecha, $nif)
    {
        $query = "DELETE from comida where dia = '".$fecha."' and usuario = '".$nif."'";
        $this->consultar($query);
    }

    public function registrarComida($alimento_1, $alimento_2, $alimento_3, $tipo, $nif)
    {
        /*$comida = new comida();
        $comida->set_idComida($nuevo_num_id);
        //$comida->set_dia($fecha);
        $comida->set_tipo($tipo);
        $comida->set_usuario($nif);*/

        /*$fecha_completa = getdate();
        $d = $fecha_completa['mday'];
        $m = $fecha_completa['mon'];
        $y = $fecha_completa['year'];
        $hour = $fecha_completa['hours'];
        $min = $fecha_completa['minutes'];
        $fecha = $y."-".$m."-".$d."-".$hour."-".$min;*/

        $query_i_comida = "INSERT into comida(tipo, usuario) values ('".$tipo."','".$nif."')";
        $this->consultar($query_i_comida);


        $query_numComidas = "SELECT max(idComida) from comida";
        $consulta_idComidas = $this->consultar($query_numComidas);
        $num_idComidas = mysqli_fetch_assoc($consulta_idComidas);
        $nuevo_num_id = $num_idComidas['max(idComida)'];


        $query_c_a1 = "SELECT idAlimento from alimento where nombre = '".$alimento_1."'";
        $consultaA1 = $this->consultar($query_c_a1);
        $a1 = mysqli_fetch_assoc($consultaA1);
        $a1_id = $a1['idAlimento'];
        $query_i_ac1 = "INSERT into alimentocomida(idAlimento ,idComida) values ('".$a1_id."','".$nuevo_num_id."')";
        $this->consultar($query_i_ac1);

        if ($alimento_2 != null)
        {
            $query_c_a2 = "SELECT idAlimento from alimento where nombre = '".$alimento_2."'";
            $consultaA2 = $this->consultar($query_c_a2);
            $a2 = mysqli_fetch_assoc($consultaA2);
            $a2_id = $a2['idAlimento'];
            $query_i_ac2 = "INSERT into alimentocomida(idAlimento ,idComida) values ('".$a2_id."','".$nuevo_num_id."')";
            $this->consultar($query_i_ac2);
        }

        if ($alimento_3 != null)
        {
            $query_c_a3 = "SELECT idAlimento from alimento where nombre = '".$alimento_3."'";
            $consultaA3 = $this->consultar($query_c_a3);
            $a3 = mysqli_fetch_assoc($consultaA3);
            $a3_id = $a3['idAlimento'];
            $query_i_ac3 = "INSERT into alimentocomida(idAlimento ,idComida) values ('".$a3_id."','".$nuevo_num_id."')";
            $this->consultar($query_i_ac3);
        }

    }

    public function verComidas($nif)
    {
        $query = "  SELECT dia, tipo, nombre, caloriasConsumidas, proteinas, grasas, carbohidratos
                    from comida c
                    join alimentocomida ac on c.idComida = ac.idComida
                    join alimento a on a.idAlimento = ac.idAlimento
                    where c.usuario = '".$nif."'
                    order by c.dia";

        $consulta = $this->consultar($query);

        $comidas = array();
        while($fila = mysqli_fetch_assoc($consulta))
        {
            array_push($comidas, $fila);
        }
        return $comidas;
    }
    
    public function deleteComida($cond){
        $query = "";
        if ($cond != "") {
            $query = "DELETE FROM comida WHERE ".$cond;
        }
        
        return $this->consultarv2($query);
    }

}
