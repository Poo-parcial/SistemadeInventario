<?php
	class proveedores
	{
		private $pdo;
	    public $id;
        public $nombre;
        public $direccion;
	    public $telefono_fijo;
	    public $celular;
        public $email;
        public $id_contacto;

		public function __CONSTRUCT()
		{
			try
			{
				$this->pdo = Database::StartUp();
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

				$stm = $this->pdo->prepare("SELECT * FROM proveedores");
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
				          ->prepare("SELECT * FROM proveedores WHERE id_contacto = ?");


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
				            ->prepare("DELETE FROM proveedores WHERE id_contacto= ?");

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
				$sql = "UPDATE proveedores SET
							dni      		= ?,
							nombre          = ?,
                            direccion       = ?,
							telefono_fijo   = ?,
	                        celular      	= ?,
	                        email           = ?,
                            id_contacto     = ?

					    WHERE id = ?";

				$this->pdo->prepare($sql)
				     ->execute(
					    array(
					    	$data->dni,
	              $data->nombre,
	              $data->direccion,
	              $data->telefono_fijo,
	              $data->celular,
                  $data->email ,
                  $data->ide_contacto
						)
					);
			} catch (Exception $e)
			{
				die($e->getMessage());
			}
		}

		public function Registrar(proveedores $data)
		{
			try
			{
			$sql = "INSERT INTO proveedores (nombre, direccion, telefono fijo, celular, email, ide contacto)
			        VALUES (?, ?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql)
			     ->execute(
					array(
                        $data->nombre,
                        $data->direccion,
                        $data->telefono_fijo,
                        $data->celular,
                        $data->email ,
                        $data->ide_contacto

	                )
				);
			} catch (Exception $e)
			{
				die($e->getMessage());
			}
		}
	}
?>