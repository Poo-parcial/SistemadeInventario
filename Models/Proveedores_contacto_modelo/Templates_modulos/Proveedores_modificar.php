<?php
	require_once("../../Models/Proveedores_model.php");
	// Actualizar categoria
	$id = $_GET['ID'];
	$services = new Proveedores();
	$query = "SELECT * FROM proveedores WHERE ID_proveedor = '$ID'";
	$result = $services->ObtenerP($query);

	foreach ($result as $key => $res) 
	{
		$idp = $res['ID_proveedor'];
		$nombre = $res['Nombre'];
		$direccion= $res['Direccion'];
        $tf = $res['Telefono_fijo'];
        $cel = $res['Celular'];
        $email = $res['Email'];
        $id_c = $res['ID_contacto'];
	}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		 <meta charset="utf-8" />
	    <link rel="apple-touch-icon" sizes="76x76" href="../../img/apple-icon.png" />
	    <link rel="icon" type="image/png" href="../../img/favicon.png" />
	    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="UTF-8">
		<title>Actualizar proveedores</title>
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	    <meta name="viewport" content="width=device-width" />
	    <link href="../../css/bootstrap.min.css" rel="stylesheet" />
	    <link href="../../css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
	    <link href="../../css/demo.css" rel="stylesheet" />
	    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<?php include"../Body/Nav_main.php";?>
		<div class="content">
		  <div class="container-fluid">
		  	<div class="row">
		  		 <div class="col-md-8">
		  		 	<div class="card">
		  		 		<div class="card-header" data-background-color="purple">
		                      <h4 class="title">Proveedores</h4>
		                      <p class="category">Actualizar</p>
		                  </div>
		                  <div class="card-content">
		                  	<form action="#" method="POST">
		                  		<div  class="row">
                                  <div class="col-md-12">
                                      <div class="form-group label-floating">
                                          <label class="control-label">Código</label>
                                          <input type="text" name="ID_p" ID=""  value="<?php echo $ID;?>"class="form-control">
                                      </div>
                                      <div class="form-group label-floating">
                                          <label class="control-label">Nombre</label>
                                          <input type="text" name="Nom_p" ID="Nom_p" value="<?php echo $Nombre;?>" class="form-control">
                                      </div>
                                      <div class="form-group label-floating">
                                          <label class="control-label">Dirección</label>
                                          <input type="text" name="Dir_p" ID="Dir_p" value="<?php echo $Direccion;?>" class="form-control">
                                      </div>
                                       <div class="form-group label-floating">
                                          <label class="control-label">Telefono Fijo</label>
                                          <input type="text" name="Tel_p" ID="Tel_p" value="<?php echo $Tel;?>" class="form-control">
                                      </div>
                                       <div class="form-group label-floating">
                                          <label class="control-label">Celular</label>
                                          <input type="text" name="Cel_p" ID="Cel_p" value="<?php echo $Cel;?>" class="form-control">
                                      </div>
                                       <div class="form-group label-floating">
                                          <label class="control-label">Email</label>
                                          <input type="text" name="Ema_p" ID="Ema_p" value="<?php echo $Email;?>" class="form-control">
                                      </div>
                                       <div class="form-group label-floating">
                                          <label class="control-label">Código Contacto</label>
                                          <input type="text" name="Cont_p" ID="Cont_p" value="<?php echo $ID_c;?>" class="form-control">
                                      </div>
                                  </div>
                              	</div>
                        		 <button type="submit" name="btn_prov" class="btn btn-primary pull-right">Actualizar proveedor</button>
                              <div class="clearfix"></div>
							</form>
<?php 
if (isset($_POST['btn_prov']))
{
 	if (empty($_POST['Nom_p'])) {
		echo "El campo nombre está vacío";
	}
	elseif (empty($_POST['Dir_p'])) {
		echo "El campo direccion está vacío";
	}
	elseif (empty($_POST['Tel_p'])) {
		echo "El campo telefono está vacío";
	}
	elseif (empty($_POST['Cel_p'])) {
		echo "El campo celular está vacío";
	}
	elseif (empty($_POST['Ema_p'])) {
		echo "El campo nombre está vacío";
	}
	elseif (empty($_POST['Cont_p'])){
		echo "El campo nombre está vacío";
	}
	else
	{
		$asd = $services->ActualizarP($_POST['ID_p'], $_POST['Nom_p'], $_POST['Dir_p'], $_POST['Tel_p'], $_POST['Cel_p'], $_POST['Ema_p'], $_POST['Cont_p']);
	}
 }
?>
							<div class="text-left">
							    <a href="../../Controllers/Controlador_Proveedor.php"><button class="btn btn-danger">Cancelar</button></a>
							</div>
		                  </div>
		  		 	</div>
		  		 </div>
		  	</div>
		  </div>
	<footer> <?php include"../Body/Footer_main.php";?></footer>
	</body>
	<footer> <?php include"../Body/Footer_main2.php";?></footer>
</html>