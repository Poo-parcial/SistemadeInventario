<?php
require_once '../../Models/Empleado_entidad.php';
require_once '../../Models/Empleado_model.php';

class AlumnoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new AlumnoModel();
    }
    
    public function Index(){
        include"../../Templates/Body/Header2.php";
        require_once '../../Templates/Modulos/Empleados.php';
        /*require_once 'view/footer.php';*/
    }
    
    public function Crud(){
        $alm = new Alumno();
        
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        
        include"../../Templates/Body/Header2.php";
        require_once '../../Templates/Modulos/Empleados_editar.php';
        /*require_once 'view/footer.php';*/
    }
    
    public function Guardar(){
        $alm = new Alumno();
        
        $alm->__SET('id',              $_REQUEST['id']);
        $alm->__SET('DUI',             $_REQUEST['DUI']);
        $alm->__SET('Nombre',          $_REQUEST['Nombre']);
        $alm->__SET('Apellido',        $_REQUEST['Apellido']);
        $alm->__SET('direccion',       $_REQUEST['direccion']);
        $alm->__SET('telefono',        $_REQUEST['telefono']);
        $alm->__SET('Sexo',            $_REQUEST['Sexo']);
        $alm->__SET('FechaNacimiento', $_REQUEST['FechaNacimiento']);
        $alm->__SET('cargo',           $_REQUEST['cargo']);
        $alm->__SET('FechaRegistro',   $_REQUEST['FechaRegistro']);
        $alm->__SET('Correo',          $_REQUEST['Correo']);
        
        if( !empty( $_FILES['Foto']['name'] ) ){
            $foto = date('ymdhis') . '-' . strtolower($_FILES['Foto']['name']);
            move_uploaded_file ($_FILES['Foto']['tmp_name'], '../../uploads/Empleados/' . $foto);
            
            $alm->__SET('Foto', $foto);
        }

        if($alm->__GET('id') != '' ? 
           $this->model->Actualizar($alm) : 
           $this->model->Registrar($alm));
        
        header('Location: ../../Templates/Modulos/Lista_empleados.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: ../../Templates/Modulos/Lista_empleados.php');
    }
}