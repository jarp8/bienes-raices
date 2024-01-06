<fieldset>
    <legend>Información general de nuestra propiedad</legend>

    <label for="titulo">Título</label>
    <input type="text" id="titulo" name="titulo" placeholder="Título Propiedad" value="<?php echo s($propiedad->titulo); ?>">

    <label for="precio">Precio</label>
    <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo s($propiedad->precio); ?>">

    <label for="imagen">Imagen</label>
    <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png">

    <label for="descripcion">Descripción</label>
    <textarea id="descripcion" name="descripcion"><?php echo s($propiedad->descripcion); ?></textarea>
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
        value="<?php echo s($propiedad->habitaciones); ?>">

    <label for="wc">Baños</label>
    <input type="number" id="wc" name="wc" placeholder="Ej: 2" min="1" value="<?php echo s($propiedad->wc); ?>">

    
    <label for="estacionamiento">Estacionamiento</label>
    <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 1" min="1" value="<?php echo s($propiedad->estacionamiento); ?>">
</fieldset>

<fieldset>
    <legend>Vendedor</legend>

    <select name="vendedores_id">
        <option value="">- Seleccione -</option>
        <?php while($vendedor = mysqli_fetch_assoc($resultado)): ?>
            <option 
                <?php echo $vendedorId == $vendedor['id'] ? 'selected' : '' ?> value="<?php echo s($propiedad->vendedor['id']); ?>"><?php echo $vendedor['nombre'] . ' ' . $vendedor['apellido'] ?></option>
        <?php endwhile; ?>
    </select>
</fieldset>