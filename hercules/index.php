<?php 
	require_once 'includes/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/estiloPagPrincipal.css" />
	<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
	<title>HERCULES</title>
</head>

<body>

<div id="contenedor">

	<?php

		require('includes/comun/cabecera.php');

	?>

	<!-- Banner principal -->
	<div class="main-banner" id="main-banner">
		<div class="imgban" id="imgban1">
			<div class="imgban-box">
				<h2>Bienvenido a Hércules</h2>
				<p>Comienza a navegar ya en nuestro sitio</p>
			</div>
		</div>
		<div class="imgban" id="imgban2">
			<div class="imgban-box">
				<h2>¡Regístrate o inicia sesión para disfrutar de todas las ventajas!</h2>
				<p>Consulta el histórico de tus ejercicios realizados...</p>
			</div>
		</div>
		<div class="imgban" id="imgban3">
			<div class="imgban-box">
				<h2>Conoce a nuestros Entrenadores</h2>
			</div>
		</div>
	</div>

	<div id="contenido">

		<!-- Script JavaScript del Banner principal -->
		<script type="text/javascript">
			var bannerStatus = 1;
			var bannerTimer = 4000;

			window.onload = function (){
				bannerLoop();
			}

			var startBannerLoop = setInterval(function(){
				bannerLoop();
			}, bannerTimer);

			function bannerLoop(){
				if (bannerStatus === 1){
					document.getElementById("imgban2").style.opacity = "0";
					setTimeout(function(){
						document.getElementById("imgban1").style.right = "0px";
						document.getElementById("imgban1").style.zIndex = "1000";
						document.getElementById("imgban2").style.right = "-100%";
						document.getElementById("imgban2").style.zIndex = "1500";
						document.getElementById("imgban3").style.right = "100%";
						document.getElementById("imgban3").style.zIndex = "500";
					}, 500);
					setTimeout(function(){
						document.getElementById("imgban2").style.opacity = "1";
					}, 1000);
					bannerStatus = 2;
				}

				else if (bannerStatus === 2){
					document.getElementById("imgban3").style.opacity = "0";
					setTimeout(function(){
						document.getElementById("imgban2").style.right = "0px";
						document.getElementById("imgban2").style.zIndex = "1000";
						document.getElementById("imgban3").style.right = "-100%";
						document.getElementById("imgban3").style.zIndex = "1500";
						document.getElementById("imgban1").style.right = "100%";
						document.getElementById("imgban1").style.zIndex = "500";
					}, 500);
					setTimeout(function(){
						document.getElementById("imgban3").style.opacity = "1";
					}, 1000);
					bannerStatus = 3;
				}

				else if (bannerStatus === 3){
					document.getElementById("imgban1").style.opacity = "0";
					setTimeout(function(){
						document.getElementById("imgban3").style.right = "0px";
						document.getElementById("imgban3").style.zIndex = "1000";
						document.getElementById("imgban1").style.right = "-100%";
						document.getElementById("imgban1").style.zIndex = "1500";
						document.getElementById("imgban2").style.right = "100%";
						document.getElementById("imgban2").style.zIndex = "500";
					}, 500);
					setTimeout(function(){
						document.getElementById("imgban1").style.opacity = "1";
					}, 1000);
					bannerStatus = 1;
				}


			}

		</script>

		<p >Nuestra plataforma está especialmente diseñada para que los 
		usuarios puedan ejercitarse sin necesidad de desplazarse ni de
		quedarse a una hora en concreta  también dando la posibilidad de 
		poder realizar registro y seguimiento del entrenamiento .</p>

	</div>
		

	<?php	

		require('includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>