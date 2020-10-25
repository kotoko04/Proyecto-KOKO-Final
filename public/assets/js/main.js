
function loadAgregar() {
    $("#carga").show();
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("contenedor").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "/producto/agregar", true);
    xhttp.send();
    $("#principal").css("margin-left", "8%");
    setTimeout(function(){   $("#carga").hide(); }, 1300);

}

function loadCategoria() {
    $("#carga").show();
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("contenedor").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "/categoria/agregar", true);
    xhttp.send();
    $("#principal").css("margin-left", "8%");
    setTimeout(function(){   $("#carga").hide(); }, 1300);

}

function loadMarca() {
    $("#carga").show();
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("contenedor").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "/marca/agregar", true);
    xhttp.send();
    $("#principal").css("margin-left", "8%");
    setTimeout(function(){   $("#carga").hide(); }, 1300);

}


function loadInformacion() {
    $("#carga").show();
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("contenedor").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "/empresa/agregar", true);
    xhttp.send();
    $("#principal").css("margin-left", "8%");
    setTimeout(function(){   $("#carga").hide(); }, 1300);

}

function loadLista() {
    $("#carga").show();
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("contenedor").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "/producto/lista", true);
    xhttp.send();
    $("#principal").css("margin-left", "3%");
    setTimeout(function(){   $("#carga").hide(); }, 1300);



}

function guardarCategoria(evt){
    evt.preventDefault();
    var url   = $("#formularioCategoria").attr('action');
    var parametros = new FormData($("#formularioCategoria")[0]);
    var descripcion = $("#descripcion").val();
    var estado = $("#estado").val();
    if(estado=="" || descripcion==""){
        $("#resultado").show();
        return;
    }
    $.ajax({
        type: "POST",
        url: url,
        data: parametros,
        contentType: false,
        processData: false,
        beforeSend : function(){
            $("#carga").show();
        },
        success: function (data) {
            $("#carga").hide();
            setTimeout(function(){  location.reload(); }, 1700);

        },
        error: function (r) {
            alert('daño');
        },
        complete : function(jqXHR, status) {
            swal({
                title: "Categoria guardada",
                text: "nueva categoria agregada",
                icon: "success",
            });
        }
    });
}

function guardarMarca(evt){
    evt.preventDefault();
    var url   = $("#formularioMarca").attr('action');
    var parametros = new FormData($("#formularioMarca")[0]);
    var descripcion = $("#descripcionM").val();
    var  nombre= $("#estadoM").val();
    if(nombre=="" || descripcion==""){
        $("#resultadoM").show();
        return;
    }
    $.ajax({
        type: "POST",
        url: url,
        data: parametros,
        contentType: false,
        processData: false,
        beforeSend : function(){
            $("#carga").show();
        },
        success: function (data) {
            $("#carga").hide();
            setTimeout(function(){  location.reload(); }, 1700);

        },
        error: function (r) {
            alert('daño');
        },
        complete : function(jqXHR, status) {
            swal({
                title: "Marca guardada",
                text: "nueva marca agregada",
                icon: "success",
            });
        }
    });
}

function eliminar(data){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/producto/eliminar',
        data: { search:data },
        type: 'POST',
        beforeSend : function(){
            $("#carga").show();
        },
        success:function(response) {
            $("#carga").hide();
            loadLista();
        }
    });
}


function tomarId(id){
    $('#data').html("");
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/producto/filtro',
        data: { search:id },
        type: 'POST',
        beforeSend : function(){
            $("#carga").show();
        },
        success:function(response) {
            if(response!=0){
                let tasks = JSON.parse(response);
                let template = '';
                tasks.forEach(ta => {
                    template += `<div class="col-lg-4 col-md-6" style="margin-top: 2%">
                        <div class="card" style="width: 18rem;padding: 10px">
                          <img src="storage/${ta.id}/${ta.ruta}"  class="img-fluid" alt="Responsive image" height="50%">
                          <div class="card-body">
                            <p class="card-text">${ta.nombre}</p>
                             <a style="color:white" onclick="verProducto('storage/${ta.id}/${ta.ruta}', '${ta.descripcion}', '${ta.valor}' )"  class="btn btn-primary">Ver</a>
                          </div>
                        </div>
                </div>`
                });
                $('#data').html(template);
            }

        },
        complete:function (){
            $("#carga").hide();
        }
    });
}

function verProducto(ruta, descrip, precio){
    Swal.fire({
        imageUrl: ruta,
        imageHeight: 400,
        imageAlt: 'A tall image',
        title: 'Solo por: $' + precio,
        text: descrip,
    })
}

function advertencia(){
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Recuerda la imagen',
        showConfirmButton: false,
        timer: 800
    })
}

function duda(e){
    e.preventDefault();
    Swal.fire('La busqueda se realiza en todo los productos')
}


function capturar() {
    let busca = $('#buscador').val();
    if ($('#buscador').val() != "") {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/producto/buscar',
            data: { search:busca },
            type: 'POST',
            beforeSend : function(){

            },
            success:function(response) {
                if(response!=0){
                    let tasks = JSON.parse(response);
                    let template = '';
                    tasks.forEach(ta => {
                        template += `
                            <div class="card col-sm-3" style="width: 18rem;padding: 10px;margin-right:6%; margin-bottom: 5%;box-shadow: 10px 10px 18px -6px rgba(0,0,0,0.75)">
                                <img class="card-img-top" src="../../../storage/${ta.id}/${ta.ruta}" alt="Card image cap" >
                                <div class="card-body">
                                    <p class="card-text">${ta.nombre}</p>
                                    <a id="categoria" style="color:white" onclick="verProducto('../../../storage/${ta.id}/${ta.ruta}', '${ta.descripcion}', '${ta.valor}' )" class="btn btn-primary">Ver</a>
                                </div>
                            </div>`
                    });
                    $('#dataConsulta').html(template);
                }else{

                }

            }
        });
    }
}



(function($) {
  "use strict";
    tomarId('no');

    // Preloader
  $(window).on('load', function() {
    if ($('#preloader').length) {
      $('#preloader').delay(100).fadeOut('slow', function() {
        $(this).remove();
      });
    }
  });

  // Back to top button
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('.back-to-top').fadeIn('slow');
    } else {
      $('.back-to-top').fadeOut('slow');
    }
  });
  $('.back-to-top').click(function() {
    $('html, body').animate({
      scrollTop: 0
    }, 1500, 'easeInOutExpo');
    return false;
  });

  // Smooth scroll for the navigation menu and links with .scrollto classes
  var scrolltoOffset = $('#header').outerHeight() - 17;
  $(document).on('click', '.nav-menu a, .mobile-nav a, .scrollto', function(e) {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      if (target.length) {
        e.preventDefault();

        var scrollto = target.offset().top - scrolltoOffset;

        if ($(this).attr("href") == '#header') {
          scrollto = 0;
        }

        $('html, body').animate({
          scrollTop: scrollto
        }, 1500, 'easeInOutExpo');

        if ($(this).parents('.nav-menu, .mobile-nav').length) {
          $('.nav-menu .active, .mobile-nav .active').removeClass('active');
          $(this).closest('li').addClass('active');
        }

        if ($('body').hasClass('mobile-nav-active')) {
          $('body').removeClass('mobile-nav-active');
          $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
          $('.mobile-nav-overly').fadeOut();
        }
        return false;
      }
    }
  });

  // Activate smooth scroll on page load with hash links in the url
  $(document).ready(function() {
    if (window.location.hash) {
      var initial_nav = window.location.hash;
      if ($(initial_nav).length) {
        var scrollto = $(initial_nav).offset().top - scrolltoOffset;
        $('html, body').animate({
          scrollTop: scrollto
        }, 1500, 'easeInOutExpo');
      }
    }
  });

  // Mobile Navigation
  if ($('.nav-menu').length) {
    var $mobile_nav = $('.nav-menu').clone().prop({
      class: 'mobile-nav d-lg-none'
    });
    $('body').append($mobile_nav);
    $('body').prepend('<button type="button" class="mobile-nav-toggle d-lg-none"><i class="icofont-navigation-menu"></i></button>');
    $('body').append('<div class="mobile-nav-overly"></div>');

    $(document).on('click', '.mobile-nav-toggle', function(e) {
      $('body').toggleClass('mobile-nav-active');
      $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
      $('.mobile-nav-overly').toggle();
    });

    $(document).on('click', '.mobile-nav .drop-down > a', function(e) {
      e.preventDefault();
      $(this).next().slideToggle(300);
      $(this).parent().toggleClass('active');
    });

    $(document).click(function(e) {
      var container = $(".mobile-nav, .mobile-nav-toggle");
      if (!container.is(e.target) && container.has(e.target).length === 0) {
        if ($('body').hasClass('mobile-nav-active')) {
          $('body').removeClass('mobile-nav-active');
          $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
          $('.mobile-nav-overly').fadeOut();
        }
      }
    });
  } else if ($(".mobile-nav, .mobile-nav-toggle").length) {
    $(".mobile-nav, .mobile-nav-toggle").hide();
  }

  // Header scroll class
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('#header').addClass('header-scrolled');
    } else {
      $('#header').removeClass('header-scrolled');
    }
  });

  if ($(window).scrollTop() > 100) {
    $('#header').addClass('header-scrolled');
  }


  // Intro carousel
  var introCarousel = $(".carousel");
  var introCarouselIndicators = $(".carousel-indicators");
  introCarousel.find(".carousel-inner").children(".carousel-item").each(function(index) {
    (index === 0) ?
    introCarouselIndicators.append("<li data-target='#introCarousel' data-slide-to='" + index + "' class='active'></li>"):
      introCarouselIndicators.append("<li data-target='#introCarousel' data-slide-to='" + index + "'></li>");
  });

  introCarousel.on('slid.bs.carousel', function(e) {
    $(this).find('h2').addClass('animate__animated animate__fadeInDown');
    $(this).find('p, .btn-get-started').addClass('animate__animated animate__fadeInUp');
  });

  // Skills section
  $('#skills').waypoint(function() {
    $('.progress .progress-bar').each(function() {
      $(this).css("width", $(this).attr("aria-valuenow") + '%');
    });
  }, {
    offset: '80%'
  });

  // jQuery counterUp (used in Facts section)
  $('[data-toggle="counter-up"]').counterUp({
    delay: 10,
    time: 1000
  });




    $('#portfolio-flters li').on('click', function() {
        $("#portfolio-flters li").removeClass('filter-active');
        $(this).addClass('filter-active');
        aos_init();
    });





  // Initiate venobox (lightbox feature used in portofilo)
  $(document).ready(function() {
    $('.venobox').venobox();
  });

  // Clients carousel (uses the Owl Carousel library)
  $(".clients-carousel").owlCarousel({
    autoplay: true,
    dots: true,
    loop: true,
    responsive: {
      0: {
        items: 2
      },
      768: {
        items: 4
      },
      900: {
        items: 6
      }
    }
  });

  // Testimonials carousel (uses the Owl Carousel library)
  $(".testimonials-carousel").owlCarousel({
    autoplay: true,
    dots: true,
    loop: true,
    items: 1
  });

  // Portfolio details carousel
  $(".portfolio-details-carousel").owlCarousel({
    autoplay: true,
    dots: true,
    loop: true,
    items: 1
  });

  // Init AOS
  function aos_init() {
    AOS.init({
      duration: 900,
      once: true
    });
  }
  $(window).on('load', function() {
    aos_init();
  });

})(jQuery);
