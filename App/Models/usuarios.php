<?php

class Usuario extends Orm{
    public function __construct($connection)
    {
        parent::__construct('usuario',$connection);
    }

}
