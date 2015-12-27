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


}//end class