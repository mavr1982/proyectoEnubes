<?php
require_once 'model/usuario.php';

class UsuarioController{
    
    private $model;
    
    public function __CONSTRUCT()
    {
        $this->model = new Usuario();
    }
    
    public function Index()
    {
        require_once 'view/layout/header.php';
        require_once 'view/usuario/usuario.php';
        require_once 'view/layout/footer.php';
    }
    
    public function Crud()
    {
        $alm = new Usuario();
        
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/usuario/usuarioEditar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar()
    {
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
    
    public function Eliminar()
    {
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }

    public function crearUsuario()
    {
        $data = new Usuario();

        $data->usuario = trim($_POST['usuario'] );
        $data->usuario = filter_var( $data->usuario, FILTER_SANITIZE_EMAIL);
        $data->password = trim($_POST['password']);
        $data->password = filter_var($data->password, FILTER_SANITIZE_STRING);
        $data->nombre = trim($_POST['nombre'] );
        $data->nombre = filter_var( $data->nombre, FILTER_SANITIZE_STRING);
        $data->apellidos = trim($_POST['apellidos']);
        $data->apellidos = filter_var($data->apellidos, FILTER_SANITIZE_STRING);
        $data->acceso_privado = $_POST['acceso_privado'];
        $data->is_admin = $_POST['is_admin'];
  
        $this->model->registrar($data);

        $usuarios = $this->model->Listar();

        require_once 'view/layout/headAdmin.html';
        require_once 'view/layout/navAdmin.html';
        require_once 'view/layout/tablaUsuarios.html';
        require_once 'view/modals/createUser.php';
        require_once 'view/modals/editUser.php'; 

    }
}