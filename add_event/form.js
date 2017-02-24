$('#myonoffswitch').click(function() {
console.log($('#myonoffswitch').val());
});

$('#form_val').click(function() {
	if (check_fields() == true) 
	{
	console.log('c valide');
		if ($('#myonoffswitch').is(':checked')) {
			var public = 'false';
		}
		else {
			public = 'true';
		}
		$.get('add_to_bdd.php', 'titre='+$('#titre').val()+'&categorie='+$('#categorie').val()+
		'&comite='+$('#f_co').val()+'&date='+$('#date').val()+'&heure='+$('#heure').val()+'&lieu='+$('#lieu').val()+
		'&description='+$('#wrapper_des').val()+'&publique='+public, function(data, status) {
			alert("Data: " + data + "\nStatus: " + status);
			if (data == 'FALSE') {
				invalid_add();
				console.log('invalid');
			}
			else {
				console.log('valid');
				valid_add();
			}
		});
		console.log('requete envoyée');
	}
});

function check_fields() {
	var titleRegex = /^[a-z0-9_\'\-\s]{1,50}$/gi;
	var dateRegex = /^([0-9]{2}\/){2}[0-9]{2}$/;
	var heureRegex = /^[0-9]{2}:[0-9]{2}$/;

	if ($('#error'))
		$('#error').remove();
	if ($('#titre').val() == '' || $('#categorie').val() == ''
		|| $('#lieu').val() == '' || $('#date').val() == ''
		|| $('#heure').val() == '' || $('#f_co').val() == ''
		|| $('#wrapper_des').val() == '')
	{
		$('body').scrollTop(0);
		$('<p id="error">Un champ est vide</p>)').appendTo($('#i'));
	}
	else if ($('#titre').val().match(titleRegex) == null)
	{
		$('body').scrollTop(0);
		$('<p id="error">Le titre n\'est pas valide (50 caractères max)</p>)').appendTo($('#i'));
	}
	else if ($('#categorie').val().match(titleRegex) == null)
	{
		$('body').scrollTop(0);
		$('<p id="error">La catégorie n\'est pas valide (50 caractères max)</p>)').appendTo($('#i'));
	}
	else if ($('#lieu').val().match(titleRegex) == null)
	{
		$('body').scrollTop(0);
		$('<p id="error">Le lieu n\'est pas valide (50 caractères max)</p>)').appendTo($('#i'));
	}
	else if ($('#date').val().match(dateRegex) == null)
	{
		$('body').scrollTop(0);
		$('<p id="error">La date n\'est pas valide (format dd/mm/aa)</p>)').appendTo($('#i'));
	}
	else if ($('#heure').val().match(heureRegex) == null)
	{	
		$('body').scrollTop(0);
		$('<p id="error">L\'heure n\'est pas valide (format hh:mm)</p>)').appendTo($('#i'));
	}
	else
		return (true);
	return (false);
}



$('#form_prev').click(function() {
	if (check_fields() == true)
		prev();
});

function valid_add() {
	
	var details = $('<div></div>').addClass('details');
	var details_header = $('<div></div>').addClass('details_header');
	var details_footer = $('<div></div>').addClass('details_footer');

	$('<div></div>').addClass('grey').prependTo($('body'));
	details.prependTo($('body'));

	details_footer.prependTo(details);
	details_header.prependTo(details);

	$('<h4></h4>').text($('#titre').val()).prependTo(details_header);
	$('<a href="/"><span></span></a>').addClass('button').text('Retour').attr('id', 'd_return').prependTo(details_footer);

}

function prev() {
	
	var details = $('<div></div>').addClass('details');
	var details_header = $('<div></div>').addClass('details_header');
	var details_body = $('<div></div>').addClass('details_body');
	var details_footer = $('<div></div>').addClass('details_footer');

	$('body').on('click', 'span#d_return', function() {
		$('div.grey').remove();
		$('div.details').remove();
	});

	$('body').on('click', '.grey', function() {
		$('div.grey').remove();
		$('div.details').remove();
	});

	details.prependTo($('body'));
	$('<div></div>').addClass('grey').prependTo($('body'));

	details_footer.prependTo(details);
	details_body.prependTo($(details));
	details_header.prependTo(details);

	$('<h4></h4>').text($('#titre').val()).prependTo(details_header);
	$('<small></small>').text('31 Janvier 10h00').appendTo(details_header);

	$('<p></p>').text($('#wrapper_des').val()).appendTo(details_body);
	$('<aside></aside>').addClass('details_infos').appendTo(details_body);

	$('<span></span>').addClass('material-icons').text('schedule').appendTo($('aside.details_infos'));
	$('<span></span>').text('A 10h00').appendTo($('aside[class="details_infos"]'));
	$('<span></span>').addClass('material-icons').text('account_circle').appendTo($('aside.details_infos'));
	$('<span></span>').text($('#f_co').val()).appendTo($('aside.details_infos'));
	$('<span></span>').addClass('material-icons').text('place').appendTo($('aside.details_infos'));
	$('<span></span>').text($('#lieu').val()).appendTo($('aside.details_infos'));

	$('<span></span>').addClass('button').text('Retour').attr('id', 'd_return').prependTo(details_footer);
}
