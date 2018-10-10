

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
                <a href="#about" class="btn btn-primary js-scroll-trigger">Haz tu pedido</a>
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
                <a href="#about" class="btn btn-primary js-scroll-trigger">Haz tu pedido</a>
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
                <a href="#about" class="btn btn-primary js-scroll-trigger">Haz tu pedido</a>
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
        margin-top: 20px;
        
      }
    </style>
    <!-- Signup Section -->
    <section id="signup" class="signup-section">
      <div class="container text-center">
        <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
            <h2 class="text-white mb-5">Haz tu pedido <br> <small>Y lo llevamos sin costo adicional</small></h2>
        <div class="row">

          <div class="col-md-6 col-lg-6 mx-auto text-center">

            
            
            <form class="form">
              <input type="text" class="form-control" id="inputEmail" placeholder="Como te llamas?...">
              
              <input type="email" class="form-control" id="inputEmail" placeholder="Tu email por favor...">

              <input type="email" class="form-control" id="inputEmail" placeholder="Necesitamos un telefono de contacto...">
             
              <input type="email" class="form-control" id="inputEmail" placeholder="Donde llevamos tu pedido?...">

              <button type="submit" class="btn btn-primary mx-auto">Realizar pedido</button>
            </form>

          </div>

          <div class="col-md-6 col-lg-6">
            <div class="form">
              <div class="row">
                <div class="col-3">
                  <img src="assets/img/zapatos-ejemplo.jpg" class="img-fluid"/>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section bg-black">
      <div class="container">

        <div class="row">

          <div class="col-md-4 mb-3 mb-md-0">
            <div class="card py-4 h-100">
              <div class="card-body text-center">
                <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                <h4 class="text-uppercase m-0">Entregas</h4>
                <hr class="my-4">
                <div class="small text-black-50">En todo el valle de aconcagua.</div>
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
                  <a href="#">ventas@azeda.cl</a>
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
                <div class="small text-black-50">+56 (9) 5661-2174</div>
              </div>
            </div>
          </div>
        </div>

        <div class="social d-flex justify-content-center">
          <a href="#" class="mx-2">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="#" class="mx-2">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="#" class="mx-2">
            <i class="fab fa-github"></i>
          </a>
        </div>

      </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black small text-center text-white-50">
      <div class="container">
        Copyright &copy; Azeda 2018
      </div>
    </footer>

    