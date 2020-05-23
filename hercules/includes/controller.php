<?php

/**
 * Esta clase controller tendremos que decidir si queremos que este todo aqui o se crea un Servicio de Aplicacion (SA) para cada tipo... (usuario, comida, ejercicio...)
 * @author gcarrero
 *
 */

require_once(__DIR__ . '/DAOs/usuarioDAO.php');
require_once(__DIR__ . '/DAOs/alimentoDAO.php');
require_once(__DIR__ . '/DAOs/comidaDAO.php');
require_once(__DIR__ . '/DAOs/entrenamientoDAO.php');
require_once(__DIR__ . '/DAOs/ejercicioDAO.php');
require_once(__DIR__ . '/DAOs/foroDAO.php');
require_once(__DIR__ . '/DAOs/mensajesDAO.php');
require_once(__DIR__ . '/DAOs/valoracionDAO.php');

class controller{

    private $usuarioDAO;
    private $alimentoDAO;
    private $comidaDAO;
    private $entrenamientoDAO;
    private $ejercicioDAO;
    private $foroDAO;
    private $mensajesDAO;
    private $valoracionDAO;
    private static $instance = null;

    public function __construct(){
        $this->usuarioDAO = new UsuarioDAO();
        $this->alimentoDAO = new alimentoDAO();
        $this->comidaDAO = new comidaDAO();
        $this->entrenamientoDAO = new entrenamientoDAO();
        $this->ejercicioDAO = new ejercicioDAO();
        $this->foroDAO = new foroDAO();
        $this->mensajesDAO = new mensajesDAO();
        $this->valoracionDAO = new valoracionDAO();
    }

     public static function getInstance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }
    
    
    //FUNCIONES USUARIODAO     /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /  
    
    //Funciones relacionadas con el usuario
    public function selectUsuario($col, $cond){
        return $this->usuarioDAO->selectUsuario($col, $cond);
    }
    
    public function cargarUsuario($nif){
        $cond= "nif = '". $nif ."'";
        $res=$this->usuarioDAO->selectUsuario('', $cond);
        
        if (count($res) == 1) {
            $row=$res[0];
            $usuario = new TOUsuario();
            $usuario->setNif($nif);
            $usuario->setNombre($row["nombre"]);
            $usuario->setPassword($row["contrasenna"]);
            $usuario->setEmail($row["email"]);
            $usuario->setSexo($row["sexo"]);
            $usuario->setFoto($row["foto"]);
            $usuario->setFechaNac($row["fechaNac"]);
            $usuario->setTelefono($row["telefono"]);
            $usuario->setUbicacion($row["ubicacion"]);
            $usuario->setPeso($row["peso"]);
            $usuario->setAltura($row["altura"]);
            $usuario->setPreferencias($row["preferencias"]);
            $usuario->setTipoUsuario($row["tipoUsuario"]);
            $usuario->setTitulacion($row["titulacion"]);
            $usuario->setEspecialidad($row["especialidad"]);
            $usuario->setExperiencia($row["experiencia"]);
            return $usuario;
        } else{
            return 0;
        }
    }
    
    public function insertarUsuario($u){
        if ($u->getNif() !== null) {
            $col = '`nif`, `nombre`, `contrasenna`, `foto`, `email`, `sexo`, `fechaNac`, `telefono`, `ubicacion`, `peso`, `altura`, `preferencias`, `tipoUsuario`, `titulacion`, `especialidad`, `experiencia`';
            $values='';
            $values .= ($u->getNif() !== null)? "'".$u->getNif()."'" : "NULL";
            $values .= ($u->getNombre() !== null)? ",'".$u->getNombre()."'" : ",NULL";
            $values .= ($u->getPassword() !== null)? ",'".$u->getPassword()."'" : ",NULL";
            $values .= ($u->getFoto() !== null)? ",'".$u->getFoto()."'" : ",NULL";
            $values .= ($u->getEmail() !== null)? ",'".$u->getEmail()."'" : ",NULL";
            $values .= ($u->getSexo() !== null)? ",'".$u->getSexo()."'" : ",NULL";
            $values .= ($u->getFechaNac() !== null)? ",'".$u->getFechaNac()."'" : ",NULL";
            $values .= ($u->getTelefono() !== null)? ",'".$u->getTelefono()."'" : ",NULL";
            $values .= ($u->getUbicacion() !== null)? ",'".$u->getUbicacion()."'" : ",NULL";
            $values .= ($u->getPeso() !== null)? ",".$u->getPeso() : ",NULL";
            $values .= ($u->getAltura() !== null)? ",".$u->getAltura() : ",NULL";
            $values .= ($u->getPreferencias() !== null)? ",'".$u->getPreferencias()."'" : ",NULL";
            $values .= ($u->getTipoUsuario() !== null)? ",".$u->getTipoUsuario() : ",NULL";
            $values .= ($u->getTitulacion() !== null)? ",'".$u->getTitulacion()."'" : ",NULL";
            $values .= ($u->getEspecialidad() !== null)? ",'".$u->getEspecialidad()."'" : ",NULL";
            $values .= ($u->getExperiencia() !== null)? ",'".$u->getExperiencia()."'" : ",NULL";
                                                                                                                        
            return $this->usuarioDAO->insertUsuario($col, $values);
        }
        else {
            return 0;
        }
    }
    
    public function updateUsuario($u){
        $set='';
        $cond="";
        if ($u->getNif() !== null) {
            $set .= "nombre=".($u->getNombre() !== null)? "'".$u->getNombre()."'" : "NULL";
            $set .= ",contrasenna=".($u->getPassword() !== null)? "'".$u->getPassword()."'" : "NULL";
            $set .= ",email=".($u->getEmail() !== null)? "'".$u->getEmail()."'" : "NULL";
            $set .= ",sexo=".($u->getSexo() !== null)? "'".$u->getSexo()."'" : "NULL";
            $set .= ",fechaNac=".($u->getFechaNac() !== null)? "'".$u->getFechaNac()."'" : "NULL";
            $set .= ",telefono=".($u->getTelefono() !== null)? "'".$u->getTelefono()."'" : "NULL";
            $set .= ",ubicacion=".($u->getUbicacion() !== null)? "'".$u->getUbicacion()."'" : "NULL";
            $set .= ",peso=".($u->getPeso() !== null)? $u->getPeso() : "NULL";
            $set .= ",altura=".($u->getAltura() !== null)? $u->getAltura() : "NULL";
            $set .= ",preferencias=".($u->getPreferencias() !== null)? "'".$u->getPreferencias()."'" : "NULL";
            $set .= ",tipoUsuario=".($u->getTipoUsuario() !== null)? $u->getTipoUsuario() : "NULL";
            $set .= ",titulacion=".($u->getTitulacion() !== null)? "'".$u->getTitulacion()."'" : "NULL";
            $set .= ",especialidad=".($u->getEspecialidad() !== null)? "'".$u->getEspecialidad()."'" : "NULL";
            $set .= ",experiencia=".($u->getExperiencia() !== null)? "'".$u->getExperiencia()."'" : "NULL";
            $cond="nif = '". $u->getNif() ."'";
                                                                                                    
            return $this->usuarioDAO->updateUsuario($set, $cond);
        }
        else {
            return 0;
        }
    }


    public function updateUsuario2($u){
        $set='';
        $cond="";
        if ($u['nif'] !== null) {
            if($u['nombre'] != "")
                $set .= "nombre=' ".$u['nombre']."'";
            if($u['password'] !== "")
                $set .= ",contrasenna='".password_hash($u['password'], PASSWORD_DEFAULT)."'";
            if($u['email'] !== "")
                $set .= ",email='".$u['email']."'";
            if($u['sexo'] !== "")
                $set .= ",sexo='".$u['sexo']."'";
             if($u['foto'] !== "")
                $set .= ",foto=' ".$u['foto']."'";
            if($u['fecha'] !== "")
                $set .= ",fechaNac='".$u['fecha']."'";
            if($u['ubicacion'] !== "")
                $set .= ",ubicacion='".$u['ubicacion']."'";
            if($u['peso'] !== "")
                $set .= ",peso='".$u['peso']."'";
            if($u['altura'] !== "")
                $set .= ",altura='".$u['altura']."'";
            if($u['preferencias'] !== "")
                $set .= ",preferencias='".$u['preferencias']."'";
            if($u['telefono'] !== "")
                $set .= ",telefono='".$u['telefono']."'";
            
            
            $cond="nif = '".$u['nif']."'";
            
            return $this->usuarioDAO->updateUsuario($set, $cond);
        }
        else {
            return 0;
        }
    }
    
    public function updateAdmin($u){
        $set='';
        $cond="";
        if ($u['nif'] !== null) {
            if($u['password'] !== "")
                $set .= "contrasenna='".password_hash($u['password'], PASSWORD_DEFAULT)."'";
                
                if($u['foto'] !== "") {
                    if ($u['password'] !== "") {
                        $set .= ",foto=' ".$u['foto']."'";
                    }
                    else {
                        $set .= "foto=' ".$u['foto']."'";
                    }
                }
                    
                    
                    $cond="nif = '".$u['nif']."'";
                    
                    if ($u['password'] !== "" || $u['foto'] !== "") {
                        return $this->usuarioDAO->updateUsuario($set, $cond);
                    }
                    else {
                        return 0;
                    }
                 
        }
        else {
            return 0;
        }
    }
    
    public function deleteUsuario($nif){
        if ($this->cargarUsuario($nif) !== 0) {
            $this->mensajesDAO->delete("emisor='".$nif."' OR receptor='".$nif."'");
            $this->comidaDAO->deleteComida("usuario='".$nif."'");
            $this->usuarioDAO->deleteUs_Ent("usuario='".$nif."' OR entrenador='".$nif."'");
            $this->valoracionDAO->delete("de='".$nif."'");
            return $this->usuarioDAO->deleteUsuario("nif='".$nif."'");
        }
        else {
            return 0;
        }
    }
    
    public function login($arr = array()){
        $usuario = $this->cargarUsuario($arr['nif']);
        if ($usuario !== 0) {
            if (!password_verify ($arr["contrasenna"], $usuario->getPassword())) {
                $usuario = 0;
            }
        }
        return $usuario;
    }

    public function registraAdmin($arr = array()){
        $usuario = $this->cargarUsuario($arr['nif']);
        if ($usuario === 0) {
            $usuario = new TOUsuario();
            $usuario->setNif($arr["nif"]);
            $usuario->setNombre($arr["nombre"]);
            $usuario->setPassword(password_hash($arr["contrasenna"], PASSWORD_DEFAULT));
            $usuario->setTipoUsuario($arr["tipoUsuario"]);
            $usuario->setFoto($arr["foto"]);
            
            $this->insertarUsuario($usuario);
            return $usuario;
        }
        else {
            return 0;
        }
    }

    public function registra($arr = array()){
        $usuario = $this->cargarUsuario($arr['nif']);
        if ($usuario === 0) {
            $usuario = new TOUsuario();
            $usuario->setNif($arr["nif"]);
            $usuario->setNombre($arr["nombre"]);
            $usuario->setPassword(password_hash($arr["contrasenna"], PASSWORD_DEFAULT));
            $usuario->setEmail($arr["email"]);
            $usuario->setTipoUsuario($arr["tipoUsuario"]);
            $usuario->setFoto($arr["foto"]);
            $usuario->setSexo($arr["sexo"]);
            $usuario->setTelefono($arr["telefono"]);
            $usuario->setFechaNac($arr["fecha"]);
            $usuario->setPeso($arr["peso"]);
            $usuario->setAltura($arr["altura"]);
            $usuario->setPreferencias($arr["preferencias"]);
            $usuario->setUbicacion($arr["ubicacion"]);
            if ($arr["tipoUsuario"]) {
                $usuario->setTitulacion($arr["titulacion"]);
                $usuario->setEspecialidad($arr["especialidad"]);
                $usuario->setExperiencia($arr["experiencia"]);
            }
            $this->insertarUsuario($usuario);
            return $usuario;
        }
        else {
            return 0;
        }
    }
    
    public function listarUsuarios($cond){
        $col='*';
        
        return $consulta = $this->usuarioDAO->selectUsuario($col, $cond);
    }

    public function listarEntrenadores($nif=0){
        $col='nif, nombre, titulacion, especialidad, experiencia, foto';
        $cond='';
        if ($nif) {
            $cond="tipoUsuario = 1 AND nif != '" .$nif."'";
        }
        else {
            $cond="tipoUsuario = 1";
        }
        return $consulta = $this->usuarioDAO->selectUsuario($col, $cond);
    }
    
    public function listarEntrenadorProfesional($nif){
        $col='nif, nombre, titulacion, especialidad, experiencia, foto';
        $cond="tipoUsuario = 1 AND titulacion = 'Entrenador profesional'";
        return $consulta = $this->usuarioDAO->selectUsuario($col, $cond);
    }

    public function listarEntrenadorMadrid($nif){
        $col='nif, nombre, titulacion, especialidad, experiencia, foto';
        $cond="tipoUsuario = 1 AND ubicacion = 'Madrid'";
        return $consulta = $this->usuarioDAO->selectUsuario($col, $cond);
    }

     public function listarEntrenadorVarios($nif){
        $col='nif, nombre, titulacion, especialidad, experiencia, foto';
        $cond="tipoUsuario = 1 AND ubicacion != 'Madrid' AND titulacion != 'Entrenador profesional'";
        return $consulta = $this->usuarioDAO->selectUsuario($col, $cond);
    }

    public function listarMisEntrenadores($nif){
        
        $col = "entrenador";
        $cond="usuario = '".$nif."' AND estado = 'aceptado'";
       
        $consulta = $this->usuarioDAO->selectUs_Ent($col, $cond);
        $result = array();
       if ($consulta) {
        foreach ($consulta as $value) {
           $result[] = $this->cargarUsuario($value['entrenador']);
        }
            return $result;
       }
       return $result;
    }

    public function listarMisClientes($nif){
         
        $col = "usuario";
        $cond="entrenador = '".$nif."' AND estado = 'aceptado'";
       
        $consulta = $this->usuarioDAO->selectUs_Ent($col, $cond);
        $result = array();
       if ($consulta) {
        foreach ($consulta as $value) {
           $result[] = $this->cargarUsuario($value['usuario']);
        }
            
       }
       return $result;
    }
    
    public function listarMisSolicitudes($nif){
        
        $col = "usuario";
        $cond="entrenador = '".$nif."' AND estado='pendiente'";
        
        $consulta = $this->usuarioDAO->selectUs_Ent($col, $cond);
        $result = array();
        if ($consulta) {
            $result = array();
            foreach ($consulta as $value) {
                $result[] = $this->cargarUsuario($value['usuario']);
            }
            
        }
        return $result;
    }
    
    public function selectUs_Ent($col, $cond){
        
        return $consulta = $this->usuarioDAO->selectUs_Ent($col, $cond);
    }

    public function listarSolicitudes($nif){
 
        $col = "entrenador, estado";
        $cond="usuario = '".$nif."'";
        
        return $consulta = $this->usuarioDAO->selectUs_Ent($col, $cond);
    }

    public function enviarSolicitud($nif_user, $nif_entrena){     
        $col="`id`, `usuario`, `entrenador`, `estado`";
        $values="0, '".
            $nif_user."',
        '" . $nif_entrena . "',
        'pendiente'";
        
        return $consulta = $this->usuarioDAO->insertUs_Ent($col, $values);
    }

    public function miBuzon($nif){
        
        $consulta = $this->usuarioDAO->selectUs_Ent('usuario', "entrenador = '".$nif."' AND estado = 'pendiente'");
     
        $nom_clientes = array();

        foreach ($consulta as $value) {
            $u = $this->cargarUsuario($value['usuario']);
            $nom_clientes[$u->getNif()] = $u->getNombre();
        }

        return $nom_clientes;
    }

    public function responderSolicitud($nif_entrena, $nif_cliente, $aceptar){
        $consulta = 0;
        if ($aceptar) {
            $consulta = $this->usuarioDAO->updateUs_Ent("estado='aceptado'", "entrenador = '".$nif_entrena."' AND usuario = '".$nif_cliente."'");
        }
        else {
            $consulta = $this->usuarioDAO->deleteUs_Ent("entrenador = '".$nif_entrena."' AND usuario = '".$nif_cliente."'");
        }

        return $consulta;
    }
    
	public function idUsuarioEntrenador($nif_entrena, $nif_cliente){

        $consulta = $this->usuarioDAO->selectUs_Ent('id', "entrenador = '".$nif_entrena."' AND usuario = '".$nif_cliente."'");
        
        $id = 0;
        if ($consulta) {
            $id = $consulta[0]['id'];
        }
        
        return $id;
    }

    public function eliminarEntrenador($nif_cliente, $nif_entrena){
        $idUsuarioEntrenador = $this->idUsuarioEntrenador($nif_entrena, $nif_cliente);
     
        $consulta = $this->usuarioDAO->deleteUs_Ent("entrenador = '".$nif_entrena."' AND usuario = '".$nif_cliente."' AND id = '".$idUsuarioEntrenador."'");
        if ($consulta) {
            return true;
        }
        else {
        	return false;
        }
    }
    
    public function verUsuarios()
    {
        return $this->usuarioDAO->verUsuarios();
    }

    public function buscarUsuario($nombre)
    {
        return $this->usuarioDAO->buscarUsuario($nombre);
    }
    
    //FIN FUNCIONES USUARIODAO     /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /  
    
    //FUNCIONES MENSAJESDAO     /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /
    public function selectMensajes($col, $cond){
        return $this->mensajesDAO->select($col, $cond);
    }
    
    public function insertMensajes($col, $values){
        return $this->mensajesDAO->insert($col, $values);
    }
    
    public function updateMensajes($set, $cond){
        return $this->mensajesDAO->update($set, $cond);
    }
    
    public function deleteMensajes($cond){
        return $this->mensajesDAO->delete($cond);
    }
    //FIN FUNCIONES MENSAJESDAO     /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   / 
    
    //FUNCIONES VALORACIONDAO     /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /
    public function selectValor($col, $cond){
        return $this->valoracionDAO->select($col, $cond);
    }
    
    public function insertValor($col, $values){
        return $this->valoracionDAO->insert($col, $values);
    }
    
    public function updateValor($set, $cond){
        return $this->valoracionDAO->update($set, $cond);
    }
    
    public function deleteValor($cond){
        return $this->valoracionDAO->delete($cond);
    }
    //FIN FUNCIONES VALORACIONDAO     /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /
    
    //FUNCIONES ALIMENTODAO     /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /

    public function listarAlimentos()
    {
        return $this->alimentoDAO->listarAlimentos();
    }
    
    public function selectAlimento($col, $cond){
        return $this->alimentoDAO->select($col, $cond);
    }
    
    public function insertAlimento($col, $values){
        return $this->alimentoDAO->insert($col, $values);
    }
    
    public function updateAlimento($set, $cond){
        return $this->alimentoDAO->update($set, $cond);
    }
    
    public function deleteAlimento($cond){
        return $this->alimentoDAO->delete($cond);
    }
    //FIN FUNCIONES ALIMENTODAO     /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /

    //FUNCIONES COMIDADAO     /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /    

    public function registrarComida($alimento_1, $alimento_2, $alimento_3, $tipo, $nif)
    {
        return $this->comidaDAO->registrarComida($alimento_1, $alimento_2, $alimento_3, $tipo, $nif);
    }
    
    public function verComidas($nif)
    {
        return $this->comidaDAO->verComidas($nif);
    }

    public function eliminarComida($fecha, $nif)
    {
        return $this->comidaDAO->eliminarComida($fecha, $nif);
    }

    public function editarComida($fecha, $alimento_1, $alimento_2, $alimento_3, $tipo, $nif)
    {
        return $this->comidaDAO->editarComida($fecha, $alimento_1, $alimento_2, $alimento_3, $tipo, $nif);
    }
    
    //FIN FUNCIONES COMIDADAO     /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /

   //FUNCIONES ENTRENAMIENTOSDAO     /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /  
    public function eliminarEntrenamiento($idEntrenamiento){
         $this->entrenamientoDAO->delete($idEntrenamiento);
    }


    public function listarEntrenamientos($idUsuarioEntrenador)
    {

        $consulta = $this->entrenamientoDAO->listarEntrenamientos($idUsuarioEntrenador);

        $row = array();
        $entrena = array();
       

        if ($consulta) {
            while ($fila = mysqli_fetch_assoc($consulta)){
               
                $idEntrenamiento = $fila['idEntrenamiento'];
                $entrenamiento = $this->entrenamientoDAO->cargarEntrenamiento($idEntrenamiento);

                $row['nombre'] = $entrenamiento->getNombre();
                $row['repeticiones'] = $entrenamiento->getRepeticiones();
                $row['fecha'] = $entrenamiento->getFecha();


                 $consulta2 = $this->ejercicioDAO->listarEjercicios($idEntrenamiento);
                 $aux = array();
             
                    while($filaEjercicios = mysqli_fetch_assoc($consulta2)){
                        $ejercicios = array();
                        

                        $ejercicio = $this->ejercicioDAO->cargarEjercicio($filaEjercicios['idEjercicio']);
                        $ejercicios['nombreEjercicio'] = $ejercicio->getNombre();
                        $ejercicios['caloriasGastadas'] = $ejercicio->getCaloriasGastadas();
                        $ejercicios['descripcion'] = $ejercicio->getDescripcion(); 
                        $ejercicios['multimedia'] = $ejercicio->getMultimedia();
                       $aux[] = $ejercicios;
                                         
                    }
                
                     $row['id'] = $idEntrenamiento;
                     $row['ejercicios'] = $aux;
                     
                $entrena[] = $row;
            }
        }
        
        return $entrena;
    }

     public function nuevoEntrenamiento($datos, $idUsuarioEntrenador)
    {   
    
       $entrenamiento = $this->entrenamientoDAO->crearEntrenamiento($datos, $idUsuarioEntrenador);

       foreach ($datos['ejercicios'] as $nombre) {
    
            $consulta = $this->ejercicioDAO->buscarIdEjercicio($nombre);

            if($consulta){
                 $fila = mysqli_fetch_assoc($consulta);

                $id = $fila['idEjercicio'];
            }
     //echo 'idejercicio'.$id."<br>";
     //echo 'entrena'.$entrenamiento->getIdEntrenamiento()."<br>";
            $this->ejercicioDAO->agregarEjercicioaEntrenamiento($entrenamiento->getIdEntrenamiento(), $id);

       }
    
        
    }
    
    //FIN FUNCIONES ENTRENAMIENTOSDAO     /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /
    
     //FUNCIONES EJERCICIODAO     /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /  
    public function listarEjercicios()
    {
        $consulta = $this->ejercicioDAO->listarNombresEjercicios();
       
         $ejercicios = array();

        if ($consulta) {
            while ($fila = mysqli_fetch_assoc($consulta)){
                $ejercicios[] = $fila['nombre'];
            }
        }

        return $ejercicios;
    }

    public function listarTodosEjercicios(){
        $col='nombre, caloriasGastadas, tipo, descripcion, multimedia';
        return $consulta = $this->ejercicioDAO->listarTodosEjercicios($col);
    }

    public function buscarEjercicio($ejercicio){
        $col ='nombre, caloriasGastadas, tipo, descripcion, multimedia';
        return $consulta = $this->ejercicioDAO->buscarEjercicio($col, $ejercicio);
    }
    
    public function selectEjercicio($col, $cond){
        return $this->ejercicioDAO->select($col, $cond);
    }
    
    public function insertEjercicio($col, $values){
        return $this->ejercicioDAO->insert($col, $values);
    }
    
    public function updateEjercicio($set, $cond){
        return $this->ejercicioDAO->update($set, $cond);
    }
    
    public function deleteEjercicio($cond){
        return $this->ejercicioDAO->delete($cond);
    }
    
    //FIN FUNCIONES EJERCICIODAO     /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /
    
    //FUNCIONES FORO    /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /
    public function listarTemas()
    {
        return $this->foroDAO->listarNombresTemas();
    }
    
    public function mostrarMensaje($id)
    {
        return $this->foroDAO->mostrarContenidoMensaje($id);
    }
    
    public function mostrarRespuestas($id_tema)
    {
        return $this->foroDAO->mostrarRespuestasMensaje($id_tema);
    }
    
    public function nuevoMensaje($datos)
    {
        return $this->foroDAO->inserta($datos['autor'], $datos['texto'], $datos['id_r'], $datos['tema']);
    }
    
    public function borrarMensaje($id)
    {
        return $this->foroDAO->elimina($id);
    }
    
    public function editarMensaje($datos)
    {
        return $this->foroDAO->modifica($datos['id'], $datos['texto']);
    }
    //FIN FUNCIONES FORO    /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /
    //FUNCIONES AMIGOS    /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /
    public function listarMisAmigos($nif){
        return $this->usuarioDAO->listarMisAmigos($nif);
    }
    public function enviarSolicitudAmistad($usuario1, $usuario2){
        $this->usuarioDAO->añadirAmigo($usuario1, $usuario2);
    }
    public function aceptarSolicitudAmistad($id){
        $this->usuarioDAO->aceptarSolicitudAmistad($id);
    }
    public function rechazarSolicitudAmistad($id){
         $this->usuarioDAO->eliminarAmigo($id);
     }
    public function eliminarAmigo($id){
        $this->usuarioDAO->eliminarAmigo($id);
    }

     //FIN FUNCIONES AMIGOS    /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /

   
}

