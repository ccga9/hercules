<?php  
require_once(__DIR__.'/Form.php');
require_once(__DIR__.'/../DAOs/usuarioDAO.php');
require_once(__DIR__.'/../controller.php');
require_once('registro.php');

class FormNuevoEjercicio extends Form {

	public function __construct()
    {
    	parent::__construct('registro', array());
    }

    /**
     * Se encarga de orquestar todo el proceso de gestión de un formulario.
     */
    public function gestiona()
    {   
        return parent::gestiona();
    }

    /**
     * Genera el HTML necesario para presentar los campos del formulario.
     *
     * @param string[] $datosIniciales Datos iniciales para los campos del formulario (normalmente <code>$_POST</code>).
     * 
     * @return string HTML asociado a los campos del formulario.
     */
    protected function generaCamposFormulario($datosIniciales)
    {
    	$ret = '';
        $ret .= '<div class="form-registro">';
    	$ret .= '<fieldset>';
           $ret .= '<legend>REGISTRO DE EJERCICIO</legend>';
           
            $ret .= '<div class="grupo-control">';     
                $ret .= '<label>Sube foto</label><input name="uploadImage" type="file" value= "includes/img/usuarios/default.png" placeholder="&#128100/>';
            $ret .= '</div>';
           
            $ret .= '<div class="grupo-control">';
                $ret .= '<label>Nombre completo:</label> <input class="control" type="text" placeholder="&#128100;Nombre y apellidos" name="nombre" required/>';
            $ret .= '</div>';
            $ret .= '<div class="grupo-control">';
                $ret .= '<label>Fecha de nacimiento</label> <input class="control" type="date" placeholder="&#128231;Fecha de nacimiento" name="fecha" id = "fecha" onclick="javascript:calcularEdad();" required/>';
            $ret .= '</div>';
           
            $ret .= '<div class="grupo-control">';
                $ret .= '<label>E-mail:</label> <input class="control" type="text" placeholder="&#128231;Correo electrónico" name="email" required/>';
            $ret .= '</div>';
             $ret .= '<div class="grupo-control">';
                $ret .= '<label>Número de telefono</label> <input class="control" type="tel" placeholder="&#x1f4f1;(Opcional)" name="telefono" pattern="^[9|8|7|6]\d{8}$" />';
            $ret .= '</div>';
            $ret .= '<div class="grupo-control">';
                $ret .= '<label>Peso (Kgs)</label>  <input type="number"  name="peso" placeholder="0.0(Opcional)" step="0.01" min="40.0" max="300.0" >';
            $ret .= '</div>';
             $ret .= '<div class="grupo-control">';
                $ret .= '<label>Altura (cm)</label>  <input type="number"  name="altura" placeholder="0.0(Opcional)" step="0.01" min="40.0" max="300.0" >';
            $ret .= '</div>';
            $ret .= '<div class="grupo-control">';
                $ret .= '<label>Preferencias</label> <input class="control" type="text" placeholder="&#128100(Opcional);Introduce lo que buscas" name="preferencias"/>';
            $ret .= '</div>';
            $ret .= '<div class="grupo-control">';
                $ret .= '<label>Ubicación</label> <input class="control" type="text" placeholder="&#128100(Opcional);Introduce tu ubicacion" name="ubicacion"/>';
            $ret .= '</div>';

            $ret .= '<div class="grupo-control">';
                $ret .= '<label>Password:</label> <input class="control" type="password" placeholder="&#128272;Contraseña" name="contrasenna" required/>';
            $ret .= '</div>';

            $ret .= '<div class="grupo-control">';
                $ret .= '<label>Vuelve a introducir el Password:</label> <input class="control" type="password" placeholder="&#128272;Repita contraseña" name="contra2" required/>';
            $ret .= '</div>';
      
            $ret .= '<label for="hombre">Hombre</label> <input type="radio" name="sexo" value="Hombre" id="hombre">';
            $ret .= '<label for="mujer">Mujer</label><input type="radio" name="sexo" value="Mujer" id="mujer">';
            
            $ret .= '<label>Dale a la casilla si eres entrenador/a (Rellena los campos de abajo)</label> <input type="checkbox" name="tipoUsuario" value="ok"/>';

            $ret .= '<div class="grupo-control">';
                $ret .= '<label>Titulacion</label> <input class="control" type="text" placeholder="&#127891;Titulación" name="titulacion" />';
            $ret .= '</div>';

            $ret .= '<div class="grupo-control">';
                $ret .= '<label>Especialidad</label> <input class="control" type="text" placeholder="&#127941;Especialidad" name="especialidad" />';
            $ret .= '</div>';

            $ret .= '<div class="grupo-control">';
                $ret .= '<label>Experiencia</label> <input class="control" type="text" placeholder="&#9874;Experiencia" name="experiencia" />';
            $ret .= '</div>';

            $ret .= '<div class="botones"><button type="submit" name="registro">Registrar</button>';
            $ret .= '<button type="reset" name="limpiar">Limpiar</button></div>';
		$ret .= '</fieldset>';
         $ret .= '</div>';
        return $ret;
    }

    /**
     * Procesa los datos del formulario.
     *
     * @param string[] $datos Datos enviado por el usuario (normalmente <code>$_POST</code>).
     *
     * @return string|string[] Devuelve el resultado del procesamiento del formulario, normalmente una URL a la que
     * se desea que se redirija al usuario, o un array con los errores que ha habido durante el procesamiento del formulario.
     */
    protected function procesaFormulario($datos)
    {
    	$erroresFormulario = array();


       /* //FECHA
        echo "<script>";
        echo "Edad(".$datos['fecha'].");";
        echo "</script>";*/
        //NIF
       $nif = isset($datos['nif']) ? htmlspecialchars(strip_tags(strtoupper($datos['nif']))) : null;
        $datos['nif'] = $nif;

        if ( empty($nif) || mb_strlen($nif) != 9 || !ctype_alnum($nif) ) {
            $erroresFormulario[] = "NIF/NIE invalido.";
        }
        //FOTO
        if($_FILES['uploadImage']['name'] != ""){
             if (!$this->subir_fichero("includes/img/usuarios",'uploadImage', $datos['nif']))
                $erroresFormulario[] = "Foto incorrecta. Compruebe el formato del archivo";
             $datos['foto'] = "includes/img/usuarios/".$nif.".jpg";
        }else{
             $datos['foto'] = "includes/img/usuarios/default.png";
        }
        //NOMBRE
        $nombre = isset($datos['nombre']) ? htmlspecialchars(strip_tags(strtoupper($datos['nombre']))) : null;
        $datos['nombre'] = $nombre;

        if ( empty($nombre) || mb_strlen($nombre) < 3) {
            $erroresFormulario[] = "El nombre tiene que tener una longitud de al menos 3 caracteres";
        }
        //FECHA
        if(!isset($datos['fecha']) || empty($datos['fecha']) ){
             $datos['fecha'] = "No especificado";
        }
        //EMAIL
        $email = isset($datos['email']) ? htmlspecialchars(strip_tags($datos['email'])) : null;
        $datos['email'] = $email; 

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erroresFormulario[] = "E-mail invalido.";
        }
        //NUMERO DE TELEFONO
        if(!isset($datos['telefono']) || empty($datos['telefono']) ){
             $datos['telefono'] = "No especificado";
        }
        //PESO
        if(!isset($datos['peso']) || empty($datos['peso'])){
             $datos['peso'] = "No especificado";
        }
        //ALTURA
        if(!isset($datos['altura']) || empty($datos['altura']) ){
             $datos['altura'] = "No especificado";
        }
        //PREFERENCIAS
        if(!isset($datos['preferencias'])|| empty($datos['preferencias']) ){
             $datos['preferencias'] = "No especificado";
        }
        //UBICACION
        if(!isset($datos['ubicacion'])|| empty($datos['ubicacion']) ){
             $datos['ubicacion'] = "No especificado";
        }
        //SEXO
       if(!isset($datos['sexo'])|| empty($datos['sexo']) ){
             $datos['sexo'] = "No especificado";
        }
     
        //CONTRASEÑA
        $password = isset($datos['contrasenna']) ? $datos['contrasenna'] : null;
        if ( empty($password) || mb_strlen($password) < 8 ) {
            $erroresFormulario[] = "La contraseña tiene que tener una longitud de al menos 8 caracteres.";
        }
        $password2 = isset($datos['contra2']) ? $datos['contra2'] : null;
        if ( empty($password2) || strcmp($password, $password2) !== 0 ) {
            $erroresFormulario[] = "Las contraseñas no coinciden.";
        }

        //ROL DEL USUARIO
        $rol = isset($datos['tipoUsuario']) ? 1 : 0;
        $datos['tipoUsuario'] = $rol;

        //EN CASO DE QUE SEA ENTRENADOR
        if ($rol == 1) {
            if ( !isset($datos['titulacion']) || empty($datos['titulacion']) ) {
                $erroresFormulario[] = "Como entrenador/a debes poner tu titulacion.";
            }
            if ( !isset($datos['especialidad']) || empty($datos['especialidad']) ) {
                $erroresFormulario[] = "Como entrenador/a debes poner tu especialidad.";
            }
            if ($datos['experiencia'] == 0) {
                $datos['experiencia'] == "Ninguna";
            }
            else if ( !isset($datos['experiencia']) || empty($datos['experiencia']) ) {
                $erroresFormulario[] = "Como entrenador/a debes poner tu experiencia.";
            }
        }

       
        
       if (count($erroresFormulario) === 0) {
            $ctrl = controller::getInstance();
            $us = $ctrl->registra($datos);
            
            if ($us !== 0) {
                $_SESSION['login'] = true;
                $_SESSION['usuario'] = $us;
            } else {
                $erroresFormulario[] = "Error al consultar en la BD: Puede que el usuario ya exista";
            }
        }

		if (count($erroresFormulario) === 0) {
			$erroresFormulario = "index.php";
		}
        
        return $erroresFormulario;
    }
}