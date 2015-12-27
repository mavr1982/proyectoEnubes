<?php
require_once 'model/estadistica.php';

class EstadisticaController
{
    
    private $model;
    
    public function __CONSTRUCT()
    {
        $this->model = new Estadistica();
    }
    
    public function graficosNoticias()
    {
        $cine2015 = $this->model->anualPorCategoria(1);
        $deporte2015 = $this->model->anualPorCategoria(4);
        $libros2015 = $this->model->anualPorCategoria(3);
        $musica2015 = $this->model->anualPorCategoria(2);

        $todasNoticias = $this->model->porNoticia();
        $noticia = '';
        $valor = '';
        foreach ($todasNoticias as $key ) {
            $noticia .= "'" . $key->titular . "',";
            $valor .= "'" . $key->cantidad . "',";
        }

        require_once 'view/layout/headAdmin.html';
        require_once 'view/layout/navAdmin.html';
        require_once 'view/layout/graficosVisitas.html';
        require_once 'view/layout/footerAdmin.html';
        require_once 'view/layout/scriptsAdmin.html';
    }

    public function tablaVisitas()
    {

        $todasNoticias = $this->model->porNoticiaOrdenadaPorVisitas();
        $total = $this->model->totalVisitas();
        $totalPorCategoria = $this->model->totalVisitasPorCategoria();
        $noticiasPorCategoria = $this->model->noticiasPorCategoria();
        $totalNoticias = $this->model->totalNoticias();

        require_once 'view/layout/headAdmin.html';
        require_once 'view/layout/navAdmin.html';
        require_once 'view/layout/tablaVisitas.html';
        require_once 'view/layout/footerAdmin.html';
        require_once 'view/layout/scriptsAdmin.html';   

    }//end function tablaVisitas


}