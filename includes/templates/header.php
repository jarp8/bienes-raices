<?php
    if(!isset($_SESSION)) {
        session_start();
    }

    $auth = $_SESSION['login'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raíces</title>

    <link rel="stylesheet" href="/bienes-raices/build/css/app.css">
</head>
<body>

    <header class="header <?php echo ($inicio) ? 'inicio' : '' ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/bienes-raices/index.php">
                    <img src="/bienes-raices/build/img/logo.svg" alt="Logotipo de Bienes Raíces">
                </a>

                <div class="mobile-menu">
                    <img src="/bienes-raices/build/img/barras.svg" alt="Icono menu responsive">
                </div>

                <div class="derecha">
                    <img src="/bienes-raices/build/img/dark-mode.svg" alt="Cambiar de tema" class="dark-mode-boton">

                    <nav class="navegacion">
                        <a href="/bienes-raices/nosotros.php">Nosotros</a>
                        <a href="/bienes-raices/anuncios.php">Anuncios</a>
                        <a href="/bienes-raices/blog.php">Blog</a>
                        <a href="/bienes-raices/contacto.php">Contacto</a>
                        <?php if($auth): ?>
                            <a href="/bienes-raices/cerrar-sesion.php">Cerrar sesión</a>
                        <?php endif; ?>
                    </nav>
                </div>

            </div> <!-- .barra-->
            <?php if($inicio) { ?>
                <h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>
            <?php } ?>
        </div>
    </header>