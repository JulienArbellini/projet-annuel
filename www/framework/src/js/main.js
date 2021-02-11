$(document).ready(function(){
	if($('.slider').length){
		$('.slider').each(function(){
			sliderInit($(this));
		})
	}
})

function sliderInit(slider){
	var container = $('<div></div>');
	container.addClass('slides-container');

	var sliderContent = slider.html();
	container.html(sliderContent);

	container.children('img').addClass('slide');

	slider.html(container);

	// Créer un élément nav
	var nav = $('<nav></nav>');

	// Dans cet élément, ajouter un bouton .prev et un bouton .next
	nav.append('<button class="prev"></button>');
	nav.append('<button class="next"></button>');

	//Ajouter au slider
	slider.append(nav);

	slider.attr('data-currentSlide', 0);

	$('.next').click(function(){
		next(slider);
	})

	$('.prev').click(function(){
		prev(slider);
	})

	autoplay(slider);

}

function next(slider){
	var currentSlide = Number(slider.attr('data-currentSlide'));
	slider.attr('data-currentSlide', currentSlide + 1);
	slide(slider);
}

function prev(slider){
	var currentSlide = Number(slider.attr('data-currentSlide'));
	slider.attr('data-currentSlide', currentSlide - 1);
	slide(slider);
}

function slide(slider){

	disableNav(slider);
	slider.children('.slides-container').on('transitionend', function(){
		enableNav(slider);
	})
	//- récupérer la valeur de l'attribut data-currentSlide
	var currentSlide = Number(slider.attr('data-currentSlide'));

	//- modifier le left du container de slides (en css : mettre le container de slides en position relative)
	slider.children('.slides-container').css('left', currentSlide * slider.width() * -1);

	if(currentSlide == -1){
		// Dupliquer la dernière image
		var duplicate = slider.find('img:last').clone();
		duplicate.css({
			'position': 'absolute',
			'top': 0,
			'left': 0,
			'transform': 'translateX(-100%)'
		})
		slider.children('.slides-container').prepend(duplicate);

		slider.children('.slides-container').on('transitionend', function(){
			// Retirer l'écouteur 
			$(this).off('transitionend');

			// Retour à la dernière image
			var lastIndex = $(this).find('.slide').length - 2;
			slider.attr('data-currentSlide', lastIndex);
			
			// Retirer la transition
			$(this).css('transition', 'none');
			slide(slider);

			setTimeout(function(){
				enableNav(slider);
				// Remettre la transition
				slider.children('.slides-container').css('transition', 'left 1s');

				// Retirer le clone mis avant l'image 0
				slider.children('.slides-container').children('.slide:first').remove();
			}, 10);
			
		})

	}

	if(currentSlide == slider.find('.slide').length){
		// Dupliquer la première image
		var duplicate = slider.find('img:first').clone();
		slider.children('.slides-container').append(duplicate);
		slider.children('.slides-container').on('transitionend', function(){
			// Retirer l'écouteur 
			$(this).off('transitionend');

			// Retour à la première image
			slider.attr('data-currentSlide', 0);

			// Retirer la transition
			$(this).css('transition', 'none');
			slide(slider);

			setTimeout(function(){
				enableNav(slider);
				// Remettre la transition
				slider.children('.slides-container').css('transition', 'left 1s');

				// Retirer le clone mis après la dernière image
				slider.children('.slides-container').children('.slide:last').remove();
			}, 10);

		});
	}

	stopAutoplay(slider);
	autoplay(slider);
}



function disableNav(slider){
	slider.find('nav button').css({"pointer-events": "none", "opacity":"0.5"});

}

function enableNav(slider){
	slider.find('nav button').css({"pointer-events": "auto", "opacity":"1"});

}

// AUTOPLAY
var interval; // visibles dans ttes les fonctions du script

function autoplay(slider){
	interval = setInterval(function(){
	next(slider)
	}, 4000);
}


function stopAutoplay(slider){
	clearInterval(interval);
}