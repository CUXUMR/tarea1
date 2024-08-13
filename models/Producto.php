<?php

namespace Model;

class Producto extends ActiveRecord
{
    protected static $tabla = 'productos';
    protected static $idTabla = 'pro_codigo';
    protected static $columnasDB = ['pro_nombre', 'pro_precio'];

    public $id;
    public $pro_nombre;
    public $pro_precio;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->pro_nombre = $args['pro_nombre'] ?? '';
        $this->pro_precio = $args['pro_precio'] ?? 0;
    }
}
