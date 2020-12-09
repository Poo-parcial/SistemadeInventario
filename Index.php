<?php
	session_start();
	unset($_SESSION['usuario']);
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Login</title>
		<link href="./Public/Img/HD/pro.jpg" type="image/x-icon" rel="shortcut icon" />
		<link rel="STYLESHEET" type="text/css"  href="./Public/css/Fondo.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
		<meta charset="UTF-8"><link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.css">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.js"></script>
	</head>
	<body>
        <header>
            <div class="container center-align transparente">
                <span class="white-text transparente alert alert-success"><h4>High Pro Hardware</h4></span>
            </div>
        </header><br>
		<div class="row">
			<div class="col s5">
				</div>
					<div class=" white-text col s2 grey darken-3 center-align transparente" ><br>
					<div class="w3-container black"><br>
					<span style="display:block;text-align:center;" >
						<i class="large material-icons center">people</i><br>
						<h6><b>Iniciar sesión</b></h6>
					</span><br>
					</div>
					<form class="" action="./Controllers/Controlador_Login.php" method="post">
						<p>
							<label class="white-text"><b>Usuario</b></label>
							<input class="w3-input w3-border " type="text" name="usuario" required autocomplete="off" placeholder="Ingresar usuario">
						</p>
						<p>
							<label class="white-text"><b>Password</b></label>
							<input class="w3-input w3-border" type="password" name="pas" placeholder="Ingresar contraseña">
						</p>
						<p>
							<input type="hidden" name="entrar" value="entrar">
							<button class="btn btn-secondary" type="submit" name="action">Acceder<i class="material-icons right">lock_open</i></button>
						</p>
					</form><br>
					</div>
				<div class="col s5 right-align transparente">

			</div>
		</div>
	</body>
</html>