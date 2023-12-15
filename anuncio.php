<?php
    require 'includes/funciones.php';

    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en venta frente al bosque</h1>
        
        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpeg">
            <img src="build/img/destacada.jpg" alt="Imagen de la propiedad" loading="lazy">
        </picture>

        <div class="resumen-propiedad">
            <p class="precio">$3,000,000</p>

            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" src="build/img/icono_wc.svg" alt="icono wc" loading="lazy">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" loading="lazy">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_dormitorio.svg" alt="icono habitaciones" loading="lazy">
                    <p>4</p>
                </li>
            </ul>

            <p>Lorem ipsu dolor sit amet consectetur adipisicing elit. Similique hic autem consequatur perspiciatis deleniti qui fugit illo excepturi aut, vitae cum nisi omnis quos recusandae. Dolores, aperiam similique! Sint, cum?</p>
        </div>
    </main>

<?php 
    incluirTemplate('footer');
?>