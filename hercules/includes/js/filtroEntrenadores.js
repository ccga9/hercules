$(document).ready(function(){
	$('.category-list .categoryItem[category="all"]').addClass('ct_item-active');


	//Filtro
	$('.categoryItem').click(function(){
		var catElem = $(this).attr('category');
		console.log(catElem);

		$('.categoryItem').removeClass('ct_item-active');
		$(this).addClass('ct_item-active');

		//Ocultar elementos
		$('.elem-item').hide();

		//Mostrar elementos por categoria
		$('.elem-item[category="'+catElem+'"]').show();


	});

	//Cuando hago clic en all, los muestro a todos
	$('.categoryItem[category="all"]').click(function(){
		$('.elem-item').show();
	});

});