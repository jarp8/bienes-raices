<?php
    require 'includes/app.php';

    incluirTemplate('header', true);
?>

    <main class="contenedor seccion">
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
    </main>

    <section class="seccion contenedor">
        <h2>Casas y Depas en Venta</h2>

        <?php
            include 'includes/templates/anuncios.php';
        ?>

        <div class="alinear-derecha">
            <a href="anuncios.html" class="boton-verde">Ver Todas</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Beatae animi aspernatur minus aliquam mollitia quidem dolore, repudiandae aliquid placeat dolorem laborum ab quam labore maiores omnis unde aut quod sit?</p>
        <a href="contacto.html" class="boton-amarillo">Contactános</a>
    </section>
    
    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture srcset="build/img/blog1.webp" type="image/webp"></picture>
                    <picture srcset="build/img/blog1.jpg" type="image/jpeg"></picture>
                    <img src="build/img/blog1.jpg" alt="Texto entrada blog" loading="lazy">
                </div>

                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
    
                        <p>
                            Consejos para construir una terraza con los mejores materiales
                            y ahorrando dinero
                        </p>
                    </a>
                </div>
            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture srcset="build/img/blog2.webp" type="image/webp"></picture>
                    <picture srcset="build/img/blog2.jpg" type="image/jpeg"></picture>
                    <img src="build/img/blog2.jpg" alt="Texto entrada blog" loading="lazy">
                </div>

                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Guía para la decoración de tu hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
    
                        <p>
                            Maximiza el espacio en tu hogar con esta guía,
                            aprende a combinar muebles y colores para darle
                            vida a tu espacio
                        </p>
                    </a>
                </div>
            </article>
        </section>

        <section class="testimoniales">
            <h3>Testimoniales</h3>

            <div class="testimonial">
                <blockquote>
                    El personal se comportó de una excelente forma,
                    muy buena atención y la casa que me ofrecieron
                    cumple con todas mis expectativas. 
                </blockquote>
                <p>- Alberto Ramírez</p>
            </div>
        </section>
    </div>

<?php 
    incluirTemplate('footer');
?>
