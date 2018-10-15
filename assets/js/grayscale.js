(function($) {
  "use strict"; // Start of use strict

  // Smooth scrolling using jQuery easing
  $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: (target.offset().top - 70)
        }, 1000, "easeInOutExpo");
        return false;
      }
    }
  });

  // Closes responsive menu when a scroll trigger link is clicked
  $('.js-scroll-trigger').click(function() {
    $('.navbar-collapse').collapse('hide');
  });

  // Activate scrollspy to add active class to navbar items on scroll
  $('body').scrollspy({
    target: '#mainNav',
    offset: 100
  });

  // Collapse Navbar
  var navbarCollapse = function() {
    if ($("#mainNav").offset().top > 100) {
      $("#mainNav").addClass("navbar-shrink");
    } else {
      $("#mainNav").removeClass("navbar-shrink");
    }
  };
  // Collapse now if page is not at top
  navbarCollapse();
  // Collapse the navbar when page is scrolled
  $(window).scroll(navbarCollapse);

})(jQuery); // End of use strict

$(document).ready(function(){

    $('#btn-realizar-pedido').click(function(){
        //alert('funka btn');
        var nombre = $('#input-nombre').val();
        var email = $('#input-email').val();
        var telefono = $('#input-telefono').val();
        var direccion = $('#input-direccion').val();

        //tomar los valores de los badges y convertirlos en un pedido en texto
        
        var nro_productos = $('#nro_productos').val();
        var array_pedido_productos = new Array(nro_productos);
        var pedido_flag = 0;
        //alert('nro:' + nro_sandwiches);
        for(var i = 0; i < nro_productos; i++){
            var contador = '#contador_producto_' + i;
            var cifra_contador = parseInt($(contador).html());
            //alert(cifra_contador);
            //alert(i);
            array_pedido_productos[i] = cifra_contador;
            pedido_flag += cifra_contador;
        }
        
        if(pedido_flag > 0){
            enviar_mensaje(nombre, email, telefono, direccion, array_pedido_productos);
        }else{
            $('#modal-no-producto').modal('show');
        }
        
    });


    $('.btn-selector-producto').click(function(){
        var data = $(this).data('id-producto');
        var contador = '#contador_producto_' + data;
        var num_contador = $(contador).html();
        num_contador++;
        $(contador).html(num_contador);
    });

    $('.btn-eliminar-pedido').click(function(e){
        e.preventDefault();
        var data = $(this).data('eliminar-id');
        var contador = '#contador_producto_' + data;
        var contador_borrar = $(contador).html(-1);
    })

    $('.btn-cerrar-modal').click(function(){
        $('.modal').modal('hide');
    });
});

function enviar_mensaje(nombre, email, telefono, direccion, mensaje){
    var base_url = $('#base_url').val();
    var data = new FormData();
    data.append('nombre', nombre);
    data.append('email', email);
    data.append('telefono', telefono);
    data.append('direccion', direccion);
    data.append('recaptcha', grecaptcha.getResponse());
    for(var i = 0; i < mensaje.length; i++){
        data.append('mensaje[]', mensaje[i]);
    }

    $.ajax({
        data:data,
        type:'post',
        contentType:false,
        processData:false,
        url:'mensajes/enviar_mensaje',
        cache:false,
        dataType:'json',
        beforeSend:function(){
            $('#modal-enviando-msje').modal('show');
            setTimeout(function(){
                $('#modal-enviando-msje').modal('hide');
            },2000);
        },
        success:function(datos){
            if(typeof(datos.status_captcha) == 'undefined'){
            }else{
                if(datos.status_captcha == 'error'){
                    $('#alert-captcha').toggle();
                    setTimeout(function(){
                        $('#alert-captcha').toggle();
                    },5000);
                }
            }
            
            if(typeof(datos.valid) == 'undefined'){
            }else{
                if(datos.valid == 'ok'){
                    setTimeout(function(){
                        $('#modal-mensaje-ok').modal('show');
                        var nro_sandwiches = $('#nro_sandwiches').val();
                        for(var i = 0; i < nro_sandwiches; i++)
                        {
                            var contador = '#contador_sandwich_' + i;
                            $(contador).html(0);
                        }
                        $('#input-nombre').val("");
                        $('#input-email').val("");
                        $('#input-telefono').val("");
                        $('#input-direccion').val("");
                    },2000);
                    
                }else{
                    alert('Hubo un error al procesar los datos');
                }
            }
            if(typeof(datos.err_nombre) == 'undefined'){
            }else {
                if(datos.err_nombre == 'err1'){
                    $('#input-nombre').addClass('danger-input')
                    .attr('placeholder', 'Campo Obligatorio!!!').val("");
                    setTimeout(function(){
                        $('#input-nombre').removeClass('danger-input')
                    .attr('placeholder', 'Tu Nombre*').val("");
                    },3000);
                }
            }

            if(typeof(datos.err_email) == 'undefined'){
            }else {
                if(datos.err_email == 'err1'){
                    $('#input-email').addClass('danger-input')
                    .attr('placeholder', 'Campo Obligatorio!!!').val("");
                    setTimeout(function(){
                        $('#input-email').removeClass('danger-input')
                    .attr('placeholder', 'Tu Email*').val("");
                    },3000);
                }

                if(datos.err_email == 'err2'){
                    $('#input-email').addClass('danger-input')
                    .attr('placeholder', 'Por favor ingrese un email valido').val("");
                    setTimeout(function(){
                        $('#input-email').removeClass('danger-input')
                    .attr('placeholder', 'Tu Email*').val("");
                    },3000);
                }
            }


            if(typeof(datos.err_telefono) == 'undefined'){
            }else {
                if(datos.err_telefono == 'err1'){
                    $('#input-telefono').addClass('danger-input')
                    .attr('placeholder', 'Campo Obligatorio!!!').val("");
                    setTimeout(function(){
                        $('#input-telefono').removeClass('danger-input')
                    .attr('placeholder', 'Tu Telefono* ej. +56911223344').val("");
                    },3000);
                }
            }

            if(typeof(datos.err_direccion) == 'undefined'){
            }else {
                if(datos.err_direccion == 'err1'){
                    $('#input-direccion').addClass('danger-input')
                    .attr('placeholder', 'Campo Obligatorio!!!').val("");
                    setTimeout(function(){
                        $('#input-direccion').removeClass('danger-input')
                    .attr('placeholder', 'Direccion del pedido*').val("");
                    },3000);
                }
            }


        },
        error:function(xhr, status, error){
            var err = xhr.responseText;
            alert(err);
        }
    });
}