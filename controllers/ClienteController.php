<?php

namespace Controllers;

use Exception;
use FontLib\Table\Type\post;
use Model\Cliente;
use MVC\Router;

class ClienteController
{
    public static function index(Router $router)
    {
        $cliente = Cliente::find(2);
        $router->render('cliente/index', [
            'cliente' => $cliente
        ]);
    }


   
    public static function guardarAPI()
    {
        $_POST['cli_nombre'] = htmlspecialchars($_POST['cli_nombre']);
        $_POST['cli_telefono'] = filter_var($_POST['cli_telefono'], FILTER_SANITIZE_NUMBER_FLOAT);
        $_POST['cli_sexo'] = htmlspecialchars($_POST['cli_sexo']);
        
        try {
            $cliente = new Cliente($_POST);
            $resultado = $cliente->crear();
            http_response_code(200);
            echo json_encode([
                'codigo' => 1,
                'mensaje' => 'Cliente guardado exitosamente',
            ]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al guardar cliente',
                'detalle' => $e->getMessage(),
            ]);
        }
    }

    public static function buscarAPI()
    {
        try {
            // ORM - ELOQUENT
            // $Clientes = Cliente::all();
            $Clientes = Cliente::obtenerClienteconQuery();
            http_response_code(200);
            echo json_encode([
                'codigo' => 1,
                'mensaje' => 'Datos encontrados',
                'detalle' => '',
                'datos' => $Clientes
            ]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al buscar Clientes',
                'detalle' => $e->getMessage(),
            ]);
        }
    }
    

    public static function modificarAPI()
    {
        $_POST['cli_nombre'] = htmlspecialchars($_POST['cli_nombre']);
        $_POST['cli_telefono'] = filter_var($_POST['cli_telefono'], FILTER_SANITIZE_NUMBER_FLOAT);
        $_POST['cli_sexo'] = htmlspecialchars($_POST['cli_sexo']);
        $id = filter_var($_POST['cli_id'], FILTER_SANITIZE_NUMBER_INT);
        try {

            $cliente = Cliente::find($id);
            $cliente->sincronizar($_POST);
            $cliente->actualizar();
            http_response_code(200);
            echo json_encode([
                'codigo' => 1,
                'mensaje' => 'Cliente modificado exitosamente',
            ]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al modificar cliente',
                'detalle' => $e->getMessage(),
            ]);
        }
    }

    public static function eliminarAPI()
    {

        $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        try {

            $cliente = Cliente::find($id);
            // $cliente->sincronizar([
            //     'situacion' => 0
            // ]);
            // $cliente->actualizar();
            $cliente->eliminar();
            http_response_code(200);
            echo json_encode([
                'codigo' => 1,
                'mensaje' => 'Cliente eliminado exitosamente',
            ]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error al eliminado cliente',
                'detalle' => $e->getMessage(),
            ]);
        }
    }
}
