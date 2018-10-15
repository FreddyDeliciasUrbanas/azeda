

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="assets/img/logo-navbar-large.png" alt="" class="img-fluid"> </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <style type="text/css">
          .pink{
            color:#FC75E7 !important;
          }
        </style>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger text-shadow-white pink" href="#about">Presentacion</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger text-shadow-white pink" href="#projects">Catalogo</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger text-shadow-white pink" href="#signup">Haz tu pedido</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <style>
      .slide1{
          background-image: url('assets/img/<?php echo $img_carrusel_1; ?>') !important;
      }

      .slide2{
        background-image: url('assets/img/<?php echo $img_carrusel_2; ?>') !important;
      }

      .slide3{
        background-image: url('assets/img/<?php echo $img_carrusel_3; ?>') !important;
      }

      .text-shadow{
            text-shadow:0px 0px 20px rgba(0,0,0,.9);
        }

        .text-shadow-white{
            text-shadow:0px 0px 20px rgba(255,255,255,.9) !important;
        }
    </style>
    

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <header class="masthead slide1">
            <div class="container d-flex h-100 align-items-center">
              <div class="mx-auto text-center">
                <h1 class="mx-auto my-0 text-uppercase text-shadow"><?php echo $titulo_carrusel_1; ?></h1>
                <h2 class="text-white mx-auto mt-2 mb-5 text-shadow"><?php echo $subtitulo_carrusel_1; ?></h2>
                <a href="#signup" class="btn btn-primary js-scroll-trigger">Haz tu pedido</a>
              </div>
            </div>
          </header>
        </div>
        <div class="carousel-item">
          <header class="masthead slide2">
            <div class="container d-flex h-100 align-items-center">
              <div class="mx-auto text-center">
                <h1 class="mx-auto my-0 text-uppercase"><?php echo $titulo_carrusel_2; ?></h1>
                <h2 class="text-white mx-auto mt-2 mb-5 text-shadow"><?php echo $subtitulo_carrusel_2; ?></h2>
                <a href="#signup" class="btn btn-primary js-scroll-trigger">Haz tu pedido</a>
              </div>
            </div>
          </header>
        </div>
        <div class="carousel-item">
          <header class="masthead slide3">
            <div class="container d-flex h-100 align-items-center">
              <div class="mx-auto text-center">
                <h1 class="mx-auto my-0 text-uppercase"><?php echo $titulo_carrusel_3; ?></h1>
                <h2 class="text-white mx-auto mt-2 mb-5 text-shadow"><?php echo $subtitulo_carrusel_3; ?></h2>
                <a href="#signup" class="btn btn-primary js-scroll-trigger">Haz tu pedido</a>
              </div>
            </div>
          </header>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <style>
      .about-section{
        background-image: url('assets/img/fondo4.png') !important;
      }
    </style>

    <!-- About Section -->
    <section id="about" class="about-section text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h2 class="text-white mb-4"><?php echo $titulo_presentacion; ?></h2>
            <p class="text-white-50"><?php echo $subtitulo_presentacion; ?></p>
          </div>
        </div>
        <img src="assets/img/<?php echo $img_presentacion; ?>" class="img-fluid" alt="">
      </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="projects-section bg-light">
      <div class="container">

        <style type="text/css">
          .titulos{
            font-size: 3em;
            margin-bottom: 100px;
          }
        </style>

        <!-- Titulo seccion -->
        <div class="row text-center ">
          <div class="col text-uppercase titulos">Catagolo</div>
        </div>

        <!-- Project One Row -->
        <div class="row">
          
          <?php echo $cards_productos; ?>

        </div>

        <!-- Project Two Row -->
        

      </div>
    </section>

    <style type="text/css">
      .form{
        background:#FFFFFF;
        border-radius: 15px;
        padding:20px;
        background:linear-gradient(to right, #FF76E4, #FFCDF5);
      }

      .form input{
        margin-top: 20px;  }

        .texto-contacto{
            color:#000000 !important;
        }
        .btn-danger{
          padding:0px !important;
          width:40px;
          height:40px;
          border-radius:20px !important;
        }

        .danger-input{
            border:2px solid red !important;
            background:#fda3a3 !important;
        }
        input, textarea
        {
            /*background:linear-gradient(to right, #b85f04, #fffb95) !important;*/
            border:2px solid #6f6f6f !important;
            color:#000000 !important;
            border-radius:30px !important;
            padding:20px !important;
        }

        /* enable absolute positioning */
      .inner-addon { 
          position: relative !important; 
      }

      /* style icon */
      .inner-addon .fa {
        position: absolute !important;
        padding-left: 20px !important;
        pointer-events: none !important;
        top:15px;
        color:#ffca9d;
      }

      /* align icon */
      .left-addon .fa  { left:  0px !important;}
      .right-addon .fa { right: 0px !important;}

      /* add padding  */
      .left-addon input  { padding-left:  50px !important; }
      .right-addon input { padding-right: 50px !important; }
        

        .signup-section
        {
          background-image: url('assets/img/fondo1.jpg') !important;
        }
    
    </style>
    <!-- =================================================================================================

                                      FORMULARIO DE CONTACTO

    =========================================================================================================== -->
    <section id="signup" class="signup-section">
      <div class="container text-center">
        <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
            <h2 class=" mb-5">Haz tu pedido dentro del valle<br> <small>Y a regiones a traves de encomienda</small></h2>
        <div class="row">

          <div class="col-md-6 col-lg-6 mx-auto text-center">

            
            
            <form class="form">
              <div class="form-group">
                    <div class="inner-addon left-addon">
                        <i class="fa fa-user fa-lg"></i>
                        <input class="form-control" id="input-nombre" type="text" placeholder="Tu nombre *" required="required">
                    </div>
                  </div>
             <div class="form-group">
                    <div class="inner-addon left-addon">
                        <i class="fa fa-envelope fa-lg"></i>
                        <input class="form-control" id="input-email" type="email" placeholder="Tu email *" required="required">
                    </div>
                  </div>
                  <div class="form-group">  
                    <div class="inner-addon left-addon">
                        <i class="fa fa-phone fa-lg"></i>
                        <input class="form-control" id="input-telefono" type="tel" placeholder="Tu telefono de contacto * ej. +56911223344" required="required">
                    </div>
                    
               
                  </div>
                  <div class="form-group">
                    <div class="inner-addon left-addon">
                        <i class="fa fa-location-arrow fa-lg"></i>
                        <input class="form-control" id="input-direccion" type="text" placeholder="Dirección del pedido*" required="required">
                    </div>
                    
                    
                  </div>
                  <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
              <button id="btn-realizar-pedido" type="button" class="btn btn-primary mx-auto">Realizar pedido</button>
            </form>

          </div>
<style>
                .nodisplay{
                  display:none;
                }
                .borde{
                    border:1px solid black;
                }
                    #selector-producto{
                        background:linear-gradient(to right, #FF76E4, #FFCDF5);
                        
                        padding:30px;
                        padding-top:0;
                        box-sizing:border-box;
                        border-radius:20px;
                        margin-bottom:10px;
                        box-shadow: 0 0 30px rgba(0,0,0,.4);
                    }

                    .lista-pedido-ul li{
                        background:linear-gradient(to right, #FCD7F2, #FF8686);
                        padding:9px;
                        margin-top:3px;
                        border-radius:50px;
                        color:red;
                    }

                    .lista-pedido-ul li:active{
                        background:linear-gradient(to right, #FF8686, #FCD7F2);
                    }

                    .lista-pedido-ul{
                        list-style: none;
                        margin:0;
                        padding:0;
                        
                    }

                    .over-auto{
                        overflow-y:scroll;
                        height:285px;
                    }

                    .checkbox-sandwich{
                        vertical-align: middle;
                    }

                    .titulo-selector-producto{
                        font-size: 1.8em;
                        padding: 8px;
                    }

                     @media(max-width: 400px){
                        #selector-producto{
                            padding:2px;
                        }
                    }

                    /* width */
                    ::-webkit-scrollbar {
                        width: 10px;
                    }

                    /* Track */
                    ::-webkit-scrollbar-track {
                        background: #f1f1f1; 
                    }

                    /* Handle */
                    ::-webkit-scrollbar-thumb {
                        background: #888; 
                    }

                    /* Handle on hover */
                    ::-webkit-scrollbar-thumb:hover {
                        background: #555; 
                    }


                </style>
          <div class="col-md-6 col-lg-6">
            <div class="row form" id="selector-producto">
                      <div class="container">
                          <div class="text-center titulo-selector-producto">Selecciona tu producto</div>
                      </div>
                      <div class="container over-auto">
                      <input type="hidden" id="nro_productos"  value="<?php echo $nro_productos; ?>">
                          <ul class="lista-pedido-ul">
                          <?php ; echo $cards_pedidos_productos; ?>
                          </ul>
                      </div>
                  </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 text-center">
            <style>.g-recaptcha{display:inline-block;}</style>
            <div class="g-recaptcha" data-sitekey="6LeT4HQUAAAAAD2JvyEU6DLkICinbu62clk3-sG1"></div>
          </div>
          <div class="col-12">
            <div id="alert-captcha" class="alert alert-danger nodisplay">
                      Por favor confirma tu pedido haciendo click en el <strong>reCaptcha</strong>.
                  </div>
          </div>
          
          
        </div>
      </div>
    </section>
    <style>
      .bg-azeda{
        background: linear-gradient(to bottom, #C887FF, #280049) !important;
      }

      .bg-azeda-dark{
        background: linear-gradient(to bottom, #280049, #B75CFE) !important;
      }
    </style>

    <!-- Contact Section -->
    <section class="contact-section bg-azeda">
      <div class="container">

        <div class="row">

          <div class="col-md-4 mb-3 mb-md-0">
            <div class="card py-4 h-100">
              <div class="card-body text-center">
                <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                <h4 class="text-uppercase m-0">Entregas</h4>
                <hr class="my-4">
                <div class="small text-black-50"><?php echo $reparto_contacto; ?></div>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-3 mb-md-0">
            <div class="card py-4 h-100">
              <div class="card-body text-center">
                <i class="fas fa-envelope text-primary mb-2"></i>
                <h4 class="text-uppercase m-0">Email</h4>
                <hr class="my-4">
                <div class="small text-black-50">
                  <a href="#"><?php echo $email_contacto; ?></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-3 mb-md-0">
            <div class="card py-4 h-100">
              <div class="card-body text-center">
                <i class="fas fa-mobile-alt text-primary mb-2"></i>
                <h4 class="text-uppercase m-0">Telefono</h4>
                <hr class="my-4">
                <div class="small text-black-50"><?php echo $telefono_contacto; ?></div>
              </div>
            </div>
          </div>
        </div>

        <div class="social d-flex justify-content-center">
          <a href="http://twitter.com/<?php echo $twitter_contacto; ?>" class="mx-2">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="http://facebook.com/<?php echo $facebook_contacto; ?>" class="mx-2">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="http://instagram.com/<?php echo $instagram_contacto; ?>" class="mx-2">
            <i class="fab fa-instagram"></i>
          </a>
        </div>

      </div>
    </section>

    

    <!-- Footer -->
    <footer class="bg-azeda-dark small text-center text-white-50">
      <div class="container">
        Copyright &copy; Azeda 2018
      </div>
    </footer>

    <?php echo $modals_productos; ?>
        <?php echo $modals_mensajes; ?>