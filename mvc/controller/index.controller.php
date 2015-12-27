<?php

require_once 'model/usuario.php';
require_once 'model/noticia.php';
require_once 'model/sesiones.php';

class IndexController
{
    
    private $modelUsuario;
    private $modelNoticia;
    private $modelSesiones;
    
    public function __CONSTRUCT()
    {
        $this->modelUsuario  = new Usuario();
        $this->modelNoticia  = new Noticia();
        $this->modelSesiones = new Sesiones();
    }
    
    public function Index()
    {
        
        if(isset($_SESSION["acceso_privado"]) && ($_SESSION["acceso_privado"] == 1)){


        } else {

            //$ultimaNoticia = $this->modelNoticia->ObtenerUltimaPublica(); 
            $ultimaNoticia = $this->modelNoticia->ObtenerUltima(); 
        }

        $cine = $this->modelNoticia->ObtenerTodasCategoria(1);
        $musica = $this->modelNoticia->ObtenerTodasCategoria(2);
        $libros = $this->modelNoticia->ObtenerTodasCategoria(3); 
        $deportes = $this->modelNoticia->ObtenerTodasCategoria(4);
        
        require_once 'view/layout/head.html';
        require_once 'view/layout/nav.html';
        require_once 'view/layout/header.html';
        require_once 'view/modals/login.php';
        require_once 'view/modals/errorLogin.php';
        require_once 'view/layout/index.html';
        require_once 'view/layout/footer.html';
        require_once 'view/layout/scripts.html';
    }

    public function login()
    {
                
        $usuario = trim($_POST['usuario'] );
        $usuario = filter_var( $usuario, FILTER_SANITIZE_EMAIL);
        $password = trim($_POST['password']);
        $password = filter_var($password, FILTER_SANITIZE_STRING);

        $check = $this->modelUsuario->comprobarLogin($usuario, $password);

            
        if ($check == TRUE)
        {
            session_start();
            $_SESSION['nombre'] = $check->nombre;
            $_SESSION['is_admin'] = $check->is_admin;
            $_SESSION['acceso_privado'] = $check->acceso_privado;


            $this->modelSesiones->inicioSesion($check->id);
            
            header('Location: index.php');

        } else {

            header('Location: index.php');            
        }
    }

    public function logout()
    {        
        session_destroy();

        header('Location: logout.php');

    }//end function logout

    public function panelAdmin()
    {
        require_once 'view/layout/headAdmin.html';
        require_once 'view/layout/navAdmin.html';
        require_once 'view/layout/indexAdmin.html';      
        require_once 'view/layout/footerAdmin.html';
        require_once 'view/layout/scriptsAdmin.html';   
    }

    public function panelAdminTablaNoticias()
    {
        $noticias = $this->modelNoticia->Listar();

        $usuarios = $this->modelUsuario->Listar();

        require_once 'view/layout/headAdmin.html';
        require_once 'view/layout/navAdmin.html';
        require_once 'view/layout/tablaNoticias.html';
        require_once 'view/modals/createNews.php';
        require_once 'view/modals/editNews.php';
        require_once 'view/modals/deleteNews.php';        
        require_once 'view/layout/footerAdmin.html';
        require_once 'view/layout/scriptsAdmin.html';    
    }

    public function panelAdminTablaUsuarios()
    {
        $usuarios = $this->modelUsuario->Listar();
        
        require_once 'view/layout/headAdmin.html';
        require_once 'view/layout/navAdmin.html';
        require_once 'view/layout/tablaUsuarios.html';
        require_once 'view/modals/createUser.php';
        require_once 'view/modals/editUser.php';
        require_once 'view/modals/deleteUser.php';
        require_once 'view/layout/footerAdmin.html';
        require_once 'view/layout/scriptsAdmin.html';   
    }
   
         
    
}// end Class