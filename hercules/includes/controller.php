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
require_once(__DIR__ . '/DAOs/recomendacionesDAO.php');
require_once(__DIR__ . '/DAOs/ejercicioDAO.php');
require_once(__DIR__ . '/DAOs/foroDAO.php');
require_once(__DIR__ . '/DAOs/mensajesDAO.php');

class controller{

   private $usuarioDAO;
    private $alimentoDAO;
    private $comidaDAO;
    private $entrenamientoDAO;
    private $recomendacionesDAO;
    private $ejercicioDAO;
    private $foroDAO;
    private $mensajesDAO;
    private static $instance = null;

    public function __construct(){
        $this->usuarioDAO = new UsuarioDAO();
        $this->alimentoDAO = new alimentoDAO();
        $this->comidaDAO = new comidaDAO();
        $this->entrenamientoDAO = new entrenamientoDAO();
        $this->recomendacionesDAO = new recomendacionesDAO();
        $this->ejercicioDAO = new ejercicioDAO();
        $this->foroDAO = new foroDAO();
        $this->mensajesDAO = new mensajesDAO();
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
                $set .= "nombre=' ".$u['nombre']."', ";
            if($u['password'] !== "")
                $set .= "contrasenna='".$u['password']."', ";
            if($u['email'] !== "")
                $set .= "email='".$u['email']."'";
            /*if($u['fechaNac'] !== null)
                $set .= "fechaNac='".$u['fechaNac']."'";
            if($u['ubicacion'] !== null)
                $set .= "ubicacion='".$u['ubicacion']."'";
            if($u['peso'] !== null)
                $set .= "peso='".$u['peso']."'";
            if($u['preferencias'] !== null)
                $set .= "preferencias='".$u['preferencias']."'";
            if($u['telefono'] !== null)
                $set .= "telefono='".$u['telefono']."'";
            */
            $cond="nif = '".$u['nif']."'";
            
            return $this->usuarioDAO->updateUsuario($set, $cond);
        }
        else {
            return 0;
        }
    }
    
    public function deleteUsuario($nif){
        if ($this->cargarUsuario($arr['nif']) !== 0) {
            return $this->usuarioDAO->deleteUsuario("nif='".$nif);
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


    public function registra($arr = array()){
        $usuario = $this->cargarUsuario($arr['nif']);
        if ($usuario === 0) {
            $usuario = new TOUsuario();
            $usuario->setNif($arr["nif"]);
            $usuario->setNombre($arr["nombre"]);
            $usuario->setPassword(password_hash($arr["contrasenna"], PASSWORD_DEFAULT));
            $usuario->setEmail($arr["email"]);
            $usuario->setTipoUsuario($arr["tipoUsuario"]);
            
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

    public function listarEntrenadores($nif=0){
        $col='nif, nombre, titulacion, especialidad, experiencia';
        $cond='';
        if ($nif) {
            $cond="tipoUsuario = 1 AND nif != '" .$nif."'";
        }
        else {
            $cond="tipoUsuario = 1";
        }
        return $consulta = $this->usuarioDAO->selectUsuario($col, $cond);
    }
    
    public function listarMisEntrenadores($nif){
        
        $col = "entrenador";
        $cond="usuario = '".$nif."' AND estado = 'aceptado'";
       
        return $consulta = $this->usuarioDAO->selectUs_Ent($col, $cond);
    }

    public function listarMisClientes($nif){
         
        $col = "usuario";
        $cond="entrenador = '".$nif."' AND estado = 'aceptado'";
       
        $consulta = $this->usuarioDAO->selectUs_Ent($col, $cond);
 
       if ($consulta) {
        $result = array();
        foreach ($consulta as $value) {
           $result[] = $this->cargarUsuario($value['usuario']);
        }
            return $result;
        }else{
            return false;
        }

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
        $consulta = $this->usuarioDAO->miBuzon($nif);

        $clientes = array();

        if ($consulta) {
            while ($fila = mysqli_fetch_assoc($consulta)){
                $clientes[] = $fila['usuario'];
            }
        }

        $nom_clientes = array();

        foreach ($clientes as $value) {
            $u = $this->usuarioDAO->cargarUsuario($value);
            $nom_clientes[$u->getNif()] = $u->getNombre();
        }

        return $nom_clientes;
    }

    public function responderSolicitud($nif_entrena, $nif_cliente, $aceptar){
        $consulta = $this->usuarioDAO->responderSolicitud($nif_entrena, $nif_cliente, $aceptar);

        return $consulta;
    }
    
	public function idUsuarioEntrenador($nif_entrena, $nif_cliente){

        $consulta = $this->usuarioDAO->getIdUsuarioEntrenador($nif_cliente, $nif_entrena);
        $id = null;
        if ($consulta) {
            $fila = mysqli_fetch_assoc($consulta);

                $id = $fila['id'];

        }
        return $id;
    }

    public function eliminarEntrenador($nif_cliente, $nif_entrena){
        $idUsuarioEntrenador = $this->idUsuarioEntrenador($nif_entrena, $nif_cliente);

        $consulta = $this->usuarioDAO->eliminarIdUsuarioEntrenador($nif_cliente, $nif_entrena, $idUsuarioEntrenador);
        if ($consulta) {
            return true;
        }
        else {
        	return false;
        }
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
    
    
    //FUNCIONES ALIMENTODAO Y COMIDADAO     /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /
    public function listarAlimentos()
    {
        return $this->alimentoDAO->listarAlimentos();
    }
    
    public function registrarComida($alimento_1, $alimento_2, $alimento_3, $tipo, $nif)
    {
        return $this->comidaDAO->registrarComida($alimento_1, $alimento_2, $alimento_3, $tipo, $nif);
    }
    
    public function verComidas($nif)
    {
        return $this->comidaDAO->verComidas($nif);
    }
    
    //FIN FUNCIONES ALIMENTODAO Y COMIDADAO     /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /
    

   //FUNCIONES ENTRENAMIENTOSDAO     /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /  
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
                        $ejercicios['nombreEjercicio'] = "Nombre: ".$ejercicio->getNombre();
                        $ejercicios['caloriasGastadas'] = " Calorías Gastadas: ". $ejercicio->getCaloriasGastadas();
                        $ejercicios['descripcion'] = "Descripcion: ".$ejercicio->getDescripcion();    

                       $aux[] = $ejercicios;
                                         
                    }
                
                 
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
    
    //FIN FUNCIONES EJERCICIODAO     /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /
    
    //FUNCIONES FORO    /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /
    public function listarTemas()
    {
        $consulta = $this->foroDAO->listarNombresTemas();
        
        $ret = array();
        $tema = array();
        
        if ($consulta) {
            while ($fila = mysqli_fetch_assoc($consulta)){
                $tema[] = $fila['tema'];
                $tema[] = $fila['autor'];
                $tema[] = $fila['fecha'];
                $tema[] = $fila['respuestas'];
                $ret[] = $tema;
            }
        }
        
        return $ret;
    }
    //FIN FUNCIONES FORO    /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /   /
    
}

