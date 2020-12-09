<?php
    class Estudiante
    {
        private $ID;
        private $DUI;
        private $Nombre;
        private $Apellido;
        private $Direccion;
        private $Telefono;
        private $Sexo;
        private $Correo;
        private $FechaNacimiento;
        private $Cargo;
        private $FechaRegistro;
        private $Edad;
        public function __GET($k){ return $this->$k; }
        public function __SET($k, $v){ return $this->$k = $v; }

    }