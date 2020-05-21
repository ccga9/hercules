/**
 * 
 */


var btnAbrir = document.getElementById('abrir'),
	overlay = document.getElementById('overlay'),
	popup = document.getElementById('popup'),
	btnCerrar = document.getElementById('cerrar');

btnAbrir.addEventListener('click', function() {
	overlay.classList.add('active');
});

btnCerrar.addEventListener('click', function() {
	overlay.classList.remove('active');
});

  


function eliminarEntrenami(indice){
											var btnAbrir = document.getElementById('abrir'+ indice),
												overlay = document.getElementById('overlay'),
												popup = document.getElementById('popup'),
												btnCerrar = document.getElementById('cerrar');
												document.getElementById('idEnt').value=indice;


											
												overlay.classList.add('active');
											

											btnCerrar.addEventListener('click', function() {
												overlay.classList.remove('active');
											});

										}