<?php  
	require_once("../../Models/Categorias_model.php");
	//Eliminar categoria
	$ide = $_GET['ide'];
	$services = new Categoria();
	$del = $services->Eliminar($ide);
?>