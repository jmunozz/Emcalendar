$('body').on('click', 'span#d_return', function() {
	$('div.grey').remove();
	$('div.details').remove();
});

$('body').on('click', '.grey', function() {
	$('div.grey').remove();
	$('div.details').remove();
});

$('.event').click(function() {
	get_details($(this).attr('id'));
});

function get_details(elem_id) {
	var details = $('<div></div>').addClass('details');
	var details_header = $('<div></div>').addClass('details_header');
	var details_body = $('<div></div>').addClass('details_body');
	var details_footer = $('<div></div>').addClass('details_footer');

	$('<h4></h4>').text('Marché Escudier').prependTo(details_header);
	$('<small></small>').text('31 Janvier 10h00').appendTo(details_header);
	$('<p></p>').text("Descritpion de l'évènement").prependTo(details_body);
	$('<aside></aside>').addClass('details_infos').appendTo(details_body);
	$('<span></span>').addClass('material-icons').text('schedule').appendTo($('aside[class="details_infos"]'));
	$('<span></span>').text('A 10h00').appendTo($('aside[class="details_infos"]'));
	$('<span></span>').addClass('material-icons').text('account_circle').appendTo($('aside[class="details_infos"]'));
	$('<span></span>').text('Comité du Trapeze').appendTo($('aside[class="details_infos"]'));
	$('<span></span>').addClass('material-icons').text('place').appendTo($('aside[class="details_infos"]'));
	$('<span></span>').text('CMarché Escudier').appendTo($('aside[class="details_infos"]'));
	$('<span></span>').addClass('button').text('Retour').attr('id', 'd_return').prependTo(details_footer);
	details_footer.prependTo(details);
	details_body.prependTo($(details));
	details_header.prependTo(details);
	details.prependTo($('body'));
	$('<div></div>').addClass('grey').prependTo($('body'));
}	
