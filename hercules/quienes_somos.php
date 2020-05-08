<?php 
	require_once 'includes/config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="includes/css/estilo.css" />
	<link rel="stylesheet" type="text/css" href="includes/estiloQuienessomos.css" />
	<script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
	<meta charset="utf-8">
	<title>HERCULES</title>
</head>

<body>

<div id="contenedor">

	<?php

		require('./includes/comun/cabecera.php');

	?>

	<div id="contenido">
		<div class="cab">
		<h1>Quienes somos</h1>
		<img src="includes/img/entrenadores.png" alt="entrenadores">
		</div>

		
		<p> Somos un grupo de estudiantes de la Universidad Complutense de Madrid ,la idea de esta plataforma nacío gracias a 
		un miembro del equipo cuyo nombre es Emilio, esta plataforma se dedica a facilitar acceso a los usuarios para poder ejercitarse 
		de una forma monitorizada y sin tener que desplazarse. </p>
		<h2>Miembros del equipo:</h2>

		<div id="listafotos">
		<ul>
			<li class=fotos>
			<a href=""><img src="includes/img/nosotros/emilio.jpg" alt="foto de emilio"  /></a>
			<p>Emilio José Valencia</p>
			</li>

			<li class=fotos>
			<a href=""><img src="includes/img/nosotros/geraldyn.jpg" alt="foto de Geraldyn" /></a>
			<p>Geraldyn Carrero Azuaje</p>
			</li>
			<li class=fotos>
			<a href=""><img src="includes/img/nosotros/juan.jpg" alt="foto de Juan"  /></a>
			<p>Cheng Jun Liu Zheng</p>
			</li>
			
			<li class=fotos>
			<a href=""><img src="includes/img/nosotros/jaime.jpg" alt="foto de Jaime"  /></a>
			<p>Jaime Madriñán Fernández</p>
			</li>
			
			<li class=fotos>
			<a href=""><img src="includes/img/nosotros/mingyang.jpg" alt="foto de mingyang"  /></a>
			<p>Mingyang Chen</p>
			</li>
			
			<li class=fotos>
			<a href=""><img src="includes/img/nosotros/yomismele.jpg" alt="foto de Manu" /></a>
			<p>Manuel Espinosa Guerra</p>
			</li>

			<li class=fotos>
			<a href=""><img src="includes/img/nosotros/miriam.jpg" alt="foto de Miriam" /></a>
			<p class="fotos">Miriam Elizabeth Cabana Ramírez.</p>
			</li>

		</ul>
		</div>

	</div>

	<?php	

		require('./includes/comun/pie.php');

	?>
</div> <!-- Fin del contenedor -->

</body>
</html>