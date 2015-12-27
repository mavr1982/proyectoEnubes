<?php
class Usuario
{
	private $pdo;
    
    public $id;
    public $nombre;
    public $apellidos;
    public $usuario;
    public $password;
    public $is_admin;
    public $fecha_creacion;
    public $acceso_privado;

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

			$stm = $this->pdo->prepare("SELECT * FROM usuarios");
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
			          ->prepare("SELECT * FROM usuarios WHERE id = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function borrar($id)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM usuarios WHERE id = ?");			          

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
			$sql = "UPDATE usuarios SET 
						nombre		= ?, 
						apellidos   = ?,
						password    = ?, 
						is_admin 	= ?,
						acceso_privado 	= ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nombre, 
                        $data->apellidos,
                        $data->password,
                        $data->is_admin,
                        $data->acceso_privado,
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}

	}//end function actualizar

	public function registrar($data)
	{
		try 
		{
		$sql = "INSERT INTO usuarios (id,nombre,apellidos,usuario,password,fecha_creacion,is_admin, acceso_privado) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
					NULL,
                    $data->nombre,
                    $data->apellidos, 
                    $data->usuario, 
                    $data->password,
                    NULL,
                    $data->is_admin,
                    $data->acceso_privado,
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
		
	}//end function registrar

	public function comprobarLogin($usuario, $password)
	{
		try 
		{
			$password = md5($password);
			$stm = $this->pdo
			          ->prepare("SELECT * FROM usuarios WHERE usuario = '" . $usuario . "' AND password = '" . $password ."';");
			          

			$stm->execute();
				return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}