<?php  
	require_once(__DIR__.'/includes/config.php');
	require_once(__DIR__.'/includes/Forms/FormularioRegistro.php');
	
	$act = new FormularioRegistro();
	$html=$act->gestiona();
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/css/estilo.css" />
	<link rel="stylesheet" type="text/css" href="includes/css/estiloFormularios.css" />
	<script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
	<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
	<title>Hércules</title>
<script type="text/javascript">
	
	function Edad(FechaNacimiento) {

    var fechaNace = document.getElementById("fecha").value;
    var fechaActual = new Date()

    var mes = fechaActual.getMonth();
    var dia = fechaActual.getDate();
    var año = fechaActual.getFullYear();

    fechaActual.setDate(dia);
    fechaActual.setMonth(mes);
    fechaActual.setFullYear(año);

    edad = Math.floor(((fechaActual - fechaNace) / (1000 * 60 * 60 * 24) / 365));
   
    document.getElementById("result").innerHTML="Tienes "+edad+" años, "+meses+" meses y "+dias+" días";
}

</script>

		    <script>
		    		$(document).ready(function(){
					$("#correoOK").hide();
					$("#userOK").hide();
					$("#campoUser").change(function(){
						var url = "comprobarUsuario.php?user=" + $("#campoUser").val();
						$.get(url,usuarioExiste);
					});
					$("#campoEmail").change(function(){
						if(correoValido($("#campoEmail").val())){
							$("#correoMal").hide();
							$("#correoOK").show();
						}
						else{
							$("#correoMal").show();
							$("#correoOK").hide();
						}
					});

					function correoValido(correo){
						var arroba = correo.indexOf("@");
						correo = correo.substring(arroba, correo.length);
						var punto = correo.indexOf(".");
						correo = correo.substring(punto + 1, correo.length);
						return (arroba > 0 && punto > 1 && correo.length > 0);
					}
					/*Data: contendra la respuesta del servidor
					Status: contendra el tipo de respuesta*/
					function usuarioExiste(data, status){
						if(data == "duplicado"){
							$("#userMal").show();
							$("#userOK").hide();
							$("#campoUser").focus(); //Devuelvo el foco
							alert("El usuario ya existe, escoge otro");
						}
						else if(data == "disponible"){
							$("#userOK").show();
							$("#userMal").hide();
						}
					}
				});
				
			</script>
	
</head>

<body>

<div id="contenedor">

	<?php	

		require('./includes/comun/cabecera.php');

	?>

	<div id="contenido">
		<?php  
			echo $html;
		?>
	</div>

	<?php	

		require('./includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>