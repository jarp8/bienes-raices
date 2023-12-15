<?php
    require 'includes/funciones.php';

    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Guía para decoración de tu hogar</h1>

        
        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpeg">
            <img src="build/img/destacada2.jpg" alt="Imagen de la propiedad" loading="lazy">
        </picture>
        
        <p class="informacion-meta">Escrito el: <span>20/10/2020</span> por: <span>Admin</span></p>
        
        <div class="resumen-propiedad">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique hic autem consequatur perspiciatis deleniti qui fugit illo excepturi aut, vitae cum nisi omnis quos recusandae. Dolores, aperiam similique! Sint, cum?</p>
        </div>
    </main>

<?php 
    incluirTemplate('footer');
?>