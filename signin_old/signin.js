$('#form_val').click(function() {
if (check_sign_fields())
	$.get('signin.php', 'nom='+$('#s_nom').val()+'&prenom='+$('#s_prenom').val()+
	'&mail='+$('#s_mail').val()+'&pwd='+$('#s_pwd').val()+'&comite='+$('#s_co').val(), function(data, status) {
	req_ret(data)}, 'text');});

$('#myonoffswitch').click(function() {

	if ($('#myonoffswitch').is(':checked')) {
		$('#s_co_section').css('display', 'block');
		$('#s_co_section').css('opacity', '1');
	}
	else {
		$('#s_co_section').css('opacity', '0');
		$('#s_co_section').css('display', 'none');
	}
});

function req_ret(data) {

	var details = $('<div></div>').addClass('details');
	var details_header = $('<div></div>').addClass('details_header');
	var details_footer = $('<div></div>').addClass('details_footer');
	var infos = (data) ? data : 'Votre inscription a bien été enregistrée';

	$('<div></div>').addClass('grey').prependTo($('body'));
	details.prependTo($('body'));
	details_header.prependTo(details);
	details_footer.prependTo(details);
	$('<p></p>').text(infos).prependTo(details_header);
	
	if (data) {
		$('body').on('click', 'span#d_return', function() {
			$('div.grey').remove();
			$('div.details').remove();
		});
		$('body').on('click', '.grey', function() {
			$('div.grey').remove();
			$('div.details').remove();
		});
		$('<span></span>').addClass('button').text('Retour').
		attr('id', 'd_return').prependTo(details_footer);
	}
	else {
		$('<a href="/"><span></span></a>').addClass('button').text('Retour').
		attr('id', 'd_return').prependTo(details_footer);
	}
}

function check_sign_fields() {
	var nameRegex = /^[a-z0-9_\'\-\s]{1,50}$/gi;
	var pwdRegex = /^.{1,15}$/gi;
	var mailRegex = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/gi;
	
	if ($('#error'))
		$('#error').remove();
	if ($('#s_nom').val() == '' || $('#s_prenom').val() == '' 
	|| $('#s_mail').val() == '' || $('#s_pwd').val() == '') {
		$('body').scrollTop(0);
		$('<p id="error">Un champ est vide</p>)').appendTo($('#i'));
	}
	else if ($('#s_nom').val().match(nameRegex) == null) {
		$('body').scrollTop(0);
		$('<p id="error">Le nom n\'est pas valide</p>)').appendTo($('#i'));
	}
	else if ($('#s_prenom').val().match(nameRegex) == null) {
		$('body').scrollTop(0);
		$('<p id="error">Le prénom n\'est pas valide</p>)').appendTo($('#i'));
	}
	else if ($('#s_mail').val().match(mailRegex) == null) {
		$('body').scrollTop(0);
		$('<p id="error">Le mail n\'est pas valide</p>)').appendTo($('#i'));
	}
	else if ($('#s_pwd').val().match(pwdRegex) == null) {
		$('body').scrollTop(0);
		$('<p id="error">Le mot de passe n\'est pas valide (15 caractères max)</p>)').
		appendTo($('#i'));
	}
	else
		return (true);
	return (false);
}
