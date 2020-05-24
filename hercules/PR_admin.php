<?php  

require_once 'includes/config.php';

function subir_fichero($directorio_destino, $nombre_fichero, $nif)
{
    $tmp_name = $_FILES[$nombre_fichero]['tmp_name'];
    //si hemos enviado un directorio que existe realmente y hemos subido el archivo
    
    if (is_dir($directorio_destino) && is_uploaded_file($tmp_name))
    {
        
        $img_file = $nif.".jpg";
        $img_type = $_FILES[$nombre_fichero]['type'];
        
        // Si se trata de una imagen
        if (((strpos($img_type, "gif") || strpos($img_type, "jpeg") ||
            strpos($img_type, "jpg")) || strpos($img_type, "png")))
        {
            //¿Tenemos permisos para subir la imágen?
            if (move_uploaded_file($tmp_name, $directorio_destino . '/' . $img_file))
            {
                return true;
            }
        }
    }
    //Si llegamos hasta aquí es que algo ha fallado
    return false;
}

if (isset($_POST['admin_submit'])) {
    switch ($_POST['admin_submit']) {
        case 'elim_user':   
            $ctrl->deleteUsuario($_POST['user']);
            header("Location: adminUsuario.php");
            exit();
            break;
        case 'edit_ejer': 
            
            //FOTO
            if($_FILES['uploadImage']['name'] != ""){
                if (!subir_fichero("includes/img",'uploadImage', $_POST['nombre']))
                    $erroresFormulario[] = "Foto incorrecta. Compruebe el formato del archivo";
                    
                    $datos['foto'] = "includes/img/".$_POST['nombre'].".jpg";
            }
            
            //NOMBRE
            $nombre = isset($_POST['nombre']) ? htmlspecialchars(strip_tags($_POST['nombre'])) : null;
            $_POST['nombre'] = $nombre;
            
            //TIPO
            $tipo = isset($_POST['tipo']) ? htmlspecialchars(strip_tags($_POST['tipo'])) : null;
            $_POST['tipo'] = $tipo;
            
            //DESCRIPCION
            $desc = isset($_POST['desc']) ? htmlspecialchars(strip_tags($_POST['desc'])) : null;
            $_POST['desc'] = $desc;
            
            if ( !empty($nombre) && !empty($tipo) && !empty($desc) ) {
                $set = "nombre='".$_POST['nombre']."', caloriasGastadas='".$_POST['cal']."', tipo='".$_POST['tipo'].
                "', descripcion='".$_POST['desc']."'";
                
                if ($_FILES['uploadImage']['name'] != "")
                    $set .= ", multimedia='".$datos['foto']."'";
                
                $ctrl->updateEjercicio($set, "idEjercicio='".$_POST['idEjer']."'");
                header("Location: adminEjercicio.php");
                exit();
            }
           
            break;
        case 'elim_ejer':
            $ctrl->deleteEjercicio("idEjercicio='".$_POST['user']."'");
            header("Location: adminEjercicio.php");
            exit();
            break;
        case 'edit_alim': 
            
            $nombre = isset($datos['nombre']) ? htmlspecialchars(strip_tags($datos['nombre'])) : null;
            $datos['nombre'] = $nombre;
            
            if ( !empty($nombre) ) {
                $set = "nombre='".$_POST['nombre']."', caloriasConsumidas='".$_POST['cal']."', carbohidratos='".$_POST['car'].
                "', proteinas='".$_POST['prot']."', grasas='".$_POST['gras']."'";
                $ctrl->updateAlimento($set, "idAlimento='".$_POST['idalim']."'");
                header("Location: adminAlimento.php");
                exit();
            }
        
            break;
        case 'elim_alim':
            $ctrl->deleteAlimento("idAlimento='".$_POST['user']."'");
            header("Location: adminAlimento.php");
            exit();
            break;
        default:
            echo '<h2>ERROR</h2>';
            break;
    }
}
else {
    echo '<h2>ERROR</h2>';
}