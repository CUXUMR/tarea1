<?php

namespace Controllers;

use Exception;
use FontLib\Table\Type\post;
use Model\Producto;
use MVC\Router;

class ProductoController
{
    public static function index(Router $router)
    {
        $producto = Producto::find(2);
        $router->render('producto/index', [
            'producto' => $producto
        ]);
    }


   
    public static function guardarAPI()
    {
        $_POST['pro_nombre'] = htmlspecialchars($_POST['pro_nombre']);
        $_POST['pro_precio'] = filter_var($_POST['pro_precio'], FILTER_SANITIZE_NUMBER_FLOAT);
        
        try {
            $producto = new Producto($_POST);
            $resultado = $producto->crear();
            http_response_code(200);
            echo json_encode([
                'codigo' => 1,
                'mensaje' => 'Producto guardado exitosamente',
            ]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al guardar producto',
                'detalle' => $e->getMessage(),
            ]);
        }
    }

    public static function buscarAPI()
    {
        try {
            // ORM - ELOQUENT
            // $productos = Producto::all();
            $productos = Producto::obtenerProductoconQuery();
            http_response_code(200);
            echo json_encode([
                'codigo' => 1,
                'mensaje' => 'Datos encontrados',
                'detalle' => '',
                'datos' => $productos
            ]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al buscar productos',
                'detalle' => $e->getMessage(),
            ]);
        }
    }
    

    public static function modificarAPI()
    {
        $_POST['pro_nombre'] = htmlspecialchars($_POST['pro_nombre']);
        $_POST['pro_precio'] = filter_var($_POST['pro_precio'], FILTER_SANITIZE_NUMBER_FLOAT);
        $id = filter_var($_POST['pro_id'], FILTER_SANITIZE_NUMBER_INT);
        try {

            $producto = Producto::find($id);
            $producto->sincronizar($_POST);
            $producto->actualizar();
            http_response_code(200);
            echo json_encode([
                'codigo' => 1,
                'mensaje' => 'Producto modificado exitosamente',
            ]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al modificar producto',
                'detalle' => $e->getMessage(),
            ]);
        }
    }

    public static function eliminarAPI()
    {

        $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        try {

            $producto = Producto::find($id);
            // $producto->sincronizar([
            //     'situacion' => 0
            // ]);
            // $producto->actualizar();
            $producto->eliminar();
            http_response_code(200);
            echo json_encode([
                'codigo' => 1,
                'mensaje' => 'Producto eliminado exitosamente',
            ]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al eliminado producto',
                'detalle' => $e->getMessage(),
            ]);
        }
    }
}
