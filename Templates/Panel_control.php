<?php 
	session_start();
	if (!isset($_SESSION['usuario'])) {
		header('Location: Index.php');
	}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Inicio</title>
		<link href="../Public/Img/HD/pro.jpg" type="image/x-icon" rel="shortcut icon" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="STYLESHEET" type="text/css"  href="./Public/css/Transparente.css" />
		<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
		<meta charset="UTF-8">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
		<script type="text/javascript" src="../public/js/js.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.css">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.js"></script>
		<script type="text/javascript">
			//<![CDATA[
				$(document).ready(function(){
				    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
				    $('.modal').modal();
				    $(".button-collapse").sideNav();
				 });
			//]]> 
		</script>
	</head>
	<body>
		<header>
			<?php include"./Body/Nav.php";?><br><br><br>
		</header>
		<section>
			<div class="container center-align transparente">
				<h4><b>BIENVENIDOS /AS </b></h4><br>
				<img src="../Public/Img/logo/hi-pro.png" width="" height="" alt=""><br>
			</div><br>
			<br>
			<br>
			<br>
			<br>
			<div id="modal1" class="modal">
				<div class="modal-content">
					<div class="row">
						<div class="col s2">
							
						</div>
						<div class=" white-text col s8 grey darken-3"><br>
							<div class="cyan darken-2">
								<span style="display:block;text-align:center;">
									<i class="medium material-icons center">person_add</i><br>
									<h6>Usuario Nuevo</h6><br>
								</span><br>
							</div>
							<div>
								<form class="w3-container" action="../Controllers/Controlador_Login.php" method="post">
									<p>
										<label class="w3-label">Nombre de usuario o correo electrónico</label>
										<input class="w3-input w3-border" type="text" name="usuario" required autocomplete="off">
									</p>
									<p>
										<label class="w3-label">Contraseña</label>
										<input class="w3-input w3-border" type="password" name="pas" required>
									</p>
									<p>
										<label class="w3-label">Tipo</label>
										<select class="w3-input w3-border white-text  grey darken-3" name="tipo" id="tipo" required>
											<option value="" disabled selected>Seleccione Tipo de usuario</option>
											<option value="admin">Administrador</option>
											<option value="operador">Operador</option>
										</select>
									</p>
									<p>
										<input type="hidden" name="registrarse" value="registrarse">
										<button class="btn btn-success" type="submit" name="action">Crear<i class="material-icons right">perm_identity</i></button>
										<a class="btn waves-effect red lighten-1" href="panel_control.php">
											<span style="color: #000;" >Cancelar<i class="material-icons right">cancelar</i>
											</span>
										</a>
									</p>
								</form><br>
							</div>
						</div>
						<div class="col s2">
						</div>
					</div>
				</div>
			</div>
		</section>
	</body>
</html>