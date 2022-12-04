<?php

require_once __DIR__ . '/../Models/usuarios.php';
class UsuariosController extends Controller
{

    private $usuarioModel;

    public function __construct($conexion)
    {
        $this->usuarioModel = new Usuario($conexion);
    }

    public function home()
    {
        $this->Render('usuario', [], 'site');
    }

    public function table()
    {
        $res = new Result();

        $usuario = $this->usuarioModel->getAll('*');

        $res->success = true;
        $res->result = $usuario;

        echo json_encode($res);
    }

    public function form_new()
    {
        $this->Render('usuarioNew', [], 'site');
    }
    
    public function form_edit()
    {
        $id = $_GET['id'];
        $usuario = $this->usuarioModel->getAll('*', 'ID', $id);
        $this->Render('usuarioUpdate', ['usuario' => $usuario], 'site');
    }

    public function update()
    {
        $res = new Result;

        $post_data = file_get_contents('php://input');
        $body = json_decode($post_data, true);

        $this->usuarioModel->Update([
            'NOMBRE' => $body['nombre'],
            'APELLIDO' => $body['apellido'],
            'PASSWORD' => $body['pass']
        ], 'ID', $body['id']);

        $res->success = true;
        $res->message = 'Usuario Modificado Exitosamente';

        echo json_encode($res);
    }
    public function insert()
    {
        $res = new Result;

        $post_data = file_get_contents('php://input');
        $body = json_decode($post_data, true);

        $this->usuarioModel->insert([
            'NOMBRE' => $body['nombre'],
            'APELLIDO' => $body['apellido'],
            'PASSWORD' => $body['pass']
        ]);

        $res->success = true;
        $res->message = 'Usuario Registrado Exitosamente';

        echo json_encode($res);
    }

    public function delete()
    {
        $res = new Result;

        $post_data = file_get_contents('php://input');
        $body = json_decode($post_data, true);

        
        $this->usuarioModel->DeleteById('ID',$body['id']);

        $res->success = true;
        $res->message = 'Usuario Eliminado';

        echo json_encode($res);
    }
}
