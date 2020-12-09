<?php
	session_start();
	if (!isset($_SESSION['usuario'])) {
		header('Location: index.php');
	}
	require_once("../Models/Categorias_model.php");
	$services = new Categoria();
	$datos = $services->Consultar();
	include"../Templates/Body/Header.php";
	require_once("../Templates/Modulos/Lista_categorias.php");

?>