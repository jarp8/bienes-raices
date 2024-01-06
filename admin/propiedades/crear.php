<?php
    require '../../includes/app.php';

    use App\Propiedad;
    use Intervention\Image\ImageManagerStatic as Image;

    estaAutenticado();

    // Base de datos
    $db = conectarDB();

    $propiedad = new Propiedad;

    // Consultar para obtener los vendedores
    $query = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $query);

    // Arreglo con mensajes de errores
    $errores = Propiedad::getErrores();

    // Ejecutar el código después de que el usuario envia
    // el formulario
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Crea una nueva instancia
        $propiedad = new Propiedad($_POST);

        // Asignar files hacia una variable
        $imagen = $_FILES['imagen'];

        // Subida de archivos

        // Generar un nombre único
        $nombreImagen = md5(uniqid(rand(), true)) . $imagen['name'];

        // Setear la imagen
        // Realiza un resize a la imagen con intervention
        if($_FILES['imagen']['tmp_name']) {
            $image = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 600);
            $propiedad->setImagen($nombreImagen);
        }

        // Validar
        $errores = $propiedad->validar();

        // Revisar que el arreglo de errores este vacío
        if(empty($errores)) {
            // Crear la carpeta para subir imagenes
            if(!is_dir(CARPETAS_IMAGENES)) {
                mkdir(CARPETAS_IMAGENES);
            }

            // Guarda la imagen en el servidor
            $image->save(CARPETAS_IMAGENES . $nombreImagen);

            // Guardar en la base de datos
            $resultado = $propiedad->guardar();

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
            <?php include '../../includes/templates/formulario_propiedades.php'; ?>

            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>
    </main>

<?php 
    incluirTemplate('footer');
?>