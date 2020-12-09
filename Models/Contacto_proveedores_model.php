<?php
	include_once 'Conexion_mysqli.php';
	class cProveedores extends DbConfig
	{
		private $servicio;

		public function __construct()
		{
			parent::__construct();
			$this->servicio = array();
		}
		// Especificar formato de codificación de caracteres
		private function setNames() {
			return $this->connection->query("SET NAMES 'utf8'");
		}
		//Insertar a la base de datos
		function InsertarCp($Id_contacto)
		{
			self::setNames();
			$query = "INSERT INTO ";

			$result = $this->connection->query($query) or die ("Error al consultar datos".mysqli_error($this->connection));

			if ($result) {
				echo "<script>
              	 		 	alert('Contacto para Proveedores Guardada');
                			window.location= './Proveedores.php'
                	</script>";
				return true;

			} else {
				echo "<script>
              	 		 	alert('Error al guardar contavto para Proveedores');
                			window.location= './Proveedores.php'
                	</script>";
				return false;
			}
		}
		// Mostrar o Listar Categorias
		function ConsultarCp()
		{
			self::setNames();
			$query = "SELECT * FROM Contacto_proveedores ";

			$result = $this->connection->query($query) or die ("Error al consultar datos".mysqli_error($this->connection));

			foreach ($this->connection->query($query) as $res) {
				$this->servicio[] = $res;
			}
			return $this->servicio;
			$this->connection = null;

		}
		//Obtener datos especificos
		function ObtenerCp($query)
		{
			self::setNames();
			$result = $this->connection->query($query);

			if ($result == false) {
				return false;
			}

			$rows = array();

			while ($row = $result->fetch_assoc()) {
				$rows[] = $row;
			}

			return $rows;
		}
		// Modificar proveedores
		function ActualizarCp($id_contacto)
		{
			self::setNames();
			$query = "UPDATE  SET ";
			$result = $this->connection->query($query) or die ("Error al consultar datos".mysqli_error($this->connection));

			if ($result) {
				echo "<script>
              	 		 	alert('Proveedores Actualizada');
                			window.location= '../../Controllers/Controlador_Proveedor.php'
                	</script>";
				return true;

			} else {
				echo "<script>
              	 		 	alert('Error al actualizar Proveedores');
                			window.location= '../../Controllers/Controlador_Proveedor.php'
                	</script>";
				return false;
			}
		}
		// Eliminar
		function EliminarCp($ide)
		{
			self::setNames();
			$query = "DELETE FROM  WHERE   = '$Ide'";
			$result = $this->connection->query($query) or die ("Error al consultar datos".mysqli_error($this->connection));

			if ($result) {
				echo "<script>
              	 		 	alert('Proveedor Eliminado');
                			window.location= '../../Controllers/Controlador_Proveedor.php'
                	</script>";
				return true;

			} else {
				echo "<script>
              	 		 	alert('Error al eliminar Proveedor');
                			window.location= '../../Controllers/Controlador_Proveedor.php'
                	</script>";
				return false;
			}
		}
	}
 ?>