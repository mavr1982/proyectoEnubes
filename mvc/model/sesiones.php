<?php
class Sesiones
{
	private $pdo;

	public $id;
    public $usuario_id;
    public $fecha_login;

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

	public function inicioSesion($usuario_id)
	{
		try 
		{
		$sql = "INSERT INTO logins (id,usuario_id,fecha_login) 
		        VALUES (?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
					NULL,
                    $usuario_id,                    
                    NULL,
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}

	}//end function inicioSesion

	public function ultimasSesiones()
	{
		try 
		{
		$sql = "SELECT DISTINCT(l.usuario_id), u.nombre FROM usuarios u
				INNER JOIN logins l ON l.usuario_id=u.id
				ORDER BY l.fecha_login DESC LIMIT 5";

		

		    $stm = $this->pdo->prepare($sql);
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}

	}//end function inicioSesion


}//end class