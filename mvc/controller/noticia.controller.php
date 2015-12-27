<?php
require_once 'model/noticia.php';
require_once 'model/usuario.php';

class NoticiaController
{
    
    private $model;
    
    public function __CONSTRUCT()
    {
        $this->model = new Noticia();
        $this->modelUsuario = new Usuario();
    }
        
    public function borrar()
    {
        $this->model->borrar($_POST['idForDel']);

        $noticias = $this->model->Listar();

        require_once 'view/layout/headAdmin.html';
        require_once 'view/layout/navAdmin.html';
        require_once 'view/layout/tablaNoticias.html';
        require_once 'view/modals/createNews.php';
        require_once 'view/modals/editNews.php';
        require_once 'view/modals/deleteNews.php';
        require_once 'view/layout/footerAdmin.html';
        require_once 'view/layout/scriptsAdmin.html'; 

    }//end function borrar

    public function noticia($id)
    {
        $noticia = $this->model->ObtenerNoticia($_REQUEST['id']);
        $this->model->registrarVisita($_REQUEST['id'], $noticia->categoria_id);
        $noticias = $this->model->ObtenerTodasCategoria($noticia->categoria_id);

        require_once 'view/layout/head.html';
        require_once 'view/layout/nav.html';
        require_once 'view/layout/header.html';
        require_once 'view/modals/login.php';
        require_once 'view/modals/errorLogin.php';
        require_once 'view/layout/noticia.html';
        require_once 'view/layout/footer.html';
        require_once 'view/layout/scripts.php';
    }

    public function categoria()
    {
        session_start();
        if(isset($_SESSION["acceso_privado"]) && ($_SESSION["acceso_privado"] == 1)){
            $noticias = $this->model->ObtenerTodasCategoria($_REQUEST['id']);
        }else {
            $noticias = $this->model->ObtenerTodasPublicasCategoria($_REQUEST['id']);   
        }

        require_once 'view/layout/head.html';
        require_once 'view/layout/nav.html';
        require_once 'view/layout/header.html';
        require_once 'view/modals/login.php';
        require_once 'view/modals/errorLogin.php';
        require_once 'view/layout/categoria.html';        
        require_once 'view/layout/footer.html';
        require_once 'view/layout/scripts.php';
    }

    public function crearNoticia()
    {
        $data = new Noticia();

        $data->categoria_id = $_POST['categoria_id'];
        $data->autor = $_POST['autor'];
        $data->titular = $_POST['titular'];
        $data->entradilla = $_POST['entradilla'];
        $data->contenido = $_POST['contenido'];
        $data->imagen = $_POST['imagen'];
        $data->published = $_POST['published'];
        $data->public = $_POST['public'];   
          
        $this->model->registrar($data);

        $noticias = $this->model->Listar();
        $usuarios = $this->modelUsuario->Listar();

        require_once 'view/layout/headAdmin.html';
        require_once 'view/layout/navAdmin.html';
        require_once 'view/layout/tablaNoticias.html';
        require_once 'view/modals/createNews.php';
        require_once 'view/modals/editNews.php';
        require_once 'view/modals/deleteNews.php'; 
        require_once 'view/layout/footerAdmin.html';
        require_once 'view/layout/scriptsAdmin.html';

    }//end function crearNoticia

    public function ajaxNoticia()
    {
        
        $noticia = $this->model->ObtenerNoticia($_GET['id']);

        $data = json_encode($noticia);

        echo $data;
    
    }//end function ajaxNoticia

    public function editarNoticia()
    {
        $data = new Noticia();

        $data->id = $_POST['edit-id'];
        $data->categoria_id = $_POST['edit-categoria_id'];
        $data->titular = $_POST['edit-titular'];
        $data->entradilla = $_POST['edit-entradilla'];
        $data->contenido = $_POST['edit-contenido'];
        $data->imagen = $_POST['edit-imagen'];
        $data->published = $_POST['edit-published'];
        $data->public = $_POST['edit-public'];   
          
        $this->model->actualizar($data);

        $noticias = $this->model->Listar();
        $usuarios = $this->modelUsuario->Listar();

        require_once 'view/layout/headAdmin.html';
        require_once 'view/layout/navAdmin.html';
        require_once 'view/layout/tablaNoticias.html';
        require_once 'view/modals/createNews.php';
        require_once 'view/modals/editNews.php';
        require_once 'view/modals/deleteNews.php';
        require_once 'view/layout/footerAdmin.html';
        require_once 'view/layout/scriptsAdmin.html'; 

    }//end function editarNoticia


}