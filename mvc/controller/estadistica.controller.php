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

        $todasNoticias = $this->model->PorNoticia();

        require_once 'view/layout/headAdmin.html';
        require_once 'view/layout/navAdmin.html';
        require_once 'view/layout/graficosVisitas.html';
    }


}