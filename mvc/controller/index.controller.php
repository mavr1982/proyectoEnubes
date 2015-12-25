<?php

require_once 'model/usuario.php';
require_once 'model/noticia.php';

class IndexController
{
    
    private $modelUsuario;
    private $modelNoticia;
    
    public function __CONSTRUCT()
    {
        $this->modelUsuario = new Usuario();
        $this->modelNoticia = new Noticia();
    }
    
    public function Index()
    {
        $ultimaNoticia = $this->modelNoticia->ObtenerUltimaPublica(); 
        $cine = $this->modelNoticia->ObtenerTodasCategoria(1);
        $musica = $this->modelNoticia->ObtenerTodasCategoria(2);
        $libros = $this->modelNoticia->ObtenerTodasCategoria(3); 
        $deportes = $this->modelNoticia->ObtenerTodasCategoria(4);
        //require_once 'view/layout/head.php';
        //require_once 'view/layout/header.php';
        //require_once 'view/modals/inicio.php';
        //require_once 'view/modals/registro.php';
        require_once 'view/layout/index.html';
        //require_once 'view/layout/footer.php';
        //require_once 'view/layout/scripts.php';
    }
         
    
}