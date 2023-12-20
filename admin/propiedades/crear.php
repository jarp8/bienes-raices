<?php
    require '../../includes/funciones.php';

    $auth = estaAutenticado();

    if(!$auth) {
        header('Location: /bienes-raices');
    }

    // Base de datos
    require '../../includes/config/database.php';

    $db = conectarDB();

    // Consultar para obtener los vendedores
    $query = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $query);

    // Arreglo con mensajes de errores
    $errores = [];

    $titulo = '';
    $precio = '';
    $descripcion = '';
    $habitaciones = '';
    $wc = '';
    $estacionamiento = '';
    $vendedorId = '';

    // Ejecutar el código después de que el usuario envia
    // el formulario
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";

        // echo "<pre>";
        // var_dump($_FILES);
        // echo "</pre>";

        // exit;

        $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
        $precio = mysqli_real_escape_string($db, $_POST['precio']);
        $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
        $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
        $wc = mysqli_real_escape_string($db, $_POST['wc']);
        $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
        $vendedorId = mysqli_real_escape_string($db, $_POST['vendedor']);
        $creado = date('Y/m/d');

        // Asignar files hacia una variable
        $imagen = $_FILES['imagen'];

        if(!$titulo) {
            $errores[] = 'Debes añadir un título';
        }

        if(!$precio) {
            $errores[] = 'El precio es obligatorio';
        }

        if(strlen($descripcion) < 50) {
            $errores[] = 'La descripción es obligatorio y al menos debe tener 50 caracteres';
        }

        if(!$habitaciones) {
            $errores[] = 'El número de habitaciones es obligatorio';
        }

        if(!$wc) {
            $errores[] = 'El número de baños es obligatorio';
        }

        if(!$estacionamiento) {
            $errores[] = 'El número de estacionamiento es obligatorio';
        }

        if(!$vendedorId) {
            $errores[] = 'Elige un vendedor';
        }

        if(!$imagen['name'] || $imagen['error']) {
            $errores[] = 'La imagen es obligatoria';
        }

        // 4 megas máximo
        $medida = 1000 * 4000;

        if($imagen['size'] > $medida) {
            $errores[] = 'La imagen es muy pesada';
        }

        // Revisar que el arreglo de errores este vacío
        if(empty($errores)) {

            // Subida de archivos
            // Crear carpeta
            $carpetaImagenes = '../../imagenes/';

            if(!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes);
            }

            // Generar un nombre único
            $nombreImagen = md5(uniqid(rand(), true)) . $imagen['name'];

            // Subir la imagen
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);

            // Insertar en la base de datos
            $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedores_id)
            VALUES ('$titulo', '$precio', '$nombreImagen', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedorId')";

            $resultado = mysqli_query($db, $query);

            if($resultado) {
                // Redireccionar al usuario
                header('Location: /bienes-raices/admin/index.php?resultado=1');
            }
        }
    }
    
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Crear</h1>

        <a href="/bienes-raices/admin" class="boton boton-verde">
            Volver
        </a>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form action="/bienes-raices/admin/propiedades/crear.php" method="POST" class="formulario" enctype="multipart/form-data">
            <fieldset>
                <legend>Información general de nuestra propiedad</legend>

                <label for="titulo">Título</label>
                <input type="text" id="titulo" name="titulo" placeholder="Título Propiedad" value="<?php echo $titulo; ?>">

                <label for="precio">Precio</label>
                <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo $precio; ?>">

                <label for="imagen">Imagen</label>
                <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png">

                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Información Propiedad</legend>

                <label for="habitaciones">Habitaciones</label>
                <input 
                    type="number" 
                    id="habitaciones" 
                    name="habitaciones" 
                    placeholder="Ej: 3" 
                    min="1" 
                    value="<?php echo $habitaciones; ?>">

                <label for="wc">Baños</label>
                <input type="number" id="wc" name="wc" placeholder="Ej: 2" min="1" value="<?php echo $wc; ?>">

                
                <label for="estacionamiento">Estacionamiento</label>
                <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 1" min="1" value="<?php echo $estacionamiento; ?>">
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select name="vendedor">
                    <option value="">- Seleccione -</option>
                    <?php while($vendedor = mysqli_fetch_assoc($resultado)): ?>
                        <option 
                            <?php echo $vendedorId == $vendedor['id'] ? 'selected' : '' ?> value="<?php echo $vendedor['id']; ?>"><?php echo $vendedor['nombre'] . ' ' . $vendedor['apellido'] ?></option>
                    <?php endwhile; ?>
                </select>
            </fieldset>

            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>
    </main>

<?php 
    incluirTemplate('footer');
?>