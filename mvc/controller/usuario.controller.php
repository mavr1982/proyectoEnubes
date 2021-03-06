<?php
require_once 'model/usuario.php';

class UsuarioController{
    
    private $model;
    
    public function __CONSTRUCT()
    {
        $this->model = new Usuario();
    }
        
    public function borrar()
    {
        
        $this->model->borrar($_POST['idForDel']);

        $usuarios = $this->model->Listar();

        require_once 'view/layout/headAdmin.html';
        require_once 'view/layout/navAdmin.html';
        require_once 'view/layout/tablaUsuarios.html';
        require_once 'view/modals/createUser.php';
        require_once 'view/modals/editUser.php';
        require_once 'view/modals/deleteUser.php';
        require_once 'view/layout/footerAdmin.html';
        require_once 'view/layout/scriptsAdmin.html';

    }//end function borrar

    public function crearUsuario()
    {
        $data = new Usuario();

        $data->usuario = trim($_POST['usuario'] );
        $data->usuario = filter_var( $data->usuario, FILTER_SANITIZE_EMAIL);
        $data->password = trim($_POST['password']);
        $data->password = filter_var($data->password, FILTER_SANITIZE_STRING);
        $data->password = md5($data->password);
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
        require_once 'view/modals/deleteUser.php';
        require_once 'view/layout/footerAdmin.html';
        require_once 'view/layout/scriptsAdmin.html'; 

    }//end function crearUsuario

    public function ajaxUsuario()
    {
        
        $usuario = $this->model->Obtener($_GET['id']);

        $data = json_encode($usuario);

        echo $data;
    
    }//end function ajaxNoticia

    public function editarUsuario()
    {
        $data = new Usuario(); 

        $data->id = $_POST['edit-id'];
        $data->password = md5($_POST['edit-password']);
        $data->nombre = $_POST['edit-nombre'];
        $data->apellidos = $_POST['edit-apellidos'];
        $data->acceso_privado = $_POST['edit-acceso_privado'];
        $data->is_admin = $_POST['edit-is_admin'];
        $this->model->actualizar($data);

        $usuarios = $this->model->Listar();

        require_once 'view/layout/headAdmin.html';
        require_once 'view/layout/navAdmin.html';
        require_once 'view/layout/tablaUsuarios.html';
        require_once 'view/modals/createUser.php';
        require_once 'view/modals/editUser.php';
        require_once 'view/modals/deleteUser.php';
        require_once 'view/layout/footerAdmin.html';
        require_once 'view/layout/scriptsAdmin.html'; 

    }//end function editarUsuario

}