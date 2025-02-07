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
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    <header class="header contenedor">
        <div class="header__logo">
            <img src="{{ asset('img/logo.svg') }}" alt="logo">
        </div>
        <nav class="navegacion">
            <a href="#" class="navegacion__link">Iniciar sesion</a>
            <a href="#" class="navegacion__link">Crear cuenta</a>
            <a href="#" class="navegacion__link--registrar">Registrar Restaurant</a>
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
</body>
</html>