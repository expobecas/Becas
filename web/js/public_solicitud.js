$(document).ready(function() {
    $('select').material_select();
    //$('#ingreso_familiar').hide(0);
    $('#cancelar').hide(0);
    $('#modificar').hide(0);
    $('#idintegrante').hide(0);
    $('#ingreso').hide(0);

    /*Mostrar u ocultar los campos que estan ocultos al presionar radiobutton */
    $("#si4").on("click", function(){
      $("#escondido").show(1000);
    });
    $("#no4").on("click", function(){
      $("#escondido").hide(1000);
    });

    /*De datos_familia.php*/
    /*Mostrar u ocultar los campos que estan ocultos al presionar radiobutton */
    $("#si_integran").on("click", function(){
      $("#depende").show(1000);
      $("#Grado").show(1000);
      $("#Institucion").show(1000);
      $("#Cuota_inte").show(1000);
    });
    $("#no_integran").on("click", function(){
      $("#depende").hide(1000);
      $("#Grado").hide(1000);
      $("#Institucion").hide(1000);
      $("#Cuota_inte").hide(1000);
    });

    $("#si_vehiculo").on("click", function(){
      $("#tipo").show(1000);
      $("#año_vehiculo").show(1000);
      $("#vehiculo").show(1000);
    });
    $("#no_vehiculo").on("click", function(){
      $("#tipo").hide(1000);
      $("#año_vehiculo").hide(1000);
      $("#vehiculo").hide(1000);
    });
  });


  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 20, // Creates a dropdown of 15 years to control year,
    max: new Date('today'),//validar para no seleccionar una fecha mayor a la de hoy
    today: 'Hoy',
    clear: 'Limpiar',
    close: 'Ok',
    formatSubmit: 'dd/mm/yyyy',
    closeOnSelect: false, // Close upon selecting a date,
    closeOnClear: false,
    container: '.slider-ctr', // ex. 'body' will append picker to body
  });

    //Cuando selecciona la opcion Otros de un select mostrar el campo
    $("#casa").change(function(){
      if($(this).val() == "Otro")
      {
        $("#especificar_casa").show(1000);
      }
      else
      {
        $("#especificar_casa").hide(1000);
      }
    });

  
  /*De datos_estudiantes.php*/
  /*Mostrar campo cuando se elije la opcion otros en los combobox*/
    $("#financiados").change(function(){
      if($(this).val() == "Otros")
      {
        $("#especificar_finan").show(1000);
      }
      else
      {
        $("#especificar_finan").hide(1000);
      }
    });

  /*Mostrar campo cuando se elije la opcion otros en los combobox*/
    $("#familia").change(function(){
      if($(this).val() == "Otros")
      {
        $("#especificar_familia").show(1000);
      }
      else
      {
        $("#especificar_familia").hide(1000);
      }
    });



  /*Para cambiar el tamaño del progress segun el tamaño de la pantalla*/
  jQuery(document).ready(function($) {
  var $bar1 = $(".bar1");
  var $bar2 = $(".bar2");
  var $bar3 = $(".bar3");

  $(window).resize(function(){
    var size = document.body.clientWidth;
  if(size < 600)
  {
    $bar1.addClass("responsive");
    $bar2.addClass("responsive");
    $bar3.addClass("responsive");
  }
  else if(size >= 601)
  {    
    $bar1.removeClass("responsive");
    $bar2.removeClass("responsive");
    $bar3.removeClass("responsive");
  }
  });
});

  /*Formulario y progress*/
  $firstButton = $(".first");
  $secondButton = $(".second"),
  $threeButton = $(".three"),
  $regresarunoButton = $(".regresaruno"),
  $regresardosButton = $(".regresardos"),
  $regresarthreeButton = $(".regresarthree"),
  $ctr = $(".containers");

/*activa el circulo 1 con color azul*/
$('.progressc .circle1').addClass('active');

$regresarunoButton.on('click', function(e){
  $('body,html').animate({
    scrollTop:0
  }, 400)
    $ctr.addClass("center slider-one-active").removeClass("center slider-two-active");
    var n = setInterval(function(){
      /*remueve el color verde*/
      $('.progressc .circle1').removeClass('done').addClass('active');

      /*quita el checke*/
      $('.progressc .circle1 .label').html('1');

      /*rellena la primera mitad de la barra*/
      $('.progressc .bar1').removeClass('active');
    
      /*activamos el circulo 2 del progress*/
      $('.progressc .circle2').removeClass('active');

      clearInterval(n);
    }, 100);
    e.preventDefault();
});

$regresardosButton.on('click', function(e){
  $('body,html').animate({
    scrollTop:0
  }, 400)
    $ctr.addClass("center slider-two-active").removeClass("three slider-three-active");
    var n = setInterval(function(){
      /*sobra de la segunda mitad de la barra*/
      $('.progressc .bar1').removeClass('done').addClass('active');
    
      /*le da color verde*/
      $('.progressc .circle2').removeClass('done').addClass('active');
      
      /*este pone el checke*/
      $('.progressc .circle2 .label').html('2');
    
      /*rellena la primera mitad de la barra*/
      $('.progressc .bar2').removeClass('active');
    
      /*activamos el circulo 3 del progress*/
      $('.progressc .circle3').removeClass('active');

      clearInterval(n);
    }, 100);
    e.preventDefault();
});

$regresardosButton.on('click', function(e){
  $('body,html').animate({
    scrollTop:0
  }, 400)
    $ctr.addClass("center slider-two-active").removeClass("three slider-three-active");
    var n = setInterval(function(){
      /*sobra de la segunda mitad de la barra*/
      $('.progressc .bar1').removeClass('done').addClass('active');
    
      /*le da color verde*/
      $('.progressc .circle2').removeClass('done').addClass('active');
      
      /*este pone el checke*/
      $('.progressc .circle2 .label').html('2');
    
      /*rellena la primera mitad de la barra*/
      $('.progressc .bar2').removeClass('active');
    
      /*activamos el circulo 3 del progress*/
      $('.progressc .circle3').removeClass('active');

      clearInterval(n);
    }, 100);
    e.preventDefault();
});

$regresarthreeButton.on('click', function(e){
  $('body,html').animate({
    scrollTop:0
  }, 400)
    $ctr.addClass("three slider-three-active").removeClass("full slider-four-active");
    var n = setInterval(function(){
      /*sobra de la segunda mitad de la barra*/
      $('.progressc .bar2').removeClass('done').addClass('active');
    
      /*le da color verde*/
      $('.progressc .circle3').removeClass('done').addClass('active');
      
      /*este pone el checke*/
      $('.progressc .circle3 .label').html('3');
    
      /*rellena la primera mitad de la barra*/
      $('.progressc .bar3').removeClass('active');
    
      /*activamos el circulo 3 del progress*/
      $('.progressc .circle4').removeClass('active');

      clearInterval(n);
    }, 100);
    e.preventDefault();
});

$firstButton.on('click', function(e){
  $('body,html').animate({
    scrollTop:0
  }, 400)
  $ctr.addClass("center slider-two-active").removeClass("full slider-one-active");
  var n = setInterval(function(){
    /*le da color verde*/
  $('.progressc .circle1').removeClass('active').addClass('done');
  
  /*este pone el checke*/
  $('.progressc .circle1 .label').html('&#10003;');

  /*rellena la primera mitad de la barra*/
  $('.progressc .bar1').addClass('active');

  /*activamos el circulo 2 del progress*/
  $('.progressc .circle2').addClass('active');

  clearInterval(n);
  }, 100);
  e.preventDefault();
});

$secondButton.on('click', function(e){
  $('body,html').animate({
    scrollTop:0
  }, 400)
    $ctr.addClass("three slider-three-active").removeClass("center slider-two-active ");
  //var i = 1;
  var m = setInterval(function(){

  /*sobra de la segunda mitad de la barra*/
  $('.progressc .bar1').removeClass('active').addClass('done');

  /*le da color verde*/
  $('.progressc .circle2').removeClass('active').addClass('done');
  
  /*este pone el checke*/
  $('.progressc .circle2 .label').html('&#10003;');

  /*rellena la primera mitad de la barra*/
  $('.progressc .bar2').addClass('active');

  /*activamos el circulo 3 del progress*/
  $('.progressc .circle3').addClass('active');

  clearInterval(m);
  }, 100);
  e.preventDefault();
});

$threeButton.on('click', function(e){
  $('body,html').animate({
    scrollTop:0
  }, 400)
    $ctr.addClass("full slider-four-active").removeClass("three slider-three-active");
  //var i = 1;
  var m = setInterval(function(){

  /*sobra de la segunda mitad de la barra*/
  $('.progressc .bar2').removeClass('active').addClass('done');

  /*le da color verde*/
  $('.progressc .circle3').removeClass('active').addClass('done');
  
  /*este pone el checke*/
  $('.progressc .circle3 .label').html('&#10003;');

  /*rellena la primera mitad de la barra*/
  $('.progressc .bar3').addClass('active');

  /*activamos el circulo 4 del progress*/
  $('.progressc .circle4').addClass('active');

  clearInterval(m);
  }, 100);
  e.preventDefault();
});



/*Ayuda para el progress circle y slider forms *

$firstButton.on("click", function(e){
  $(this).text("Saving...").delay(500).queue(function(){
    $ctr.addClass("center slider-two-active").removeClass("full slider-one-active");
  });
  e.preventDefault();
});

$secondButton.on("click", function(e){
  $(this).text("Saving...").delay(500).queue(function(){
    $ctr.addClass("full slider-three-active").removeClass("center slider-two-active slider-one-active");
    $name = $name.val();
    if($name == "") {
      $yourname.html("Anonymous!");
    }
    else { $yourname.html($name+"!"); }
  });
  e.preventDefault();
});


// copy
//balapaCop("Step by Step Form", "#999");



/*js Para el progress*/
//var i = 1;
/*pone el progress a cero*/
//$('.progress .circle').removeClass().addClass('circle');
//$('.progress .bar').removeClass().addClass('bar');
/*le da color azul*/
//$('.progress .circle:nth-of-type(' + i + ')').addClass('active');
//var time = function(e) {
 
  /*le da color verde*/
  //$('.progress .circle:nth-of-type(' + (i-1) + ')').removeClass('active').addClass('done');

  /*este pone el checke*/
  //$('.progress .circle:nth-of-type(' + (i-1) + ') .label').html('&#10003;');

  /*sobra de la primera mitad de la barra*/
  //$('.progress .bar:nth-of-type(' + (i-1) + ')').addClass('active');

  /*sobra de la segunda mitad de la barra*/
  //$('.progress .bar:nth-of-type(' + (i-2) + ')').removeClass('active').addClass('done');
  
  //i++;
  
  //if (i==0) {
    //$('.progress .bar').removeClass().addClass('bar');
    //$('.progress div.circle').removeClass().addClass('circle');
    //i = 1;
  //}
  //clearInterval(time);
//};