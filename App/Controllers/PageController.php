<?php

class PageController extends Controller{

    public function __construct($conexion)
    {
        
    }
    
    public function Home(){
        // require_once __DIR__. '/../Views/home.view.php';
        $this->Render('home',[],'site');
    }
    public function Listar(){
        // require_once __DIR__. '/../Views/listar.view.php';
        $this->Render('listar',[],'site');
    }
    public function Modificar(){
        // require_once __DIR__. '/../Views/modificar.view.php';
        $this->Render('modificar',[],'site');
    }
    public function Eliminar(){
        // require_once __DIR__. '/../Views/eliminar.view.php';
        $this->Render('eliminar',[],'site');
    }
    public function Nuevo(){
        // require_once __DIR__. '/../Views/nuevo.view.php';
        $this->Render('nuevo',[],'site');
    }

}