<?php
require_once 'model/usuario.php';

class UsuarioController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Usuario();
    }
    
    public function Index(){
        require_once 'view/layout/header.php';
        require_once 'view/usuario/usuario.php';
        require_once 'view/layout/footer.php';
    }
    
    public function Crud(){
        $alm = new Usuario();
        
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/usuario/usuarioEditar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $alm = new Usuario();
        
        $alm->id = $_REQUEST['id'];
        $alm->Nombre = $_REQUEST['nombre'];
        $alm->Apellido = $_REQUEST['apellidos'];
        $alm->Correo = $_REQUEST['usuario'];
        $alm->Sexo = $_REQUEST['password'];
        $alm->FechaNacimiento = $_REQUEST['is_admin'];

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