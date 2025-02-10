<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Delivery</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet"> 
   

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

     <!-- Fonts -->
     <link rel="preconnect" href="https://fonts.bunny.net">
     <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

     <!-- Scripts -->
     @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>

  a:hover{
        text-decoration: underline;
        color: black;
  }
  .navegacion__link--registrar:hover{
    text-decoration: underline;
    color: white;


  }
    </style>
</head>
<body>
    <header class="header ">
        <div class="header__logo">
            <img src="{{ asset('img/logo.svg') }}" alt="logo">
        </div>
        <div>
            <nav class="navegacion">
           
                <a href="{{ url('/') }}" class="navegacion__link">Inicio</a>
                <a href="{{ url('/products') }}" class="navegacion__link">Platos</a>
                <a href="{{ url('/companyDeliveries') }}" class="navegacion__link">Empresas</a>
                <a href="{{ url('/orders') }}" class="navegacion__link">Pedidos</a>
        
                <a class="navegacion__link" href="{{ url('/cart') }}">
                    
                    <span><i class="bi bi-cart-plus-fill"> Carrito</i></span>
                  </a>
            </nav>
        </div>
        <nav class="navegacion">
           
            @if (Route::has('login'))
                    @auth

                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
                            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                            <path d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
                          </svg>
                          {{ Auth::user()->name }}
                    </div>
                      <a href="{{ route('logout') }}" class="navegacion__link">Cerrar sesion</a>

                   
                           @else
                            <a href="{{ route('login') }}"          class="navegacion__link--registrar">Iniciar sesion</a>
                            @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="navegacion__link--registrar">Crear cuenta</a>
                            @endif
                    @endauth
            @endif
        </nav>
    </header>




    <section class="contenedor formulario">
        <div class="formulario__grid">
            <div class="formulario__contenido">
                <h2 class="formulario__heading">Encuentra y pide comidad en tu restaurante favo</h2>
                <form class="formulario__buscar">
                    <div class="formulario__campo">
                        <label for="restaurant" class="formulario__label">Restaurant</label>
                        <input id="restaurant" class="formulario__input" type="text" placeholder="tacos Mex">
                    </div>
                    <div class="formulario__campo">
                        <label for="platillo" class="formulario__label">Platillo</label>
                        <input id="platillo" class="formulario__input" type="text" placeholder="pizza, ensalada, hamburguesa">
                    </div>
                    <input type="submit" class="formulario__submit" value="Buscar">
                </form>
            </div>
            <div class="formulario__imagen-contenedor">
                <img class="formulario__imagen" src="{{ asset('img/dibujo_repartidor.svg') }}" alt="Repartidor img">
            </div>
        </div>
    </section>
    <section>
        <img class="pasos__wave" src="{{ asset('img/wave.svg') }}" alt="imagene wave">

       </section>


    <div class="contenedor">
        <h2 class="testimoniales__heading">Nuestras instalaciones</h2>
    <section class="hero vh-100 d-flex align-items-center">

     
        <div id="carouselExampleIndicators" class="carousel slide w-100 h-100" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner h-100">
                <div class="carousel-item active h-100">
                    <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/21/66/da/10/inside-amor-a-lo-mexicano.jpg?w=900&h=500&s=1" class="d-block w-100 h-100 object-fit-cover" alt="...">
                </div>
                <div class="carousel-item h-100">
                    <img src="https://blog.monouso.es/wp-content/uploads/Claves-para-decoracio%CC%81n-terraza-bar-y-destacar-entre-la-competencia-1024x536.webp" class="d-block w-100 h-100 object-fit-cover" alt="...">
                </div>
                <div class="carousel-item h-100">
                    <img src="https://static.vecteezy.com/system/resources/previews/007/550/650/large_2x/delivery-man-riding-a-red-scooter-illustration-delivery-service-app-on-mobile-phone-delivery-motorbike-and-mobile-phone-with-map-on-city-background-flat-style-illustration-vector.jpg" class="d-block w-100 h-100 object-fit-cover" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    </div>

    <section class="pasos">
        <img class="pasos__wave" src="{{ asset('img/wave.svg') }}" alt="imagene wave">
        <div class="pasos__contenido">
            <h2 class="pasos__heading">¿Como funciona? <span class="pasos__heading--descripcion">tan facil como 1, 2 y 3</span></h2>
            <div class="pasos__grid contenedor">
                <div class="pasos__imagen">
                    <img loading="lazy" src="{{ asset('img/paso_1.png') }}" alt="image">
                </div>
                <div class="pasos__imagen">
                    <img loading="lazy" src="{{ asset('img/paso_2.png') }}" alt="image">
                </div>
                <div class="pasos__imagen">
                    <img loading="lazy" src="{{ asset('img/paso_3.png') }}" alt="image">
                </div>
            </div>
        </div>
    </section>

    <section class="contenedor testimoniales">
        <h2 class="testimoniales__heading">Testimoniales</h2>
        <div class="testimoniales__grid">
            <div class="testimonial">
                <header class="testimonial__header">
                    <div class="testimonial__imagen">
                        <img src="{{ asset('img/testimonial1.avif') }}" alt="testimonial">
                    </div>
                    <div class="testimonial__informacion">
                        <p class="testimonial__autor">Juan Perez</p>
                        <img class="testimonial__calificacion" src="{{ asset('img/estrellas.avif') }}" alt="imagen estrellas">
                    </div>
                </header>
                <blockquote class="testimonial__texto">Una excelente app, puedo seleccionar de una gran cantidad de opciones y pagar en tarjeta o efectivo según me convenga.</blockquote>
            </div>
            <div class="testimonial">
                <header class="testimonial__header">
                    <div class="testimonial__imagen">
                        <img src="{{ asset('img/testimonial5.avif') }}" alt="testimonial">
                    </div>
                    <div class="testimonial__informacion">
                        <p class="testimonial__autor">Itzel Cruz</p>
                        <img class="testimonial__calificacion" src="{{ asset('img/estrellas.avif') }}" alt="imagen estrellas">
                    </div>
                </header>
                <blockquote class="testimonial__texto">Una excelente app, puedo seleccionar de una gran cantidad.</blockquote>
            </div>
            <div class="testimonial">
                <header class="testimonial__header">
                    <div class="testimonial__imagen">
                        <img src="{{ asset('img/testimonial4.avif') }}" alt="testimonial">
                    </div>
                    <div class="testimonial__informacion">
                        <p class="testimonial__autor">Jennifer lawrence</p>
                        <img class="testimonial__calificacion" src="{{ asset('img/estrellas.avif') }}" alt="imagen estrellas">
                    </div>
                </header>
                <blockquote class="testimonial__texto">Una excelente app, puedo seleccionar de una gran cantidad de opciones y pagar en tarjeta o efectivo según me convenga. efectivo según me convenga</blockquote>
            </div>
            <div class="testimonial">
                <header class="testimonial__header">
                    <div class="testimonial__imagen">
                        <img src="{{ asset('img/testimonial3.avif') }}" alt="testimonial">
                    </div>
                    <div class="testimonial__informacion">
                        <p class="testimonial__autor">Jonny Mendes</p>
                        <img class="testimonial__calificacion" src="{{ asset('img/estrellas.avif') }}" alt="imagen estrellas">
                    </div>
                </header>
                <blockquote class="testimonial__texto">Una excelente app, puedo seleccionar de una gran cantidad de opciones y pagar en tarjeta o efectivo según me convenga.</blockquote>
            </div>
            <div class="testimonial">
                <header class="testimonial__header">
                    <div class="testimonial__imagen">
                        <img src="{{ asset('img/testimonial2.avif') }}" alt="testimonial">
                    </div>
                    <div class="testimonial__informacion">
                        <p class="testimonial__autor">Rachel Green</p>
                        <img class="testimonial__calificacion" src="{{ asset('img/estrellas.avif') }}" alt="imagen estrellas">
                    </div>
                </header>
                <blockquote class="testimonial__texto">Una excelente app, puedo seleccionar de una gran cantidad de opciones y pagar en tarjeta o efectivo según me convenga</blockquote>
            </div>
        </div>
    </section>

    <main class="favoritos">
        <h2 class="favoritos__heading">Restaurantes Favoritos</h2>

        <div class="favoritos__grid contenedor">
            <div class="favorito">
                <div class="favorito__grid">
                    <div class="favorito__imagen">
                        <img src="{{ asset('img/logo_ensaladas.png') }}" alt="logo restaurant">
                    </div>

                    <div class="favorito__contenido">
                        <img src="{{ asset('img/estrellas.png') }}" alt="calificacion restaurant">

                        <h3 class="favorito__nombre">Green Ensaladas</h3>
                        <p class="favorito__descripcion">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo eos ullam mollitia et sit sequi est perspiciatis qui, ex, iure sed! Ducimus magnam eveniet fugit atque maxime architecto necessitatibus esse.</p>
                    </div>
                </div>
            </div> <!--.favorito-->

            <!-- Repite el bloque .favorito para cada restaurante -->
        </div>
    </main>

    <section class="repartidores">
        <h2 class="repartidores__heading">
            Gana dinero con AppComida
        </h2>
        <div class="repartidores__grid contenedor">
            <div class="repartiodres__imagen">
                <img src="{{ asset('img/repartidor.jpg') }}" alt="Imagen repartidor">
            </div>
            <div class="repartidores__contenido">
                <p class="repartidores__texto">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Asperiores animi exercitationem nostrum aliquid est hic possimus aut, reprehenderit, assumenda eum accusamus architecto nesciunt vel, commodi deleniti veritatis iusto facilis laboriosam!</p>
                <p class="repartidores__texto">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Atque tempora tempore animi eius aut, sapiente impedit porro architecto, neque delectus accusamus unde voluptates a est incidunt harum expedita labore quidem!</p>
                
                <a href="#" class="repartidores__enlace">Mas informacion</a>
            </div>
        </div>
    </section>

    <section class="descargar"> 
        <div class="descargar__grid contenedor">
            <div class="descargar__imagen">
                <img src="{{ asset('img/app.webp') }}" alt="imagen app">
            </div>
            <div class="tiendas">
                <h3 class="tiendas__heading">Descarga la app</h3>
                <p class="tiendas__texto">Disponible para Android y  iOS</p>

                <div class="tiendas__grid">
                    <a href="#" class="tiendas__enlace">
                        <img src="{{ asset('img/tienda-apple.svg') }}" alt="tienda apple">
                    </a>
                    <a href="#" class="tiendas__enlace">
                        <img src="{{ asset('img/tienda-android.svg') }}" alt="tienda Android">
                    </a>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="footer__grid contenedor">
            <div class="footer__widget">
                <h3 class="footer__heading">Nosotros</h3>
                <p class="footer__texto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, dignissimos eveniet hic ducimus ut id ipsam sed, consectetur numquam, repudiandae praesentium quaerat consequuntur culpa ipsa velit nisi aperiam quod? Odit!</p>
            </div>

            <div class="footer__widget">
                <h3 class="footer__heading">Navegación</h3>
                <nav class="footer__nav">
                    <a href="#" class="footer__link">Enlace 1</a>
                    <a href="#" class="footer__link">Enlace 2</a>
                    <a href="#" class="footer__link">Enlace 3</a>
                    <a href="#" class="footer__link">Enlace 4</a>
                    <a href="#" class="footer__link">Enlace 5</a>
                    <a href="#" class="footer__link">Enlace 6</a>
                </nav>
            </div>

            <div class="footer__widget">
                <h3 class="footer__heading">Contacto</h3>
                <p class="footer__texto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, dignissimos eveniet hic ducimus ut id ipsam sed, consectetur numquam, repudiandae praesentium quaerat consequuntur culpa ipsa velit nisi aperiam quod? Odit!</p>
            </div>
        </div>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
    <script>
        var myCarousel = new bootstrap.Carousel(document.querySelector('#carouselExampleIndicators'), {
            interval: 2000, // Cambia cada 2 segundos
            wrap: true // Permite repetir el ciclo
        });
    </script>
    
</body>
</html>