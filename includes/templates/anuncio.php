<?php 
    // Importar la conexión
    require __DIR__ . '/../config/database.php';
    $db = conectarDB();
    
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header('Location: /bienes-raices/');
    }
    
    // Consultar
    $query = "SELECT * FROM propiedades WHERE id = $id";

    // Obtener resultado
    $resultado = mysqli_query($db, $query);

    if(!$resultado->num_rows) {
        header('Location: /bienes-raices/');
    }

    $propiedad = mysqli_fetch_assoc($resultado);
?>

<h1><?php echo $propiedad['titulo']; ?></h1>

<img src="/bienes-raices/imagenes/<?php echo $propiedad['imagen']; ?>" alt="Imagen de la propiedad" loading="lazy">

<div class="resumen-propiedad">
    <p class="precio">$<?php echo $propiedad['precio']; ?></p>

    <ul class="iconos-caracteristicas">
        <li>
            <img class="icono" src="build/img/icono_wc.svg" alt="icono wc" loading="lazy">
            <p><?php echo $propiedad['wc']; ?></p>
        </li>
        <li>
            <img class="icono" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" loading="lazy">
            <p><?php echo $propiedad['estacionamiento']; ?></p>
        </li>
        <li>
            <img class="icono" src="build/img/icono_dormitorio.svg" alt="icono habitaciones" loading="lazy">
            <p><?php echo $propiedad['habitaciones']; ?></p>
        </li>
    </ul>

    <p><?php echo $propiedad['descripcion']; ?></p>
</div>

<?php
    // Cerrar la conexión
    mysqli_close($db);
?>