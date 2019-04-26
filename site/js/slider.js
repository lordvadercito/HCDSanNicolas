//guardar el slider en una variable
var slider = $('#slider');
//buscar cantidad de secciones
var seccion = slider.find('.slider__section');
//contar el numero de secciones
var n = seccion.length;
//ancho del slider
var ws = 100 * n;
//definir el ancho de slider
slider.css('width', ws+'%');
//almacenar botones
var prev = $('#btn-prev');
var next = $('#btn-next');
//Movemos el ultimo seccion al primer lugar
$('#slider .slider__section:last').insertBefore('#slider .slider__section:first');
//le damos un margen negativo para ver el segundo elemento, que vendrÃ­a a ser la primera imagen
slider.css('margin-left', '-'+100+'%');


//mover boton derecho
function moverD() {
	$(slider).animate({
		marginLeft: '-'+200+'%'
	}, 700, function() {
		$('#slider .slider__section:first').insertAfter('#slider .slider__section:last');
		slider.css('margin-left', '-'+100+'%');
  });
}
//mover boton derecho
function moverI() {
	$(slider).animate({
		marginLeft: 0
	}, 700, function() {
		$('#slider .slider__section:last').insertBefore('#slider .slider__section:first');
		slider.css('margin-left', '-'+100+'%');
  });
}

function autoplay() {
	interval = setInterval(function(){
		moverD();
	}, 5000);
}
next.on('click',function() {
	moverD();
	clearInterval(interval);
	autoplay();
});

prev.on('click',function() {
	moverI();
	clearInterval(interval);
	autoplay();
});


autoplay();





 //Transformar menú hamburguesa en cruz al activar
  $('.button-nav-toggle').on('click', function(e) {
      e.preventDefault();
      var alturaNav = $('.menuBar').height();
      $(this).toggleClass('active');
      $('.navbar').css("height", "100vh");
      if($('.menuBar a').hasClass('active')){
        $('body').css("overflow-y", "hidden");
        $('.navbar').animate({
          left: '0',
          top: alturaNav,
          paddingTop: '7.5%',
        });
      }
      else{
        $('body').css("overflow-y", "auto");
        $('.navbar').animate({
          left: '-70%'
        });
      }
  });

  //Cerrar menú al cliquear en li y volver de la cruz al menú hamburguesa
  $('.navbar li a').click(function(){
    if($('.menuBar a').hasClass('active')){
      $('body').css("overflow", "auto");
      $('.navbar').animate({
        left: '-100%',
        top: '0',
        paddingTop: '0'
      });
      $('.menuBar a ').removeClass('active');
      $('.menuBar a ').addClass('button-nav-toggle');
    }
  });
  
  
   $('a[href*=bio]').click(function(e){
    e.preventDefault();
    var altura = $('body').height();
    $('#popup').css("height", altura + "px");
    $('#popup').fadeIn(1000);
    $('html').css("overflow", "hidden");
    if($(window).width() > 750){
      var alturaNav = $('nav').height() - 50;
      $('nav').slideUp();
      $('#bio').animate({
        top: alturaNav
      });
    }
    else{
      var alturaNav = $('.menuBar').height() - 5;
      $('header').slideUp();
      $('#bio').animate({
        top: alturaNav
      });
    }
  });
//Al presionar "Cancelar" en el formulario

  //Al presionar "Cancelar" en el formulario
  $('#cerrar').click(function(e){
    e.preventDefault();
    $('#popup').fadeOut(1000);
    $('html').css("overflow", "auto");
    if($(window).width() > 1024){
      $('nav').slideDown();
    }
    else{
      $('header').slideDown();
    }
  });   