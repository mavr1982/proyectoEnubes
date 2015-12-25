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

        if(isset($_REQUEST['usuario']) && isset($_REQUEST['password']))
            {
                $controller = new controller();
                $controller->login($_REQUEST['usuario'], $_REQUEST['password']);
            }
        //require_once 'view/layout/head.php';
        //require_once 'view/layout/header.php';
        //require_once 'view/modals/inicio.php';
        //require_once 'view/modals/registro.php';
        require_once 'view/layout/index.html';
        //require_once 'view/layout/footer.php';
        //require_once 'view/layout/scripts.php';
    }

    public function login()
    {
                die('hola');

        $usuario = trim($_POST['usuario'] );
        $usuario = filter_var( $usuario, FILTER_SANITIZE_EMAIL);
        $password = trim($_POST['password']);
        $password = filter_var($password, FILTER_SANITIZE_STRING);

        $check = $this->modelUsuario->comprobarLogin($usuario, $password);

        if ($check == TRUE)
        {
            require_once 'https://www.as.com';
        } else {
            require_once 'https://www.google.com';
        }
    }

    public function panelAdmin()
    {
      require_once 'view/layout/indexAdmin.html';  
    }

    public function panelAdminTablas()
    {

        $noticias = $this->modelNoticia->Listar();
        require_once 'view/layout/tables.html';  
    }    
         
    
}