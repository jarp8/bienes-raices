<?php

namespace App;

class Propiedad {

    // Base de datos
    protected static $db;
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedores_id'];

    // Errores
    protected static $errores = [];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedores_id;

    public static function setDB($database) {
        self::$db = $database;
    }

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedores_id = $args['vendedores_id'] ?? 1;
    }

    public function guardar() {
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        // Insertar en la base de datos
        $query = "INSERT INTO propiedades ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' "; 
        $query .= join("', '", array_values($atributos)); 
        $query .= " ') ";

        $resultado = self::$db->query($query);

       return $resultado;
    }

    // Identificar y unir los atributos de la db
    public function atributos() {
        $atributos = [];
        
        foreach(self::$columnasDB as $columna) {
            if($columna == 'id') continue;

            $atributos[$columna] = $this->$columna;
        }
        
        return $atributos;
    }

    public function sanitizarAtributos() {
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }

        return $sanitizado; 
    }

    // Subida de archivos
    public function setImagen($imagen) {
        // Asignar al atributo de imagen el nombre de la imagen
        if($imagen) {
            $this->imagen = $imagen;
        }
    }


    // Validación
    public static function getErrores() {
        return self::$errores;
    }

    public function validar() {
        if(!$this->titulo) {
            self::$errores[] = 'Debes añadir un título';
        }

        if(!$this->precio) {
            self::$errores[] = 'El precio es obligatorio';
        }

        if(strlen($this->descripcion) < 50) {
            self::$errores[] = 'La descripción es obligatorio y al menos debe tener 50 caracteres';
        }

        if(!$this->habitaciones) {
            self::$errores[] = 'El número de habitaciones es obligatorio';
        }

        if(!$this->wc) {
            self::$errores[] = 'El número de baños es obligatorio';
        }

        if(!$this->estacionamiento) {
            self::$errores[] = 'El número de estacionamiento es obligatorio';
        }

        if(!$this->vendedores_id) {
            self::$errores[] = 'Elige un vendedor';
        }

        if(!$this->imagen) {
            self::$errores[] = 'La imagen es obligatoria';
        }

        // // 4 megas máximo
        // $medida = 1000 * 4000;

        // if($this->imagen['size'] > $medida) {
        //     $errores[] = 'La imagen es muy pesada';
        // }

        return self::$errores; 
    }

    // Lista todas las propiedades
    public static function all() {
        $query = "SELECT * FROM propiedades";

        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    public static function consultarSQL($query) {
        // Consultar la base de datos
        $resultado = self::$db->query($query);

        // Iterar los resultados
        $array = [];
        while($registro = $resultado->fetch_assoc()) {
            $array[] = self::crearObjeto($registro);
        }

        // Liberar la memoria
        $resultado->free();

        // Retornar los resultados
        return $array;
    }

    protected static function crearObjeto($registro) {
        $objeto = new self;
        
        foreach($registro as $key => $value) {
            if(property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }
}