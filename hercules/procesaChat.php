<?php 
	require_once 'includes/config.php';
	
	if (isset($_POST['send'])) {
	    $str = filter_var($_POST['men'], FILTER_SANITIZE_STRING);
	    
	    if (trim($str) != '') {
	        $values = '';
	        $values .= "'".$_POST['emisor']."','".$_POST['receptor']."','".$_POST['men']."'";
	        
	        $ctrl->insertMensajes('emisor, receptor, texto', $values);
	    }
	}
	header("Location: miPerfilBuzon.php?reciever=".$_POST['receptor']);
?>
