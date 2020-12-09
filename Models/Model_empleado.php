<?php 
	include_once 'Conexion_mysqli.php';
	class Empleados extends DbConfig
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

		function Consultar()
		{	
			self::setNames();
			$query = "SELECT * FROM empleados";
			
			$result = $this->connection->query($query) or die ("Error al consultar datos".mysqli_error($this->connection));

			foreach ($this->connection->query($query) as $res) {
				$this->servicio[] = $res;
			}
			return $this->servicio;
			$this->connection = null;
			
		}

		function Insertar($id, $DUI, $Nombre, $Apellido, $direccion, $telefono, $Sexo, $FechaNacimiento, $cargo, $FechaRegistro, $correo){	
			self::setNames();
			$query = "INSERT INTO empleados(id, DUI, Nombre, Apellido, direccion, telefono, Sexo, FechaNacimiento, cargo, FechaRegistro, Correo) 
			VALUES ('$id', '$DUI', '$Nombre', '$Apellido', '$direccion', '$telefono', '$Sexo', '$FechaNacimiento', '$cargo', '$FechaRegistro', '$correo')";

			$result = $this->connection->query($query) or die ("Error al consultar datos".mysqli_error($this->connection));

			if ($result) 
			{
				echo "<script>
		      	 		 	alert('Orden registrada');
		        			window.location= 'Agregar_Emp.php'
		        	</script>";
				return true;

			} 
			else 
			{
				echo "<script>
		      	 		 	alert('Error al registrar orden');
		        			window.location= 'Agregar_Emp.php'
		        	</script>";
				return false;
			}

		}
	}
?>