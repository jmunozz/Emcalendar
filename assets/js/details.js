

$('.event').click(function() {
	get_details($(this).attr('id'));
});




function get_details(elem_id) {
	
	var details = $('<div></div>').addClass('details');
	var details_header = $('<div></div>').addClass('details_header');
	var details_body = $('<div></div>').addClass('details_body');
	var details_footer = $('<div></div>').addClass('details_footer');

	details.prependTo($('body'));
	$('<div></div>').addClass('grey').prependTo($('body'));
	details_footer.prependTo(details);
	details_body.prependTo($(details));
	details_header.prependTo(details);

	$('body').on('click', 'span#d_return', function() {
		$('div.grey').remove();
		$('div.details').remove();
	});

	$('body').on('click', '.grey', function() {
		$('div.grey').remove();
		$('div.details').remove();
	});

	var id = '#'+elem_id;

	$('<h4></h4>').text($(id+' span.event_titre').text()).prependTo(details_header);
	$('<small></small>').text($(id+' span.date_day').text()+' '+$(id+' span.date_month').text()+' '+$(id+' span.e_heure').text()).appendTo(details_header);

	$('<p></p>').text($(id+' span.e_des').text()).prependTo(details_body);
	$('<aside></aside>').addClass('details_infos').appendTo(details_body);

	$('<span></span>').addClass('material-icons').text('account_circle').appendTo($('aside.details_infos'));
	$('<span></span>').text($(id+' span.e_comite').text()).appendTo($('aside.details_infos'));
	$('<span></span>').addClass('material-icons').text('place').appendTo($('aside.details_infos'));
	$('<span></span>').text($(id+' span.e_lieu').text()).appendTo($('aside.details_infos'));

	$('<span></span>').addClass('button').text('Retour').attr('id', 'd_return').prependTo(details_footer);
}
