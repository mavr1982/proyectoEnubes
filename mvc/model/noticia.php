<?php
class Noticia
{
	private $pdo;
    
    public $id;
    public $categoria_id;
    public $titular;
    public $fecha;
    public $contenido;
    public $imagen;
    public $published;
    public $public;

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

			$stm = $this->pdo->prepare("SELECT * FROM noticias");
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
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM noticias WHERE id = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
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

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE noticias SET 
						categoria_id	= ?, 
						titular	        = ?,
                        fecha	        = ?,
						contenido       = ?, 
						imagen			= ?,
						published		= ?,
						public			= ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->categoria_id, 
                        $data->titular,
                        $data->fecha,
                        $data->contenido,
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

	public function Registrar(Noticia $data)
	{
		try 
		{
		$sql = "INSERT INTO noticias (id,categoria_id,titular,fecha,contenido,imagen,published,public) 
		        VALUES (?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
					NULL,
                    $data->categoria_id, 
                    $data->titular,
                    $data->fecha,
                    $data->contenido,
                    $data->imagen,
                    0,
                    0,
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}