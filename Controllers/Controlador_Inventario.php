<?php  
	session_start();
	if (!isset($_SESSION['usuario'])) {
		header('Location: ../index.php');
	}
	require_once("../Models/Producto_model.php");
	$services = new InventarioP();
	$datos = $services->Consultar();
	include"../Templates/Body/Header.php";
	require_once("../Templates/Modulos/Lista_inv_p.php");
?>