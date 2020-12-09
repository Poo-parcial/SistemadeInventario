<?php  
	class DbConfig 
	{	
		private $_host = 'localhost';
		private $_username = 'root';
		private $_password = '';
		private $_database = 'high_pro_hardware';
		
		protected $connection;
		
		public function __construct()
		{
			if (!isset($this->connection)) {
				
				$this->connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
				
				if (!$this->connection) {
					echo 'Conexion a la Base de Datos. <<Exitosa>>';
					exit;
				}			
			}	
			
			return $this->connection;
		}
	}
?>