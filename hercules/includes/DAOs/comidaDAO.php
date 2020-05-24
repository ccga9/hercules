<?php
require_once(__DIR__.'/DAO.php');
require_once(__DIR__.'/../TOs/comidaTO.php');

class comidaDAO extends DAO
{
    public function __construct(){
        parent::__construct();
    }
    
    public function eliminarComida($fecha, $nif)
    {
        $query = "DELETE from comida where dia = '".$fecha."' and usuario = '".$nif."'";
        $this->consultar($query);
    }

    public function editarComida($fecha, $alimento_1, $alimento_2, $alimento_3, $tipo, $nif)
    {
        $query_comida = "SELECT idComida from comida where dia = '".$fecha."' and usuario = '".$nif."'";
        $consultaComida = $this->consultar($query_comida);
        $comida = mysqli_fetch_assoc($consultaComida);
        $idComida = $comida['idComida'];
        
        $delete_comida = "DELETE from alimentoComida where idComida = '".$idComida."'";
        $delete = $this->consultar($delete_comida);
        
        
        $query_c_a1 = "SELECT idAlimento from alimento where nombre = '".$alimento_1."'";
        $consultaA1 = $this->consultar($query_c_a1);
        $a1 = mysqli_fetch_assoc($consultaA1);
        $a1_id = $a1['idAlimento'];
        $query_i_ac1 = "INSERT into alimentocomida(idAlimento ,idComida) values ('".$a1_id."','".$idComida."')";
        $this->consultar($query_i_ac1);
        
        if ($alimento_2 != null)
        {
            $query_c_a2 = "SELECT idAlimento from alimento where nombre = '".$alimento_2."'";
            $consultaA2 = $this->consultar($query_c_a2);
            $a2 = mysqli_fetch_assoc($consultaA2);
            $a2_id = $a2['idAlimento'];
            $query_i_ac2 = "INSERT into alimentocomida(idAlimento ,idComida) values ('".$a2_id."','".$idComida."')";
            $this->consultar($query_i_ac2);
        }
        
        if ($alimento_3 != null)
        {
            $query_c_a3 = "SELECT idAlimento from alimento where nombre = '".$alimento_3."'";
            $consultaA3 = $this->consultar($query_c_a3);
            $a3 = mysqli_fetch_assoc($consultaA3);
            $a3_id = $a3['idAlimento'];
            $query_i_ac3 = "INSERT into alimentocomida(idAlimento ,idComida) values ('".$a3_id."','".$idComida."')";
            $this->consultar($query_i_ac3);
        }
        
        $fecha_actual = date("Y-m-d H:i:s", time());
        
        
        $query = "UPDATE comida set tipo = '".$tipo."', dia = '".$fecha_actual."' where dia = '".$fecha."' and usuario = '".$nif."'";
        $this->consultar($query);
        
    }

    public function registrarComida($alimento_1, $alimento_2, $alimento_3, $tipo, $nif)
    {
        
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
    
    public function selectComida($col, $cond){
        $query = "";
        if ($col == "") {
            $col = "*";
        }
        if ($cond == "") {
            $query = "SELECT ".$col." FROM comida";
        }
        else {
            $query = "SELECT ".$col." FROM comida WHERE ".$cond;
        }
        
        return $this->consultarv2($query);
    }
    
    public function insertComida($col, $values){
        $query = "";
        $query = "INSERT INTO comida(".$col.") VALUES (".$values.")";
        
        return $this->consultarv2($query);
    }
    
    public function updateComida($set, $cond){
        $query = "";
        if ($cond != "") {
            $query = "UPDATE comida SET ".$set." WHERE ".$cond;
        }
        echo $query;
        return $this->consultarv2($query);
    }
    
    public function deleteComida($cond){
        $query = "";
        if ($cond != "") {
            $query = "DELETE FROM comida WHERE ".$cond;
        }
        
        return $this->consultarv2($query);
    }

}
