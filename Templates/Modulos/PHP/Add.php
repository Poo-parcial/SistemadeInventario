<?php
	require '../Class/Cliente.php';
	
	$nombres=$_POST['nombres'];
	$apellidos=$_POST['apellidos'];
	$direccion=$_POST['direccion'];
	$telefono=$_POST['telefono'];
	$categoria=$_POST['categoria'];

	echo "<pre>";
	print_r($_POST);

	$cliente=new Cliente($nombres, $apellidos, $direccion, $telefono, $categoria);

	$resultado=$cliente->Registrar();

	if ($resultado){
		header("location:../Clientes.php");
	}else{
		echo "<br>";
		echo "<br>";
		exit(json_encode(array('estado'=>false, 'mensaje'=>'Error al registrar usuario')));
	}

	echo "<br>";
	var_dump($resultado);

?>