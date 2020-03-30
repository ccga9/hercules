<?php
//Este codigo esta duplicado con DAO de momento.
//Es para preguntar el lunes donde deberia ir

//require_once __DIR__.'/aplicacion.php';
require_once __DIR__.'/TOs/TOUsuario.php';
require_once __DIR__.'/controller.php';

/**
 * Parámetros de conexión a la BD
 */
define('BD_HOST', 'localhost');
define('BD_NAME', 'hercules');
define('BD_USER', 'hercules');
define('BD_PASS', 'iG8hC62acnPrvIeU');

ini_set('default_charset', 'UTF-8');
setLocale(LC_ALL, 'es_ES.UTF.8');
date_default_timezone_set('Europe/Madrid');

session_start();

$ctrl = new controller();

//$app = aplicacion::getInstance();
//$app->init(array('host'=>BD_HOST, 'bd'=>BD_NAME, 'user'=>BD_USER, 'pass'=>BD_PASS));

//$conn->close(); //Esto puede ser que vaya en otra parte

?>
