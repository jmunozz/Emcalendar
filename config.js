$('body').on('click', '.comite', function() {

	var comite_id = $(this).parent().parent().attr('id');
	var li = '#'+comite_id+' li';

	if ($(this).hasClass('modifier')) {
		$(li).each(function(index) {
			if (index < 3) {
				var val = $(this).children().eq(1).text();
				$(this).children().eq(1).remove();
				$(this).append('<input type="text" value="'+val+'"></input>');
			}
		});
		$(this).text('Valider');
	}
	else if ($(this).hasClass('valider')) {
			$(li).each(function(index) {
				if (index < 3) {
					var val = $(this).children().eq(1).val();
					$(this).children().eq(1).remove();
					$(this).append('<span>'+val+'</span>');
				}
			});
		$(this).text('Modifier');
	}
	$(this).toggleClass('modifier');
	$(this).toggleClass('valider');
});

$('body').on('click', '.supprimer', function() {
	$(this).parent().parent().remove();
});

$('#comite_creer').click(function() {
	if ($('#no_comite').length) {
		var		nc = 1;
		$('#no_comite').remove();
		var i = 0;
	}
	else {
		var i = parseInt($('ul:last-child').
		attr('id').replace('comite_', '')) + 1;
	}
	$('<ul id="comite_'+i+'"></ul>').appendTo('#comites');
	$('<li class="name"><span><b>Nom: </b></span><input type="text"></input></li>').
	appendTo($('#comite_'+i));
	$('<li class="animateur"><span><b>Animateur: </b></span><input type="text"></input></li>').
	appendTo($('#comite_'+i));
	$('<li class="animateur_mail"><span><b>Mail: </b></span><input type="text"></input></li>').
	appendTo($('#comite_'+i));
	$('<li><span class="button comite valider">Valider</span> <span class="button comite supprimer">Supprimer</span></li>').appendTo($('#comite_'+i));
});
