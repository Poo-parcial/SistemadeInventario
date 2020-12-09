<?php
	session_start();
	if (!isset($_SESSION['usuario'])) {
		header('Location: ../Index.php');
	}
	require_once("../Models/Proveedores_model.php");
	$services = new Proveedores();
	$datos = $services->ConsultarP();
	include"../Templates/Body/header.php";
	require_once("../Templates/Modulos/Lista_proveedores.php");

?>