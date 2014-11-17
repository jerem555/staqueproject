/************************
 * 	 Objet principal 	*
 ************************/

app = {
	
	init: function() {

		// J'écoute le clic
		$('#logostaque').on("mouseover",app.click);

		// Animations
		var animate=function(){
  		
  			// On ajoute .animated.rubberBand
			$('li').addClass('animated rubberBand');
			setTimeout(function(){$('#last').addClass('animated wobble')}, 4000);

  			// Toutes les secondes, on lance l'animation bounce
  		var bounce = function() {
				$('.vue, .answer,.vote')
					.addClass('animated shake')
					.on("animationend",function() {
						$(this).removeClass('animated shake')
					})

			}
			setInterval(bounce, 10*1000);
			bounce()

		}

			animate()

	},

	click:function(){

		// On lance l'anim hinge
		$('#logostaque').addClass('animated hinge')

	},
					
}



/************************
 * 	Chargement du DOM 	*
 ************************/

$(function() {
	app.init()
})