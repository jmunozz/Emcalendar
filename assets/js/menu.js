
// Get basename of the website.

function basename() {
	var path = new String(window.location)
   return '/'+path.split('/').reverse()[1];
}

var url_base = basename();

$('#co').click(function() {
		get_connect();
});

$('#deco').click(function() {
	console.log('deco');
	$.post(url_base+'/login/out', function(data, status) {
	if (data) {
		console.log(data);
		window.location.replace(data);
	}});});

function get_connect() {
	
	var details = $('<div></div>').addClass('details');
	var details_header = $('<div></div>').addClass('details_header');
	var details_body = $('<div></div>').addClass('details_body');
	var details_footer = $('<div></div>').addClass('details_footer');

	$('body').on('click', '.grey', function() {
		$('div.grey').remove();
		$('div.details').remove();
	});

	$('body').on('click', '#co_return', function() {
		$('div.grey').remove();
		$('div.details').remove();
	});

	$('body').on('click', 'span#co_valid', function() {
		$('#error').remove();
		$.post(url_base+'/login', 'submit=yes&login='+$('.co_user input').val()+'&pwd='+
		$('.co_pwd input').val(), function(data, status) {
		console.log(data);
			if (data) {
				$('<span id="error"></span').text(data).appendTo($('div.details_header'));
			}
			else {
				$('div.details_body').remove();
				$('.details_header h4').text('Vous êtes connecté');
				$('#co_valid').remove();
				$('<a href="'+url_base+'"><span></span></a>').addClass('button').
				text('Continuer').attr('id', 'co_return').prependTo(details_footer);
			}
		});
	});

	$('<div></div>').addClass('grey').prependTo($('body'));
	details.prependTo($('body'));
	details_footer.prependTo(details);
	details_body.prependTo($(details));
	details_header.prependTo(details);

	$('<h4></h4>').text('Se connecter').
	prependTo(details_header);
	$('<section class="co_user"></section>').
	appendTo($(details_body));
	$('<input placeholder="Identifiant" type="text"></input>').
	appendTo($('.co_user'));
	$('<section class="co_pwd"></section>').appendTo($(details_body));
	$('<input placeholder="Mot de Passe" type="password"></input>').
	appendTo($('.co_pwd'));
	$('<span></span>').addClass('button').
	text('Valider').attr('id', 'co_valid').prependTo(details_footer);
}

