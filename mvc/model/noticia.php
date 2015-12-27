<?php
class Noticia
{
	private $pdo;
    
    public $id;
    public $categoria_id;
    public $titular;
    public $entradilla;
    public $fecha;
    public $contenido;
    public $imagen;
    public $published;
    public $public;
    public $autor;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::Conectar();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM noticias ORDER BY id DESC");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id)
	{
		try{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM noticias WHERE id = ?");			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e){
			die($e->getMessage());
		}
	}//end function Obtener

	public function borrar($id)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM noticias WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function actualizar($data)
	{
		try 
		{
			$sql = "UPDATE noticias SET 
						categoria_id	= ?, 
						titular	        = ?,
						contenido       = ?,
						entradilla		= ?, 
						imagen			= ?,
						published		= ?,
						public			= ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->categoria_id, 
                        $data->titular,
                        $data->contenido,
                        $data->entradilla,
                        $data->imagen,
                        $data->published,
                        $data->public,
                        $data->id,
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function registrar($data)
	{
		try 
		{
		$sql = "INSERT INTO noticias (id,categoria_id,titular,entradilla,fecha,contenido,imagen,published,public,autor) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
					NULL,
                    $data->categoria_id, 
                    $data->titular,
                    $data->entradilla,
                    NULL,
                    $data->contenido,
                    '../assets/images/' . $data->imagen,
                    $data->published,
                    $data->public,
                    $data->autor
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}//end function Registrar

	public function ObtenerUltimaPublica()
	{
		try{
			$stm = $this->pdo
			->prepare("SELECT * FROM noticias WHERE public=1 AND published=1 ORDER BY id DESC LIMIT 1");			          

			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e){
			die($e->getMessage());
		}
	}//end function ObtenerUltimaPublica

	public function ObtenerUltima()
	{
		try{
			session_start();
			if(isset($_SESSION['acceso_privado']) && ($_SESSION['acceso_privado'] == 1)){
				$sql = "SELECT * FROM noticias WHERE published=1 ORDER BY id DESC LIMIT 1";
			} else {
				$sql = "SELECT * FROM noticias WHERE public=1 AND published=1 ORDER BY id DESC LIMIT 1";
			}

			$stm = $this->pdo
			->prepare($sql);			          

			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e){
			die($e->getMessage());
		}
	}//end function ObtenerUltima

	public function ObtenerUltimaPublicaCategoria($categoria_id)
	{
		try{
			$stm = $this->pdo
			->prepare("SELECT * FROM noticias WHERE categoria_id = ? AND public=1 AND published=1 ORDER BY id DESC LIMIT 1");			          

			$stm->execute(array($categoria_id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e){
			die($e->getMessage());
		}
	}//end function ObtenerUltimaPublicaCategoria

	public function ObtenerUltimaCategoria($categoria_id)
	{
		try{
			$stm = $this->pdo
			->prepare("SELECT * FROM noticias WHERE categoria_id = ? AND published=1 ORDER BY id DESC LIMIT 1");			          

			$stm->execute(array($categoria_id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e){
			die($e->getMessage());
		}
	}//end function ObtenerUltimaPublicaCategoria

	public function ObtenerTodasCategoria($categoria_id)
	{
		try{
			$stm = $this->pdo
			->prepare("SELECT noticias.*, categorias.nombre as nombreCategoria FROM noticias INNER JOIN categorias on noticias.categoria_id=categorias.id WHERE categoria_id = ? AND published=1 ORDER BY id DESC");			          

			$stm->execute(array($categoria_id));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e){
			die($e->getMessage());
		}
	}//end function ObtenerUltimaPublicaCategoria

	public function ObtenerNoticia($id)
	{
		try{
			$stm = $this->pdo
			->prepare("SELECT * FROM noticias WHERE id = ?");			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e){
			die($e->getMessage());
		}
	}//end function ObtenerUltimaPublicaCategoria

	public function registrarVisita($noticia_id, $categoria_id)
    {
    	try 
		{
		$sql = "INSERT INTO visitas (id,noticia_id,fecha_visita, categoria_id) 
		        VALUES (?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
					NULL,
                    $noticia_id, 
                    NULL,
                    $categoria_id                    
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
        
    }//end function registrarVisita

}