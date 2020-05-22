<?php  

require_once 'includes/config.php';

if (isset($_POST['admin_submit'])) {
    switch ($_POST['admin_submit']) {
        case 'elim_user':   
            $ctrl->deleteUsuario($_POST['user']);
            header("Location: adminUsuario.php");
            break;
        case 'edit_user': 
            //CONTRASEÑA
            $passwordA = isset($datos['passwordA']) ? $datos['passwordA'] : null;
            $password = isset($datos['password']) ? $datos['password'] : null;
            $password2 = isset($datos['password2']) ? $datos['password2'] : null;
            
            if(!empty($passwordA)){
                if(!password_verify ($passwordA, $_SESSION['usuario']->getPassword())){
                    $erroresFormulario[] = "Contraseña incorrecta. No se puede modificar tu contraseña";
                }else{
                    if ( empty($password) || mb_strlen($password) < 8 ) {
                        $erroresFormulario[] = "La contraseña nueva tiene que tener una longitud de al menos 8 caracteres.";
                    }else{
                        if ( empty($password2) || strcmp($password, $password2) !== 0 ) {
                            $erroresFormulario[] = "Las contraseñas no coinciden.";
                        }
                    }
                }
            }
            
            if((empty($passwordA)) && ($password != "" || $password2 != "")){
                $erroresFormulario[] = "Debes meter tu contraseña anterior para poder cambiarla.";
            }
            
            //FOTO
            if($_FILES['uploadImage']['name'] != ""){
                if (!$this->subir_fichero("includes/img/usuarios",'uploadImage', $datos['nif']))
                    $erroresFormulario[] = "Foto incorrecta. Compruebe el formato del archivo";
                    $datos['foto'] = "includes/img/usuarios/".$datos['nif'].".jpg";
            }else{
                $datos['foto'] = "";
            }
            
            if (count($erroresFormulario) === 0) {
                $ctrl->updateUsuario2($datos);
                
                header("Location: adminUsuario.php");
                exit();
            }
            else {
                
            }
            $ctrl->updateUsuario2($datos);
            header("Location: adminUsuario.php");
            break;
        case 'crear_alim': 
            break;
        case 'elim_alim':
            break;
        default:
            
    }
    exit();
}
else {
    echo '<h2>ERROR</h2>';
}