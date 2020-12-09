<?php  
	require_once("../../Models/Proveedores_model.php");
	//Eliminar categoria
	$ide = $_GET['ide'];
	$services = new Proveedores();
	$del = $services->EliminarP($ide);
?>