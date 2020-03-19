<?php
//include_once('DAO.php');
//require_once('TOrecomendaciones.php');
class recomendacionesDAO extends DAO
{
	public function __construct()
	{
		parent::__construct();
	}

	public function consulta($entrenador, $fecha)
	{
		$filas = SelectArray("SELECT * from Usuarios where entrenador = '$entrenador' and fecha = '$fecha'"); 
		// ¿Por qué se mete en un array? ¿Qué hay en $filas[1]?
		$fila = $filas[0];

		$r = new recomendacion();
		$r->entrenador = $fila['entrenador'];
		$r->cliente = $fila['usuario'];
		$r->fecha = $fila['fecha'];
		$r->recomendacion = $fila['recomendacion'];
		$r->tipo = $fila['tipo'];
		return $r;
	}

	public function inserta(recomendacion $r)
	{
		$query("INSERT into recomendaciones (entrenador, usuario, fecha, recomendacion, tipo) values (" . $r->entrenador . ',' . $r->usuario . ',' . $r->fecha . ',' . $r->tipo . ',' . $r->recomendacion . ')');

		// ...
	}

	public function actualiza(recomendacion $r)
	{
		$query("UPDATE recomendaciones (entrenador, usuario, fecha, recomendacion, tipo) values ('" . $r->entrenador . "','" . $r->usuario . "','" . $r->fecha . "','" . $r->tipo . "','" . $r->recomendacion . "') where entrenador = '" . $r->entrenador . "'");
		
		// ...
	}

	public function elimina(recomendacion $r)
	{
		$query("DELETE recomendaciones where entrenador = '" . $r->entrenador . "' and fecha = '" . $r->fecha . "'");

		// ...
		// ¿si no quedan usuarios da un error?
	}
}
?>
