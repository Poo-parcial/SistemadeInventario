<?php
class EstudianteModel
{
	private $pdo;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = new PDO('mysql:host=localhost;dbname=high_pro_hardware', 'root', '');
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		        
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

			$stm = $this->pdo->prepare("SELECT ID, DUI, Nombre, Correo, Apellido, Sexo, FechaNacimiento, Cargo, FechaRegistro, TIMESTAMPDIFF(YEAR, FechaNacimiento, CURDATE()) AS Edad, Telefono, Direccion FROM empleados");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Estudiantes();

				$alm->__SET('id', $r->ID);
				$alm->__SET('Nombre', $r->Nombre);
				$alm->__SET('Apellido', $r->Apellido);
                $alm->__SET('Correo', $r->Correo);
				$alm->__SET('Sexo', $r->Sexo);
				$alm->__SET('FechaNacimiento', $r->FechaNacimiento);
				$alm->__SET('cargo', $r->Cargo);
				$alm->__SET('FechaRegistro', $r->FechaRegistro);
				$alm->__SET('Edad', $r->Edad);
				$alm->__SET('direccion', $r->Direccion);
				$alm->__SET('DUI', $r->DUI);
				$alm->__SET('telefono', $r->Telefono);
				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($ID)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT ID, DUI, Nombre, Correo, Apellido, Sexo, FechaNacimiento, Cargo, FechaRegistro, TIMESTAMPDIFF(YEAR, FechaNacimiento, CURDATE()) AS Edad, Telefono, Direccion FROM empleados WHERE ID = ?");
			          

			$stm->execute(array($ID));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Estudiante();

			$alm->__SET('id', $r->ID);
			$alm->__SET('Nombre', $r->Nombre);
            $alm->__SET('Correo', $r->Correo);
			$alm->__SET('Apellido', $r->Apellido);
			$alm->__SET('Sexo', $r->Sexo);
			$alm->__SET('FechaNacimiento', $r->FechaNacimiento);
			$alm->__SET('cargo', $r->Cargo);
			$alm->__SET('FechaRegistro', $r->FechaRegistro);
			$alm->__SET('Edad', $r->Edad);
			$alm->__SET('direccion', $r->Direccion);
			$alm->__SET('DUI', $r->DUI);
			$alm->__SET('telefono', $r->Telefono);
			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->pdo->prepare("DELETE FROM empleados WHERE ID = ?");			          

			$stm->execute(array($ID));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Estudiante $data)
	{
		try 
		{
			$sql = "UPDATE empleados SET
						DUI 	        = ?,  
						Nombre          = ?, 
						Apellido        = ?,
						Direccion       = ?,
						Telefono        = ?,
						Sexo            = ?, 
						FechaNacimiento = ?,
						Cargo			= ?,
						FechaRegistro	= ?,
                        Correo          = ?,
				    WHERE ID = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('DUI'),
					$data->__GET('Nombre'), 
					$data->__GET('Apellido'),
					$data->__GET('Direccion'),
					$data->__GET('Telefono'), 
					$data->__GET('Sexo'),
					$data->__GET('FechaNacimiento'),
					$data->__GET('Cargo'),
					$data->__GET('FechaRegistro'),
                    $data->__GET('Correo'),
					$data->__GET('iID')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Estudiante $data)
	{
		try 
		{
		$sql = "INSERT INTO empleados (DUI,Nombre,Apellido,Direccion,Telefono,Sexo,FechaNacimiento,Cargo,FechaRegistro,Correo) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('DUI'),
				$data->__GET('Nombre'), 
				$data->__GET('Apellido'),
				$data->__GET('Direccion'),
				$data->__GET('Telefono'),
				$data->__GET('Sexo'),
				$data->__GET('FechaNacimiento'),
				$data->__GET('Cargo'),
				$data->__GET('FechaRegistro'),
                $data->__GET('Correo'),
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}