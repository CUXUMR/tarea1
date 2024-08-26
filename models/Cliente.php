<?php

namespace Model;

class Cliente extends ActiveRecord
{
    protected static $tabla = 'cliente';
    protected static $idTabla = 'cli_id';
    protected static $columnasDB = ['cli_nombre', 'cli_telefono','cli_sexo','cli_situacion'];

    public $cli_id;
    public $cli_nombre;
    public $cli_telefono;
    public $cli_sexo;
    public $cli_situacion;


    public function __construct($args = [])
    {
        $this->cli_id = $args['cli_id'] ?? null;
        $this->cli_nombre = $args['cli_nombre'] ?? '';
        $this->cli_telefono = $args['cli_telefono'] ?? '';
        $this->cli_sexo = $args['cli_sexo'] ?? '';
        $this->cli_situacion = $args['cli_situacion'] ?? 1;
    }

    
    public static function obtenerClienteconQuery()
    {
        $sql = "SELECT * FROM cliente where cli_situacion = 1";
        return self::fetchArray($sql);
    }

}


