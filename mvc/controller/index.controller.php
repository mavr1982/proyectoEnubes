<?php

require_once 'model/usuario.php';
require_once 'model/noticia.php';

class IndexController{
    
    private $modelUsuario;
    private $modelNoticia;
    
    public function __CONSTRUCT(){
        $this->modelUsuario = new Usuario();
        $this->modelNoticia = new Noticia();

    }
    
    public function Index(){
        require_once 'view/layout/head.php';
        require_once 'view/layout/header.php';
        require_once 'view/modals/inicio.php';
        require_once 'view/modals/registro.php';
        require_once 'view/layout/index.phtml';
        require_once 'view/layout/footer.php';
        require_once 'view/layout/scripts.php';
    }

    
    
    
}