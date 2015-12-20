<?php
require_once 'model/noticia.php';

class NoticiaController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Noticia();
    }
    
    public function Index(){
        require_once 'view/layout/header.php';
        require_once 'view/noticia/noticia.php';
        require_once 'view/layout/footer.php';
    }
    
    public function Crud(){
        $alm = new Noticia();
        
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/noticia/noticiaEditar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $alm = new Noticia();
        
        $alm->id = $_REQUEST['id'];
        $alm->categoria_id = $_REQUEST['categoria_id'];
        $alm->titular = $_REQUEST['titular'];
        $alm->fecha = $_REQUEST['fecha'];
        $alm->contenido = $_REQUEST['contenido'];
        $alm->published = $_REQUEST['published'];
        $alm->public = $_REQUEST['public'];
        $alm->imagen = $_REQUEST['imagen'];

        $alm->id > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }
}