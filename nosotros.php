<?php
    require 'includes/app.php';

    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Conoce sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img src="build/img/nosotros.jpg" alt="Sobres nosotros" loading="lazy">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>
                    25 años de experiencia
                </blockquote>

                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci praesentium, magnam autem fuga necessitatibus animi laborum cum. Dignissimos ipsa, sunt reprehenderit consequuntur, tempore blanditiis dolores inventore quidem, ex suscipit nam.
                </p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Pariatur et, error enim fugit reprehenderit aliquid eius numquam veritatis amet? Illo laudantium quis cupiditate. Necessitatibus quae ea sunt eveniet eum modi!</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Pariatur et, error enim fugit reprehenderit aliquid eius numquam veritatis amet? Illo laudantium quis cupiditate. Necessitatibus quae ea sunt eveniet eum modi!</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono tiempo" loading="lazy">
                <h3>A Tiempo</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Pariatur et, error enim fugit reprehenderit aliquid eius numquam veritatis amet? Illo laudantium quis cupiditate. Necessitatibus quae ea sunt eveniet eum modi!</p>
            </div>
        </div>
    </section>

<?php 
    incluirTemplate('footer');
?>