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

	public function porNoticia()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT noticias.titular AS titular,
										COUNT(visitas.noticia_id) AS cantidad,
										categorias.nombre AS nombre_categoria,
										visitas.noticia_id
										FROM visitas
										INNER JOIN noticias ON noticias.id=visitas.noticia_id
										INNER JOIN categorias ON categorias.id=noticias.categoria_id
										GROUP BY noticia_id
										ORDER BY noticias.id ASC");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//en function porNoticia

	public function porNoticiaOrdenadaPorVisitas()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT noticias.titular AS titular,
										COUNT(visitas.noticia_id) AS cantidad,
										categorias.nombre AS nombre_categoria,
										visitas.noticia_id
										FROM visitas
										INNER JOIN noticias ON noticias.id=visitas.noticia_id
										INNER JOIN categorias ON categorias.id=noticias.categoria_id
										GROUP BY noticia_id
										ORDER BY cantidad DESC");
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

			$stm = $this->pdo->prepare("SELECT COUNT(categoria_id) AS cantidad
										FROM visitas
										WHERE fecha_visita like '2015%'
										AND categoria_id = ?");
			$stm->execute(array($categoria_id));

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//end function anualPorCategoria

	public function totalVisitas()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT COUNT(*) AS total FROM visitas");
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//end function totalVisitas

	public function totalVisitasPorCategoria()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT COUNT(v.categoria_id) AS cantidad,
										c.nombre AS nombre_categoria
										FROM visitas v
										INNER JOIN categorias c ON c.id=v.categoria_id
										GROUP BY v.categoria_id");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//end function totalVisitasPorCategoria

	public function noticiasPorCategoria()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT COUNT(*) AS cantidad,
										c.nombre AS nombre_categoria
										FROM noticias n
										INNER JOIN categorias c on n.categoria_id=c.id
										GROUP BY n.categoria_id");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//end function noticiasPorCategoria

	public function totalNoticias()
	{
		try
		{
			
			$stm = $this->pdo->prepare("SELECT COUNT(*) AS total
										FROM noticias n
										");
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//end function totalNoticias

	public function totalUsuarios()
	{
		try
		{
			
			$stm = $this->pdo->prepare("SELECT COUNT(*) AS total
										FROM usuarios u
										");
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//end function totalUsuarios

	public function totalLogins()
	{
		try
		{
			
			$stm = $this->pdo->prepare("SELECT COUNT(*) AS total
										FROM logins l
										");
			$stm->execute();

			return $stm->fetch(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//end function totalLogins

	public function todosUsuarios()
	{
		try
		{
			
			$stm = $this->pdo->prepare("SELECT u.usuario, u.id AS ident, MAX(l.fecha_login) AS fecha_login,
										(SELECT COUNT(*) FROM logins l WHERE l.usuario_id=u.id GROUP BY l.usuario_id) AS total
										FROM logins l
										INNER JOIN usuarios u ON u.id=l.usuario_id
										GROUP BY u.id");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}//end function todosUsuarios

}//end class