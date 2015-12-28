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
        session_start();
        if(isset($_SESSION["acceso_privado"]) && ($_SESSION["acceso_privado"] == 1)){

            $ultimaNoticia = $this->modelNoticia->ObtenerUltima(); 
            $cine = $this->modelNoticia->ObtenerTodasCategoria(1);
            $musica = $this->modelNoticia->ObtenerTodasCategoria(2);
            $libros = $this->modelNoticia->ObtenerTodasCategoria(3); 
            $deportes = $this->modelNoticia->ObtenerTodasCategoria(4);

            if(isset($_SESSION["is_admin"]) && ($_SESSION["is_admin"] == 1)){
                $logins = $this->modelSesiones->ultimasSesiones();
            }

        } else {

            $ultimaNoticia = $this->modelNoticia->ObtenerUltimaPublica();
            $cine = $this->modelNoticia->ObtenerTodasPublicasCategoria(1);
            $musica = $this->modelNoticia->ObtenerTodasPublicasCategoria(2);
            $libros = $this->modelNoticia->ObtenerTodasPublicasCategoria(3); 
            $deportes = $this->modelNoticia->ObtenerTodasPublicasCategoria(4);
            
        }//end function Index

        
        require_once 'view/layout/head.html';
        require_once 'view/layout/nav.html';
        require_once 'view/layout/header.html';
        require_once 'view/modals/login.php';
        require_once 'view/modals/registro.php';
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
    }//end function login

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

    }//end function panelAdmin

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

    }//end function panelAdminTablaNoticias

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

    }//end function panelAdminTablaUsuarios

    public function registro()
    {
        $data = new Usuario();
                
        $data->usuario = trim($_POST['usuario'] );
        $data->usuario = filter_var( $data->usuario, FILTER_SANITIZE_EMAIL);
        $data->password = trim($_POST['password']);
        $data->password = filter_var($data->password, FILTER_SANITIZE_STRING);
        $data->password = md5($data->password);
        $data->nombre = trim($_POST['nombre']);
        $data->nombre = filter_var($data->nombre, FILTER_SANITIZE_STRING);
        $data->apellidos = trim($_POST['apellidos']);
        $data->apellidos = filter_var($data->apellidos, FILTER_SANITIZE_STRING);
        $data->is_admin = 0;
        $data->acceso_privado = 0;

        $check = $this->modelUsuario->registrar($data);

        $this->enviarMail($data->usuario, $data->nombre, $data->apellidos);

        header('Location: index.php');
        
    }//end function registro

    public function enviarMail($mailDestino, $nombre, $apellidos)
    {
        $mail = "<h3>Bienvenido a la web de noticias eNubes</h3>";
        $mail .= "<p>¡Hola " . $nombre . ' ' . $apellidos . '!</p>';
        $mail .= "<p>Ya puedes loguearte con los datos que has introducido.</p>";
        $mail .= "<p>Disfruta de nuestra web. Gracias.</p>";
        //Titulo
        $titulo = "Mensaje de bienvenida eNubes";
        //cabecera
        $headers = "MIME-Version: 1.0\r\n"; 
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
        //dirección del remitente 
        $headers .= "From: Proyecto eNubes < miguelangelvr@gmail.com >\r\n";
        //Enviamos el mensaje a tu_dirección_email 
        $bool = mail($mailDestino,$titulo,$mail,$headers);
        
    }
   
         
    
}// end Class