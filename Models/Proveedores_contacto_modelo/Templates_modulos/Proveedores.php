<?php
	session_start();
	  if (!isset($_SESSION['usuario'])) {
	    header('Location: ../../index.php');
	  }  
	include("../../Models/Contacto_proveedores_model.php");
	$read= new cProveedores();
	$view = $read->ConsultarCp();
?>
<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<link rel="apple-touch-icon" sizes="76x76" href="../../img/apple-icon.png" />
		<link rel="icon" type="image/png" href="../../img/favicon.png" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>PROVEEDORES</title>
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
								<p class="category">Registrar</p>
							</div>
							<div class="card-content">
								<form action="#" method="POST">
								    <div class="row">
									    <div class="col-md-12">
									    	<div class="form-group label-floating">
											    <label class="control-label">Código de proveedor</label>
											    <input type="text" name="ID_p" ID="" class="form-control" required>
										    </div>
											<div class="form-group label-floating">
												<label class="control-label">Nombre</label>
												<input type="text" name="Nom_p" ID="" class="form-control" required>
											</div>
											<div class="form-group label-floating">
												<label class="control-label">Direccion</label>
												<input type="text" name="Dir_p" ID="" class="form-control" required>
											</div>
											<div class="form-group label-floating">
												<label class="control-label">Telefono</label>
												<input type="int" name="Tel_p" ID="" class="form-control" required>
											</div>
											<div class="form-group label-floating">
												<label class="control-label">Celular</label>
												<input type="int" name="Cel_p" ID="" class="form-control" required>
											</div>
											<div class="form-group label-floating">
												<label class="control-label">Email</label>
												<input type="text" name="Ema_p" ID="" class="form-control" required>
											</div>
											<div class="form-group label-floating">
												<label class="control-label">Contacto</label><br>
												<select type="int" name="Cont_p" ID="" class="form-control" required>
													<option value="" disabled selected> Selecione Contacto</option>
												<?php  
													for ($i=0; $i < count($view); $i++) { 
												?>
													<option value="<?php echo $view[$i]['ID_contacto']; ?>"><?php echo $view[$i]['Nombre'].' '.$view[$i]['Apellido']; ?></option>
												<?php		
													}
												?>
												</select>
											</div>
								    	</div>
								    </div>
								</div>
								<button type="submit" name="btn_prov" class="btn btn-primary pull-right">Agregar Proveedor</button>
							  </form>
								<?php
								    if (isset($_POST['btn_prov'])) 
								    {	
								    	if (empty($_POST['ID_p']))
		                				{
							     			echo "El campo nombre está vacío";
							     		}
		                				elseif (empty($_POST['Nom_p']))
		                				{
							     			echo "El campo nombre está vacío";
							     		}
							     	    elseif (empty($_POST['Dir_p']))
							     	    {
							     			echo "El campo direccion está vacío";
							     		}
							     	    elseif (empty($_POST['Tel_p']))
							     	    {
							     			echo "El campo telefono está vacío";
							     		}
							     	    elseif (empty($_POST['Cel_p']))
							     	    {
							     			echo "El campo celular está vacío";
							     		}
							     	    elseif (empty($_POST['Ema_p'])) {
							      			echo "El campo nombre está vacío";
							      		}
							     	    elseif (empty($_POST['Cont_p'])) {
		                					echo "El campo nombre está vacío";
		                				}
		                                else
		                                {
								     		include("../../Models/Proveedores_model.php");
								     		$nuevo = new Proveedores();
								     		$asd = $nuevo->InsertarP($_POST['ID_p'], $_POST['Nom_p'], $_POST['Dir_p'], $_POST['Tel_p'], $_POST['Cel_p'], $_POST['Ema_p'], $_POST['Cont_p']);
								     	}
			                        }
								?>
							</div>
							<a href="../../Controllers/Controlador_Proveedor.php"> <button type="submit" class="btn btn-primary pull-left">Ver Proveedor</button></a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card card-profile">
							<div class="card-avatar">
							<a href="#pablo">
							<img class="img" src="uploads/art.jpg" alt="">
						    </a>
						    </div>
						<div class="content">
							<h6 class="category text-gray">Tips</h6>
							<h4 class="card-title">Administrador</h4>
							<p class="card-content">
								Sabias que desde esta pestaña se pueden añadir productos a tu inventario y puede ir moviéndote a través del menu principal.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer> <?php include"../Body/Footer_main.php";?></footer>
	</body>
	<footer> <?php include"../Body/Footer_main2.php";?></footer>
</html>
