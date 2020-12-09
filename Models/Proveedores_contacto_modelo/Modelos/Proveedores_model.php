<?php
	include_once 'Conexion_mysqli.php';
	class Proveedores extends DbConfig
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
		function InsertarP($ID, $Nombre, $Direccion, $Telefono_fijo, $Celular, $Email, $ID_contacto)
		{
			self::setNames();
			$query = "INSERT INTO proveedores(ID_proveedor, Nombre, Direccion, Telefono_fijo, Celular, Email, ID_contacto) VALUES ('$ID', '$Nombre', '$Direcion', '$Telefono_fijo', '$Celular', '$Email', '$ID_contacto')";

			$result = $this->connection->query($query) or die ("Error al consultar datos".mysqli_error($this->connection));

			if ($result) {
				echo "<script>
              	 		 	alert('Proveedores Guardada');
                			window.location= './Proveedores.php'
                	</script>";
				return true;

			} else {
				echo "<script>
              	 		 	alert('Error al guardar Proveedores');
                			window.location= './Proveedores.php'
                	</script>";
				return false;
			}
		}
		// Mostrar o Listar Categorias
		function ConsultarP()
		{
			self::setNames();
			$query = "SELECT * FROM proveedores";

			$result = $this->connection->query($query) or die ("Error al consultar datos".mysqli_error($this->connection));

			foreach ($this->connection->query($query) as $res) {
				$this->servicio[] = $res;
			}
			return $this->servicio;
			$this->connection = null;

		}
		//Obtener datos especificos
		function ObtenerP($query)
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
		function ActualizarP($ID, $Nombre, $Direccion, $Telefono_fijo, $Celular, $Email, $iID_contacto)
		{
			self::setNames();
			$query = "UPDATE proveedores SET ID_proveedor = '$ID', Nombre ='$Nombre', Direccion='$Direccion', Telefono_fijo=$Telefono_fijo, Celular='$Celular', Email='$Email', ID_contacto='$ID_contacto' WHERE ID_proveedor='$ID'";
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
		function EliminarP($ide)
		{
			self::setNames();
			$query = "DELETE FROM proveedores WHERE  ID_proveedor = '$ide'";
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