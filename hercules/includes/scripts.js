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