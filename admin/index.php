<?php
    require '../includes/app.php';

   estaAutenticado();

   // Importar clases
   use App\Propiedad;
   use App\Vendedor;

   // Implemenar un metodo para obtener todas las propiedades
   $propiedades = Propiedad::all(); 

   $vendedores = Vendedor::all();

    // Mostrar mensaje condicional
    $resultado = $_GET['resultado'] ?? null;

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Validar id
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if($id) {
            $tipo = $_POST['tipo'];
            if(validarTipoContenido($tipo)) {
                // Compara lo que vamos a eliminar
                if($tipo == 'vendedor') {
                    $vendedor = Vendedor::find($id);
                    $vendedor->eliminar(); 

                } else if ($tipo == 'propiedad') {
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar(); 
                }
            }
        }
    }

    // Incluye un template
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raíces</h1>

        <?php 
            $mensaje = mostrarNotificacion(intval($resultado));

            if($mensaje) { ?>
                <p class="alerta exito"><?php echo s($mensaje) ?></p>
            <?php } ?>

        <a href="/bienes-raices/admin/propiedades/crear.php" class="boton boton-verde">
            Nueva propiedad
        </a>

        <a href="/bienes-raices/admin/vendedores/crear.php" class="boton boton-amarillo">
            Nueva vendedor
        </a>
        
        <h2>Propiedades</h2>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!-- Mostrar los resultados -->
            <?php foreach($propiedades as $propiedad): ?>
                <tr>
                    <td><?php echo $propiedad->id; ?></td>
                    <td><?php echo $propiedad->titulo; ?></td>
                    <td><img src="/bienes-raices/imagenes/<?php echo $propiedad->imagen; ?>" class="imagen-tabla"></td>
                    <td>$ <?php echo $propiedad->precio; ?></td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="/bienes-raices/admin/propiedades/actualizar.php?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Vendedores</h2>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!-- Mostrar los resultados -->
            <?php foreach($vendedores as $vendedor): ?>
                <tr>
                    <td><?php echo $vendedor->id; ?></td>
                    <td><?php echo $vendedor->nombre . " " . $vendedor->apellido; ?></td>
                    <td><?php echo $vendedor->telefono; ?></td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="/bienes-raices/admin/vendedores/actualizar.php?id=<?php echo $vendedor->id; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </main>

<?php 
    // Cerrar la conexión
    mysqli_close($db);

    incluirTemplate('footer');
?>