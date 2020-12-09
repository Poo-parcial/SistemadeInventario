<?php
	include_once 'Conexion_mysqli.php';
	class Categoria extends DbConfig
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
		function Insertar($Id, $Nombre, $Estado)
		{	
			self::setNames();
			$query = "INSERT INTO categorias(Nombre, Estado) VALUES ('".$Nombre."', '".$Estado."')";
			
			$result = $this->connection->query($query) or die ("Error al consultar datos".mysqli_error($this->connection));

			if ($result) {
				echo "<script>
              	 		 	alert('Categoria Guardada');
                			window.location= 'Categorias.php'
                	</script>";
				return true;

			} else {
				echo "<script>
              	 		 	alert('Error al guardar Categoria');
                			window.location= 'Categorias.php'
                	</script>";
				return false;
			}
		}
		// Mostrar o Listar Categorias
		function Consultar()
		{	
			self::setNames();
			$query = "SELECT * FROM Categorias";
			
			$result = $this->connection->query($query) or die ("Error al consultar datos".mysqli_error($this->connection));

			foreach ($this->connection->query($query) as $res) {
				$this->servicio[] = $res;
			}
			return $this->servicio;
			$this->connection = null;
			
		}
		//Obtener datos especificos
		function Obtener($query)
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
		// Modificar Categorias
		function Actualizar($Id, $Nombre, $Estado)
		{
			self::setNames();
			$query = "UPDATE Categorias SET Nombre ='$Nombre',Estado='$Estado' WHERE Id_categoria = '$id'";
			$result = $this->connection->query($query) or die ("Error al consultar datos".mysqli_error($this->connection));

			if ($result) {
				echo "<script>
              	 		 	alert('Categoria Actualizada');
                			window.location= '../../Controllers/Controlador_Categoria.php'
                	</script>";
				return true;

			} else {
				echo "<script>
              	 		 	alert('Error al actualizar Categoria');
                			window.location= '../../Controllers/Controlador_Categoria.php'
                	</script>";
				return false;
			}
		}
		// Eliminar Categorias
		function Eliminar($ide)
		{
			self::setNames();
			$query = "DELETE FROM Categorias WHERE  Id_categoria = '$ide'";
			$result = $this->connection->query($query) or die ("Error al consultar datos".mysqli_error($this->connection));

			if ($result) {
				echo "<script>
              	 		 	alert('Categoria Eliminada');
                			window.location= '../../Controllers/Controlador_Categoria.php'
                	</script>";
				return true;

			} else {
				echo "<script>
              	 		 	alert('Error al eliminar Categoria');
                			window.location= '../../Controllers/Controlador_Categoria.php'
                	</script>";
				return false;
			}
		}
	}	
?>