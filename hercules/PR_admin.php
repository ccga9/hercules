<?php  

require_once 'includes/config.php';

if (isset($_POST['admin_submit'])) {
    switch ($_POST['admin_submit']) {
        case 'elim_user':   
            $ctrl->deleteUsuario($_POST['user']);
            header("Location: adminUsuario.php");
            exit();
            break;
        case 'edit_ejer': 
            
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
            break;
    }
}
else {
    echo '<h2>ERROR</h2>';
}