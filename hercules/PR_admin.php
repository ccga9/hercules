<?php  

require_once 'includes/config.php';

if (isset($_POST['admin_submit'])) {
    switch ($_POST['admin_submit']) {
        case 'elim_user':   
            $ctrl->deleteUsuario($_POST['user']);
            header("Location: adminUsuario.php");
            break;
        case 'crear_ejer': 
            break;
        case 'crear_alim': 
            break;
        case 'elim_alim':
            break;
        default:
            break;
    }
    exit();
}
else {
    echo '<h2>ERROR</h2>';
}