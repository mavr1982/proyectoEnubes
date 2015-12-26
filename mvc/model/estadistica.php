<?php
class Estadistica
{
	private $pdo;

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

	public function PorNoticia()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT noticias.titular AS titular, COUNT(visitas.noticia_id) AS cantidad FROM visitas INNER JOIN noticias ON noticias.id=visitas.noticia_id GROUP BY noticia_id ORDER BY noticias.id");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function anualPorCategoria($categoria_id)
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT COUNT(categoria_id) AS cantidad FROM visitas WHERE fecha_visita like '2015%' AND categoria_id = ?");
			$stm->execute(array($categoria_id));

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

}//end class