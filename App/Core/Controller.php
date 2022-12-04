<?php

class Controller{
    // $myview= pasar nombre de la vista
    // $parameters= pasar variable como parametros
    // $layouts=indicar el nombre del layout que es la estructura principal html 
    protected function Render($myview,$parameters = [],$layout =''){
        ob_start();#bufer: va controlar la salida que se envia desde el script
        require_once __DIR__. '/../Views/'.$myview.'.view.php';
        // $content= ob_start();
        $content = ob_get_clean();#se almacena lo que trae: [require_once __DIR__. '/../Views/'.$path.'.view.php'];
        require_once __DIR__. '/../Views/layouts/'.$layout.'.layout.php';

    }

}