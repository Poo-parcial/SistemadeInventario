<?php  
	class Categoria
	{
		private $servicio;
		private $db;
		// Conexion a la base de datos
		public function __construct() {
			$this->servicio = array();
			$this->db = new PDO('mysql:host=localhost;dbname=high_pro_hardware', "root", "");
		}
		// Especificar formato de codificación de caracteres
		private function setNames() {
			return $this->db->query("SET NAMES 'utf8'");
		}
		//Insertar a la base de datos
		public function Insertar($Id, $Nombre, $Estado) 
		{
			self::setNames();
			$sql = "INSERT INTO categorias(Nombre, Estado) VALUES ('$Nombre', '$Estado')";
			$result = $this->db->query($sql);

			if ($result) {
				echo "<script>
              	 		 	alert('Categoria Guardada');
                			window.location= '../Templates/Modulos/Categorias.php'
                	</script>";
				return true;

			} else {
				echo "<script>
              	 		 	alert('Error al guardar Categoria');
                			window.location= '../Templates/Modulos/Categorias.php'
                	</script>";
				return false;
			}
		}
		
	}
?>