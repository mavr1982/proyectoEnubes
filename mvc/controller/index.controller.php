<?php
//require_once 'model/noticia.php';

class IndexController{
    
    private $model;
    
    public function __CONSTRUCT(){
        //$this->model = new Noticia();
    }
    
    public function Index(){
        require_once 'view/layout/header.php';
        require_once 'view/layout/head.php';
        require_once 'view/layout/index.phtml';
        require_once 'view/layout/footer.php';
        require_once 'view/layout/scripts.php';
    }
    
    
}