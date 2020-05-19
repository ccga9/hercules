<?php  

require_once 'includes/config.php';

if (isset($_POST['admin_submit'])) {
    switch ($_POST['admin_submit']) {
        case 'elim_user':   
            $ctrl->deleteUsuario($_POST['user']);
            header("Location: adminUsuario.php");
            break;
        case 'elim_ejer': 
            break;
        case 'elim_alim': 
            break;
    }
    exit();
}
else {
    echo '<h2>ERROR</h2>';
}